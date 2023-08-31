<!-- register.blade.php -->

<body>
    <h2>Register</h2>
    <form action="/register" method="POST">
        @csrf
        <input type="text" name="name" id="" placeholder="name">
        <input type="email" name="email" id="" placeholder="email">
        <input type="password" name="password" id="" placeholder="password">
        <button>Register</button>
    </form>
</body>
