@extends('layouts.app')
@section('content')

    @foreach($trainings as $training)
        <h3>{{ $training->id }} === {{ $training->title }}</h3>
        <p>{{ $training->description }}</p>
        <p>{{ $training->started_at }}</p>
        <p>{{ $training->cursus }}</p>
        <p>{{ $training->links }}</p>
        <img src="{{ $training->pictures }}" alt="" srcset="">
    @endforeach
@endsection