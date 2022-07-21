@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">Orders</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('orders.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Orders</a> >> <a
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

    <form action="{{ route('orders.store') }}" method="post" enctype='multipart/form-data' >
        @csrf
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                                    <div class="row mb-4">
                                        <div class="col-lg-6 col-sm-6">
                                            <!-- Form -->
                                            <div class="mb-4">
                                                <label for="email">Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="name" >
                                            </div>
                                            <div class="mb-4">
                                                <label for="email">Phone</label>
                                                <input type="text
                                                " class="form-control" name="phone" placeholder="phone" >
                                            </div>
                                            <div class="mb-4">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="email" >
                                            </div>
                                            <div class="mb-4">
                                                <label for="email">City</label>
                                                <input type="text" class="form-control" name="city" placeholder="city" >
                                            </div>
                                            <div class="mb-4">
                                                <label for="email">Address</label>
                                                <input type="text" class="form-control" name="address" placeholder="address" >
                                            </div>
                                            <div class="mb-4">
                                                <label for="exampleFormControlInput1" class="fs-6 fw-bold mb-2">Role</label>
                                                <select class="form-select" aria-label="" name="role"  data-control="select2" data-hide-search="true">
                                                    <option value="Наличка">Наличка</option>
                                                    <option value="С картой" >С картой</option>
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <label for="exampleFormControlInput2" class="fs-6 fw-bold mb-2">How_to_buy</label>
                                                <select class="form-select" aria-label="" name="payment" data-control="select2" data-hide-search="true">
                                                    <option value="Забрать от шоу рума">Забрать от шоу рума</option>
                                                    <option value="С доставкой?" >С доставкой?</option>
                                                </select>
                                            </div>
                                            <!-- End of Form -->
                                        </div>
                                    </div>
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

