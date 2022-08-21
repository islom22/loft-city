@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">about</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('abouts.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">about</a> >> <a
            class="d-flex text-uppercase ms-2">edit</a>
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

    {{-- @csrf --}}
    {{-- @method('put') --}}
    <div class="row">
        <div class="col-6 mb-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3  fileUploadBlock">
                        <p style="font-weight: 600" class="mb-2">First Image</p>
                        <div class="d-flex flex-wrap previewFiles">
                            @csrf
                            {{-- @foreach ($product->productImage as $products) --}}
                            @if (!($about->img1 == null))
                                <form action="{{ route('delete-image-about') }}" method="POST">
                                    @csrf
                                    <div class="d-flex align-items-center justify-content-center me-2"
                                        style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer; position: relative">
                                        <input type="hidden" name="id" value="{{ $about->id }}">
                                        @if ($about)
                                            <img src="{{ asset('uploads/about/' . $about->img1) }}" alt=""
                                                style="height: 100%; width:100%; border-radius: 12px;object-fit: cover;">
                                        @endif
                                        <input type="hidden" name="img1[]">
                                        <button class="btn btn-danger rmFile" type="submit"
                                            style="position: absolute;top: -7px;padding: 0.15rem 0.55rem;right: -7px;"><i
                                                class="fas fa-times"></i></button>
                                    </div>
                                </form>
                            @endif
                            {{-- @endforeach --}}
                            @if ($about->img1 == null)
                                <form action="{{ route('upload-about-image') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $about->id }}">
                                    <input name="img1" id="add_img" type="file" class="form-control fileUploadInput"
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
                        <input class="form-control fileUploadInput" type="file" style="display: none" name="img1[] ">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3  fileUploadBlock">
                        <p style="font-weight: 600" class="mb-2">Second Image</p>
                        <div class="d-flex flex-wrap previewFiles">
                            @csrf
                            {{-- @foreach ($product->productImage as $products) --}}
                            @if (!($about->img2 == null))
                                <form action="{{ route('delete-image-about_2') }}" method="POST">
                                    @csrf
                                    <div class="d-flex align-items-center justify-content-center me-2"
                                        style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer; position: relative">
                                        <input type="hidden" name="id" value="{{ $about->id }}">
                                        @if ($about)
                                            <img src="{{ asset('uploads/about1/' . $about->img2) }}" alt=""
                                                style="height: 100%; width:100%; border-radius: 12px;object-fit: cover;">
                                        @endif
                                        <input type="hidden" name="img2[]">
                                        <button class="btn btn-danger rmFile" type="submit"
                                            style="position: absolute;top: -7px;padding: 0.15rem 0.55rem;right: -7px;"><i
                                                class="fas fa-times"></i></button>
                                    </div>
                                </form>
                            @endif
                            {{-- @endforeach --}}
                            @if ($about->img2 == null)
                                <form action="{{ route('upload-about-image') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $about->id }}">
                                    <input name="img2" id="add_img" type="file" class="form-control fileUploadInput"
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
                        <input class="form-control fileUploadInput" type="file" style="display: none" name="img2[] ">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3  fileUploadBlock">
                        <p style="font-weight: 600" class="mb-2">Third Image</p>
                        <div class="d-flex flex-wrap previewFiles">
                            @csrf
                            {{-- @foreach ($product->productImage as $products) --}}
                            @if (!($about->img3 == null))
                                <form action="{{ route('delete-image-about_3') }}" method="POST">
                                    @csrf
                                    <div class="d-flex align-items-center justify-content-center me-2"
                                        style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer; position: relative">
                                        <input type="hidden" name="id" value="{{ $about->id }}">
                                        @if ($about)
                                            <img src="{{ asset('uploads/about2/' . $about->img3) }}" alt=""
                                                style="height: 100%; width:100%; border-radius: 12px;object-fit: cover;">
                                        @endif
                                        <input type="hidden" name="img3[]">
                                        <button class="btn btn-danger rmFile" type="submit"
                                            style="position: absolute;top: -7px;padding: 0.15rem 0.55rem;right: -7px;"><i
                                                class="fas fa-times"></i></button>
                                    </div>
                                </form>
                            @endif
                            {{-- @endforeach --}}
                            @if ($about->img3 == null)
                                <form action="{{ route('upload-about-image') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $about->id }}">
                                    <input name="img3" id="add_img" type="file"
                                        class="form-control fileUploadInput" onchange="this.form.submit()"
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
                        <input class="form-control fileUploadInput" type="file" style="display: none" name="img3[] ">
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="mb-3  fileUploadBlock">
                        <p style="font-weight: 600" class="mb-2">video</p>
                        <div class="d-flex flex-wrap previewFiles">
                            @csrf
                            {{-- @foreach ($product->productImage as $products) --}}
                            @if (!($about->video == null))
                                <form action="{{ route('delete-video-about') }}" method="POST">
                                    @csrf
                                    <div class="d-flex align-items-center justify-content-center me-2"
                                        style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer; position: relative">
                                        <input type="hidden" name="id" value="{{ $about->id }}">
                                        @if ($about)
                                           <video src="{{ asset('uploads/video/' . $about->video) }}" alt=""
                                            style="height: 100%; width:100%; border-radius: 12px;object-fit: cover;"></video>
                                        @endif
                                        <input type="hidden" name="video[]">
                                        <button class="btn btn-danger rmFile" type="submit"
                                            style="position: absolute;top: -7px;padding: 0.15rem 0.55rem;right: -7px;"><i
                                                class="fas fa-times"></i></button>
                                    </div>
                                </form>
                            @endif
                            {{-- @endforeach --}}
                            @if ($about->video == null)
                                <form action="{{ route('upload-about-video') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $about->id }}">
                                    <input name="video" id="add_img" type="file"
                                        class="form-control fileUploadInput" onchange="this.form.submit()"
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
                        <input class="form-control fileUploadInput" type="file" style="display: none" name="video[] ">
                    </div>
                </div>
            </div>

            <form action="{{ route('abouts.update', ['about' => $about->id]) }}" method="post"
                enctype='multipart/form-data'>
                @csrf
                @method('put')
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="email">Phone</label>
                            <input type="string" class="form-control" value="{{ old('phone', $about->phone) }}"
                                name="phone" placeholder="phone">
                        </div>
                        <div class="mb-4">
                            <label for="email">Telegram User</label>
                            <input type="text" class="form-control"
                                value="{{ old('telegram_user', $about->telegram_user) }}" name="telegram_user"
                                placeholder="telegram">
                        </div>
                        <div class="mb-4">
                            <label for="email">Telegram Link</label>
                            <input type="text" class="form-control"
                                value="{{ old('telegram_link', $about->telegram_link) }}" name="telegram_link"
                                placeholder="telegram1">
                        </div>
                        <div class="mb-4">
                            <label for="email">Instagram</label>
                            <input type="text" class="form-control" value="{{ old('instagram', $about->instagram) }}"
                                name="instagram" placeholder="instagram">
                        </div>
                        <div class="mb-4">
                            <label for="email"> First Address</label>
                            <input type="text" class="form-control" value="{{ old('address1', $about->address1) }}"
                                name="address1" placeholder="address1">
                        </div>
                        <div class="mb-4">
                            <label for="email"> Second Address</label>
                            <input type="text" class="form-control" value="{{ old('address2', $about->address2) }}"
                                name="address2" placeholder="address2">
                        </div>
                        <div class="mb-4">
                            <label for="email"> Third Address</label>
                            <input type="text" class="form-control" value="{{ old('address3', $about->address3) }}"
                                name="address3" placeholder="address3">
                        </div>
                        {{-- <div class="row mb-4">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label"> First Image</label>
                                    <input class="form-control" type="file" name="img1" accept="image/*">
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="row mb-4">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label"> Second Image</label>
                                    <input class="form-control" type="file" name="img2" accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label"> Third Image</label>
                                    <input class="form-control" type="file" name="img3" accept="image/*">
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="row mb-4">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Video</label>
                                    <input class="form-control" type="file" name="video">
                                </div>
                            </div>
                        </div> --}}
                        <button class="btn btn-success px-5 text-white" type="submit" style="padding:12px">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
