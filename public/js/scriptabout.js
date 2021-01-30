/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

    var ready_to_post = false;

    if ($('#create_app_personal_account,#create_app_company_account,#create_app_emfloos_account,#create_app_kuraimi_atm').length > 0) {
        $('#app_customer_type_id').change(function (e) {
            if($(this).val()==920){
                window.location="/products/current_account/apply?job=389";
            }
        })
        function getUrlVars()
        {
            var vars = [], hash;
            var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
            for(var i = 0; i < hashes.length; i++)
            {
                hash = hashes[i].split('=');
                vars.push(hash[0]);
                vars[hash[0]] = hash[1];
            }
            return vars;
        }
        if($('#create_app_personal_account').length>0){
            if(getUrlVars()["job"]==389)
                $('#job').val(389);
        }

        function b64toBlob(b64Data, contentType, sliceSize) {
            contentType = contentType || '';
            sliceSize = sliceSize || 512;
            contentType = b64Data.slice(0,b64Data.indexOf(';'))
            contentType = contentType.slice(b64Data.indexOf(':')+1)
            b64Data = b64Data.slice(b64Data.indexOf(';')+8)
            var byteCharacters = atob(b64Data);
            var byteArrays = [];

            for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
                var slice = byteCharacters.slice(offset, offset + sliceSize);

                var byteNumbers = new Array(slice.length);
                for (var i = 0; i < slice.length; i++) {
                    byteNumbers[i] = slice.charCodeAt(i);
                }

                var byteArray = new Uint8Array(byteNumbers);

                byteArrays.push(byteArray);
            }

            var blob = new Blob(byteArrays, {type: contentType});
            return blob;
        }

        $('#create_app_personal_account,#create_app_company_account,#create_app_emfloos_account,#create_app_kuraimi_atm').submit(function (e) {
            var form = $(this);
            if (!validate_form($(this))) {
                e.preventDefault();
                return false;
            }
            e.preventDefault();
            swal({
                title: 'هل تريد إرسال البيانات',
                text: "الرجاء التأكد من إدخال جميع البيانات بشكل صحيح ، لن تتمكن من إرسال الطلب مرة أخرى ، لن تتمكن من تصحيح البيانات إلا لدى فروع المصرف",
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'إلغاء',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'متأكد من صحة البيانات ، أرسل',
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    return new Promise(function (resolve, reject) {
                        var data_ = "";
                        var form = null
                        if ($('#create_app_personal_account').length > 0) {
                            form = document.querySelector('form#create_app_personal_account');
                        }
                        if ($('#create_app_company_account').length > 0) {
                            form = document.querySelector('form#create_app_company_account');
                        }
                        if ($('#create_app_emfloos_account').length > 0) {
                            form = document.querySelector('form#create_app_emfloos_account');
                        }
                        if ($('#create_app_kuraimi_atm').length > 0) {
                            form = document.querySelector('form#create_app_kuraimi_atm');
                        }
                        var data_to_be_sent = new FormData(form);
                        $('input[type=file]', form).each(function () {
                            data_to_be_sent.delete($(this).attr('name'));
                            // data_to_be_sent.append($(this).attr('name'), $(this).val());

                            file_date = $(this).next('img').attr('src');
                            if(file_date!= undefined) {

                                var blob = b64toBlob(file_date);
                                data_to_be_sent.append($(this).attr('name'), blob,$(this).val());
                                data_ += $(this).attr('name') + '=' + file_date + '&';
                            }
                        })
                        url = $(form).attr('action');
                        form = $(form);
                        console.log(data_to_be_sent)
                        $.ajax({
                            url: url,
                            // contentType: 'multipart/form-data',
                            // dataType: 'json',
                            type: 'POST',
                            headers: {'X-CSRF-TOKEN': $('input[name="_token"]', $(form)).val()},
                            data: data_to_be_sent,
                            //jsonpCallback: 'callback',
                            contentType: false,
                            processData: false,
                            success: function (data, textStatus, jqXHR) {
                                console.log(data);
                                // data = JSON.decode(data)
                                console.log(data['Status']);
                                if (data['Status'] != undefined) {
                                    if (data['Status'] == true) {
                                        resolve(data['ReturnString'])
                                    }
                                    else {
                                        document.getElementById("CaptchaCode").Captcha.ReloadImage()
                                        swal(
                                            'فشل في استلام الطلب',
                                            'تم رفض البيانات من قبل المصرف لوجود خطأ في : ' + data['ReturnString'],
                                            'error'
                                        )
                                        //reject(data['ReturnString']);
                                    }
                                } else {
                                    var errors='<br/>الرجاء تصحيح الأخطاء في النموذج';
                                    errors+='<br/>';
                                    for(key in data){
                                        errors+=data[key]+'<br/>';
                                    }
                                    document.getElementById("CaptchaCode").Captcha.ReloadImage()
                                    swal(
                                        'فشل في الإرسال',
                                        'الرجاء التأكد من إدخال البيانات بشكل صحيح'+errors,
                                        'error'
                                    )
                                    //reject('الرجاء تعبية البيانات التي تم تعليمها بشكل صحيح');
                                }
                            },
                            error: function (data) {
                                console.log(data);
                                document.getElementById("CaptchaCode").Captcha.ReloadImage()
                                reject(' حصل خطأ أثناء الإرسال الرجاء المحاولة مرة أخرى !')
                                //reject('فشلت عملية التفعيل ، الرجاء المحاولة مرة أخرى!');
                            }
                        });
                    })
                },
                allowOutsideClick: false
            }).then(function (code) {
                if($('#create_app_personal_account').length>0){
                    swal(
                        'تم الإرسال',
                        'تم إرسال بياناتك بشكل صحيح إلى المصرف ، قم بكتابة هذا الكود ( ' + code + ') وتسليمه لدى أقرب فرع لتفعيل حسابك',
                        'success'
                    )

                }else {
                    swal(
                        'تم الإرسال',
                        'تم إرسال بياناتك بشكل صحيح إلى المصرف',
                        'success'
                    )
                }
            });

        });

    }

    if ($('#create_app_kuraimi_mobile').length > 0) {

        $('#create_app_kuraimi_mobile').submit(function (e) {
            if (!validate_form($(this))) {
                e.preventDefault();
                return false;
            }
            e.preventDefault();
            swal({
                title: 'هل تريد إرسال البيانات',
                text: "الرجاء التأكد من إدخال جميع البيانات بشكل صحيح ، لن تتمكن من إرسال الطلب مرة أخرى ، لن تتمكن من تصحيح البيانات إلا لدى فروع المصرف",
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'إلغاء',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'متأكد من صحة البيانات ، أرسل',
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    return new Promise(function (resolve, reject) {
                        var data_ = "";
                        var form = document.querySelector('form#create_app_kuraimi_mobile');
                        var data_to_be_sent = new FormData(form);
                        $('input[type=file]', '#create_app_kuraimi_mobile').each(function () {
                            data_to_be_sent.append($(this).attr('name'), $(this).val());
                            data_ += $(this).attr('name') + '=' + $(this).val() + '&';
                        })
                        url = $('#create_app_kuraimi_mobile').attr('action');
                        form = $('#create_app_kuraimi_mobile');
                        console.log(data_to_be_sent)
                        $.ajax({
                            url: url,
                            // contentType: 'multipart/form-data',
                            // dataType: 'json',
                            type: 'POST',
                            headers: {'X-CSRF-TOKEN': $('input[name="_token"]', $('#create_app_kuraimi_mobile')).val()},
                            data: data_to_be_sent,
                            //jsonpCallback: 'callback',
                            contentType: false,
                            processData: false,
                            success: function (data, textStatus, jqXHR) {
                                console.log(data);
                                // data = JSON.decode(data)
                                console.log(data['Status']);
                                if (data['Status'] != undefined) {
                                    if (data['Status'] == true) {
                                        resolve(data['ReturnString'])
                                    }
                                    else {
                                        document.getElementById("CaptchaCode").Captcha.ReloadImage()
                                        swal(
                                            'فشل في استلام الطلب',
                                            'تم رفض البيانات من قبل المصرف لوجود خطأ في : ' + data['ReturnString'],
                                            'error'
                                        )
                                        //reject(data['ReturnString']);
                                    }
                                } else {
                                    var errors='<br/>';
                                    data.forEach(function(item, index){
                                       errors+=item+'<br/>';
                                    });
                                    document.getElementById("CaptchaCode").Captcha.ReloadImage()
                                    swal(
                                        'فشل في الإرسال',
                                        'الرجاء التأكد من إدخال البيانات بشكل صحيح'+errors,
                                        'error'
                                    )
                                    //reject('الرجاء تعبية البيانات التي تم تعليمها بشكل صحيح');
                                }
                            },
                            error: function (data) {
                                document.getElementById("CaptchaCode").Captcha.ReloadImage()
                                console.log(data);
                                reject(' حصل خطأ أثناء الإرسال الرجاء المحاولة مرة أخرى !')
                                //reject('فشلت عملية التفعيل ، الرجاء المحاولة مرة أخرى!');
                            }
                        });
                    })
                },
                allowOutsideClick: false
            }).then(function (code) {
                swal({
                        title: 'تفعيل حسابك',
                        text: 'الرجاء تفعيل حسابك الآن',
                        type: 'success',
                        confirmButtonText: 'تفعيل الحساب'
                    }
                ).then(function () {
                    swal({
                        title: 'تفعيل الحساب',
                        html: '<div class="swal-form">' +
                        '<label for="Cust_No_t">رقم العميل المميز</label>' +
                        '<input id="Cust_No_t" name="Cust_No" value="' + $('#distinguished_no').val() + '" placeholder="رقم العميل المميز" class="swal2-input" autofocus>' +
                        '<label for="MobileNumber1_t">رقم الموبايل الأساسي</label>' +
                        '<input id="MobileNumber1_t" name="MobileNumber1" value="' + $('#main_mobile').val() + '" placeholder="رقم الموبايل الأساسي" class="swal2-input">' +
                        '<label for="ID_NO">رقم بطاقة الهوية الشخصية</label>' +
                        '<input id="ID_NO" name="ID_NO" placeholder="رقم بطاقة الهوية الشخصية" class="swal2-input">' +
                        '<label for="ACC_NO">رقم الحساب</label>' +
                        '<input id="ACC_NO" name="ACC_NO" placeholder="رقم الحساب" class="swal2-input">' +
                        '<label for="ACTIVE_CODE">كود التفعيل</label>' +
                        '<input id="ACTIVE_CODE" name="ACTIVE_CODE" placeholder="كود التفعيل" class="swal2-input"></div>',
                        showCancelButton: true,
                        confirmButtonText: 'تفعيل',
                        cancelButtonText: 'إلغاء',
                        showLoaderOnConfirm: true,
                        preConfirm: function (email) {
                            return new Promise(function (resolve, reject) {
                                Cust_No = $('#Cust_No_t').val();
                                MobileNumber1 = $('#MobileNumber1_t').val();
                                MobileNumber1 = $('#MobileNumber1_t').val();
                                ID_NO = $('#ID_NO').val();
                                ACC_NO = $('#ACC_NO').val();
                                ACTIVE_CODE = $('#ACTIVE_CODE').val();
                                _token = $('input[name="_token"]').val();


                                $.ajax({
                                    url: '/products/kuraimi_mobile/activate',
                                    dataType: 'json',
                                    jsonpCallback: 'callback',
                                    type: 'POST',
                                    data: 'Cust_No=' + Cust_No + '&MobileNumber1=' + MobileNumber1 + '&ID_NO=' + ID_NO + '&ACC_NO=' + ACC_NO + '&ACTIVE_CODE=' + ACTIVE_CODE + '&_token=' + _token,
                                    success: function (data, textStatus, jqXHR) {
                                        console.log(data);
                                        //data = JSON.decode(data)
                                        if (data.Status == true) {
                                            resolve()
                                        }
                                        else {
                                            reject(data.ReturnString);
                                        }
                                    },
                                    error: function (data) {
                                        console.log(data);
                                        reject('فشلت عملية التفعيل ، الرجاء المحاولة مرة أخرى!');
                                    }
                                });

                            })
                        },
                        allowOutsideClick: false
                    }).then(function () {
                        swal({
                            type: 'success',
                            title: 'تم التفعيل بنجاح',
                            html: 'بإمكانك الآن استخدام الخدمة في أي وقت'
                        })
                    }, function (dismiss) {
                        // dismiss can be 'cancel', 'overlay',
                        // 'close', and 'timer'
                        if (dismiss === 'cancel') {
                            document.location = "/"
                        }
                    })
                })
            });

        });

    }
    if ($('#activate_mobile').length > 0) {

    }
    if ($('#distinguished_no').length > 0) {

        swal({
            title: "هل لديك حساب في مصرف الكريمي ؟",
            text: "لاستخدام خدمة الكريمي جوال يجب أن يكون لدى المسجل حساب لدى مصرف الكريمي",
            type: "question",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "نعم لدي حساب في المصرف",
            cancelButtonText: "ليس لدي حساب",
            allowOutsideClick: false,
            allowEscapeKey: false,
        }).then(function () {
            window.onkeydown = null;
            window.onfocus = null;
            swal("شكراً", "بإمكانك تعبئة النموذج الخاص بالخدمة", "success");
        }, function (dismiss) {
            // dismiss can be 'cancel', 'overlay',
            // 'close', and 'timer'
            if (dismiss === 'cancel') {
                swal(
                    {
                        title: "لا تقلق",
                        text: "بإمكانك فتح حساب جديد في المصرف من خلال الموقع؟",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonText: "فتح حساب لدى المصرف",
                        cancelButtonText: "لا أريد"

                    }).then(function () {
                    document.location = "/products/current_account"
                }, function (dismiss) {
                    if (dismiss === 'cancel') {
                        document.location = "/"
                    }

                });
            }
        });

        $('#create_app_kuraimi_mobile').submit(function (e) {
            var form = $(this);
            if (!validate_form($(this))) {
                e.preventDefault();
                return false;
            }
            e.preventDefault();
            swal({
                title: 'هل تريد إرسال البيانات',
                text: "الرجاء التأكد من إدخال جميع البيانات بشكل صحيح ، لن تتمكن من إرسال الطلب مرة أخرى ، لن تتمكن من تصحيح البيانات إلا لدى فروع المصرف",
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'إلغاء',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'متأكد من صحة البيانات ، أرسل',
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    return new Promise(function (resolve, reject) {
                        var data_ = "";
                        var form = null
                        if ($('#create_app_personal_account').length > 0) {
                            form = document.querySelector('form#create_app_personal_account');
                        }
                        if ($('#create_app_company_account').length > 0) {
                            form = document.querySelector('form#create_app_company_account');
                        }
                        if ($('#create_app_emfloos_account').length > 0) {
                            form = document.querySelector('form#create_app_emfloos_account');
                        }
                        if ($('#create_app_kuraimi_mobile').length > 0) {
                            form = document.querySelector('form#create_app_kuraimi_mobile');
                        }
                        var data_to_be_sent = new FormData(form);
                        $('input[type=file]', form).each(function () {
                            data_to_be_sent.append($(this).attr('name'), $(this).val());
                            data_ += $(this).attr('name') + '=' + $(this).val() + '&';
                        })
                        url = $(form).attr('action');
                        form = $(form);
                        console.log(data_to_be_sent)
                        $.ajax({
                            url: url,
                            // contentType: 'multipart/form-data',
                            // dataType: 'json',
                            type: 'POST',
                            headers: {'X-CSRF-TOKEN': $('input[name="_token"]', $(form)).val()},
                            data: data_to_be_sent,
                            //jsonpCallback: 'callback',
                            contentType: false,
                            processData: false,
                            success: function (data, textStatus, jqXHR) {
                                console.log(data);
                                // data = JSON.decode(data)
                                console.log(data['Status']);
                                if (data['Status'] != undefined) {
                                    if (data['Status'] == true) {
                                        resolve(data['ReturnString'])
                                    }
                                    else {
                                        document.getElementById("CaptchaCode").Captcha.ReloadImage()
                                        swal(
                                            'فشل في استلام الطلب',
                                            'تم رفض البيانات من قبل المصرف لوجود خطأ في : ' + data['ReturnString'],
                                            'error'
                                        )
                                        //reject(data['ReturnString']);
                                    }
                                } else {
                                    var errors='<br/>الرجاء تصحيح الأخطاء في النموذج';
                                    errors+='<br/>';
                                    for(key in data){
                                        errors+=data[key]+'<br/>';
                                    }
                                    document.getElementById("CaptchaCode").Captcha.ReloadImage()
                                    swal(
                                        'فشل في الإرسال',
                                        'الرجاء التأكد من إدخال البيانات بشكل صحيح'+errors,
                                        'error'
                                    )
                                    //reject('الرجاء تعبية البيانات التي تم تعليمها بشكل صحيح');
                                }
                            },
                            error: function (data) {
                                console.log(data);
                                document.getElementById("CaptchaCode").Captcha.ReloadImage()
                                reject(' حصل خطأ أثناء الإرسال الرجاء المحاولة مرة أخرى !')
                                //reject('فشلت عملية التفعيل ، الرجاء المحاولة مرة أخرى!');
                            }
                        });
                    })
                },
                allowOutsideClick: false
            }).then(function (code) {
                if($('#create_app_kuraimi_mobile').length>0){
                    swal({
                        title: 'تفعيل الحساب',
                        html: '<div class="swal-form">' +
                        'تم استلام طلبك<br/>'+ code+
                            '<br/>'+
                        '<label for="Cust_No_t">رقم العميل المميز</label>' +
                        '<input id="Cust_No_t" name="Cust_No" value="' + $('#distinguished_no').val() + '" placeholder="رقم العميل المميز" class="swal2-input" autofocus>' +
                        '<label for="MobileNumber1_t">رقم الموبايل الأساسي</label>' +
                        '<input id="MobileNumber1_t" name="MobileNumber1" value="' + $('#main_mobile').val() + '" placeholder="رقم الموبايل الأساسي" class="swal2-input">' +
                        '<label for="ID_NO">رقم بطاقة الهوية الشخصية</label>' +
                        '<input id="ID_NO" name="ID_NO" placeholder="رقم بطاقة الهوية الشخصية" class="swal2-input">' +
                        '<label for="ACC_NO">رقم الحساب</label>' +
                        '<input id="ACC_NO" name="ACC_NO" placeholder="رقم الحساب" class="swal2-input">' +
                        '<label for="ACTIVE_CODE">كود التفعيل</label>' +
                        '<input id="ACTIVE_CODE" name="ACTIVE_CODE" placeholder="كود التفعيل" class="swal2-input"></div>',
                        showCancelButton: true,
                        confirmButtonText: 'تفعيل',
                        cancelButtonText: 'إلغاء',
                        showLoaderOnConfirm: true,
                        preConfirm: function (email) {
                            return new Promise(function (resolve, reject) {
                                Cust_No = $('#Cust_No_t').val();
                                MobileNumber1 = $('#MobileNumber1_t').val();
                                MobileNumber1 = $('#MobileNumber1_t').val();
                                ID_NO = $('#ID_NO').val();
                                ACC_NO = $('#ACC_NO').val();
                                ACTIVE_CODE = $('#ACTIVE_CODE').val();
                                _token = $('input[name="_token"]').val();


                                $.ajax({
                                    url: '/products/kuraimi_mobile/activate',
                                    dataType: 'json',
                                    jsonpCallback: 'callback',
                                    type: 'POST',
                                    data: 'Cust_No=' + Cust_No + '&MobileNumber1=' + MobileNumber1 + '&ID_NO=' + ID_NO + '&ACC_NO=' + ACC_NO + '&ACTIVE_CODE=' + ACTIVE_CODE + '&_token=' + _token,
                                    success: function (data, textStatus, jqXHR) {
                                        console.log(data);
                                        //data = JSON.decode(data)
                                        if (data.Status == true) {
                                            resolve()
                                        }
                                        else {
                                            reject(data.ReturnString);
                                        }
                                    },
                                    error: function (data) {
                                        console.log(data);
                                        reject('فشلت عملية التفعيل ، الرجاء المحاولة مرة أخرى!');
                                    }
                                });

                            })
                        },
                        allowOutsideClick: false
                    }).then(function () {
                        swal({
                            type: 'success',
                            title: 'تم التفعيل بنجاح',
                            html: 'بإمكانك الآن استخدام الخدمة في أي وقت'
                        })
                    }, function (dismiss) {
                        // dismiss can be 'cancel', 'overlay',
                        // 'close', and 'timer'
                        if (dismiss === 'cancel') {
                            document.location = "/"
                        }
                    })

                }else {
                    swal(
                        'تم الإرسال',
                        'تم إرسال بياناتك بشكل صحيح إلى المصرف',
                        'success'
                    )
                }
            });
        })
    }
    $('.menu-mobile ul').unwrap('div');

    $('.error-e').each(function () {
        if ($(this).prev().hasClass('help-block')) {
            $(this).prev().prev().addClass('error');
        } else {
            $(this).prev().addClass('error');
        }
        $(this).parent().addClass('error');
    })

    setTimeout(function () {
        //$('#main-menu li ul div').each(function(){
        //    $(this).height($(this).parent().parent('ul').height());
        //    console.log($(this).parent().parent('ul').height());
        //})
        //$('#main-menu>li>ul').each(function(){
        //    $('div',this).height($(this).height());
        //    console.log($(this).height());
        //})
    }, 300);

    $('#main-menu>li>li').hover(function () {
        height = parseInt($(this).parent().css('height'));
        height = parseInt($('div>ul', this).css('height')) + 20;
        console.log(height+"---"+$('>div>ul>li>div', this).height());
        if($('>div>ul>li>div', this).height()<= height)
            $('>div>ul>li>div', this).css('height', height + 'px');
        else
            $('>div>ul>li>div', this).css('height', 'auto');
    })


    $('.menu-mobile ul li a').click(function (event) {
        if ($(this).parent().children('ul').length > 0)
            event.preventDefault();
    })


    $("#contact-form").submit(function () {
        this_form = $(this);
        if (!validate_form(this_form)) {
            return false;
        }
    });

    $('.serv_char').click(function () {
        go_to_element('.product-advantages');
    });
    $('.serv_cond').click(function () {
        go_to_element('.service-conditions');
    });
    $('.products .product-menu li:last-child').click(function () {
        go_to_element('.apply-for-service');
    });

    $('.board_link').click(function () {
        if (!$(this).hasClass('open')) {
            $('#board-directors .board_link>div').addClass('open');
            $(this).addClass('open');
            $('#board-directors .boards-content').slideToggle(200);
            go_to_element('.boards-content');
        } else {
            $(this).removeClass('open');
            go_to_element(this);
            $('#board-directors .board_link>div').removeClass('open');
            $('#board-directors .boards-content').slideToggle(200)
//            $('.boards-content').slideUp(300)
        }
    });

    $('.menu-mobile-btn').click(function () {
        $('.container').toggleClass('open');
        return;
        if (!$(this).hasClass('opened')) {
            $(this).addClass('opened');
            $('.menu-mobile').slideDown(300);
            $('.menu-mobile').addClass('opened');
        } else {
            $(this).removeClass('opened');
            $('.menu-mobile').slideUp(300).removeClass('opened')
            //$('header .menu-mobile').removeClass('opened');
        }
    })

    $('.menu-mobile ul li').click(function (e) {
        e.stopPropagation();
        if ($(this).children('ul').length > 0) {
            if ($(this).hasClass('opened')) {
                $('>ul', this).slideUp(200);
                $(this).removeClass('opened')
            } else {
                //$('.menu-mobile ul li').not(this).removeClass('opened').children('ul').slideUp(200);
                $('>ul', this).slideDown(300);
                $(this).addClass('opened')
            }
        }
    });

    $('#about #values .values_container a').click(function () {
        if (!$(this).hasClass('oppened')) {
            $('.superbox-show').fadeOut(0);
            $(this).next('.superbox-show').fadeIn(0);
            $('#about #values .values_container a').removeClass('oppened');
            $(this).addClass('oppened');
        }
        else {
            $(this).next('.superbox-show').fadeOut(0);
            $(this).removeClass('oppened');
        }
    });

    $('#about #values a.read_more_value').click(function () {
        $('#about #values .values_container a').removeClass('oppened');
        if (!$(this).hasClass('active_value')) {
            $('#about #values .values_container a').fadeOut(0)
            $('#about #values .superbox-show').fadeIn(0);
            $('#about #values a.read_more_value').addClass('active_value');

            $(this).html($(this).attr('data-hide'));
        } else {
            $(this).html($(this).attr('data-view'));
            $('#about #values .values_container a').fadeIn(0);
            $('#about #values .superbox-show').fadeOut(0)
            $('#about #values a.read_more_value').removeClass('active_value');
            go_to_element("#values");
        }
    });


    function go_to_element(element) {
        var main_menu = $('#main-menu').height() + 30;
//        alert(main_menu);
        $('html, body').animate({
            scrollTop: $(element).offset().top + main_menu - $('header').height() - parseInt($('header').css('padding-top')) - parseInt($('header').css('padding-bottom'))
        }, 1000);
    }

    $('#about .about_pager li').click(function () {
        switch ($(this).index()) {
            case 0:
                go_to_element("#bank-note");
                break;
            case 1:
                go_to_element("#values");
                break;
            case 2:
                go_to_element("#strategy");
                break;
            case 3:
                go_to_element("#board-directors");
                break;
            case 4:
                go_to_element("#board-directors");
                break;
            case 5:
                go_to_element("#organizational_structure");
                break;
        }
    });


    $(function () {
        $.fn.showField = function () {
            var selectVal = document.getElementById(this.val() + 'Div');

            return this.each(function () {
                $(selectVal).addClass('fade');
                $(selectVal).show().siblings('div').hide();
            });
        };
        $('select#city').change(function () {
            $(this).showField();
        });
    });

    $('#bookings .nav_ li.links').click(function () {

        var indx = $(this).index();
        if ($(this).hasClass('active')) {
        }
        else {

            $('#bookings .nav_ li').removeClass('active');
            $(this).addClass('active');
            $('.booking').children('div').removeClass('open');
            $('.booking').children('div').eq(indx).addClass('open');
        }

    });
    $('header a#search').click(function () {
        if ($(this).hasClass('opened')) {
            $('.searchForm').slideUp(200);
            $(this).removeClass('opened');
            $('header').removeClass('opened');

        }
        else {
            $(this).addClass('opened');
            $('.searchForm').slideDown(200);
            $('header').addClass('opened');
        }
    });

    $('#featured').slick({
        autoplay: true,
        autoplaySpeed: 4000,
        rtl: true,
        dots: true
    });

    $('.product-advantages div ul').slick({
        rtl: true,
        slidesToShow: 4,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 515,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            }
        ]
    });

    $('.featured1').slick({
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        navigation: false,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        arrows: false
    });
    $('.holiday-popup-slider').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        navigation: false,
        autoplay: true,
        arrows: false
    });

    $('.main-slider>div').slick({
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        navigation: false,
        autoplay: true,
        arrows: false
    });


    $('.products .services ul').slick({
        rtl: true,
        slidesToShow: 4,
        dots: false,
        infinite: false,
        navigation: false,
        arrows: false,
        responsive: [
            {
                breakpoint: 515,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            }
        ]
    });

    function try_fix_height() {
        if ($('body').width() > 1400) {
            $('.services .big').css('height', 582);
        }
        else if ($('body').width() > 751) {
            if ($('.services ul').height() > 366) {
                $('.services .big').css('height', $('.services ul').height());
                console.log('height fixed');
            }
            else {
                $('.services .big').css('height', 585);
                console.log('height not fixed');
                setTimeout(try_fix_height, 300);
            }
        }
        else
            $('.services .big').css('height', '300px');
    }

    function check_plugins() {
        if ($('.main-content .services ul').length > 0) {
            try_fix_height();
        }

        if ($('body').width() < 515 - 16) {
//            console.log($('body').width())
//            console.log($('window').width())
            if (!$('.services ul').hasClass('slick-initialized')) {
                $('.services ul').slick({
                    rtl: true,
                    slidesToShow: 4,
                    dots: false,
                    infinite: false,
                    navigation: false,
                    arrows: false,
                    responsive: [
                        {
                            breakpoint: 515,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                infinite: true,
                                dots: true
                            }
                        }
                    ]
                });
            }

        } else {
            if ($('.services ul').hasClass('slick-initialized'))
                $('.services ul').slick('unslick');
        }
    }

    check_plugins()

    $(window).resize(function () {
        check_plugins();
        $('.menu-mobile-btn').removeClass('opened');
        //$('.menu-mobile').slideUp(300).removeClass('opened')
        //calculate_height();
    });

    $('#totop').click(function () {
        $("html, body").stop().animate({scrollTop: $('body').offset().top}, 1000);
        return false;
    });

    /***************** fixed menu ***************/
    try {
        var fixed_menu = $('#main-menu').offset().top + 5;
        var fixed_inner_menu = $('.product-menu').offset().top + 49;
    }
    catch (e) {

    }

    $(window).scroll(function () {
        var y = $(this).scrollTop();
        //if (y >= fixed_menu) {
        //    $('#main-menu').addClass('fixed_menu');
        //}
        //else {
        //    $('#main-menu').removeClass('fixed_menu');
        //}
        if (y >= fixed_inner_menu) {
            $('.product-menu').addClass('fixed_menu');
            $('.product-advantages').css({'padding-top': 100 + $('.product-menu').height() + 'px'});

            $('footer .copy-rights').addClass('open_');
            setTimeout(function () {
                $('.product-menu').addClass('animate_');
            }, 200)
        }
        else {
            $('.product-menu').removeClass('animate_');
            $('.product-advantages').css({'padding-top': 100 + 'px'});
            $('footer .copy-rights').removeClass('open_');
            $('.product-menu').removeClass('fixed_menu');
            setTimeout(function () {
            }, 200)
        }

        if ($(this).scrollTop() > 800)
            $('#totop').fadeIn(200);
        else
            $('#totop').fadeOut(200);
        //calculate_height();
        var margins = "0px";
        if ($('#search_container').css('display') == 'block') {
            margins = $('#search_container').outerHeight() + "px";
        }
        if ($(window).scrollTop() > 100) {
            $('#top-bar').stop().animate({'margin-top': margins}, 250, 'easeOutQuart', function () {
                $(this).animate({paddingTop: '15px', paddingBottom: '15px'}, 250, 'easeOutQuart')
            });
        }
        else {
            $('#top-bar').stop().animate({paddingTop: '36px', paddingBottom: '36px'}, 250, 'easeOutQuart', function () {
                $(this).animate({'margin-top': margins}, 250, 'easeOutQuart')
            });
        }

    })

    var allow_close = true;
    $('body').click(function () {
        if (allow_close)
            if ($('.drop_menu').hasClass('active'))
                $('.drop_menu').removeClass('active');
        allow_close = true;
//        alert('body')
    });
    $('.drop_menu').click(function () {
        //alert('ss')
        $('.drop_menu').removeClass('active');
        if (allow_close)
            $(this).toggleClass('active');
        $('.scroll').each(function () {
            $(this).tinyscrollbar_update();
        })
        allow_close = false;
    })

    $('.booking .col').css('margin-right', '-96px');
    var index = -1;

    $('#depdate,#retdate').focus(function () {
        $('#datesContainer').addClass('active')
    });
    $('#finddate').focus(function () {
        $('#finddatesContainer').addClass('active')
    });

    // if ($('.form_ form').attr('action').search("app_kuraimi_atms") > 0) {
    //     $('#distinguished_no').blur(check_momaize);
    // }

    //alert($('.form_ form').attr('action').search('app_kuraimi_mobiles'));
    // if ($('.form_ form').attr('action').search('app_kuraimi_mobiles') > 0) {
    //     $('#main_mobile').blur(check_mobile);
    // }

    //$('#distinguished_no').blur(check_momaize)


    //$('#main_mobile').blur(check_momaize)



    /************************************************************************/

    $('.drop_menu ol').each(function () {
        $(this).after('<div class="scroll"><div class="scrollbar"><div class="track"><div class="thumb"></div></div></div><div class="viewport"><div class="overview"><ol>' + $(this).html() + '</ol></div></div></div>');
        $(this).remove();
    })
    if ($('.scroll').length > 0) {
        $('.scroll').tinyscrollbar();
    }
    $('.drop_menu ol li').click(function () {
        top_parent = $(this).parent().parent().parent().parent().parent().parent().parent();
        //        alert(top_parent.toString())
        obj = $('select option', top_parent).get($(this).index());

        $('select', top_parent).val($(obj).val())
        $('.dd-num', top_parent).text($(this).text())
        $('.drop_menu').removeClass('active');
        allow_close = false;
        //    alert('li')
    });
    $('.packages ul a').click(function () {
        $('.overlay').fadeIn(300, 'easeOutQuad');
        $('.holiday').slideDown(300, 'easeOutQuad');
    });
    $('.holiday .close').click(function () {
        $('.overlay').fadeOut(300, 'easeOutQuad');
        $(this).parent().slideUp(300, 'easeOutQuad');
    });
    $('.fake-select').click(function () {
        $(this).toggleClass('open')
    });
    $('.administration a').click(function (e) {
        return e.preventDefault();
    })


    $data = {
        "CMB_Promotion":"1",
        "Cust_No":"434192",
        "MobileNumber1":"777300180",
        "MobileNumber2":0,
        "MobileNumber3":0,"Telext":true,
        "Fav_list":
            [{"Fav_Name":"\u0633\u0639\u064a\u062f \u0639\u0644\u0633\u064a \u063a\u0628\u062f\u0647 \u064a",
                "Fav_Tel":"737054540500265",
                "fav_sex":195
            }]
    }
   // load_map_info()

});