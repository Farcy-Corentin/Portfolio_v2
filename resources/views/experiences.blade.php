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
    @foreach($experiences as $experience)
        <h3>{{ $project->id }} === {{ $project->title }}</h3>
        <p>{{ $project->description }} </p>
        <ul>
            <li>{{ $project->started_at }} - {{ $project->finished_at }}</li>
        </ul>
        <p>{{ $project->missions }} </p>
        <p>{{ $project->languages }} </p>
        <p>{{ $project->software }} </p>
        <p>{{ $project->links }} </p>
        <p>{{ $project->github_links }} </p>
        <p>{{ $project->online }} </p>
        <img src="{{ $project->pictures }}" alt="" srcset="">
        <p>{{ }}</p>
    @endforeach
</body>
</html>