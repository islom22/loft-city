@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">Review</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('reviews.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Reviews</a> >> <a
            class="d-flex text-uppercase ms-2">Add</a>
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

    <form action="{{ route('reviews.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs border-bottom mb-4" id="nav-tab" role="tablist">
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
                                        <div class="col-lg-6 col-sm-6">
                                            <!-- Form -->
                                            
                                            <div>
                                                <label for="">Product_id</label>
                                                <select class="form-control" name="product_id"
                                                    onchange="selectValue(this,{{ $key }})"
                                                    id="exampleFormControlSelect{{ $key }}">
                                                    @foreach ($product as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->title['ru'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                            <div class="form-group mb-3">
                                                <label for="">Comment</label>
                                                {{-- <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}"> --}}
                                                <input type="text" class="form-control" id="comment"
                                                    name="comment[{{ $language->small }}]" placeholder="comment"
                                                    value="{{ old('comment.' . $language->small) }}">
                                            </div>
                                            <!-- End of Form -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="btn btn-success px-5 text-white" type="submit" style="padding:12px">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        function selectValue(val, key) {
            if (key == 0) {
                document.getElementById('exampleFormControlSelect1').value = val.value;
            } else document.getElementById('exampleFormControlSelect0').value = val.value;
        }
    </script>

@endsection
