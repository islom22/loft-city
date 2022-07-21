@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">Products</h1>

    <d class="row mb-3">
        <div class="col-6">
            <div class="headcrumbs d-flex">
                <a href="{{ route('products.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Products</a> >> <a class="d-flex text-uppercase ms-2">show</a>
            </div>
        </div>
    </d>


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
            <form action="{{ route('products.update', ['product' => $product    ]) }}" method="post" enctype='multipart/form-data'>
                @csrf
                @method('put')
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Service</h4>
                        <nav>
                            <div class="nav nav-tabs border-bottom mb-3" id="nav-tab" role="tablist">
                                @foreach($languages as $language)
                                    <button class="nav-link border-bottom" id="{{ $language->lang }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $language->lang }}" type="button" role="tab" aria-controls="{{ $language->lang }}" aria-selected="true">{{ $language->lang }}</button>
                                @endforeach
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            @foreach($languages as $key =>$language)
                                <div class="tab-pane fade" id="{{ $language->lang }}" role="tabpanel" aria-labelledby="{{ $language->lang }}-tab">
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <!-- Form -->
                                            <div class="mb-4">
                                                <label for="email">Title</label>
                                                <input type="text" class="form-control" name="title[{{ $language->small }}]" placeholder="title" value="{{ old('title.'.$language->small, $product->title[$language->small]) }}">
                                            </div>
                                            <div class="mb-4">
                                                <label for="">Brand</label>
                                                <input type="text" class="form-control" id="brand{{ $key }}" name="brand" placeholder="brand" value="{{  $product->brand }}">
                                            </div>
                                            {{-- <div class="my-4">
                                                <label for="textarea">Description</label>
                                                <input class="form-control ckeditor" placeholder="Enter your description..."  rows="4" name="desc[{{ $language->small }}]" value="{{ old('desc.'.$language->small, $product->desc[$language->small]) }}"></input>
                                            </div> --}}
                                            <div class="mb-4">
                                                <label for="subtitle">Subtitle</label>
                                                <input type="text" id="subtitle" class="form-control" name="subtitle[{{ $language->small }}]" placeholder="subtitle" value="@isset($product->subtitle[$language->small]){{ old('subtitle.'.$language->small, $product->subtitle[$language->small]) }}@endisset">
                                            </div>
                                            <div class="my-4">
                                                <label for="textarea">Description</label>
                                                <textarea class="form-control ckeditor" placeholder="Enter your description..."  rows="4" name="desc[{{ $language->small }}]" >{{ old('desc.'.$language->small, $product->desc[$language->small]) }}</textarea>
                                            </div>
                                            <div class="my-4">
                                                <label for="textarea">Information</label>
                                                <textarea class="form-control ckeditor" placeholder="Enter your description..."  rows="4" name="info[{{ $language->small }}]" >{{ old('info.'.$language->small, $product->info[$language->small]) }}</textarea>
                                            </div>
                                            <div class="mb-4">
                                                <label for="">Price</label>
                                                <input type="integer" id="price{{ $key }}" class="form-control" name="price" placeholder="price" value="{{ $product->price }}"> 
                                            </div>
                                            <div class="mb-4">
                                                <label for="subtitle">Left</label>
                                                <input type="integer" id="left{{ $key }}" class="form-control" name="left" placeholder="left" value="{{ $product->left }}">
                                            </div>
                                            <div class="mb-4">
                                                <label for="">Category_id</label>
                                                <select  class="form-control" name="category_id" onchange="selectValue(this,{{ $key }})" id="exampleFormControlSelect{{ $key }}" >
                                                    @foreach ($categories as $category)   
                                                        <option value="{{ $category->id }}">{{ $category->title['ru'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- End of Form -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="img" class="form-label">Image</label>
                                    <input class="form-control" value="{{ $product->img }}" type="file" id="img" name="img[]" accept="image/*"  multiple>
                                    {{-- <img src="{{asset('uploads/product/'.$product->img)}}" alt="Image" width="70px" height="70px"> --}}
                                </div>
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
    </script>

@endsection
