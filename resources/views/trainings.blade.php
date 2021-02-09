<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    experiences
    @foreach($trainings as $training)
        <h3>{{ $training->id }} === {{ $training->title }}</h3>
        <p>{{ $training->description }}</p>
        <p>{{ $training->started_at }}</p>
        <p>{{ $training->cursus }}</p>
        <p>{{ $training->links }}</p>
        <img src="{{ $training->pictures }}" alt="" srcset="">
    @endforeach
</body>
</html>