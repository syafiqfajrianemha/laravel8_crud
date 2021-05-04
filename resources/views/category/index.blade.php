@extends('layouts.main')

@section('title', 'Category')

@section('content')
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>

    <a href="{{ route('category.create') }}" class="btn btn-primary my-3">Add New Category</a>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success btn-sm">Edit</a>

                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline form-delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="3">Records not found</td>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endpush