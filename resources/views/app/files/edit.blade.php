@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">File</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('files.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">File</a> >> <a
            class="d-flex text-uppercase ms-2">Edit</a>
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
            <div class="col-6 mb-4">
                {{-- <div class="mb-3  fileUploadBlock">
                    <p style="font-weight: 600" class="mb-2">File</p>
                    <div class="d-flex flex-wrap previewFiles">
                        @csrf
                        {{-- @foreach ($product->productImage as $products) --}}
                        {{-- @if (!($file->file == null))
                            <form action="{{ route('delete-file') }}" method="POST">
                                @csrf
                                <div class="d-flex align-items-center justify-content-center me-2"
                                    style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer; position: relative">
                                    <input type="hidden" name="id" value="{{ $file->id }}">
                                    @if ($file)
                                       
                                        {{-- <img src="{{ asset('uploads/about1/' . $about->img2) }}" alt=""
                                            style="height: 100%; width:100%; border-radius: 12px;object-fit: cover;"> --}}
                                    {{-- @endif
                                    <input type="hidden" name="file[]">
                                    <button class="btn btn-danger rmFile" type="submit"
                                        style="position: absolute;top: -7px;padding: 0.15rem 0.55rem;right: -7px;"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </form>
                        @endif
                        {{-- @endforeach --}}
                        {{-- @if ($file->file == null)
                            <form action="{{ route('upload-file') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $file->id }}">
                                <input name="file" id="add_img" type="file" class="form-control fileUploadInput"
                                    onchange="this.form.submit()"
                                    style="position: fixed;
                                        opacity: 0;
                                        z-index: -1;">

                                <label for="add_img"
                                    class="d-flex align-items-center justify-content-center openFileDialog"
                                    style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer">
                                    <i class="fas fa-plus fa-2x" style="color: #2a313b;"></i>
                                </label>
                            </form>
                        @endif
                    </div>
                    <input class="form-control fileUploadInput" type="file" style="display: none" name="file[] ">
                </div> --}} 
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="img" class="form-label">File</label>
                                    <input class="form-control" value="{{ asset('uploads/file/' . $file->file) }}"
                                        type="file" id="file" name="file">
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
