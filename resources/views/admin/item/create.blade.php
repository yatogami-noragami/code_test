@extends('admin.layouts.master')
@section('title', 'Add Item')

@section('content')

    <a href="{{ route('item#list') }}" class=" text-decoration-none text-dark">Items
        <i class="fa-solid fa-angle-right"></i>
        <a href="{{ route('item#createPage') }}" class=" text-decoration-none text-primary">Add Items</a>
    </a>

    <h5 class=" bg-secondary p-3 rounded my-3">Add Items</h5>
    <div class="container">

        <form action="{{ route('item#create') }}" method="post" enctype="multipart/form-data" class="row">
            <div class=" col-lg-6 ">
                <h3>Item Information</h3>

                @csrf
                {{-- name --}}
                <div class="my-3">
                    <label for="itemName"class="form-label fw-bold fs-4">Item Name
                        <span class=" text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error('itemName') is-invalid @enderror"
                        value="{{ old('itemName') }}" id="itemName" name="itemName" placeholder="input name">

                    @error('itemName')
                        <div class=" invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- category --}}
                <div class="my-3">
                    <label for="itemCategory"class="form-label fw-bold fs-4">Select Category
                        <span class=" text-danger">*</span>
                    </label>

                    <select class="form-select @error('itemCategory') is-invalid @enderror" id="itemCategory"
                        name="itemCategory" aria-label="">
                        <option selected disabled>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>


                    @error('itemCategory')
                        <div class=" invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{--  price --}}
                <div class="my-3">
                    <label for="itemPrice"class="form-label fw-bold fs-4">Price
                        <span class=" text-danger">*</span>
                    </label>
                    <input type="number" class="form-control @error('itemPrice') is-invalid @enderror"
                        value="{{ old('itemPrice') }}" id="itemPrice" name="itemPrice" placeholder="Enter Price">

                    @error('itemPrice')
                        <div class=" invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- description --}}
                <div class="my-3">
                    <label for="itemDescription"class="form-label fw-bold fs-4">Description
                        <span class=" text-danger">*</span>
                    </label>
                    <textarea name="itemDescription" id="itemDescription" rows="5" class=" form-control">{{ old('itemDescription') }}</textarea>

                    @error('itemDescription')
                        <div class=" invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                {{-- photo --}}
                <div class="my-3">
                    <label for="itemPhoto" class="form-label fw-bold fs-4">Item Photo
                        <span class=" text-danger">*</span>
                    </label>

                    <input type="file" id="itemPhoto" name="itemPhoto"
                        class="form-control imageInput @error('itemPhoto') is-invalid @enderror"
                        onchange="handleFileSelect(event)">

                    @error('itemPhoto')
                        <div class=" invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <img src="" alt="" id="photoPreview" class=" mt-3 d-block mx-auto rounded">
                </div>

                <a href="{{ route('item#list') }}" class="btn btn-outline-primary">Cancel</a>
                <button class="btn btn-primary" type="submit">Save</button>
            </div>



        </form>

    </div>

@endsection
