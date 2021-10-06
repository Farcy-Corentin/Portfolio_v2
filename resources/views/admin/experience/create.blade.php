@extends('layouts.app')
@section('title', '| Create New Skill')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Experience</h1>
            <hr>
            <form method="POST" action="{{ route('admin.experience.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4 me-0">
                    <span class="text-danger">* Tous les champs sont obligatoires</span>
                </div>
                <div class="form-group row my-4">
                    <div class="col-md-12">
                        <label for="title">Title :</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                            name="title" value="{{ old('name') }}" autofocus>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row my-4">
                    <div class="col-md-12">
                        <label for="descriptions">Descriptions :</label>
                        <textarea id="descriptions" type="textarea"
                            class="form-control @error('descriptions') is-invalid @enderror" name="descriptions"
                            autofocus>
                        </textarea>
                        @error('descriptions')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row my-4">
                    <div class="col-md-12">
                        <label for="started_at">started_at :</label>
                        <input type="date" id="started_at" name="started_at" placeholder="2018-07-22"
                            class="form-control @error('started_at') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row my-4">
                    <div class="col-md-12">
                        <label for="finished_at">finished_at :</label>
                        <input type="date" id="finished_at" name="finished_at" placeholder="2018-07-22"
                            class="form-control @error('finished_at') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row my-4">
                    <div class="col-md-12">
                    <label for="Missions">Missions :</label>
                    <textarea id="mission" type="textarea"
                              class="form-control @error('missions') is-invalid @enderror" name="missions"
                              autofocus>
                    </textarea>
                        @error('missions')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row my-4">
                    <div class="col-md-12">
                        <label for="languages">languages :</label>
                        <input id="languages" type="text" class="form-control @error('languages') is-invalid @enderror"
                            name="languages" value="{{ old('languages') }}" autofocus>
                        @error('languages')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row my-4">
                    <div class="col-md-12">
                        <label for="pictures">pictures :</label>
                        <input id="pictures" type="text" class="form-control @error('pictures') is-invalid @enderror"
                            name="pictures" value="{{ old('pictures') }}" autofocus>
                        @error('pictures')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row my-4">
                    <div class="col-md-12">
                        <label for="links"> links :</label>
                        <input id="links" type="text" class="form-control @error('links') is-invalid @enderror"
                            name="links" value="{{ old('links') }}" autofocus>
                        @error('links')
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
</div>
@endsection
