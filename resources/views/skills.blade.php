@extends('layouts.app')
@section('content')
    <h1>Skills </h1>
    @foreach($skills as $skill)
        <h3>{{ $skill->id }}{{ $skill->name }}</h3>
        <p>{{ $skill->categories }} </p>
        <ul>
            <li>{{ $skill->skills }}</li>
        </ul>
    @endforeach
@endsection
