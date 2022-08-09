@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">Products</h1>

    <d class="row mb-3">
        <div class="col-6">
            <div class="headcrumbs d-flex">
                <a href="{{ route('products.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Products</a> >>
                <a class="d-flex text-uppercase ms-2">show</a>
            </div>
        </div>
    </d>

    {{-- @dd($image); --}}
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
        <div class="col-6">
            <div class="mb-3  fileUploadBlock">
                <p style="font-weight: 600" class="mb-2">Images</p>
                <div class="d-flex flex-wrap previewFiles">
                    @csrf
                    @foreach ($product->productImage as $products)
                        <form action="{{ route('delete-image') }}" method="POST">
                            @csrf
                            <div class="d-flex align-items-center justify-content-center me-2"
                                style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer; position: relative">
                                <input type="hidden" name="id" value="{{ $products->id }}">
                                @if ($products)
                                    <img src="{{ asset($products->img) }}" alt=""
                                        style="height: 100%; width:100%; border-radius: 12px;object-fit: cover;">
                                @endif
                                <input type="hidden" name="img[]">
                                <button class="btn btn-danger rmFile" type="submit"
                                    style="position: absolute;top: -7px;padding: 0.15rem 0.55rem;right: -7px;"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </form>
                    @endforeach
                    <form action="{{ route('upload-product-image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input name="img" id="add_img" type="file" class="form-control fileUploadInput" onchange="this.form.submit()" style="position: fixed;
                        opacity: 0;
                        z-index: -1;">

                        <label for="add_img" class="d-flex align-items-center justify-content-center openFileDialog"
                            style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer">
                            <i class="fas fa-plus fa-2x" style="color: #29313d;"></i>
                        </label>
                    </form>
                </div>
                <input class="form-control fileUploadInput" type="file" style="display: none" name="img[] ">
            </div>
            <form action="{{ route('products.update', ['product' => $product]) }}" method="post"
                enctype='multipart/form-data'>
                @csrf
                @method('put')
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Service</h4>
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
                            @foreach ($languages as $key => $language)
                                <div class="tab-pane fade" id="{{ $language->lang }}" role="tabpanel"
                                    aria-labelledby="{{ $language->lang }}-tab">
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <!-- Form -->
                                            <div class="mb-4">
                                                <label for="email">Title</label>
                                                <input type="text" class="form-control"
                                                    name="title[{{ $language->small }}]" placeholder="title"
                                                    value="{{ old('title.' . $language->small, $product->title[$language->small]) }}">
                                            </div>
                                            {{-- <div class="my-4">
                                                <label for="textarea">Description</label>
                                                <input class="form-control ckeditor" placeholder="Enter your description..."  rows="4" name="desc[{{ $language->small }}]" value="{{ old('desc.'.$language->small, $product->desc[$language->small]) }}"></input>
                                            </div> --}}
                                            <div class="mb-4">
                                                <label for="subtitle">Subtitle</label>
                                                <input type="text" id="subtitle" class="form-control"
                                                    name="subtitle[{{ $language->small }}]" placeholder="subtitle"
                                                    value="@isset($product->subtitle[$language->small]) {{ old('subtitle.' . $language->small, $product->subtitle[$language->small]) }} @endisset">
                                            </div>
                                            <div class="my-4">
                                                <label for="textarea">Description</label>
                                                <textarea class="form-control ckeditor" placeholder="Enter your description..." rows="4"
                                                    name="desc[{{ $language->small }}]">{{ old('desc.' . $language->small, $product->desc[$language->small]) }}</textarea>
                                            </div>
                                            <div class="my-4">
                                                <label for="textarea">Information</label>
                                                <textarea class="form-control ckeditor" placeholder="Enter your description..." rows="4"
                                                    name="info[{{ $language->small }}]">{{ old('info.' . $language->small, $product->info[$language->small]) }}</textarea>
                                            </div>
                                           
                                            <!-- End of Form -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-4">
                            <label for="">Price</label>
                            <input type="number" id="price{{ $key }}" class="form-control" name="price"
                                placeholder="price" value="{{ old('price', $product->price) }}">
                        </div>
                        <div class="mb-4">
                            <label for="subtitle">Left</label>
                            <input type="number" id="left{{ $key }}" class="form-control" name="left"
                                placeholder="left" value="{{ old('left', $product->left) }}">
                        </div>
                        <div class="mb-4">
                            <label for="">Brand</label>
                            <input type="text" class="form-control" id="brand{{ $key }}" name="brand"
                                placeholder="brand" value="{{ old('brand', $product->brand) }}">
                        </div>
                        <div class="mb-4">
                            <label for="">Category_id</label>
                            <select class="form-control" name="category_id"
                                onchange="selectValue(this,{{ $key }})"
                                id="exampleFormControlSelect{{ $key }}">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title['ru']  }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-success text-white px-5" type="submit" style="padding:12px">Save</button>
                </div>
        </div>
        </form>

    </div>
    </div>
    <script>
        function selectValue(val, key) {
            if (key == 0) {
                document.getElementById('exampleFormControlSelect1').value = val.value;
            } else document.getElementById('exampleFormControlSelect0').value = val.value;
        }

        function Brand(val, key) {
            if (key == 0) {
                document.getElementById('brand1').value = val.value;
            } else document.getElementById('brand0').value = val.value;
        }

        function Price(val, key) {
            if (key == 0) {
                document.getElementById('price1').value = val.value;
            } else document.getElementById('price0').value = val.value;
        }

        function Left(val, key) {
            if (key == 0) {
                document.getElementById('left1').value = val.value;
            } else document.getElementById('left0').value = val.value;
        }

        // $("input[name='img']").change(function() {
        //     this.form.submit();
        // });

        // $('.fileUploadInput').on('change', function() {
        //     var formData = new FormData();
        //     var hi = $(this).attr("name") + '_hidden[]';
        //     var pv = $(this).parents(".fileUploadBlock").find('.previewFiles');
        //     formData.append('file', $(this)[0].files[0]);
        //     $.ajax({
        //         method: 'post',
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         url: '/admin/file/upload',
        //         data: formData,
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         success: function(data) {
        //             if (data.file_type == 'img') {
        //                 var fileBlok = `
        //             <div class="d-flex align-items-center justify-content-center me-2 mb-2" style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer; position: relative">
        //                 <img src="/images/${data.file_name}" alt="" style="height: 100%; width:100%; border-radius: 12px;object-fit: cover;">
        //                 <input type="hidden" name="${hi}" value="${data.file_name}">
        //                 <button class="btn btn-danger rmFile" style="position: absolute;top: -7px;padding: 0.15rem 0.55rem;right: -7px;"><i class="fas fa-times"></i></button>
        //             </div>
        //             `
        //             } else {
        //                 var fileBlok = `
        //             <div class="d-flex align-items-center justify-content-center me-2 mb-2" style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer; position: relative">
        //                 <i class="fas fa-file fa-2x" style="color: #29313d;"></i>
        //                 <input type="hidden" name="${hi}" value="${data.file_name}">
        //                 <button class="btn btn-danger rmFile" style="position: absolute;top: -7px;padding: 0.15rem 0.55rem;right: -7px;"><i class="fas fa-times"></i></button>
        //             </div>
        //             `
        //             }
        //             pv.prepend(fileBlok);
        //         },
        //         error: function(error) {
        //             console.log(error)
        //         },
        //     });
        // });
    </script>

@endsection
