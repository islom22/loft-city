@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">about</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('abouts.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">about</a> >> <a class="d-flex text-uppercase ms-2">edit</a>
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

    <form action="{{ route('abouts.update', ['about' => $about->id]) }}" method="post" enctype='multipart/form-data'>
        @csrf
        @method('put')
        <div class="row">
            <div class="col-6 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="email">Phone</label>
                            <input type="string" class="form-control" value="{{  $about->phone  }}" name="phone" placeholder="phone" >
                        </div>
                        <div class="mb-4">
                            <label for="email">Telegram User</label>
                            <input type="text" class="form-control" value="{{  $about->telegram_user   }}" name="telegram_user" placeholder="telegram" >
                        </div>
                        <div class="mb-4">
                            <label for="email">Telegram Link</label>
                            <input type="text" class="form-control" value="{{  $about->telegram_link   }}" name="telegram_link" placeholder="telegram1" >
                        </div>
                        <div class="mb-4">
                            <label for="email">Instagram</label>
                            <input type="text" class="form-control" value="{{  $about->instagram   }}" name="instagram" placeholder="instagram" >
                        </div>
                        <div class="mb-4">
                            <label for="email"> First Address</label>
                            <input type="text" class="form-control" value="{{  $about->address1   }}" name="address1" placeholder="address1" >
                        </div>
                        <div class="mb-4">
                            <label for="email"> Second Address</label>
                            <input type="text" class="form-control" value="{{  $about->address2   }}" name="address2" placeholder="address2" >
                        </div>
                        <div class="mb-4">
                            <label for="email"> Third Address</label>
                            <input type="text" class="form-control" value="{{  $about->address3   }}" name="address3" placeholder="address3" >
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label"> First Image</label>
                                    <input class="form-control" type="file" name="img1" accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
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
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Video</label>
                                    <input class="form-control" type="file" name="video">
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
