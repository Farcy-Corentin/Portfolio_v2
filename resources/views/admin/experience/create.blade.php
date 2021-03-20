@extends('layouts.app')
@section('title', '| Create New Skill')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Experience</h1>
            <hr>
            {!! Form::open(['route' => 'admin.experience.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, ['class' => 'form-control']) }}

                {{ Form::label('descriptions', 'Descriptions:') }}
                {{ Form::text('descriptions', null, ['class' => 'form-control']) }}

                {{ Form::label('started_at', 'started_at:') }}
                {{ Form::date('started_at', null, ['class' => 'form-control']) }}

                {{ Form::label('finished_at', 'finished_at:') }}
                {{ Form::date('finished_at', null, ['class' => 'form-control']) }}

                {{ Form::label('missions', 'Missions:') }}
                {{ Form::text('missions', null, ['class' => 'form-control']) }}

                {{ Form::label('languages', 'Languages:') }}
                {{ Form::text('languages', null, ['class' => 'form-control']) }}

                {{ Form::label('pictures', 'Pictures:') }}
                {{ Form::text('pictures', null, ['class' => 'form-control']) }}

                {{ Form::label('links', 'Links:') }}
                {{ Form::text('links', null, ['class' => 'form-control']) }}

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