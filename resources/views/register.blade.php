<!-- register.blade.php -->

<head>
    <link rel="stylesheet" href="{{ asset('styles/login.css') }}">

</head>

<body>
    <div class="card">
        <h1>Register</h1>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" id="" placeholder="name">
            <input type="email" name="email" id="" placeholder="email">
            <input type="password" name="password" id="" placeholder="password">
            <button>Register</button>
        </form>
        <p>
            Already have an accouont> <a href="/login">Log in</a>
        </p>
    </div>
</body>
