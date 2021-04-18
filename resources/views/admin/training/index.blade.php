@extends('layouts.app')
@section('title', '| View Training') 

@section('content') 
    <div class="row">
        <div class="col-md-10 mb-5">
           <h2> All trainings <span class="badge badge-pill badge-primary">{{ $training->count() }}</span></h2>
        </div>

        <div class="col-md-2">
            <a href="{{ route('admin.training.create') }}" class="btn btn-block btn-primary">Create New Expérience</a>
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
                    <th></th>
                </thead>

                 <tbody>

                    @foreach($training as $training)
                   
                    <tr>
                        
                        <th>{{ $training->id }}</th>
                        <th>{{ $training->title }}</th>
                        <th>{{ substr($training->description, 0, 50 ) }}</th>
                        <th>{{ $training->created_at }}</th>
                        <th>
                            <a href="{{ route('admin.training.show', $training->id) }}" class="btn btn-outline-primary">View</a>
                            <a href="{{ route('admin.training.edit', $training->id) }}" class="btn btn-outline-danger">edit</a></th>
                        </tr>
                    @endforeach
                 </tbody>
              </table>
        </div>
    </div>
@endsection