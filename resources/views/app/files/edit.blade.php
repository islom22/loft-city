@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">File</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('files.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">File</a> >> <a class="d-flex text-uppercase ms-2">Edit</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('files.update', ['file' => $file]) }}" method="post" enctype='multipart/form-data'>
        @csrf
        @method('put')
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="img" class="form-label">File</label>
                                    <input class="form-control" value="{{ old($file->file) }}" type="file" id="file" name="file" >
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success px-5 text-white" type="submit" style="padding:12px">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
