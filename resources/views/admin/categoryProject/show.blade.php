@extends('layouts.app')
@section('title', '| View Trainings') 

@section('content') 

    <h1>Show Category Project {{ $categoryProject->id }}</h1>


    <div class="row">
        <div class="col-md-8">
    
        <p>{{ $categoryProject->title }}</p>
        <p>{{ $categoryProject->description }}</p>

        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd><p>{{ $categoryProject->created_at }}</p></dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Updated At:</dt>
                    <dd><p>{{ $categoryProject->updated_at }}</p></dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('admin.categoryProject.edit', $categoryProject->id) }}" class="btn btn-outline-success">edit</a></th>
                    </div>

                     <div class="col-sm-6">
                        {!! Form::open(['route' => ['admin.categoryProject.destroy', $categoryProject->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection