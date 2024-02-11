@extends('admin.layouts.master')
@section('title', 'View Item')

@section('content')

    <a href="{{ route('item#list') }}" class=" text-decoration-none text-dark">Categories
        <i class="fa-solid fa-angle-right"></i>
        <a href="{{ route('item#viewPage', $item->id) }}" class=" text-decoration-none text-primary">View
            Items</a>
    </a>

    <h5 class=" bg-secondary p-3 rounded my-3">View Items</h5>
    <div class="container">
        <div class="row">
            <div class=" col-lg-6">
                <div class="my-3">
                    <h4 class=" fw-bold p-2 rounded border text-primary">Name</h4>
                    <h6>{{ $item->name }}</h6>
                </div>

                <div class="my-3">
                    <h4 class=" fw-bold p-2 rounded border text-primary">Category</h4>
                    <h6>{{ $item->category }}</h6>
                </div>

                <div class="my-3">
                    <h4 class=" fw-bold p-2 rounded border text-primary">Price</h4>
                    <h6>{{ $item->price }}</h6>
                </div>

                <div class="my-3">
                    <h4 class=" fw-bold p-2 rounded border text-primary">Description</h4>
                    <h6>{{ $item->description }}</h6>
                </div>

                <div class="my-3">
                    <h4 class=" fw-bold p-2 rounded border text-primary">Photo</h4>
                    <img src="@if ($item->photo == null) {{ asset('storage/default.jpg') }}
                            @else
                            {{ asset('storage/' . $item->photo) }} @endif"
                        alt="" id="photoPreview" class="rounded mt-3 d-block mx-auto">
                </div>
            </div>
        </div>
    </div>

@endsection
