@extends('layouts.app')
@section('title', '| Create New Project')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Project</h1>
            <hr>
            {!! Form::open(['route' => 'admin.project.store', 'method' => 'post', 'enctype' => 'multipart/form-data', 'files' => true ]) !!}
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, ['class' => 'form-control']) }}
                
                {{ Form::label('categoryproject', 'Categories Project:') }}
                {!! Form::select('categoryproject', $categoriesProject, null, ['class' => 'form-control']) !!}
               
                {{ Form::label('descriptions', 'Descriptions:') }}
                {{ Form::textarea('descriptions', null, ['class' => 'form-control']) }}

                {{ Form::label('slug', 'slug:') }}
                {{-- {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255']) }} --}}

                {{ Form::label('started_at', 'Started_at:') }}
                {{ Form::date('started_at', null, ['class' => 'form-control']) }}

                {{ Form::label('finished_at', 'finished_at:') }}
                {{ Form::date('finished_at', null, ['class' => 'form-control']) }}

                {{ Form::label('missions', 'missions:') }}
                {{ Form::textarea('missions', null, ['class' => 'form-control']) }}

                {{ Form::label('languages', 'languages:') }}
                {{ Form::text('languages', null, ['class' => 'form-control']) }}

                {{ Form::label('software', 'software:') }}
                {{ Form::textarea('software', null, ['class' => 'form-control']) }}

                {{ Form::label('links', 'links:') }}
                {{ Form::text('links', null, ['class' => 'form-control']) }}

                {{ Form::label('github_links', 'github_links:') }}
                {{ Form::text('github_links', null, ['class' => 'form-control']) }}

                {{ Form::label('online', 'online:') }}
                {{ Form::checkbox('online', 0, false) }}

                <img id="image_preview_container" src="{{ asset('public/image/uploads/image-preview.png') }}"
                alt="preview image" style="max-height: 150px;">
  
                <div class="form-group">
                    <input type="file" name="imageFile[]" multiple class="form-control" accept="image/*">
                    @if ($errors->has('files'))
                        @foreach ($errors->get('files') as $error)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $error }}</strong>
                        </span>
                        @endforeach
                    @endif
                </div>

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