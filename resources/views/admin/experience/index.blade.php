@extends('layouts.app')
@section('title', '| View Experience') 

@section('content') 
    <div class="row">
        <div class="col-md-10">
            All Expériences
        </div>

        <div class="col-md-4 mb-5">
            <a href="{{ route('admin.experience.create') }}" class="btn btn-block btn-primary">Create New Expérience</a>
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
                    @foreach($experiences as $experience)
                    <tr>
                        <th>{{$experience->id}}</th>
                        <th>{{$experience->title}}</th>
                        <th>{{substr($experience->descriptions, 0, 50 )}}</th>
                        <th>{{$experience->created_at}}</th>
                        <th>
                            <a href="{{ route('admin.experience.show', $experience->id) }}" class="btn btn-outline-primary">View</a>
                            <a href="{{ route('admin.experience.edit', $experience->id) }}" class="btn btn-outline-danger">edit</a></th>
                        </tr>
                    @endforeach
                 </tbody>
              </table>
        </div>
    </div>
@endsection