@extends('layouts.app')

@section('title', '|')

@section('content')
   <div class="row">
       <div class="col-md-8 col-md-offset-2">
            <h1>{{ $project->title }}</h1>
            <p>{{ $project->descriptions }}</p>
       </div>
   </div>
@endsection
