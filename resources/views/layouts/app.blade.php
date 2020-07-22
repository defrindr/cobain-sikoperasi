<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>test</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/css/grid.css">
    <link rel="stylesheet" type="text/css" href="/css/base.css">
  <style type="text/css">
    
        /* Let's get this party started */
        ::-webkit-scrollbar {
            width: 8px;
        }
         
        /* Track */
        ::-webkit-scrollbar-track {
        }
         
        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: rgba(145,154,213,0.8);
        }
        ::-webkit-scrollbar-thumb:window-inactive {
            background: rgba(105,94,153,0.8);
        }
  </style>
    <style type="text/css">
        html{
            font-family: Poppins;
        }
        body {
            background-image: url('/uploaded/login/login_base.jpg');
            background-size: cover;
            height: 100vh;
            margin: 0;
            font-size: 14px;
            color: #666;
        }
        h1 {
            font-size: 24px;
            margin: 0 auto;
            text-align: center;
            color: #11151a;
        }
        h2 {
            font-size: 42px;
            margin: 0;
        }
        .login_page img {
        }
        .error_text {
            color: #aaa;
        }
        a {
            color: #55a3d1;
            padding: 5px 0;
            text-decoration: none;
        }
        .container {
            width: 80%;
            margin: auto;
        }



        .boxed {
            margin: auto!important;
            padding: 40px;
            box-shadow: 0 0 10px #efefef;
            border-radius: 10px;
            background-color: rgba(255,255,255,.9);
        }
        .m-auto {
            margin: 0 auto
        }

        .boxed__content {
            padding-top: 30px;
        }
        .boxed__content .form-group {
            padding: 10px 0;
        }

        .boxed__content .form-group label {
            margin-bottom: 5px;
        }
        .boxed__content .form-group input {
            width: 100%;
            padding: 5px;
            border: 1px solid #eee;
            border-radius: 3px;
        }
        .btn {
            margin: 0 auto;
            border: 1px solid transparent;
            padding: 10px 20px;
            display: block;
            border-radius: 4px;
        }
        .btn-primary {
            background-color: #3465D9;
            color: #fff;
        }
        .boxed__content .form-group button {
            margin: 0 auto;
        }

        .img-responsive {
            margin: 0 auto;
            width: 100%;
            height: 100px;
            /*max-height: ;*/
        }

        label {
            display: block;
        }

        .alert {
            display: block;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 5px 10px;
            background-color: #eee;
            position: relative;
            color: #fff;
        }
        .alert .close {
            float: right;
            color: #fff;
            font-size: 18px;
            background-color: transparent;
            border: 0;
        }
        .alert .close:focus {
            outline: none;
        }
        .alert.alert-success {
            background-color: #8ee5a3;
        }
        .alert.alert-danger {
            background-color: #f25252;
        }


    </style>
</head>
<body>
    <div class="login_page">
        <div class="container pv-6">
            <div class="row">
                <div class="col-md-6 col-sm-8 col-xs-12 m-auto">
                    <div class="boxed">
                        <h1 class="boxed__title">Login Page</h1>
                        <div class="boxed__content">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        alertClose = document.querySelector('.alert .close')
        alertClose.addEventListener('click',() => {
            console.log(alertClose.parentElement.style.display = 'none' );
        })

    </script>
</body>
</html>
