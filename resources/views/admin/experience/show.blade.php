@extends('layouts.app')
@section('title', '| View Experience') 

@section('content') 

    <h1>Show experience {{ $experience->id }}</h1>


    <div class="row">
        <div class="col-md-8">
    
        <p>{{ $experience->title }}</p>
        <p>{{ $experience->descriptions }}</p>
        <p>{{ $experience->started_at }}</p>
        <p>{{ $experience->finished_at }}</p>
        <p>{{ $experience->missions }}</p>
        <p>{{ $experience->languages }}</p>
        <p>{{ $experience->links }}</p>
        <div class="image-container row mb-2">
            <img src="{{ asset('uploads/experience/'.$experience->pictures) }}" class="w-50 h-auto pb-1" 
                title="{{ $experience->title }}">
        </div>
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd><p>{{ $experience->created_at }}</p></dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Updated At:</dt>
                    <dd><p>{{ $experience->updated_at }}</p></dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('admin.experience.edit', $experience->id) }}" class="btn btn-outline-success">edit</a></th>
                    </div>

                     <div class="col-sm-6">
                        {!! Form::open(['route' => ['admin.experience.destroy', $experience->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection