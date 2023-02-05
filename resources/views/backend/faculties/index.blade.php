@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper mt-0 px-2 py-2">
        <div class="content-header bg-white " style="border: 1px solid rgb(237, 237, 237)">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-2">
                    <div class="">
                        <h4 class="m-0 h4">All Faculties</h4>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('faculty.create') }}" style="font-size: 16px;" class="btn-sm btn-primary">Add
                            New</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="index-box px-2 bg-white  table-responsive py-4 mb-2"
            style="min-height: 530px; border:1px solid rgb(241, 241, 241)">
            @php
                $total = $faculties->count();
            @endphp

            @if ($total > 0)
                <table class="table  text-capitalize align-middle table-hover"
                    id="myTable">
                    <thead class="w-100">
                        <tr>
                            <th>S.N.</th>
                            <th>Image</th>
                            <th>Code</th>
                            <th>Faculty</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($faculties as $faculty)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-lowercase py-0">
                                    <img src="{{ asset('storage/' . $faculty->image) }}"
                                        class="rounded-circle"height="50px" width="50px"
                                        alt="{{ $faculty->faculty_name }}">
                                </td>
                                <td valign="middle">{{ $faculty->code }}</td>
                                <td>{{ $faculty->faculty_name }}</td>
                                @php
                                    $date = $faculty->created_at;
                                @endphp
                                <td class="text-lowercase">{{ $date->diffForHumans() }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('faculty.edit', $faculty->id) }}" class="btn-primary btn-sm ml-1"><i
                                            class="fa-solid fa-pen"></i></a>

                                    <button type="button" class="btn-info btn-sm ml-1 border-0" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop-{{ $faculty->id }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade  bd-example-modal-lg" id="staticBackdrop-{{ $faculty->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">
                                                        {{ $faculty->faculty_name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body ">
                                                    {!! $faculty->description !!}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-sm border-0 ml-1 btn-danger" data-toggle="modal"
                                        data-target="#exampleModalCenter-{{ $faculty->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter-{{ $faculty->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">

                                                <div class="modal-body table-borderless rounded-0">
                                                    <div class="alert text-danger delete-warning">
                                                        <i class="fa-regular fa-circle-xmark"></i>

                                                    </div>
                                                    <h4 class="h4 text-center">Confirm Delete!</h4>
                                                    <p class="text-lowercase text-center ">Are you sure you want to delete?</p>
                                                </div>
                                                <div class="modal-footer mt-0">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('faculty.delete', $faculty) }}"
                                                        enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class=" ml-1 btn-danger border-0  btn btn-danger">
                                                            Yes,Delete it.
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else
                <div class="py-5 px-auto empty-box w-100">
                    <div class="empty-img text-center mb-3">
                        <img src="{{ asset('assets/img/images.png') }}" alt="faculties empty">
                    </div>
                    <h3 class="text-center h4">Results Not Found !!!</h3>
                </div>
            @endif

        </div>
        <div class="pagination">
            {{ $faculties->links() }}
        </div>
    </div>
@endsection
