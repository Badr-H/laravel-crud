<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('home.css') }}">

</head>

<body>

    @auth
        <h1>you are logged in as <span>{{ Auth::user()->name }}</span></h1>
        <form action="/logout" method="POST">
            @csrf
            <button>
                Logout
            </button>
        </form>



        <div>
            <h2>Create new post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Post title">
                <textarea name="body" cols="30" rows="10" placeholder="body content... "></textarea>
                <button>Save Post</button>
            </form>
        </div>

        @if ($userPosts->isEmpty())
            <div>
                <h2>My Posts</h2>
                <p>You dont have any posts yet</p>
            </div>
        @else
            <div>
                <h2>My Posts</h2>
                @foreach ($userPosts as $post)
                    <div>
                        <h3>{{ $post->title }}</h3>
                        {{-- {{ $post['body'] }} --}}
                    </div>
                @endforeach
            </div>
        @endif



        <div>
            <h2>All Posts</h2>
            @foreach ($allPosts as $post)
                <div>
                    <h3>{{ $post['title'] }}</h3>
                    {{-- {{ $post['body'] }} --}}
                </div>
            @endforeach
        </div>
    @else
        <div>
            <h2>Register </h2>
            <form action="/register" method="POST">
                @csrf
                <input type="text" name="name" id="" placeholder="name">
                <input type="email" name="email" id="" placeholder="email">
                <input type="password" name="password" id="" placeholder="password">
                <button>Register</button>
            </form>
        </div>



        <div>
            <h2>Login </h2>
            <form action="/login" method="POST">
                @csrf
                <input type="text" name="loginName" id="" placeholder="name">

                <input type="password" name="loginPassword" id="" placeholder="password">
                <button>Login</button>
            </form>
        </div>
    @endauth

</body>

</html>
