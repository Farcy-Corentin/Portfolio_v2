@extends('layouts.app')
@section('title', '| View Project') 

@section('content') 
    <div class="row">
        <div class="col-md-10">
            All Projects
        </div>

        <div class="col-md-6 mb-5">
            <a href="{{ route('admin.project.create') }}" class="btn btn-block btn-primary">Create New Project</a>
        </div>
        <br>
        <hr>
        <br>
           <div class="col-md-12">
              <table class="table table-hover">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created_at</th>
                    <th>Online</th>
                    <th></th>
                </thead>

                 <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <th>{{$project->id}}</th>
                        <th>{{$project->title}}</th>
                        <th>{{substr($project->descriptions, 0, 50 )}}</th>
                        <th>{{$project->created_at}}</th>
                        <th><?php if ($project->online === 1) { ?>
                                <span class="badge badge-pill badge-success">online</span>
                            <?php } else { ?>
                                <span class="badge badge-pill badge-danger">offline</span>
                            <?php } ?>
                        </th>
                        <th>
                            <a href="{{ route('admin.project.show', $project->id) }}" class="btn btn-outline-primary">View</a>
                            <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-outline-danger">edit</a></th>
                        </tr>
                    @endforeach
                 </tbody>
              </table>
             <div class="text-center">
                {!! $projects->links('pagination::bootstrap-4'); !!}
             </div>
        </div>
    </div>
@endsection