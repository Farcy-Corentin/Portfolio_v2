@extends('layouts.app')
@section('title', '| View Trainings') 

@section('content') 

    <h1>Show Training {{ $training->id }}</h1>


    <div class="row">
        <div class="col-md-8">
    
        <p>{{ $training->title }}</p>
        <p>{{ $training->description }}</p>
        <p>{{ $training->started_at }}</p>
        <p>{{ $training->finished_at }}</p>
        <p>{{ $training->cursus }}</p>
        <p>{{ $training->pictures }}</p>
        <p>{{ $training->links }}</p>

        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd><p>{{ $training->created_at }}</p></dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Updated At:</dt>
                    <dd><p>{{ $training->updated_at }}</p></dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('admin.training.edit', $training->id) }}" class="btn btn-outline-success">edit</a></th>
                    </div>

                     <div class="col-sm-6">
                        {!! Form::open(['route' => ['admin.training.destroy', $training->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection