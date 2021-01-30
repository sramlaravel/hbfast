/*
 *
 * Copyright (c) 2006-2014 Sam Collett (http://www.texotela.co.uk)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *
 * Version 1.4.1
 * Demo: http://www.texotela.co.uk/code/jquery/numeric/
 *
 */
(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else {
        factory(window.jQuery);
    }
}(function ($) {
    $.fn.numeric = function (config, callback) {
        if (typeof config === "boolean") {
            config = {decimal: config, negative: true, decimalPlaces: -1}
        }
        config = config || {};
        if (typeof config.negative == "undefined") {
            config.negative = true
        }
        var decimal = config.decimal === false ? "" : config.decimal || ".";
        var negative = config.negative === true ? true : false;
        var decimalPlaces = typeof config.decimalPlaces == "undefined" ? -1 : config.decimalPlaces;
        callback = typeof callback == "function" ? callback : function () {
        };
        return this.data("numeric.decimal", decimal).data("numeric.negative", negative).data("numeric.callback", callback).data("numeric.decimalPlaces", decimalPlaces).keypress($.fn.numeric.keypress).keyup($.fn.numeric.keyup).blur($.fn.numeric.blur)
    };
    $.fn.numeric.keypress = function (e) {
        var decimal = $.data(this, "numeric.decimal");
        var negative = $.data(this, "numeric.negative");
        var decimalPlaces = $.data(this, "numeric.decimalPlaces");
        var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
        if (key == 13 && this.nodeName.toLowerCase() == "input") {
            return true
        } else if (key == 13) {
            return false
        }
        var allow = false;
        if (e.ctrlKey && key == 97 || e.ctrlKey && key == 65) {
            return true
        }
        if (e.ctrlKey && key == 120 || e.ctrlKey && key == 88) {
            return true
        }
        if (e.ctrlKey && key == 99 || e.ctrlKey && key == 67) {
            return true
        }
        if (e.ctrlKey && key == 122 || e.ctrlKey && key == 90) {
            return true
        }
        if (e.ctrlKey && key == 118 || e.ctrlKey && key == 86 || e.shiftKey && key == 45) {
            return true
        }
        if (key < 48 || key > 57) {
            var value = $(this).val();
            if ($.inArray("-", value.split("")) !== 0 && negative && key == 45 && (value.length === 0 || parseInt($.fn.getSelectionStart(this), 10) === 0)) {
                return true
            }
            if (decimal && key == decimal.charCodeAt(0) && $.inArray(decimal, value.split("")) != -1) {
                allow = false
            }
            if (key != 8 && key != 9 && key != 13 && key != 35 && key != 36 && key != 37 && key != 39 && key != 46) {
                allow = false
            } else {
                if (typeof e.charCode != "undefined") {
                    if (e.keyCode == e.which && e.which !== 0) {
                        allow = true;
                        if (e.which == 46) {
                            allow = false
                        }
                    } else if (e.keyCode !== 0 && e.charCode === 0 && e.which === 0) {
                        allow = true
                    }
                }
            }
            if (decimal && key == decimal.charCodeAt(0)) {
                if ($.inArray(decimal, value.split("")) == -1) {
                    allow = true
                } else {
                    allow = false
                }
            }
        } else {
            allow = true;
            if (decimal && decimalPlaces > 0) {
                var dot = $.inArray(decimal, $(this).val().split(""));
                if (dot >= 0 && $(this).val().length > dot + decimalPlaces) {
                    allow = false
                }
            }
        }
        return allow
    };
    $.fn.numeric.keyup = function (e) {
        var val = $(this).val();
        if (val && val.length > 0) {
            var carat = $.fn.getSelectionStart(this);
            var selectionEnd = $.fn.getSelectionEnd(this);
            var decimal = $.data(this, "numeric.decimal");
            var negative = $.data(this, "numeric.negative");
            var decimalPlaces = $.data(this, "numeric.decimalPlaces");
            if (decimal !== "" && decimal !== null) {
                var dot = $.inArray(decimal, val.split(""));
                if (dot === 0) {
                    this.value = "0" + val;
                    carat++;
                    selectionEnd++
                }
                if (dot == 1 && val.charAt(0) == "-") {
                    this.value = "-0" + val.substring(1);
                    carat++;
                    selectionEnd++
                }
                val = this.value
            }
            var validChars = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "-", decimal];
            var length = val.length;
            for (var i = length - 1; i >= 0; i--) {
                var ch = val.charAt(i);
                if (i !== 0 && ch == "-") {
                    val = val.substring(0, i) + val.substring(i + 1)
                } else if (i === 0 && !negative && ch == "-") {
                    val = val.substring(1)
                }
                var validChar = false;
                for (var j = 0; j < validChars.length; j++) {
                    if (ch == validChars[j]) {
                        validChar = true;
                        break
                    }
                }
                if (!validChar || ch == " ") {
                    val = val.substring(0, i) + val.substring(i + 1)
                }
            }
            var firstDecimal = $.inArray(decimal, val.split(""));
            if (firstDecimal > 0) {
                for (var k = length - 1; k > firstDecimal; k--) {
                    var chch = val.charAt(k);
                    if (chch == decimal) {
                        val = val.substring(0, k) + val.substring(k + 1)
                    }
                }
            }
            if (decimal && decimalPlaces > 0) {
                var dot = $.inArray(decimal, val.split(""));
                if (dot >= 0) {
                    val = val.substring(0, dot + decimalPlaces + 1);
                    selectionEnd = Math.min(val.length, selectionEnd)
                }
            }
            this.value = val;
            $.fn.setSelection(this, [carat, selectionEnd])
        }
    };
    $.fn.numeric.blur = function () {
        var decimal = $.data(this, "numeric.decimal");
        var callback = $.data(this, "numeric.callback");
        var negative = $.data(this, "numeric.negative");
        var val = this.value;
        if (val !== "") {
            var re = new RegExp("^" + (negative ? "-?" : "") + "\\d+$|^" + (negative ? "-?" : "") + "\\d*" + decimal + "\\d+$");
            if (!re.exec(val)) {
                callback.apply(this)
            }
        }
    };
    $.fn.removeNumeric = function () {
        return this.data("numeric.decimal", null).data("numeric.negative", null).data("numeric.callback", null).data("numeric.decimalPlaces", null).unbind("keypress", $.fn.numeric.keypress).unbind("keyup", $.fn.numeric.keyup).unbind("blur", $.fn.numeric.blur)
    };
    $.fn.getSelectionStart = function (o) {
        if (o.type === "number") {
            return undefined
        } else if (o.createTextRange && document.selection) {
            var r = document.selection.createRange().duplicate();
            r.moveEnd("character", o.value.length);
            if (r.text == "")return o.value.length;
            return Math.max(0, o.value.lastIndexOf(r.text))
        } else {
            try {
                return o.selectionStart
            } catch (e) {
                return 0
            }
        }
    };
    $.fn.getSelectionEnd = function (o) {
        if (o.type === "number") {
            return undefined
        } else if (o.createTextRange && document.selection) {
            var r = document.selection.createRange().duplicate();
            r.moveStart("character", -o.value.length);
            return r.text.length
        } else return o.selectionEnd
    };
    $.fn.setSelection = function (o, p) {
        if (typeof p == "number") {
            p = [p, p]
        }
        if (p && p.constructor == Array && p.length == 2) {
            if (o.type === "number") {
                o.focus()
            } else if (o.createTextRange) {
                var r = o.createTextRange();
                r.collapse(true);
                r.moveStart("character", p[0]);
                r.moveEnd("character", p[1] - p[0]);
                r.select()
            } else {
                o.focus();
                try {
                    if (o.setSelectionRange) {
                        o.setSelectionRange(p[0], p[1])
                    }
                } catch (e) {
                }
            }
        }
    }
}));

