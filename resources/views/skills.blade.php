@extends('layouts.app')
@section('content')

<div class="col-12">
        <h1>Skills </h1>
        @foreach ($categories as $category)
            <h2>{{ $category->name }}</h2>
            <div class="row">
            @foreach($skills as $skill)
            @if ($skill->category_id === $category->id)
                <div class="col-md-4">
 
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">{{ $skill->name }}</h5>
                                <p class="card-text">{{ $skill->skills }}</p>
                            </div>
                        </div>
                
                </div>
            @endif
            @endforeach
        </div>
            @endforeach



@endsection
