<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Clean Blog Template</title>
    <meta name="keywords" content="clean blog template, html css layout"/>
    <meta name="description" content="Clean Blog Template is provided by templatemo.com"/>
    <link href="{{asset('css/front.css')}}" rel="stylesheet" type="text/css"/>

    <!-- JavaScripts-->
    <script type="text/javascript" src="/js/front.js"></script>
    {{--<script type="text/javascript" src="js/s3Slider.js"></script>--}}
</head>
<body>

<div id="templatemo_wrapper">

    <div id="templatemo_left_column">

        <div id="templatemo_header">

            <div id="site_title">
                <h1><a href="/" target="_parent">Advert <strong>Site</strong><span>Free HTML-CSS Template</span></a>
                </h1>
            </div><!-- end of site_title -->

        </div> <!-- end of header -->

        <div id="templatemo_sidebar">

            <div>
                @if(Auth::check())
                    <h2>User name: {{Auth::user()->username}}</h2>
                    <a href="/logout">Logout</a>
                    <div>
                        <div class="button"><a href="/edit">Create Ad</a></div>
                    </div>
                @else
                    <form action="login" method="POST">
                        {{csrf_field()}}
                        <p>username: </p>
                        <p><input type="text" name="username" value="{{old('username')}}"></p>

                        <p>password: </p>
                        <p><input type="password" name="password"></p>

                        <input type="submit" value="Login">
                    </form>
                @endif
            </div>

        </div>

    </div> <!-- end of templatemo_left_column -->

    <div id="templatemo_right_column">

        @if (count($errors) > 0)
            <div class="comment_tab">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="comment_tab">
                {{ session('status') }}
            </div>
        @endif

        @yield('content')

        <div class="cleaner"></div>
    </div>
    <!-- end of templatemo_main -->
    <div class="cleaner_h20"></div>

    <div id="templatemo_footer">

        Copyright © 2048 <a href="#">Your Company Name</a> |
        <a href="http://www.iwebsitetemplate.com" target="_parent">Website Templates</a> by <a
                href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>

    </div>

    <div class="cleaner"></div>
</div> <!-- end of warpper -->

</body>
</html>