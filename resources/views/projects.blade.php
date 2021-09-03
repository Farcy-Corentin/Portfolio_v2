@extends('layouts.app')
@section('content')
    projects
    @foreach($projects as $project)

{{-- {{ dd($project) }} --}}
    
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
        <p>{{ $project->images }} </p>

        {{-- <img src="{{asset($project->image_path)}}" alt="profile Pic" height="200" width="200"> --}}
        {{-- <img src="{{ asset('uploads/'. $image->image_path)}}" alt=""> --}}
        {{-- <img src="{{ asset($image->image_path) }}" /> --}}
        {{-- <img src="{{ $project->pictures }}" alt="" srcset=""> --}}
        @foreach($project->images as $gallery) 
            <img src="{{ asset('uploads/'. $gallery->image_path)}}" class="w-100" alt="{{ $gallery->name }}">
        @endforeach
        <a href="{{ url('projects/' . $project->slug) }}" class="btn btn-primary">Read more</a>
    @endforeach
@endsection
