@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">Review</h1>

    <d class="row mb-3">
        <div class="col-6">
            <div class="headcrumbs d-flex">
                <a href="{{ route('reviews.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Review</a> >> <a class="d-flex text-uppercase ms-2">show</a>
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
            <form action="{{ route('reviews.update', ['review' => $review]) }}" method="post" enctype='multipart/form-data'>
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
                                                <label for="">Product_id</label>
                                                <select  class="form-control" name="product_id" onchange="selectValue(this,{{ $key }})" id="exampleFormControlSelect{{ $key }}" >
                                                    @foreach ($product as $category)   
                                                        <option value="{{ $category->id }}">{{ $category->title['ru'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="my-4">
                                                <label for="textarea">Comment</label>
                                                <input class="form-control ckeditor" placeholder="Enter your description..."  rows="4" name="comment[{{ $language->small }}]" value="{{ old('comment.'.$language->small, $review->comment[$language->small]) }}"></input>
                                            </div>
                                            <div class="mb-4">
                                                <label for="exampleFormControlInput1" class="fs-6 fw-bold mb-2">Status</label>
                                                <select class="form-select" aria-label="" name="status" data-control="select2" data-hide-search="true">
                                                    <option value="1">Active</option>
                                                    <option value="0" >Not active</option>
                                                </select>
                                            </div>
                                            <!-- End of Form -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
    </script>
    <script>
		var hostUrl = "/assets/";
	</script>
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="/assets/plugins/global/plugins.bundle.js"></script>
	<script src="/assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Page Vendors Javascript(used by this page)-->
	<script src="/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
	<script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Page Vendors Javascript-->
	<!-- multiselect -->
	<script type="text/javascript" src="https://okc1.kifa.uz/app/BsMultiSelect.min.js"></script>
	<!-- notyf -->
	<script type="text/javascript" src="https://okc1.kifa.uz/app/notify.js"></script>
		<!-- Include the Quill library -->
	<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
	<!--begin::Page Custom Javascript(used by this page)-->
	<script src="/assets/js/widgets.bundle.js"></script>
	<script src="/assets/js/custom/widgets.js"></script>
	<script src="/assets/js/custom/apps/chat/chat.js"></script>
	<script src="/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
	<script src="/assets/js/custom/utilities/modals/create-app.js"></script>
	<script src="/assets/js/custom/utilities/modals/users-search.js"></script>
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->

@endsection
