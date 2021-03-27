@extends('layouts.app')
@section('title', '| View Experience') 

@section('content') 
    <div class="row">
        <div class="col-md-10">
            All Expériences
        </div>

        <div class="col-md-2">
            <a href="{{ route('admin.experience.create') }}" class="btn btn-block btn-primary">Create New Project</a>
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
                   
                 </tbody>
              </table>
        </div>
    </div>
@endsection