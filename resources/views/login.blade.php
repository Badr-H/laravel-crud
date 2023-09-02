<!-- login.blade.php -->

<head>
    <link rel="stylesheet" href="{{ asset('styles/login.css') }}">

</head>

<body>
    <div class="card">
        <h1>Login</h1>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="loginName" id="" placeholder="name">
            <input type="password" name="loginPassword" id="" placeholder="password">
            <button>Login</button>
        </form>
        <p>
            Don't have an account? <a href="/register">Sign up</a>
        </p>
    </div>
    @if ($errors->has('loginName'))
        <div class="alert alert-danger">
            🛑 {{ $errors->first('loginName') }}
        </div>
    @endif
</body>
