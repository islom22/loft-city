@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">Users</h1>

    <d class="row mb-3">
        <div class="col-6">
            <div class="headcrumbs d-flex">
                <a href="{{ route('users.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Users</a> >> <a
                    class="d-flex text-uppercase ms-2">show</a>
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
            <form action="{{ route('users.update', ['user' => $users]) }}" method="post"
                enctype='multipart/form-data'>
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
                                        <input type="text" class="form-control" name="name" placeholder="name"
                                            value="{{ old('name', $users->name) ? $users->name : '' }}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="email">User Name</label>
                                        <input type="text" class="form-control" name="username" placeholder="username"
                                            value="{{ old('username', $users->username) ?  $users->username : ''}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="email">Password</label>
                                        <input type="text" class="form-control" name="password" placeholder="password"
                                            {{-- value="{{ old('password', $users->password) ? $users->password : ''}} --}}
                                            ">
                                    </div>
                                    <!-- End of Form -->
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success text-white px-5" type="submit" style="padding:12px">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
