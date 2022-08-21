@extends('layouts.app')

@section('content')
    <h1 class="text-uppercase mb-4">Users</h1>


    <a href="{{ route('users.create') }}" class="btn btn-success mb-3 text-white">Add</a>


    {{-- @dd($var); --}}
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">Name</th>
                            <th class="border-0">User Name</th>
                            {{-- <th class="border-0">Password</th> --}}
                            <th class="border-0 rounded-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <!-- Item -->
                            <tr>
                                <td><a href="#"
                                        class="text-primary fw-bold">{{ ($users->currentpage() - 1) * $users->perpage() + $loop->index + 1 }}</a>
                                </td>
                                <td class="fw-bold">{{ $user->name }}</td>
                                <td class="fw-bold">{{ $user->username }}</td>
                                {{-- <td class="fw-bold">{{ $user->password }}</td> --}}
                                <td>
                                    <div class="actions d-flex">
                                        @if (count($users) > 1)
                                            <form class="" onclick="return myFunction();"
                                                action="{{ route('users.destroy', ['user' => $user]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="text-danger bg-transparent border-0 p-0 m-0 mb-3 fw-bolder"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </form>
                                        @endif
                                        <a href="{{ route('users.edit', ['user' => $user]) }}"
                                            class="text-info fw-bolder ms-3"><i class="fa-solid fa-pen"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <!-- End of Item -->
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{-- {!! $users->links() !!} --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            if (!confirm("Are You Sure to delete this"))
                event.preventDefault();
        }
    </script>
@endsection
