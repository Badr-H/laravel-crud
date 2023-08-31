<!-- login.blade.php -->

<body>
    <h2>Login</h2>
    <form action="/login" method="POST">
        @csrf
        <input type="text" name="loginName" id="" placeholder="name">
        <input type="password" name="loginPassword" id="" placeholder="password">
        <button>Login</button>
    </form>
</body>
