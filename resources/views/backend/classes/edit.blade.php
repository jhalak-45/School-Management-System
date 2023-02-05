@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper mt-0 px-2 py-2">
        <div class="content-header bg-white " style="border: 1px solid rgb(237, 237, 237)">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-2">
                    <div class="">
                        <h4 class="m-0">Edit Class</h4>
                    </div>
                    <div class="float-right">
                        <ol class="breadcrumb float-sm-right">
                          <a class="rounded-circle text-center " style="font-size:18px ;background:rgba(24, 69, 251, 0.3);height:30px; width:30px; border:1px solid rgb(217, 217, 217);color:rgb(6, 93, 255) ;align:center;" href="{{ route('classes.index') }}"><i class="fa-solid fa-arrow-right"></i> </a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="index-box table-responsive px-2 bg-white   py-4 mb-2"
            style="min-height: 530px; border:1px solid rgb(241, 241, 241)">
          @if (Session::has('success'))
                <div class="alert alert-primary alert-dismissible" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            <form action="{{route('classes.update',$class->id)}}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-9 col-sm-8 ">
                        <label for="name" class="form-label">Class Name:</label>
                        <input type="text" id="name"
                            name="class_name"class="form-control @error('class_name') is-invalid
                        @enderror"
                            placeholder="Enter class name" value="{{$class->class_name,old('class_name')}}">
                        @error('class_name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 col-sm-4">
                        <label for="class_id" class="form-label">Class Code:</label>
                        <input type="text" id="class_id" name="code" placeholder="Enter class code"
                            value="{{$class->code, old('code') }}"
                            class="form-control @error('code')
                                is-invalid
                            @enderror">
                        @error('code')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="faculty"
                            class="form-label ">Faculty:</label>
                        <select class="form-select rounded-1 form-control @error('faculty_id')
                        is-invalid

                        @enderror" name="faculty_id">
                            <option selected>Choose Faculty</option>
                            @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->id }}" {{$class->faculty_id == $faculty->id ? 'selected' : ''}}
                                >{{ $faculty->faculty_name }}</option>
                            @endforeach
                        </select>
                        @error('faculty_id')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-7">
                        <label for="img"
                            class="form-label">Image:</label>
                        <input type="file" id="img" name="image" class="form-control  @error('image')
                        is-invalid

                        @enderror" />
                        @error('image')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                        <img src="{{asset('storage/'.$class->image)}}" class="mt-2"alt="{{$class->class_name}}" height="150px" width="250px">
                    </div>

                </div>


                <div class="form-group">
                    <label for="editor" class="form-label">Description:</label>
                    <textarea id="editor" name="description" height="400px"
                        class="form-control @error('description')
                        is-invalid
                    @enderror"placeholder="Enter Class description">
                        {{ $class->description,old('description') }}
                    </textarea>

                </div>
                @error('description')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror

                <div class="form-group mt-5">
                    <button class="btn btn-info">
                        Update Class
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
