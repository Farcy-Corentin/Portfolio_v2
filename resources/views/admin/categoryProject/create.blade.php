@extends('layouts.app')
@section('title', '| Create New Project')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Categorie Project</h1>
            <hr>
            {!! Form::open(['route' => 'admin.categoryProject.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, ['class' => 'form-control']) }}

                {{ Form::label('description', 'description:') }}
                {{ Form::text('description', null, ['class' => 'form-control']) }}
                
                {{ Form::submit('Create Project', 
                    [
                        'class' => 'btn btn-success btn-lg btn-black',
                        'style' => 'margin-top: 20px;'
                    ]
                )}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection