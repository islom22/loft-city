@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">File</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('files.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Files</a> >> <a class="d-flex text-uppercase ms-2">Add post</a>
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

    <form action="{{ route('files.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">              
                        <div class="tab-content" id="nav-tabContent">
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 col-sm-6">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">File</label>
                                    <input class="form-control" type="file" name="file" >
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
