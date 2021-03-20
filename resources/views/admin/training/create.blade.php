@extends('layouts.app')
@section('title', '| Create New Project')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Training</h1>
            <hr>
            {!! Form::open(['route' => 'admin.training.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, ['class' => 'form-control']) }}

                {{ Form::label('description', 'Description:') }}
                {{ Form::textarea('description', null, ['class' => 'form-control']) }}

                {{ Form::label('started_at', 'Started_at:') }}
                {{ Form::date('started_at', null, ['class' => 'form-control']) }}

                {{ Form::label('finished_at', 'finished_at:') }}
                {{ Form::date('finished_at', null, ['class' => 'form-control']) }}

                {{ Form::label('cursus', 'Cursus:') }}
                {{ Form::text('cursus', null, ['class' => 'form-control']) }}

                {{ Form::label('links', 'links:') }}
                {{ Form::text('links', null, ['class' => 'form-control']) }}

                {{ Form::label('pictures', 'pictures:') }}
                {{ Form::text('pictures', null, ['class' => 'form-control']) }}

                {{ Form::submit('Create Project', 
                    [
                        'class' => 'btn btn-success btn-lg btn-black',
                        'style' => 'margin-top: 20px;'
                    ])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection