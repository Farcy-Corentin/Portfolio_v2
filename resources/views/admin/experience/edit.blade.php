@extends('layouts.app')
@section('title', '| Edit Experience') 

@section('content') 

    <h1>Show experience {{ $experience->id }}</h1>

    <div class="row">
        <div class="col-md-8">
           
    {!! Form::model($experience, ['route' => ['admin.experience.update', $experience->id], "method" => "PUT" ]) !!}
        {{ Form::label('title', 'Title :', ["class" => "form-spaceing-top, font-weight-bold" ]) }}
        {{ Form::text('title', null, ["class" => 'form-control']) }}

        {{ Form::label('description', 'Description :', ["class" => "form-spaceing-top, font-weight-bold" ]) }}
        {{ Form::textarea('descriptions', null, ["class" => 'form-control']) }}

        {{ Form::label('started_at', 'Started_at :', ["class" => "form-spaceing-top, font-weight-bold" ]) }}
        {{ Form::datetime('started_at', null, ["class" => 'form-control']) }}

        {{ Form::label('finished_at', 'Finished_at :', ["class" => "form-spaceing-top, font-weight-bold" ]) }}
        {{ Form::datetime('finished_at', null, ["class" => 'form-control']) }}

        {{ Form::label('finished_at', 'Finished_at :', ["class" => "form-spaceing-top, font-weight-bold" ]) }}
        {{ Form::text('missions', null, ["class" => 'form-control']) }}

        {{ Form::label('Languages', 'Languages :', ["class" => "form-spaceing-top, font-weight-bold" ]) }}
        {{ Form::text('languages', null, ["class" => 'form-control']) }}

        {{ Form::label('pictures', 'Pictures :', ["class" => "form-spaceing-top, font-weight-bold" ]) }}
        {{ Form::text('pictures',null, ["class" => 'form-control']) }}

        {{ Form::label('links', 'Links :', ["class" => "form-spaceing-top, font-weight-bold" ]) }}
        {{ Form::text('links', null, ["class" => 'form-control']) }}

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
                        <a href="{{ route('admin.experience.show', $experience->id) }}" class="btn btn-outline-danger">Cancel</a>
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