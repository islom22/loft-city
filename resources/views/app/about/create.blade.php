@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">about</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('abouts.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">about</a> >> <a class="d-flex text-uppercase ms-2">create</a>
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

    <form action="{{ route('abouts.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="row">
            <div class="col-6 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="email">Phone</label>
                            <input type="string" class="form-control" name="phone" value="{{ old('phone')  }}" placeholder="phone" >
                        </div>
                        <div class="mb-4">
                            <label for="email">Telegram User</label>
                            <input type="text" class="form-control" name="telegram_user" value="{{ old('telegram_user')  }}" placeholder="telegram" >
                        </div>
                        <div class="mb-4">
                            <label for="email">Telegram Link</label>
                            <input type="text" class="form-control" name="telegram_link" value="{{ old('telegram_link')  }}" placeholder="telegram1" >
                        </div>
                        <div class="mb-4">
                            <label for="email">Instagram</label>
                            <input type="text" class="form-control" name="instagram" value="{{ old('instagram')  }}" placeholder="instagram" >
                        </div>
                        <div class="mb-4">
                            <label for="email">Address First</label>
                            <input type="text" class="form-control" name="address1" value="{{ old('address1')  }}" placeholder="address1" >
                        </div>
                        <div class="mb-4">
                            <label for="email">Address Second</label>
                            <input type="text" class="form-control" name="address2" value="{{ old('address2')  }}" placeholder="address2" >
                        </div>
                        <div class="mb-4">
                            <label for="email">Address Third</label>
                            <input type="text" class="form-control" name="address3" value="{{ old('address3')  }}" placeholder="address3" >
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Image First</label>
                                    <input class="form-control" type="file" name="img1" value="{{ old('img1')  }}" accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Image Second</label>
                                    <input class="form-control" type="file" name="img2" value="{{ old('img2')  }}" accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Image Third</label>
                                    <input class="form-control" type="file" name="img3" value="{{ old('img3')  }}" accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Video</label>
                                    <input class="form-control" type="file" value="{{ old('video')  }}" name="video">
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
