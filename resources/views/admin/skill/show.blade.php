@extends('layouts.app')
@section('title', '| View Project') 

@section('content') 

    <h1>Show Skill id: {{ $skill->id }} </h1>
    <div class="row">
        <div class="col-md-8">
    
        <p>{{ $skill->category_id }}</p>
        <p>{{ $skill->name }}</p>
        <p>{{ $skill->skills }}</p>


        </div>

        <div class="col-md-4">
            <div class="well">


                <dl class="dl-horizontal">
                    <dt>Created At :</dt>
                    <dd><p>{{ $skill->created_at }}</p></dd>
                </dl>


                <dl class="dl-horizontal">
                    <dt>Updated At:</dt>
                    <dd><p>{{ $skill->updated_at }}</p></dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                       <a href="{{ route('admin.skill.edit', $skill->id) }}" class="btn btn-outline-success">edit</a></th>
                    </div>

                     <div class="col-sm-6">
                         <a href="">
                        {!! Form::open(['route' => ['admin.skill.destroy', $skill->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection