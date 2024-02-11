@extends('admin.layouts.master')
@section('title', 'Item List')

@section('content')

    <a href="{{ route('item#list') }}" class=" text-primary text-decoration-none">Items</a>

    <div class=" d-flex justify-content-end my-3">
        <a href="{{ route('item#createPage') }}" class="btn btn-primary">
            + Add Items
        </a>
    </div>




    {{-- table --}}
    <div class=" table-responsive my-5">
        @if (count($items) == 0)
            <h1>empty item list</h1>
        @else
            <table class="table table-hover">
                <thead class=" table-primary">
                    <tr>

                        <th scope="col">No</th>
                        <th scope="col">Items <i class="fa-solid fa-angle-down"></i></th>
                        <th scope="col">Category <i class="fa-solid fa-angle-down"></i></th>
                        <th scope="col">Description <i class="fa-solid fa-angle-down"></i></th>
                        <th scope="col">Price <i class="fa-solid fa-angle-down"></i></th>
                        <th scope="col" class=" text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($items as $item)
                        <tr>

                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->description }}</td>
                            <td>${{ $item->price }}</td>
                            <th scope="row" class=" d-flex justify-content-center">

                                {{-- view --}}
                                <a href="{{ route('item#viewPage', ['id' => $item->id]) }}" class="btn btn-primary me-2">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                {{-- edit --}}
                                <a href="{{ route('item#editPage', ['id' => $item->id]) }}" class="btn btn-success me-2">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                {{-- delete --}}
                                <a type="button" class="btn btn-danger ms-2 z-10" data-bs-toggle="modal"
                                    data-bs-target='#deleteModal{{ $item->id }}'>
                                    <i class="fa-solid fa-trash"></i>
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="deleteModal{{ $item->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModal{{ $item->id }}Label">
                                                    Alert!</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Delete item {{ $item->name }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="{{ route('item#delete', ['id' => $item->id]) }}" type="button"
                                                    class="btn btn-danger">Delete</a>
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

    {{--  pagination --}}
    <div class="row">
        <div class=" d-flex justify-content-end">

            <div class="custom-pagination">
                {{ $items->links() }}
            </div>
        </div>
    </div>

@endsection
