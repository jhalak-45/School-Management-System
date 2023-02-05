@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper mt-0 px-2 py-2">
        <div class="content-header bg-white " style="border: 1px solid rgb(237, 237, 237)">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-2">
                    <div class="">
                        <h4 class="m-0">Edit Teacher</h4>
                    </div>
                    <div class="float-right">
                        <ol class="breadcrumb float-sm-right">
                            <a class="rounded-circle text-center "
                                style="font-size:18px ;background:rgba(24, 69, 251, 0.3);height:30px; width:30px; border:1px solid rgb(217, 217, 217);color:rgb(6, 93, 255) ;align:center;"
                                href="{{ route('teachers.index') }}"><i class="fa-solid fa-arrow-right"></i> </a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="index-box px-2 bg-white   py-4 mb-2" style="min-height: 530px; border:1px solid rgb(241, 241, 241)">
            <form action="{{ route('teachers.update',$teacher->id)}}" class="form" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="form-group  ">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name"
                        name="name"class="form-control @error('name') is-invalid
                        @enderror"
                        placeholder="Enter teacher's name" value="{{$teacher->name, old('name') }}">
                    @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row py-1">
                    <div class="form-group col-md-4">
                        <label for="faculty"
                            class="form-label @error('faculty_id')
                        is-invalid

                        @enderror">Faculty:</label>
                        <select class="form-select rounded-1 form-control" name="faculty_id">
                            <option selected>Choose academic Faculty</option>
                            @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->id }} "{{$teacher->faculty_id == $faculty->id ? 'selected' : ''}}>{{ $faculty->faculty_name }}</option>
                            @endforeach
                        </select>
                        @error('faculty_id')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="img" class="form-label ">Image:</label>

                        <input type="file" value="{{    old('image')}}"id="img" name="image"
                            class="form-control @error('image')
                        is-invalid

                        @enderror" />
                        <img src="{{asset('storage/'.$teacher->image)}}" class="mt-1" height="80px" width="80px"alt="{{$teacher->name}}">

                        @error('image')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="con" class="form-label">Contact Number:</label>
                        <input type="text"
                            class="form-control @error('contact_number')
                        is-invalid

                        @enderror"
                            name="contact_number" id="con" placeholder="Enter contact number" value="{{ $teacher->contact_number,old('contact_number')}}">
                        @error('contact_number')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row py-2">
                    <div class="form-group col-md-4">
                        <label for="post" class="form-label">Teacher's Post:</label>
                        <input type="text"
                            class="form-control @error('academic_post')
                        is-invalid

                        @enderror"name="academic_post"
                            id="post" placeholder="Enter academic post" value="{{$teacher->academic_post,    old('academic_post')}}">
                        @error('faculty_id')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tid" class="form-label">Teacher ID:</label>
                        <input type="text" id="tid" name="teacher_id" placeholder="Enter  ID"
                            value="{{ $teacher->teacher_id, old('teacher_id') }}"
                            class="form-control @error('teacher_id')
                                is-invalid
                            @enderror">
                        @error('teacher_id')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email" class="form-label ">Email:</label>
                        <input type="email" id="email" name="email" value="{{  $teacher->email,  old('email')}}" placeholder="Enter Email address"
                            class="form-control @error('email')
                        is-invalid

                        @enderror" />
                        @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>


                </div>

                <div class="form-group">
                    <label for="editor" class="form-label">Qualification:</label>
                    <textarea id="editor" name="qualification" height="400px"
                        class="form-control @error('qualification')
                        is-invalid
                    @enderror"placeholder="Enter qualification and details">
                        {{$teacher->qualification, old('qualification') }}
                    </textarea>

                </div>
                @error('description')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror

                <div class="form-group mt-4">
                    <button class="btn btn-info">
                        Update Teacher
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
