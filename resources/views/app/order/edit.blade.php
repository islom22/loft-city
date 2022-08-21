@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">Orders</h1>

    <d class="row mb-3">
        <div class="col-6">
            <div class="headcrumbs d-flex">
                <a href="{{ route('orders.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Orders</a> >> <a class="d-flex text-uppercase ms-2">show</a>
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
            <form action="{{ route('orders.update', ['order' => $order    ]) }}" method="post" enctype='multipart/form-data'>
                @csrf
                @method('put')
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <!-- Form -->
                                            <div class="mb-4">
                                                <label for="email">Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="name" value="{{ old('name',$order->name) }}">
                                            </div>
                                            <div class="mb-4">
                                                <label for="email">Phone</label>
                                                <input type="text" class="form-control" name="phone" placeholder="phone" value="{{ old('phone',$order->phone) }}">
                                            </div>
                                            <div class="mb-4">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="email" value="{{ old('email',$order->email) }}">
                                            </div>
                                            <div class="mb-4">
                                                <label for="email">City</label>
                                                <input type="text" class="form-control" name="city" placeholder="city" value="{{ old('city',$order->city)}}">
                                            </div>
                                            <div class="mb-4">
                                                <label for="email">Address</label>
                                                <input type="text" class="form-control" name="address" placeholder="address" value="{{ old('address',$order->address) }}">
                                            </div>
                                            <div class="mb-4">
                                                <label for="exampleFormControlInput1" class="fs-6 fw-bold mb-2">Payment method</label>
                                                <select class="form-select" aria-label="" name="payment_method" data-control="select2" data-hide-search="true">
                                                    <option value="cash" {{ old('payment_method', $order->payment_method) == 'cash' ? 'selected' : '' }}>Наличка</option>
                                                    <option value="card" {{ old('payment_method', $order->payment_method) == 'card' ? 'selected' : '' }}>С картой</option>
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <label for="exampleFormControlInput2" class="fs-6 fw-bold mb-2">How_to_buy</label>
                                                <select class="form-select" aria-label="" name="with_delivery"  data-control="select2" data-hide-search="true">
                                                    <option value="0" {{ old('with_delivery', $order->with_delivery) == '0' ? 'selected' : '' }}>Забрать от шоу рума</option>
                                                    <option value="1" {{ old('with_delivery', $order->with_delivery) == '1' ? 'selected' : '' }}>С доставкой?</option>
                                                </select>
                                            </div>
                                            <!-- End of Form -->
                                        </div>
                                    </div>
                        </  iv>
                        <button class="btn btn-success text-white px-5" type="submit" style="padding:12px">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
   
@endsection
