<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('kptm.png') }}">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your external CSS file -->
    <title>My Blog</title>
</head>
<body>

    @auth
    <div class="container">
        <p>Congrats you are logged in.</p>    
        <form action="/logout" method="POST">
            @csrf
            <button class="btn">Log Out</button>
        </form>

        <br>

        <div class="card">
            <h2>Create a New Post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Post Title" class="input">
                <textarea name="body" placeholder="Body Content..." class="textarea"></textarea>
                <button class="btn">Save Post</button>
            </form>
        </div>

        <br>

        <div class="card">
            <h2>All Posts</h2>
            @foreach ($posts as $post)
            <div class="post">
                <h3>{{$post['title']}} by {{$post->user->name}}</h3>
                {{$post['body']}}
                <p><a href="/edit-post/{{$post->id}}" class="link">Edit</a></p>
                <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn-danger">Delete</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="container">
        <div class="card">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input name="name" type="text" placeholder="Name" class="input">
                <input name="email" type="text" placeholder="Email" class="input">
                <input name="password" type="password" placeholder="Password" class="input">
                <button class="btn">Register</button>
            </form>
        </div>

        <br>

        <div class="card">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input name="loginname" type="text" placeholder="Name" class="input">
                <input name="loginpassword" type="password" placeholder="Password" class="input">
                <button class="btn">Log in</button>
            </form>
        </div>
    </div>
    @endauth

</body>
</html>
