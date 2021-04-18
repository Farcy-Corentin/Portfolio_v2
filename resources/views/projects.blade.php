@extends('layouts.app')
@section('content')
    projects
    @foreach($projects as $project)
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
        <a href="{{ url('projects/' . $project->slug) }}" class="btn btn-primary">Read more</a>
    @endforeach
@endsection
