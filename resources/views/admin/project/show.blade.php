@extends('layouts.app')
@section('title', '| View Project') 

@section('content') 

    <h1>Show Project {{ $project->id }}</h1>


    <div class="row">
        <div class="col-md-8">
    
        <p>{{ $project->title }}</p>
        <p>{{ $project->descriptions }}</p>
        <p>{{ $project->started_at }}</p>
        <p>{{ $project->finished_at }}</p>
        <p>{{ $project->missions }}</p>
        <p>{{ $project->languages }}</p>
        <p>{{ $project->software }}</p>
        <p>{{ $project->links }}</p>
        <p>{{ $project->github_links }}</p>
        <p>{{ $project->online }}</p>
        <p>{{ $project->pictures }}</p>

        </div>

        <div class="col-md-4">
            <div class="well">

                <dl class="dl-horizontal">
                    <dt>url :</dt>
                    <dd><a href="{{ route('projectslug', $project->slug) }}">{{ route('projectslug', $project->slug) }}</a></dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Created At :</dt>
                    <dd><p>{{ $project->created_at }}</p></dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Status :</dt>
                    <dd>
                        <?php if ($project->online === 1) { ?>
                            <div class="dot"></div>
                        <?php } else { ?>
                            <div class="statusOffline"></div>
                        <?php } ?>
                    </dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Updated At:</dt>
                    <dd><p>{{ $project->updated_at }}</p></dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                       <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-outline-success">edit</a></th>
                    </div>

                     <div class="col-sm-6">
                         <a href="">
                        {!! Form::open(['route' => ['admin.project.destroy', $project->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
