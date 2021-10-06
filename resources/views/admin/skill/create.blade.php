@extends('layouts.app')
@section('title', '| Create New Skill')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Skill</h1>
            <hr>
            <form method="POST" action="{{ route('admin.skill.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4 me-0">
                    <span class="text-danger">*Tous les champs sont obligatoires</span>
                </div>
                <div class="form-group row mb-4">
                    <div class="col-md-12">
                        <label for="skills">Catégories :</label>
                        <select class="form-control @error('content') is-invalid @enderror"
                                name="category_id">
                            <option disabled selected>Choisissez la catégorie...</option>
                            @foreach ($categoriesSkill as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row my-4">
                    <div class="col-md-12">
                        <label for="skills">Name :</label>
                        <input id="name" type="textarea"
                               class="form-control @error('name') is-invalid @enderror" name="name"
                               placeholder="Titre de l'article"
                               value="{{ old('name') }}" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row my-4">
                    <div class="col-md-12">
                        <label for="skills">skill :</label>
                        <div class="col-md-12">
                            <textarea id="skills" type="textarea"
                                      class="form-control @error('content') is-invalid @enderror" name="skills"
                                      autofocus>
                            </textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
            
                        @error('skills')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row justify-content-end my-4 me-0">
                    <button class="btn btn-secondary col-4 col-lg-2" type="reset">Annuler</button>
                    <button class="btn btn-primary col-4 col-lg-2" type="submit">Poster</button>
                </div>
            </form>
    </div>
</div>
@endsection