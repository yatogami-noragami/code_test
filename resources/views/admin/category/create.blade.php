@extends('admin.layouts.master')
@section('title', 'Add Category')

@section('content')

    <a href="{{ route('category#list') }}" class=" text-decoration-none text-dark">Categories
        <i class="fa-solid fa-angle-right"></i>
        <a href="{{ route('category#createPage') }}" class=" text-decoration-none text-primary">Add Categories</a>
    </a>

    <h5 class=" bg-secondary p-3 rounded my-3">Add Categories</h5>
    <div class="container">
        <div class="row">
            <div class=" col-lg-6 ">
                <form action="{{ route('category#create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- name --}}
                    <div class="my-3">
                        <label for="categoryName"class="form-label fw-bold fs-4">Category
                            <span class=" text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('categoryName') is-invalid @enderror"
                            value="{{ old('categoryName') }}" id="categoryName" name="categoryName"
                            placeholder="input name">

                        @error('categoryName')
                            <div class=" invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>



                    <a href="{{ route('category#list') }}" class="btn btn-outline-primary">Cancel</a>
                    <button class="btn btn-primary" type="submit">Save</button>

                </form>
            </div>
        </div>
    </div>

@endsection
