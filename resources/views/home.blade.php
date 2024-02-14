<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>


    @auth
        <header>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <h1 class="">Welcome back <span>{{ Auth::user()->name }}</span>!</h1>
        </header>


        <div class="">
            <h2>Create new post</h2>
            <form action="/create-post" method="POST" id="form">
                @csrf
                <input type="text" name="title" placeholder="Post title" id="title">
                <textarea name="body" placeholder="body content... " id="body"></textarea>
                <button class="btn btn-dark " id="save-btn">Save Post</button>
            </form>
        </div>

        <div class="my-posts">
            @if ($userPosts->isEmpty())
                <div>
                    <h2>My Posts</h2>
                    <p>You dont have any posts yet</p>
                </div>
            @else
                <div class="">
                    <h2>My Posts</h2>
                    @foreach ($userPosts as $post)
                        <div>
                            <h3>{{ $post->title }}</h3>
                            {{-- {{ $post['body'] }} --}}
                        </div>
                    @endforeach
                </div>
            @endif
        </div>


        <div class="all-posts">
            <h2>All Posts</h2>
            @foreach ($allPosts as $post)
                <div>
                    <h3>{{ $post['title'] }}</h3>
                    {{-- {{ $post['body'] }} --}}
                </div>
            @endforeach
        </div>
        <footer>
            <form action="/logout" method="POST">
                @csrf
                <button>
                    Logout
                </button>
            </form>
        </footer>
    @else
        <script>
            window.location.href = '/login'
        </script>
        {{-- <div>
            <a href="/register">
                <h1>Register</h1>
            </a>

        </div>

        <div>
            <a href="/login">
                <h1>Login </h1>
            </a>

        </div> --}}
    @endauth

</body>

</html>
