@extends('layouts.main')

@section('title', 'Create Category')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card my-4 shadow">
                <h5 class="card-header">Create Category</h5>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}">
                            @error('name')
                                <div id="name" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('category.index') }}" class="btn btn-danger">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection