<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>We Blog|用户登陆</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #1 for " name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset('css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('css/layout.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{asset('css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{asset('css/login-4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->

    <!-- END HEAD -->

<body class=" login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="#">
        <img src="{{asset('img/logo-big11.png')}}" alt="" /> </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="select_brand.html" method="post">
        <h3 class="form-title">账号登陆</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> 请输入用户名和密码 </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">用户名</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="用户名" name="username" /> </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">密码</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="密码" name="password" /> </div>
        </div>
        <div class="form-actions">
            <label class="rememberme mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" value="1" />记住我
                <span></span>
            </label>
            <button type="submit" class="btn green pull-right"> 登陆 </button>
        </div>

    </form>
</div>
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('js/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('js/app.min.js') }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset('js/layout.min.js') }}" type="text/javascript"></script>
<script src="{{asset('js/demo.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/quick-sidebar.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/quick-nav.min.js')}}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->

<!-- END LOGIN -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('js/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/backstretch/jquery.backstretch.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('js/login.min.js') }}" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    $(document).ready(function()
    {
        $('#clickmewow').click(function()
        {
            $('#radio1003').attr('checked', 'checked');
        });
    })
    $.backstretch([
        '{{asset('img/bg/1.jpg')}}',
        '{{asset('img/bg/2.jpg')}}',
        '{{asset('img/bg/3.jpg')}}',
        '{{asset('img/bg/4.jpg')}}'
    ], {
        fade: 1000,
        duration: 8000
    });

    $(".login-form").validate({
        errorElement: "span",
        errorClass: "help-block",
        focusInvalid: !1,
        rules: {
            username: {
                required: !0
            },
            password: {
                required: !0
            },
            remember: {
                required: !1
            }
        },
        messages: {
            username: {
                required: "用户名必须填写"
            },
            password: {
                required: "密码必须填写"
            }
        },
        invalidHandler: function(e, r) {
            $(".alert-danger", $(".login-form")).show()
        },
        highlight: function(e) {
            $(e).closest(".form-group").addClass("has-error")
        },
        success: function(e) {
            e.closest(".form-group").removeClass("has-error"),
                e.remove()
        },
        errorPlacement: function(e, r) {
            e.insertAfter(r.closest(".input-icon"))
        },
        submitHandler: function(e) {
            e.submit()
        }
    }),
        $(".login-form input").keypress(function(e) {
            if (13 == e.which) return $(".login-form").validate().form() && $(".login-form").submit(),
                !1
        })

</script>
</body>

</html>