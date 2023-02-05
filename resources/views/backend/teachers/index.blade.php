@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper mt-0 px-2 py-2">
        <div class="content-header bg-white " style="border: 1px solid rgb(237, 237, 237)">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-2">
                    <div class="">
                        <h4 class="m-0 h4">All Teachers</h4>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('teachers.create') }}" style="font-size: 16px;" class="btn-sm btn-primary">Add
                            New</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="index-box px-2 bg-white  table-responsive py-2 mb-2"
            style="min-height: 530px; border:1px solid rgb(241, 241, 241)">
            @php
                $total = $teachers->count();
            @endphp

            @if ($total > 0)
                <table class="table  text-capitalize align-middle table-hover" id="myTable">
                    <thead class="w-100">
                        <tr>
                            <th>S.N.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>ID</th>
                            <th>Faculty</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($teachers as $teacher)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-lowercase py-0">
                                    <img src="{{ asset('storage/' . $teacher->image) }}"
                                        class="rounded-circle"height="50px" width="50px" alt="{{ $teacher->name }}">
                                </td>
                                <td>{{ $teacher->name }}</td>
                                <td valign="middle">{{ $teacher->teacher_id }}</td>
                                <td>{{ $teacher->faculty->faculty_name }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ $teacher->contact_number }}</td>
                                @php
                                    $date = $teacher->created_at;
                                @endphp
                                <td class="text-lowercase">{{ $date->diffForHumans() }}</td>
                                <td>

                                    <button type="button" class="btn btn-sm ml-1 border-0" data-placement="top"
                                        title="Manage" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop-{{ $teacher->id }}" style="font-size: 20px">
                                        <i class='bx bx-dots-vertical-rounded'></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade  bd-example-modal-lg" id="staticBackdrop-{{ $teacher->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <a href="{{ route('teachers.edit', $teacher->id) }}"
                                                        class="btn-primary btn-sm text-white ml-1"><i
                                                            class="fa-solid fa-pen mr-1"></i>Edit</a>
                                                    <button type="button" class="btn-sm border-0 ml-1 btn-danger"
                                                        data-toggle="modal"
                                                        data-target="#exampleModalCenter-{{ $teacher->id }}">
                                                        <i class="fa-solid fa-trash mr-1"></i>Delete
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalCenter-{{ $teacher->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">

                                                                <div class="modal-body table-borderless border-0 rounded-0">
                                                                    <div class="alert text-danger delete-warning">
                                                                        <i class="fa-regular fa-circle-xmark"></i>

                                                                    </div>
                                                                    <h4 class="h4 text-center">Confirm Delete!</h4>
                                                                    <p class="text-lowercase text-center h6">Are
                                                                        you
                                                                        sure
                                                                        you want to
                                                                        delete?</p>
                                                                </div>
                                                                <div class="modal-footer mt-0">
                                                                    <button type="button" class="btn btn-outline-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <form
                                                                        action="{{ route('teachers.destroy', $teacher) }}"
                                                                        enctype="multipart/form-data" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class=" ml-1 btn-danger border-0  btn btn-danger">
                                                                            Yes,Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body  py-2">
                                                    <div class="card rounded-0 py-2 px-0">
                                                        <div class="row justify-content-center  card-header px-2">
                                                            <div class="col-md-6 details px-2">
                                                                <div class="form-group mb-0 mt-0 py-0">
                                                                    <label for="name" class="form-label">name:</label>
                                                                    <p class="text-capitalize" id="name">
                                                                        {{ $teacher->name }}</p>
                                                                </div>
                                                                <div class="form-group mb-0 mt-0 py-0">
                                                                    <label for="name" class="form-label">ID:</label>
                                                                    <p class="text-capitalize" id="name">
                                                                        {{ $teacher->teacher_id }}</p>
                                                                </div>
                                                                <div class="form-group mb-0 mt-0 py-0">
                                                                    <label for="name" class="form-label">Post:</label>
                                                                    <p class="text-capitalize" id="name">
                                                                        {{ $teacher->academic_post }}</p>
                                                                </div>
                                                                <div class="form-group py-0">
                                                                    <label for="email" class="form-label">Email:</label>
                                                                    <p class="email text-lowercase">{{ $teacher->email }}
                                                                    </p>
                                                                </div>
                                                                <div class="form-group mb-0 mt-0 py-0">
                                                                    <label for="cont" class="form-label py-0">contact
                                                                        Number:</label>
                                                                    <p class="text-capitalize" id="cont">
                                                                        {{ $teacher->contact_number }}</p>
                                                                </div>
                                                                <div class="form-group mb-0 mt-0 py-0">
                                                                    <label for="fac"
                                                                        class="form-label py-0">Faculty:</label>
                                                                    <p class="text-capitalize" id="fac">
                                                                        {{ $teacher->faculty->faculty_name }}</p>
                                                                </div>

                                                            </div>
                                                            <div class="image col-md-6">
                                                                <img src="{{ asset('storage/' . $teacher->image) }}"
                                                                    alt="{{ $teacher->name }}" height="250px"
                                                                    width="250px">
                                                            </div>

                                                        </div>

                                                        <div class="teachers-qualification card-body px-1 mt-2"
                                                            style="border-top:2px solid red">
                                                            <label class="form-label">Qualification:</label>
                                                            <div class="desc px-2 py-3">
                                                                {!! $teacher->qualification !!}

                                                            </div>

                                                        </div>


                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
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
        <div class="pagination" style="font-size: 18px">
            {{ $teachers->links() }}
        </div>
    </div>
@endsection
