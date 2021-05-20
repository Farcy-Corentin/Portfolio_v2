@extends('layouts.app')
@section('title', '| Show Skills')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Show Skills</h1>
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category name</th>
                        <th>Skills</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($skills as $skill)
                        <tr>
                            <th>
                                {{ $skill->id }}
                            </th>
                            <th>
                                <a href="{{ route('admin.skill.show', ['skill' => $skill->id]) }}">
                                    {{ $skill->name }}
                                </a>
                            </th>
                            <th>
                                {{ $skill->category->name }}
                            </th>
                            <th>
                                {{ $skill->skills }}
                            </th>
                            <th>
                                <a href="{{ route('admin.skill.show', $skill->id) }}" class="btn btn-outline-primary">View</a>
                            </th>
                            <th>

                                {!! Form::open(['route' => ['admin.skill.destroy', $skill->id], 'method' => 'DELETE']) !!}
                                   {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                                   {!! Form::close() !!}</a>
                            </tr>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                Aucun skill
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection