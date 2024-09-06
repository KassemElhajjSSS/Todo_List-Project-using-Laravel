<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/CSS/index.css') }}">
</head>
<body>

    @auth

    <div class="ToDoList-card">
        <h2 class="name">ToDo List</h2>

         <form action="/addTask" method="POST">
            @csrf
            <input type="text" name="task" placeholder="Enter your task here!">
            <input class="AddTask" type="submit" value="Add task">
         </form>

         <ul class="Tasks">

            @foreach ($tasks as $task)
                <li>
                    Task {{ $loop->index + 1 }}: {{$task['task']}}
                    <div class="TaskIcons">

                        <form action="/editTaskPage/{{$task->id}}" method="GET">
                            @csrf
                            <i class="fas fa-edit" onclick="this.closest('form').submit();"></i>
                        </form>

                        <form action="/deleteTask/{{$task->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <i class="fas fa-trash" onclick="this.closest('form').submit();" ></i>
                        </form>
                        
                    </div>
                </li>
             @endforeach
            
         </ul>

         <div class="logout">
            <form action="/logout" method='POST'>
                @csrf
                <input class="logout" type="submit" value="Logout">
            </form>
         </div>

         <div class="MadeByBanner">
            Made by Kassem Elhajj
        </div>

    </div>

    @else

    <div class="Register">
        <h1>Register</h1>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register</button>
            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        </form>

        <div class="MadeByBanner">
            Made by Kassem Elhajj
        </div>

    </div>

    @endauth

</body>
</html>
