@extends('layouts.app')
@section('title', '| Edit Categories') 

@section('content') 

    <h1>Show Categories {{ $categoryProject->id }}</h1>

    <div class="row">
        <div class="col-md-8">
           
    {!! Form::model($categoryProject, ['route' => ['admin.categoryProject.update', $categoryProject->id], "method" => "PUT" ]) !!}
        {{ Form::label('title', 'title :', ["class" => "form-spaceing-top, font-weight-bold" ]) }}
        {{ Form::text('title', null, ["class" => 'form-control']) }}
        
        {{ Form::label('description', 'description :', ["class" => "form-spaceing-top, font-weight-bold" ]) }}
        {{ Form::text('description', null, ["class" => 'form-control']) }}
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