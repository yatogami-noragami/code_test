@extends('admin.layouts.master')
@section('title', 'View Category')

@section('content')

    <a href="{{ route('category#list') }}" class=" text-decoration-none text-dark">Categories
        <i class="fa-solid fa-angle-right"></i>
        <a href="{{ route('category#viewPage', $category->id) }}" class=" text-decoration-none text-primary">View
            Categories</a>
    </a>

    <h5 class=" bg-secondary p-3 rounded my-3">View Categories</h5>
    <div class="container">
        <div class="row">
            <div class=" col-lg-6">
                <div class="my-3">
                    <h4 class=" fw-bold p-2 rounded border">Name</h4>
                    <h6>{{ $category->name }}</h6>
                </div>
            </div>
        </div>
    </div>

@endsection
