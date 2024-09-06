<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link rel="stylesheet" href="{{ asset('/assets/CSS/index.css') }}">
</head>
<body>
    <div class="Login">
        
        <h1>Login</h1>
        <form action="/login" method="POST">
            @csrf
            <input name="loginName" type="text" placeholder="name">
            <input name="loginPassword" type="password" placeholder="password">
            <button>Login</button>
            <p>Create an account <a href="{{ route('home') }}">Register here</a></p>
        </form>

        <div class="MadeByBanner">
            Made by Kassem Elhajj
        </div>

    </div>
</body>
</html>