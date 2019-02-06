<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Advert Site</h1>
        <p class="lead">The milk chocolate melts in your mouth, not in your hand.</p>
        <div class="text-right">
            <a href="/" class="btn btn-secondary btn-lg">Home</a>
        </div>

    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-3">
            @if(Auth::check())
                <h2>User name: {{Auth::user()->username}}</h2>
                <div class="row">
                    <a href="/logout" class="btn btn-danger">Logout</a>
                </div>
                <div class="row my-2">
                    <a href="/edit" class="btn btn-primary">Create Ad</a>
                </div>

            @else
                <form action="login" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">username</label>
                        <input type="text" class="form-control" name="username" value="{{old('username')}}"
                               placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            @endif

        </div>
        <div class="col-6">

            @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-info" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @yield('content')
        </div>

    </div>
</div>

<footer class="footer mt-auto py-3" style="background-color: #4e555b">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer>

</body>
</html>