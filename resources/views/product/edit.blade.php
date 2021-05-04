@extends('layouts.main')

@section('title', 'Edit Product')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card my-4 shadow">
                <h5 class="card-header">Edit Product</h5>
                <div class="card-body">
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $product->name }}">
                            @error('name')
                                <div id="name" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5">{{ $product->description }}</textarea>
                            @error('description')
                                <div id="description" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ $product->price }}">
                            @error('price')
                                <div id="price" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                <option selected disabled>Choose Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ($category->id == $product->category_id)
                                            selected
                                        @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div id="category_id" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="photo of {{ $product->name }}" class="img-thumbnail img-preview" width="100">
                                </div>
                                <div class="col-lg-9">
                                    <label for="image" class="form-label">Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="image" onchange="previewImage()">
                                </div>
                            </div>
                            @error('image')
                                <div id="image" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('product.index') }}" class="btn btn-danger">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            const fileImage = new FileReader();
            fileImage.readAsDataURL(image.files[0]);

            fileImage.onload = function (e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
@endpush