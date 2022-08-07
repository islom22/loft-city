@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mb-4">Products</h1>

    <a href="{{ route('products.create') }}" class="btn btn-success mb-3 text-white">Add</a>
    
    <form action="{{ route('dastavka') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-4">
                <input type="text" name="dastavka" id="dastavka" value="{{ old('dast') ?? $dast->dastavka
                 }}" placeholder="dastavka" class="form-control">
            </div>
            <div class="col-md-6">
                <button class="btn btn-success px-3 text-white" type="submit" style="padding:6px">Save</button>
            </div>
        </div>
    </form>

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">#</th>
                        <th class="border-0">Title</th>
                        <th class="border-0">Subtitle</th>
                        {{-- <th class="border-0">Price</th> --}}
                        {{-- <th class="border-0">Category_id</th> --}}
                        {{-- <th class="border-0">Left</th> --}}
                        {{-- <th class="border-0">Brand</th> --}}
                        <th class="border-0">Desc</th>
                        {{-- <th class="border-0">Info</th> --}}
                        {{-- <th class="border-0">Image</th> --}}
                        <th class="border-0 rounded-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <!-- Item -->
                        <tr>
                            <td><a href="#" class="text-primary fw-bold">{{ ($products ->currentpage()-1) * $products ->perpage() + $loop->index + 1 }}</a></td>
                            <td class="fw-bold">{{ $product->title['ru'] ?? '--'  }}</td>
                            <td class="fw-bold">{{ $product->subtitle['ru'] ?? '--'  }}</td>
                            {{-- <td class="fw-bold">{{ $product->price  }}</td> --}}
                            {{-- <td class="fw-bold">{{ $product->category->title['ru'] }}</td> --}}
                            {{-- <td class="fw-bold">{{ $product->left  }}</td> --}}
                            {{-- <td class="fw-bold">{{ $product->brand  }}</td> --}}
                            <td class="fw-bold">{!! $product->desc['ru'] ?? '--'  !!}</td>
                            {{-- <td class="fw-bold">{!! $product->info['ru'] ?? '--'  !!}</td> --}}
                            {{-- <td>
                                <img src="{{asset('uploads/product/'.$product->img)}}" alt="" style="max-width: 250px">
                            </td> --}}
                            <td>
                                <div class="actions d-flex">
                                    <form class="" onclick="return myFunction();" action="{{ route('products.destroy', ['product' => $product]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-danger bg-transparent border-0 p-0 m-0 mb-3 fw-bolder"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    <a href="{{ route('products.edit', ['product' => $product]) }}" class="text-info fw-bolder ms-3"><i class="fa-solid fa-pen"></i></a>
                                </div>
                            </td>
                        </tr>
                        <!-- End of Item -->
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{-- {!! $products->links() !!} --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            if(!confirm("Are You Sure to delete this"))
            event.preventDefault();
        }
       </script>


@endsection
