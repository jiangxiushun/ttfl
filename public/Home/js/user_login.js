// 注册验证
$().ready(function() {
    var loginForm   = $("#loginForm");
    var submit      = $("#btnSubmit");
    var back_act    = $("#back_act").val();
    // 表单验证
    loginForm.validate({
        rules: {
            username: {
                required: true,
            },
            password: {
                required: true,
            },
            captcha:{
                required: true,
            }
        },
        messages: {
            username: "必填",
            password: "必填",
            captcha: "必填"
        },
        submitHandler: function(form) {
            $.ajax({
                url: loginForm.attr("action"),
                type: "POST",
                data:loginForm.serialize(),
                dataType: "json",
                cache: false,
                beforeSend: function() {
                    layer.load(2);
                    submit.prop("disabled", true);
                },
                success: function(data) {
                    if(data.error){
                        layer.msg(data.content);
                        if(data.enabled_captcha){
                            $('#div_captcha').removeClass("div_cap");
                            $('#captcha').removeAttr("disabled");
                            $('#captchaImage').attr("src", "captcha.php?is_login=1" + new Date().getTime());
                        }
                    }else{
                        //关闭后的操作
                        location.reload;
                    }
                },
                complete: function() {
                    submit.prop("disabled", false);
                    layer.closeAll('loading');
                }
            });
        }
    });
});