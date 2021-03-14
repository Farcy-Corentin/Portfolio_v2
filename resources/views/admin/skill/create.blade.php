@extends('layouts.app')
@section('title', '| Create New Skill')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Skill</h1>
            <hr>
            {!! Form::open(['route' => 'admin.skill.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}

                {{ Form::label('category', 'Categories:') }}
                {{ Form::select('category', $categories) }}

                {{ Form::label('skills', 'Skills:') }}
                {{ Form::textarea('skills', null, ['class' => 'form-control']) }}

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