/************ form validation ************/
var valid = true;
function validate_form(form) {
    var valid = true;
    $('.error-e').remove();
    $('.error').removeClass('error');
    $('input.required,textarea.required,select.required', form).not('.ignore').each(function () {
        if ($(this).val() != "") {
            if ($(this).hasClass('email')) {
                if (!validateEmail($(this).val())) {
                    valid = false;
                    $(this).addClass('error');
                    $(this).parent().addClass('error');
                }
            }
            if ($(this).hasClass('check_momaize')) {
                if (!validate_momaize($(this))) {
                    valid = false;
                    $(this).addClass('error');
                    $(this).parent().addClass('error');
                }
            }
            if ($(this).hasClass('check_mobile')) {
                if (!validate_mobile()) {
                    valid = false;
                    $(this).addClass('error');
                    $(this).parent().addClass('error');
                }
            }
            validate_input($(this));
            if ($(this).attr('validate-min') != null) {
                if ($(this).val().length < $(this).attr('validate-min')) {
                    valid = false;
                    $(this).addClass('error');
                    $(this).after('<span class="error-e">يجب أن لا يقل العدد عن :' + $(this).attr('validate-min') + '</span>');
                    $(this).parent().addClass('error');
                }
            }
            if ($(this).attr('words') != null) {
                if ($(this).val().split(" ").length != $(this).attr('words')) {
                    valid = false;
                    $(this).addClass('error');
                    $(this).after('<span class="error-e">'+ $(this).attr('words-message') +' </span>');
                    $(this).parent().addClass('error');
                }
            }
        } else {
            valid = false;
            $(this).addClass('error');
            $(this).parent().addClass('error');
        }
    });
    if ($('input.required,textarea.required,select.required', form).not('.ignore').hasClass('error')) {
        valid = false;

    }
    //return true;
    // $('input.email', form).each(function () {
    //     if ($(this).val() != "") {
    //         if (!validateEmail($(this).val())) {
    //             valid = false;
    //             $(this).addClass('error');
    //             $(this).parent().addClass('error');
    //         }
    //     }
    // })


    // $('input[validate-min!=null]', form).each(function () {
    //     if($(this).val().length<$(this).attr('validate-min')){
    //         valid = false;
    //         $(this).addClass('error');
    //         $(this).after('<span class="error-e">يجب أن لا يقل العدد عن :'+$(this).attr('validate-min')+'</span>');
    //         $(this).parent().addClass('error');
    //     }
    // });
    if ($('input:file').length > 0) {

        if (!stringEndsWithValidExtension($('input:file').val().toLowerCase(), [".pdf", ".docx", ".doc", ".jpg", ".jpeg", ".png", ".rar", ".zip"], false)) {
            valid = false;
            // alert('stringEndsWithValidExtension');
            $('.error-message_2').html('Files only allows file types of pdf, doc, docx, rar, zip,jpg and png.');
            return false;
        }
    }
    $('input:file.required').not('.ignore').each(function () {
        if ($(this).val() != "") {
            if($(this).attr('file_size')>0) {
                if ($(this)[0].files[0].size / 1000 >$(this).attr('file_size')) {
                    // alert('maximum file size must');
                    $('.error-message_3').html('The maximum file size must be less than 5 MB');
                    valid = false;
                }
            }
        }
    });

    if($('input.error,textarea.error,select.error').length>0)
        $('input.error,textarea.error,select.error')[0].focus();
    return valid;
}
// IE doesn't support indexOf
function check_if_numeric(e) {

    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
        // Allow: Ctrl+A, Command+A
        (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||
        // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40)) {
        // let it happen, don't do anything
        return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }


};
function validateEmail(email) {
    var email = jQuery.trim(email);
    var regEmail = /^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/;
    email = email.toUpperCase();
    if (email.match(regEmail)) {
        return true;
    } else {
        return false;
    }
}
function validate_single_input() {
    validate_input($(this));
    //if ($(this).hasClass('yes-no'))
    //    select_event($(this));
}
function validate_input(element) {

    if ($(element).attr('type') == 'checkbox') {
        if ($(element).hasClass('required-one')) {
            input_name = $(element).attr('name');
            if ($('input[name="' + input_name + '"]')[0].checked != true) {
                valid = false;
                $('input[name="' + input_name + '"]').addClass('error');
                $('input[name="' + input_name + '"]').parent().addClass('error');
                $(element).next('.error-e').remove();
                $(element).after('<div class="error-e">* الحقل إلزامي</div>');
                return;
            }
            else {
                $('input[name="' + input_name + '"]').removeClass('error');
                $('input[name="' + input_name + '"]').parent().removeClass('error');
                $(element).removeClass('error').next('.error-e').remove();
                return;
            }
        }
        if ($(element)[0].checked != true) {
            valid = false;
            $(element).addClass('error');

            $(element).parent().addClass('error');
            $(element).next('.error-e').remove();
            $(element).after('<div class="error-e">* الحقل إلزامي</div>');
            return;
        }
        $(element).removeClass('error');
        $(element).parent().removeClass('error');
        $(element).next('.error-e').remove();
        return;
    }

    if ($(element).attr('type') == 'radio') {
        input_name = $(element).attr('name');
        if ($('input[name=' + input_name + ']')[0].checked != true) {
            valid = false;
            $(element).addClass('error');
            $(element).parent().addClass('error');
            $(element).next('.error-e').remove();
            $(this).after('<div class="error-e">* الحقل إلزامي</div>');
            return;
        }
        else {
            $('input[name=' + input_name + ']').removeClass('error');
            $('input[name=' + input_name + ']').parent().removeClass('error');
            $(element).removeClass('error').next('.error-e').remove();
            return;
        }
    }

    if ($(element).attr('type') == 'file' && $(element).hasClass('image')){
        $(element).removeClass('error');
        $(element).parent().removeClass('error');
        $('.error-e',$(element).parent()).remove();
        if(!image_file_type(element)){
            valid = false;
            $(element).addClass('error');
            $(element).parent().addClass('error');
            $(element).after('<div class="error-e">* يجب تحديد ملف من نوع صورة فقط </div>');
        }
        if($(element).attr('size') != null){
            if(!file_size(element)){
                valid = false;
                $(element).addClass('error');
                $(element).parent().addClass('error');
                $(element).after('<div class="error-e">* يجب الا يتجاوز حجم الملف '+Math.floor($(element).attr('size')/1024)+'KB </div>');
            }
        }
        return;
    }
    if ($(element).attr('type') == 'file' && $(element).attr('image')){
        $(element).removeClass('error');
        $(element).parent().removeClass('error');
        $('.error-e',$(element).parent()).remove();
        if(!image_file_type(element)){
            valid = false;
            $(element).addClass('error');
            $(element).parent().addClass('error');
            $(element).after('<div class="error-e">* يجب تحديد ملف من نوع صورة فقط </div>');
        }
        return;
    }

    if ($(element).val() == "") {
        valid = false;
        $(element).addClass('error');

        $(element).parent().addClass('error');
        $(element).next('.error-e').remove();
        $(element).after('<div class="error-e">* الحقل إلزامي</div>');
        return;
    }
    else {
        $(element).removeClass('error');
        $(element).parent().removeClass('error');
        $(element).next('.error-e').remove();
        if ($(element).hasClass('email')) {
            if (!validateEmail($(element).val())) {
                valid = false;
                $(element).addClass('error');

                $(element).parent().addClass('error');
                $(element).after('<div class="error-e">* الرجاء إدخال بريد إلكتروني صحيح </div>');
                return;
            }
        }
        if ($(element).attr('words') != null) {
            $(element).val($(element).val().trim())
            if ($(element).val().split(" ").length != $(element).attr('words')) {
                valid = false;
                $(element).addClass('error');
                $(element).after('<span class="error-e">'+ $(element).attr('words-message') +' </span>');
                $(element).parent().addClass('error');
            }
        }

        if ($(element).attr('validate-min') != null) {
            if ($(element).val().length < $(element).attr('validate-min')) {
                valid = false;
                $(element).addClass('error');

                $(element).after('<span class="error-e">يجب أن لا يقل العدد عن  :' + $(element).attr('validate-min') + '</span>');
                $(element).parent().addClass('error');
                return;
            }
        }

        if ($(element).hasClass('unique')) {
            valid = false;
            $(element).addClass('error');

            $(element).parent().addClass('error');
            $(element).after('<div class="error-e">* جاري التحقق من البيانات </div>');
            isUnique($(element));
            return;
        }
        if ($(element).hasClass('sw_alpha')) {
            if(!sw_alpha(element)){
                valid = false;
                $(element).addClass('error');

                $(element).parent().addClass('error');
                $(element).after('<div class="error-e">* لا يمكن أن يحتوى هذا الحقل إلا على حروف عربية أو إنجليزية فقط بدون مسافات</div>');
            }
            return;
        }
        if ($(element).hasClass('sw_alpha_en')) {
            if(!sw_alpha_en(element)){
                valid = false;
                $(element).addClass('error');

                $(element).parent().addClass('error');
                $(element).after('<div class="error-e">* لا يمكن أن يحتوى هذا الحقل إلا على حروف إنجليزية فقط بدون مسافات</div>');
            }
            return;
        }
        if ($(element).hasClass('sw_alpha_ar')) {
            if(!sw_alpha_ar(element)){
                valid = false;
                $(element).addClass('error');

                $(element).parent().addClass('error');
                $(element).after('<div class="error-e">* لا يمكن أن يحتوى هذا الحقل إلا على حروف عربية فقط بدون مسافات</div>');
            }
            return;
        }
        if ($(element).hasClass('alpha')) {
            if(!alpha(element)){
                valid = false;
                $(element).addClass('error');

                $(element).parent().addClass('error');
                $(element).after('<div class="error-e">* لا يمكن أن يحتوى هذا الحقل إلا على حروف عربية أو إنجليزية فقط </div>');
            }
            return;
        }
        if ($(element).hasClass('alpha_en')) {
            if(!alpha_en(element)){
                valid = false;
                $(element).addClass('error');

                $(element).parent().addClass('error');
                $(element).after('<div class="error-e">* لا يمكن أن يحتوى هذا الحقل إلا على حروف إنجليزية فقط </div>');
            }
            return;
        }
        if ($(element).hasClass('alpha_ar')) {
            if(!alpha_ar(element)){
                valid = false;
                $(element).addClass('error');

                $(element).parent().addClass('error');
                $(element).after('<div class="error-e">* لا يمكن أن يحتوى هذا الحقل إلا على حروف عربية فقط </div>');
            }
            return;
        }
    }
}
function stringEndsWithValidExtension(stringToCheck, acceptableExtensionsArray, required) {
    if (required == false && stringToCheck.length == 0) {
        return true;
    }
    for (var i = 0; i < acceptableExtensionsArray.length; i++) {
        if (stringToCheck.toLowerCase().endsWith(acceptableExtensionsArray[i].toLowerCase())) {
            return true;
        }
    }
    return false;
}
function isUnique(element) {
    var url = $(element).attr('data-url');
    url += "/" + $(element).val();
//        alert(url)
    var elem = element;
    $.ajax({
        contentType: "application/x-www-form-urlencoded; charset=utf-8",
        scriptCharset: "utf-8",
        dataType: "html",
        processData: false,
        cache: false,
        type: "get",
        url: url,
        success: function (msg) {
//                alert(msg)
            if (msg == 'false') {
                valid = false;
                $('.error-e').remove();
                $(elem).after('<div class="error-e">* الايميل مستخدم </div>');
            } else {
                valid = true;
                $('.error-e').remove();
            }
        },
        error: function (msg, text) {
//                console.log(msg);
//                console.log(text);
//                alert(text);
        }
    });
    if (valid) {
        return true;
    } else {
        return false;
    }
}
function ckeckemail() {
    valid = false;
    isUnique($(this));
    return;

}
function validate_momaize(element) {
    return check_momaize(element);
}
function check_momaize(element) {
    $(element).attr('disabled', 'disabled')
    $(element).addClass('error')
    input_obj = $(element);
    number = $(element).val();
    if (!isNaN(number) && number > 0) {
        $.ajax({
            //url: 'http://www.krmbank.net.ye/KRMService/Service/BranchService.svc/CheckATM/'+number,
            url: '/check_atm/' + number,
            dataType: 'json',
            async:false,
            jsonpCallback: 'callback',
            type: 'GET',
            data: '',
            success: function (data, textStatus, jqXHR) {
                console.log(data);
                $('#distinguished_no').removeAttr('disabled')
                //data = JSON.decode(data)
                if (data.Status == true) {
                    //parent = $('section.form_section').eq($('.nav.nav-pills li.active').index());
                    //$(input_obj).parent().removeClass('error');
                    //$('.btn.next', parent).click();
                    //alert('لقد تم العثور على هذا الرقم بنجاح')
                }
                else {
                    //alert('لا يوجد عميل بهذا الرقم')
                    $(input_obj).parent().addClass('error');
                    $(input_obj).addClass('error').focus();
                    $(input_obj).next('.error-e').remove();
                    $(input_obj).after('<div class="error-e">حصل خطأ: ' + data.ReturnString + '</div>');
                }
            }
        });
    } else {
        alert('الرجاء إدخال رقم المميز بشكل صحيح');
        $('#distinguished_no').removeAttr('disabled')
    }
    if($(input_obj).parent().hasClass('error'))
        return false;
    else
        return true;
}
function validate_mobile(element) {
    return check_mobile(element);
}
function check_mobile(element) {
    $('#distinguished_no').attr('disabled', 'disabled')
    $('#main_mobile').attr('disabled', 'disabled')

    input_obj = $('#distinguished_no');
    number = $('#distinguished_no').val();

    input_obj2 = $('#main_mobile');
    mobile = $('#main_mobile').val();

    if (!isNaN(number) && number > 0 || !isNaN(mobile) && mobile > 0) {
        $.ajax({
            //url: 'http://www.krmbank.net.ye/KRMService/BranchService.svc/CheckKJ/{CUST_NO}/{CUST_TEL},
            url: '/check_mobile/' + number + '/' + mobile,
            dataType: 'json',
            async:false,
            jsonpCallback: 'callback',
            type: 'GET',
            data: '',
            success: function (data, textStatus, jqXHR) {
                console.log(data);
                $('#distinguished_no').removeAttr('disabled');
                $('#main_mobile').removeAttr('disabled');
                //data = JSON.decode(data)
                if (data.Status == true) {
                    //parent = $('section.form_section').eq($('.nav.nav-pills li.active').index());
                    //$('.btn.next', parent).click();
                    //alert('لقد تم العثور على هذا الرقم بنجاح')
                }
                else {
                    //alert('لا يوجد عميل بهذا الرقم')
                    $(input_obj).parent().addClass('error');
                    //$(input_obj).addClass('error').focus();
                    $(input_obj).next('.error-e').remove();
                    $(input_obj).after('<div class="error-e">حصل خطأ: ' + data.ReturnString + '</div>');

                    $(input_obj2).parent().addClass('error');
                    //$(input_obj2).addClass('error').focus();
                    $(input_obj2).next('.error-e').remove();
                    $(input_obj2).after('<div class="error-e">حصل خطأ: ' + data.ReturnString + '</div>');
                }
            }
        });
    } else {
        if (!isNaN(number) && number > 0)
            alert('الرجاء إدخال رقم المميز بشكل صحيح');

        if (!isNaN(mobile) && mobile > 0)
            alert('الرجاء إدخال رقم الموبايل بشكل صحيح');

        $('#distinguished_no').removeAttr('disabled');
        $('#main_mobile').removeAttr('disabled');
        $(input_obj2).addClass('error').focus();
    }
    if($(input_obj).parent().hasClass('error'))
        return false;
    else
        return true;
}
function sw_alpha(element){
    var value =$(element).val();
    var reg = /^[a-zA-Zابتثجحخدذرزسشصضطظعغفقكلمنهويأإآىؤئءىة]+$/;
    if (value.match(reg)) {
        return true;
    } else {
        return false;
    }
}
function sw_alpha_ar(element){
    var value =$(element).val();
    var reg = /^[ابتثجحخدذرزسشصضطظعغفقكلمنهويأإآىؤئءىة]+$/;
    if (value.match(reg)) {
        return true;
    } else {
        return false;
    }
}
function sw_alpha_en(element){
    var value =$(element).val();
    var reg = /^[a-zA-Z]+$/;
    if (value.match(reg)) {
        return true;
    } else {
        return false;
    }
}
function alpha(element){
    var value =$(element).val();
    var reg = /^[a-zA-Zابتثجحخدذرزسشصضطظعغفقكلمنهويأإآىؤئءىة ]+$/;
    if (value.match(reg)) {
        return true;
    } else {
        return false;
    }
}
function alpha_ar(element){
    var value =$(element).val();
    var reg = /^[ ابتثجحخدذرزسشصضطظعغفقكلمنهويأإآىؤئءىة]+$/;
    if (value.match(reg)) {
        return true;
    } else {
        return false;
    }
}
function alpha_en(element){
    var value =$(element).val();
    var reg = /^[a-zA-Z ]+$/;
    if (value.match(reg)) {
        return true;
    } else {
        return false;
    }
}function image_file_type(element){
    if(element[0].files[0] == undefined){
        return false;
    }
    if(element[0].files[0].type.indexOf("image")==-1){
        return false;
    }
    return true;
}
function file_size(element){
    if(element[0].files[0] == undefined){
        return false;
    }
    if(element[0].files[0].size>$(element).attr('size')){
        return false;
    }
    return true;
}

/************ End of form validation ************/
$(function () {



    $('form input.required,form textarea.required,form select.required').change(validate_single_input);
    $('form input.required,form textarea.required,form select.required').blur(validate_single_input);
    //$(".numeric").keypress(check_if_numeric);
    $(".numeric").numeric();
    /**** prevent copy paste ****/
    $('.numeric').bind("cut copy paste", function (e) {
        e.preventDefault();
    });

    $(".form-container").submit(function () {
        this_form = $(this);
        if (!validate_form(this_form)) {
            return false;
        }
    });

    $(" #upload_link_1").on('click', function (e) {
        $(".input_file_1:hidden").trigger('click');
        e.preventDefault();

    });

    $("input:file").change(function () {
        var fileName = $(this).val();
        if (fileName) {
            var lastIndex = fileName.lastIndexOf("\\");
            if (lastIndex >= 0) {
                fileName = fileName.substring(lastIndex + 1);
            }
            $("#upload_link_1").html('Attached!');
            $(".selected-file-1").html(fileName);
            $('#upload_link_1').removeClass('has-error');
            $('#upload_link_1').removeClass('required');
        }
    });

    var input = $('.required:not(input:file)');
    input.on('blur', function () {
    });


    $('input.unique').blur(ckeckemail);
});