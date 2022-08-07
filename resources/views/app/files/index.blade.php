@extends('layouts.app')

@section('content')
    <h1 class="text-uppercase mb-4">Files</h1>
    @if (count($files) <= 0)
        <a href="{{ route('files.create') }}" class="btn btn-success mb-3 text-white">Add file</a>
    @endif
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">File</th>
                            <th class="border-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $file)
                            <!-- Item -->
                            <tr>
                                <td><a href="#"
                                        class="text-primary fw-bold">{{ ($files->currentpage() - 1) * $files->perpage() + $loop->index + 1 }}</a>
                                </td>
                                <td class="fw-bold">{{ $file->file }}</td>
                                <td>
                                    <div class="actions d-flex">
                                        <form class="" onclick="return myFunction();"
                                            action="{{ route('files.destroy', ['file' => $file]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="text-danger bg-transparent border-0 p-0 m-0 mb-3 fw-bolder"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                        {{-- <a href="{{ route('files.edit', ['file' => $file]) }}" class="text-info fw-bolder ms-3"><i class="fa-solid fa-pen"></i></a> --}}
                                    </div>
                                </td>
                            </tr>
                            <!-- End of Item -->
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="mt-4">
            {!! $files->links() !!}
          </div> --}}
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
