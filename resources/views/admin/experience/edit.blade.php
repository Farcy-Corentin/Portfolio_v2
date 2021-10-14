@extends('layouts.app')
@section('title', '| Edit Experience')

@section('content')

<h1>Show experience {{ $experience->id }}</h1>

<div class="row">
    <div class="col-md-8">

        <form method="POST" action="{{ route('admin.experience.update', ['experience' => $experience->id]) }} "
            enctype="multipart/form-data">

            @csrf
            @method('PATCH')

            <div class="form-group row my-4">
                <div class="col-md-12">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        value="{{ $experience->title }}" autofocus>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row my-4">

                <div class="col-md-12">
                    <textarea id="descriptions" class="form-control
                                @error('descriptions') is-invalid @enderror" name="descriptions"
                        autofocus>{{ $experience->descriptions }}</textarea>
                    @error('descriptions')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row my-4">
                <div class="col-md-12">

                    <input type="date" id="started_at" name="started_at" class="form-control @error('started_at') 
                        is-invalid @enderror"
                        value="{{ (old('started_at')) ?? ($experience->started_at == '' ? '' : 
                        \Carbon\Carbon::createFromDate($experience->started_at)->format('Y-m-d'))}}">
                    @error('started_at')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row my-4">
                <div class="col-md-12">

                    <input type="date" id="finished_at" name="finished_at" class="form-control @error('finished_at') 
                        is-invalid @enderror"
                        value="{{ (old('finished_at')) ?? ($experience->finished_at == '' ? '' : \Carbon\Carbon::createFromDate($experience->finished_at)->format('Y-m-d'))}}">
                    @error('finished_at')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row my-4">
                <div class="col-md-12">
                    <textarea id="missions" class="form-control
                                @error('missions') is-invalid @enderror" name="missions"
                        autofocus>{{ $experience->missions }}</textarea>
                    @error('missions')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row my-4">
                <div class="col-md-12">
                    <input id="languages" type="text" class="form-control @error('languages') is-invalid @enderror"
                        name="languages" value="{{ $experience->languages }}" autofocus>
                    @error('languages')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row my-4">
                <div class="col-md-12">
                    <input id="links" type="text" class="form-control @error('links') is-invalid @enderror"
                        name="links" value="{{ $experience->links }}" autofocus>
                    @error('links')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row my-5">
                <div class="col-md-12">
                    <input id="pictures" type="file" class="form-control @error('pictures') is-invalid @enderror"
                        name="pictures" value="{{ old('pictures') }}" autofocus>
                    @error('pictures')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row my-5 mb-0">
                    <div class="col-md-6 offset-md-9">
                        <button type="submit" class="btn btn-success">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </div>
            </div>


    </div>

    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <dt>Created At:</dt>
                <dd>
                    <p>{{ $experience->created_at }}</p>
                </dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Updated At :</dt>
                <dd>
                    <p>{{ $experience->updated_at }}</p>
                </dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <a href="{{ route('admin.experience.show', $experience->id) }}"
                        class="btn btn-outline-danger">Cancel</a>
                </div>
                <div class="col-sm-6">
                    {{ Form::submit('Save Changed', ['class' => 'btn btn-success btn-block'])}}
                    {{-- <a href="{{ route('admin.experience.update', $experience->id) }}" class="btn
                    btn-outline-success">Save Changed</a></th> --}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
{!! Form::close() !!}
@endsection
