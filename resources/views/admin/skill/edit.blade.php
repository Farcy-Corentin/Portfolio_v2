@extends('layouts.app')
@section('title', '| Edit Project') 

@section('content') 

    <h1>Edit Skill {{ $skill->id }}</h1>

    <div class="row">
        <div class="col-md-8">
           
    {!! Form::model($skill, ['route' => ['admin.skill.update', $skill->id], "method" => "PUT" ]) !!}

        {{ Form::label('categoryproject', 'Categories Project:') }}
  
        {{ Form::label('category', 'category Project:') }}
        {{ Form::select('category_id', $categories, $skill->category_id, ['class' => 'form-control']) }}

        {{ Form::label('name', 'Name :', ["class" => "form-spaceing-top, font-weight-bold" ]) }}
        {{ Form::text('name', null, ["class" => 'form-control']) }}

        {{ Form::label('skills', 'skills :', ["class" => "form-spaceing-top, font-weight-bold" ]) }}
        {{ Form::textarea('skills', null, ["class" => 'form-control']) }}

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ $skill->created_at }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Updated At:</dt>
                    <dd>{{ $skill->updated_at }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('admin.skill.show', $skill->id) }}" class="btn btn-outline-danger">Cancel</a>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::submit('Save Changed', ['class' => 'btn btn-success btn-block'])}}
                            {{-- <a href="{{ route('admin.experience.update', $experience->id) }}" class="btn btn-outline-success">Save Changed</a></th> --}}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection