<!-- login.blade.php -->

<head>
    <link rel="stylesheet" href="{{ asset('styles/login.css') }}">

</head>

<body>
    @if (session()->has('message'))
        <div class="alert alert-danger">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="card">
        <h1>Login</h1>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="loginName" id="" placeholder="name">
            <input type="password" name="loginPassword" id="" placeholder="password">
            <p>
                Remember me? <input type="checkbox" name="remember" value="1">
            </p>
            <button>Login</button>
        </form>
        <p>
            Don't have an account? <a href="/register">Sign up</a>
        </p>
    </div>
    @if (count($errors) > 0)
        )
        <div class="alert alert-danger">
            🛑 {{ $errors->first() }}
        </div>
    @endif
</body>
