@extends('layouts.main')

@section('title', $product->name . ' Detail')

@section('content')
    <div class="card my-4">
        <div class="row g-0">
            <div class="col-lg-6">
                <img src="{{ asset('images/' . $product->image) }}" alt="photo of {{ $product->name }}" width="500">
            </div>
            <div class="col-lg-6">
                <div class="card-body">
                    <h1 class="card-title">{{ $product->name }}</h1>
                    <hr>
                    <h4>IDR {{ number_format($product->price, 0, '.', '.') }}</h4>
                    <hr>
                    <p class="card-text">
                        {!! nl2br($product->description) !!}
                    </p>
                    <p class="text-muted">Category : {{ $product->category->name }}</p>

                    <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection