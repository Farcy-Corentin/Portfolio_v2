@extends('layouts.app')
@section('content')
    experiences
    @foreach($experiences as $experience)
        <h3>{{ $experience->id }} === {{ $experience->title }}</h3>
    @endforeach
@endsection