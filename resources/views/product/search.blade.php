@extends('layouts.main')

@section('title', 'Product')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
@endpush

@section('content')
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>

    <div class="d-flex my-3 justify-content-between">
        <a href="{{ route('product.create') }}" class="btn btn-primary">Add New Product</a>
        <form action="{{ route('product.search') }}" method="GET">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" name="keyword" placeholder="Search product">
            </div>
        </form>
        <a href="{{ route('product.index') }}" class="btn btn-info text-white"><i class="fas fa-sync-alt"></i></a>
    </div>

    <div class="table-responsive" id="table-container">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <th scope="row">{{ ++$no }}</th>
                        <td>
                            <img src="{{ asset('images/' . $product->image) }}" alt="photo of {{ $product->name }}" width="100">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>IDR {{ number_format($product->price, 0, '.', '.') }}</td>
                        <td>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary btn-sm">Detail</a>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success btn-sm">Edit</a>

                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline form-delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="5">Records not found</td>
                @endforelse
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endpush