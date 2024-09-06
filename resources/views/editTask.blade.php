<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo List</title>
    <link rel="stylesheet" href="{{ asset('/assets/CSS/index.css') }}">
</head>
<body>
    <div class="editTask">

        <h1 class='name'>Edit Page</h1>
        <form action="/editTask/{{$task->id}}" method="POST">
            @csrf
            @method('PUT')
            <input name="task" type="text" value="{{$task->task}}"> {{--Make sure the name is the same used in TaskController--}}
            <button>Change Task</button>
        </form>

        <div class="MadeByBanner">
            Made by Kassem Elhajj
        </div>

    </div>

    

</body>
</html>