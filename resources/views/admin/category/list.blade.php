@extends('admin.layouts.master')
@section('title', 'Category List')

@section('content')

    <a href="{{ route('category#list') }}" class=" text-primary text-decoration-none">Categories</a>


    <div class=" d-flex justify-content-end my-3">
        <a href="{{ route('category#createPage') }}" class="btn btn-primary">
            + Add Categories
        </a>
    </div>



    {{-- table --}}
    <div class=" table-responsive my-5">
        @if (count($categories) == 0)
            <h1>empty category list</h1>
        @else
            <table class="table table-hover">
                <thead class=" table-primary">
                    <tr>

                        <th scope="col">No</th>
                        <th scope="col">Categories <i class="fa-solid fa-angle-down"></i></th>
                        <th scope="col" class=" text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>

                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <th scope="row" class=" d-flex justify-content-center">

                                {{-- view --}}
                                <a href="{{ route('category#viewPage', ['id' => $category->id]) }}"
                                    class="btn btn-primary me-2">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                {{-- edit --}}
                                <a href="{{ route('category#editPage', ['id' => $category->id]) }}"
                                    class="btn btn-success me-2">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                {{-- delete --}}
                                <a type="button" class="btn btn-danger ms-2" data-bs-toggle="modal"
                                    data-bs-target='#deleteModal{{ $category->id }}'>
                                    <i class="fa-solid fa-trash"></i>
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1"
                                    aria-labelledby="deleteModal{{ $category->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModal{{ $category->id }}Label">Alert!
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Delete category {{ $category->name }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="{{ route('category#delete', ['id' => $category->id]) }}"
                                                    type="button" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </th>
                        </tr>
                    @endforeach



                </tbody>
            </table>
        @endif
    </div>

    {{-- pagination --}}
    <div class="row">
        <div class=" d-flex justify-content-end">

            <div class="custom-pagination">
                {{ $categories->links() }}
            </div>
        </div>
    </div>

@endsection
