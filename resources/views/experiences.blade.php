@extends('layouts.app')
@section('content')
    experiences
    @foreach($experiences as $experience)
        <h3>{{ $experience->title }}</h3>
        <p>{{ $experience->descriptions }}</p>
        <p>{{ $experience->started_at }}</p>
        <p>{{ $experience->finished_at }}</p>
        <p>{{ $experience->missions }}</p>
        <p>{{ $experience->languages }}</p>
        <img src="{{ $experience->pictures }}" alt="{{ $experience->title }}">
        <p>{{ $experience->links }}</p>
    @endforeach
@endsection