@extends('layouts.app')
@section('title', '| View Categories Skill') 

@section('content') 
    <div class="row">
        <div class="col-md-10">
            All Categories Project
        </div>

        <div class="col-md-2">
            <a href="{{ route('admin.categoryProject.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Competences Skill</a>
        </div>
        <br>
        <hr>
        <br>
           <div class="col-md-12">
             
              <table class="table table-hover">
                <thead>
                    <th>id</th>
                    <th>name</th>
                    <th>description</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th></th>
                </thead>

                 <tbody>
                    @foreach($categoryProject as $categoryProject)
                    <tr>
                        <th>{{ $categoryProject->id }}</th>
                        <th>{{ $categoryProject->title }}</th>
                        <th>{{ $categoryProject->description }}</th>
                        <th>{{ $categoryProject->created_at }}</th>s
                        <th>{{ $categoryProject->updated_at }}</th>
                        <th>
                            <a href="{{ route('admin.categoryProject.show', $categoryProject->id) }}" class="btn btn-outline-primary">View</a>
                            <a href="{{ route('admin.categoryProject.edit', $categoryProject->id) }}" class="btn btn-outline-danger">edit</a></th>
                        </tr>
                    @endforeach
                 </tbody>
              </table>
        </div>
    </div>
@endsection