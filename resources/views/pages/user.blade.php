<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
    <x-header>
    </x-header>
    <ul>
        
        @foreach($user as $users)
        <li>{{$user->name}}</li>
        <li>{{$user->id}}</li>
        @endforeach
    </ul>
</body>
</html>





