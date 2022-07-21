@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mb-4">Review</h1>

    <a href="{{ route('reviews.create') }}" class="btn btn-success mb-3 text-white">Add</a>

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">#</th>
                        {{-- <th class="border-0">Product</th> --}}
                        <th class="border-0">Comment</th>
                        <th class="border-0">Status</th>
                        <th class="border-0 rounded-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      
                    @foreach($reviews as $review)
                        <!-- item -->
                        <tr>
                            <td><a href="#" class="text-primary fw-bold p">{{ ($reviews ->currentpage()-1) * $reviews ->perpage() + $loop->index + 1 }}</a></td>
                            {{-- <td class="fw-bold">{{ $review->product->title['ru'] }}</td> --}}
                            <td class="fw-bold">{{ $review->comment['ru'] ?? '--'  }}</td>
                            @if( $review->status == 1 ){
                                <td class="fw-bold">Activ</td>
                            }
                            @else{
                                <td class="fw-bold">No activ</td>
                            }
                            @endif
                            <td>
                                <div class="actions d-flex">
                                    <form class="" onclick="return myFunction();" action="{{ route('reviews.destroy', ['review' => $review->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-danger bg-transparent border-0 p-0 m-0 mb-3 fw-bolder"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    <a href="{{ route('reviews.edit', ['review' => $review]) }}" class="text-info fw-bolder ms-3"><i class="fa-solid fa-pen"></i></a>
                                </div>
                            </td>
                        </tr>
                        <!-- End of item -->
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{-- {!! $review->links() !!} --}}
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
