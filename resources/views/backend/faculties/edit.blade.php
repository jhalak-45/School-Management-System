@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper mt-0 px-2 py-2">
        <div class="content-header bg-white " style="border: 1px solid rgb(237, 237, 237)">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-2">
                    <div class="">
                        <h4 class="m-0">Edit Faculty</h4>
                    </div>
                    <div class="float-right">
                        <ol class="breadcrumb float-sm-right">
                          <a class="rounded-circle text-center " style="font-size:18px ;background:rgba(24, 69, 251, 0.3);height:30px; width:30px; border:1px solid rgb(217, 217, 217);color:rgb(6, 93, 255) ;align:center;" href="{{ route('faculty.index') }}"><i class="fa-solid fa-arrow-right"></i> </a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="index-box  px-2 bg-white shadow  mb-2  py-4 " style="min-height: 530px; border:1px solid rgb(241, 241, 241)">

            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <form action="{{route('faculty.update',$faculty->id)}}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="form-group col-md-9 col-sm-8 ">
                        <label for="faculty_name" class="form-label">Faculty Name:</label>
                        <input type="text" id="faculty_name"
                            name="faculty_name"class="form-control @error('faculty_name') is-invalid
                        @enderror"
                            placeholder="Enter faculty name" value="{{ $faculty->faculty_name }}">
                        @error('faculty_name')
                            <p class="text-danger px-2 my-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 col-sm-4">
                        <label for="faculty_id" class="form-label">Faculty Code:</label>
                        <input type="text" id="faculty_id" value="{{ $faculty->code,old('code') }} " name="code"
                            class="form-control @error('code')
                                is-invalid
                            @enderror"
                            placeholder="Enter faculty code">
                        @error('code')
                            <p class="text-danger px-2 my-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="editor" class="form-label">Description:</label>
                    <textarea id="editor" name="description" rows="14"
                        class="form-control @error('description')
                        is-invalid
                    @enderror"
                        placeholder="Enter faculty description">
                          {{$faculty->description, old('description') }}
                    </textarea>
                    @error('description')
                        <p class="text-danger px-2 my-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="faculty_img"
                        class="form-label ">Image:</label>
                    <input type="file" id="faculty_img" value="{{ old('image')}}"name="image" class="form-control @error('image')
                    is-invalid

                    @enderror" />
                    @error('image')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                    <img src="{{ asset('storage/'.$faculty->image)}}" alt="{{ $faculty->faculty_name}}" class="mt-4" height="150px" width="250px">
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-info">
                        Update faculty
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
