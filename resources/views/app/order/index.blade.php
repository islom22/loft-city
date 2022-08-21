@extends('layouts.app')

@section('content')
    <h1 class="text-uppercase mb-4">Orders</h1>

    @if (count($orders) <= 0)
        <a href="{{ route('orders.create') }}" class="btn btn-success mb-3 text-white">Add</a>
    @endif

    {{-- @dd($var); --}}
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">Name</th>
                            <th class="border-0">Phone</th>
                            <th class="border-0">Products</th>
                            <th class="border-0">Price</th>
                            <th class="border-0 rounded-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <!-- Item -->
                            <tr>
                                <td><a href="#"
                                        class="text-primary fw-bold">{{ ($orders->currentpage() - 1) * $orders->perpage() + $loop->index + 1 }}</a>
                                </td>
                                <td class="fw-bold">{{ $order->name }}</td>
                                <td class="fw-bold">{{ $order->phone }}</td>
                           
                                <td>
                                    @foreach ($order->order_products as $product)
                                        <a class="fw-bold">{{ $product->title['ru'] }}</a> <br>
                                    @endforeach
                                </td>
                                <td>
                                    @if ($order->with_delivery)
                                        <a class="fw-bold">{{ $order->order_products->sum('price') + $dast->dastavka }}</a>
                                    @else
                                        <a class="fw-bold">{{ $order->order_products->sum('price') }}</a>
                                    @endif
                                </td>
                              
                                <td>
                                    <div class="actions d-flex">
                                        <form class="" onclick="return myFunction();"
                                            action="{{ route('orders.destroy', ['order' => $order]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="text-danger bg-transparent border-0 p-0 m-0 mb-3 fw-bolder"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                        <a href="{{ route('orders.edit', ['order' => $order]) }}"
                                            class="text-info fw-bolder ms-3"><i class="fa-solid fa-pen"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <!-- End of Item -->
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{-- {!! $orders->links() !!} --}}
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
