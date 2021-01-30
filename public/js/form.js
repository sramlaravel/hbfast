$(function () {


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


//    alert($('#user_name').attr('title'))
    $(".phone").keypress(function (event) {
        // Backspace, tab, enter, end, home, left, right
        // We don't support the del key in Opera because del == . == 46.
        var controlKeys = [8, 9, 13, 43];
        // IE doesn't support indexOf
        var isControlKey = controlKeys.join(",").match(new RegExp(event.which));
        // Some browsers just don't raise events for control keys. Easy.
        // e.g. Safari backspace.
        if (!event.which || // Control keys in most browsers. e.g. Firefox tab is 0
            (48 <= event.which && event.which <= 57) || // Always 1 through 9
            (48 == event.which && $(this).attr("value")) || // No 0 first digit
            isControlKey) { // Opera assigns values for control keys.
            return;
        } else {
            event.preventDefault();
        }
    });
    $('.phone').bind("cut copy paste", function (e) {
        e.preventDefault();
    });

    $("form").submit(function (e) {
        this_form = $(this);

        if (!validate_form(this_form)) {
          return false;
        }else{
            $('button',this).attr('disabled','true');

        }

    });

    $(function () {
        $(" #upload_link_1").on('click', function (e) {
            $(".input_file_1:hidden").trigger('click');
            e.preventDefault();

        });
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
        //if ($(this).val() == "") {
        //    $(this).parent('span').addClass('has-error');
        //    if ($('input:file').val() == "") {
        //        $('.uploads').addClass('has-error');
        //    } else
        //    {
        //        $(".uploads").removeClass('has-error');
        //    }
        //}else {
        //    $(this).parent('span').removeClass('has-error');
        //    $('input.email', form).each(function() {
        //        if (!validateEmail($('input.email').val())) {
        //            $('input.email').parent('span').addClass('has-error');
        //        }
        //    })
        //}
    });
    function validate_form(form) {
//        alert('ارسال الفورم');
        var valid = true;

        $('.required').removeClass('has-error');
        $('.required', form).each(function () {
        $('.required').removeClass('emptyInput ');
            if ($(this).val() == "") {
                valid = false;
                $(this).addClass('has-error');
                $(this).addClass('emptyInput ');
                // $('.error-message_1').html('There is something wrong. Errors have been highlighted below.');
            }
        });

        $('input.email', form).each(function () {
            if ($(this).val() != "") {
                if (!validateEmail($(this).val())) {
                    valid = false;
                    $(this).addClass('has-error');
                }
            }
        });

        // if (!stringEndsWithValidExtension($('input:file').val(), [".pdf", ".docx", ".doc", ".jpg", ".jpeg"], false)) {
        //     valid = false;
        //     alert("Files only allows file types of pdf, doc, docx and jpg.");
        //     // $('.error-message_2').html('Files only allows file types of pdf, doc, docx, rar, zip,jpg and png.');
        //     return false;
        // }
        //
        //     if ($('#file').val() != "") {
        //         if ($('#file')[0].files[0].size / 1000000 > 5) {
        //             valid = false;
        //             // $('.error-message_3').html('The maximum file size must be less than 5 MB');
        //             alert("The maximum file size must be less than 5 MB");
        //             return false;
        //         }
        //
        //     }

        return valid;
    }

    //$('#input_file_1').on('change', function () {
    //    var size = this.files[0].size / 1000000;
    //    if (size > 5) {
    //        alert("The maximum file size must be less than 5 MB");
    //    }
    //});

});