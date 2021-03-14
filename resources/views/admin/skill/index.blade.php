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
                        <th>Name</th>
                        <th>Category name</th>
                        <th>Skills</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($skills as $skill)
                        <tr>
                            <td>
                                <a href="{{ route('admin.skill.show', ['skill' => $skill->id]) }}">
                                    {{ $skill->name }}
                                </a>
                            </td>
                            <td>
                                {{ $skill->category->name }}
                            </td>
                            <td>
                                {{ $skill->skills }}
                            </td>
                            <td class="btn-group">
                                <a href="{{ route('admin.skill.show', ['skill' => $skill->id]) }}" class="btn btn-success">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.skill.destroy', ['skill' => $skill->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
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