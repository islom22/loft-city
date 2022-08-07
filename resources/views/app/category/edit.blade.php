@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">Category</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('categories.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Category</a> >> <a
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

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3  fileUploadBlock">
                <p style="font-weight: 600" class="mb-2">Images</p>
                <div class="d-flex flex-wrap previewFiles">
                    @csrf
                    {{-- @foreach ($product->productImage as $products) --}}
                    @if (!(($category->img) == null))
                    <form action="{{ route('delete-image-category') }}" method="POST">
                        @csrf
                        <div class="d-flex align-items-center justify-content-center me-2"
                            style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer; position: relative">
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            @if ($category)
                                <img src="{{ asset('uploads/category/' . $category->img) }}" alt=""
                                    style="height: 100%; width:100%; border-radius: 12px;object-fit: cover;">
                            @endif
                            <input type="hidden" name="img[]">
                            <button class="btn btn-danger rmFile" type="submit"
                                style="position: absolute;top: -7px;padding: 0.15rem 0.55rem;right: -7px;"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    </form>
                    @endif
                    {{-- @endforeach --}}
                    @if (($category->img) == null)
                        <form action="{{ route('upload-category-image') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <input name="img" id="add_img" type="file" class="form-control fileUploadInput"
                                onchange="this.form.submit()"
                                style="position: fixed;
                                        opacity: 0;
                                        z-index: -1;">

                            <label for="add_img" class="d-flex align-items-center justify-content-center openFileDialog"
                                style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer">
                                <i class="fas fa-plus fa-2x" style="color: #2a313b;"></i>
                            </label>
                        </form>
                    @endif
                </div>
                <input class="form-control fileUploadInput" type="file" style="display: none" name="img[] ">
            </div>
            <form action="{{ route('categories.update', ['category' => $category]) }}" method="post"
                enctype='multipart/form-data'>
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow components-section">
                            <div class="card-body">
                                <nav>
                                    <div class="nav nav-tabs border-bottom mb-3" id="nav-tab" role="tablist">
                                        @foreach ($languages as $language)
                                            <button class="nav-link border-bottom" id="{{ $language->lang }}-tab"
                                                data-bs-toggle="tab" data-bs-target="#{{ $language->lang }}" type="button"
                                                role="tab" aria-controls="{{ $language->lang }}"
                                                aria-selected="true">{{ $language->lang }}</button>
                                        @endforeach
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    @foreach ($languages as $language)
                                        <div class="tab-pane fade" id="{{ $language->lang }}" role="tabpanel"
                                            aria-labelledby="{{ $language->lang }}-tab">
                                            <div class="row mb-4">
                                                <div class="col-lg-6 col-sm-6">
                                                    <!-- Form -->
                                                    <div class="mb-4">
                                                        <label for="email">Title</label>
                                                        <input type="text" class="form-control"
                                                            name="title[{{ $language->small }}]" placeholder="title"
                                                            value="{{ old('title.' . $language->small) ? old('title.' . $language->small) : $category->title[$language->small] }}">
                                                    </div>
                                                    <!-- End of Form -->
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="img" class="form-label">Image</label>
                                            <input class="form-control" type="file" id="img" name="img"
                                                accept="image/*">
                                        </div>
                                    </div>
                                </div> --}}
                                <button class="btn btn-success px-5 text-white" type="submit"
                                    style="padding:12px">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection
