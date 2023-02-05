@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper mt-0 px-2 py-2">
        <div class="content-header bg-white " style="border: 1px solid rgb(237, 237, 237)">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-2">
                    <div class="">
                        <h4 class="m-0">New Student</h4>
                    </div>
                    <div class="float-right">
                        <ol class="breadcrumb float-sm-right">
                            <a class="rounded-circle text-center "
                                style="font-size:18px ;background:rgba(24, 69, 251, 0.3);height:30px; width:30px; border:1px solid rgb(217, 217, 217);color:rgb(6, 93, 255) ;align:center;"
                                href="{{ route('students.index') }}"><i class="fa-solid fa-arrow-right"></i> </a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="index-box px-2  bg-white   py-2 mb-2" style="min-height: 530px; border:1px solid rgb(241, 241, 241)">

            <form action="{{ route('students.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="information px-0">
                    <h5 class="h5 text-center text-white py-2"style="background-color: rgb(52, 58, 64,0.87)">Academic
                        Information</h5>
                </div>
                <div class="row py-3">
                    <div class="form-group col-md-4">
                        <label for="id" class="form-label ">Student ID:</label>
                        <input type="text" placeholder="Enter student ID" value="{{ old('student_id') }}"id="id"
                            name="student_id"
                            class="form-control @error('student_id')
                        is-invalid

                        @enderror" />
                        @error('student_id')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="faculty"
                            class="form-label @error('faculty_id')
                        is-invalid

                        @enderror">Faculty:</label>
                        <select class="form-select rounded-1 form-control" name="faculty_id">
                            <option selected>Choose academic Faculty</option>
                            @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                            @endforeach
                        </select>
                        @error('faculty_id')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="faculty"
                            class="form-label @error('faculty_id')
                        is-invalid

                        @enderror">Class:</label>
                        <select
                            class="form-select rounded-1 form-control @error('class_id')
                        is-invalid


                        @enderror"
                            name="class_id">
                            <option selected >Choose academic class</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                            @endforeach
                        </select>
                        @error('class_id')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row py-2">
                        <div class="form-group col-md-4">
                            <label for="reg" class="form-label ">Registration Number:</label>
                            <input type="input" placeholder="Enter registration number"
                                value="{{ old('reg_number') }}"id="reg" name="reg_number"
                                class="form-control @error('reg_number') is-invalid @enderror" />
                            @error('reg_number')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="form-group col-md-4">
                            <label for="roll" class="form-label ">Roll Number:</label>
                            <input type="text" placeholder="Enter roll number"
                                value="{{ old('roll_number') }}"id="roll" name="roll_number"
                                class="form-control @error('roll_number')
                        is-invalid
                        @enderror" />
                            @error('roll_number')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="information px-0">
                    <h4 class="h5 text-center  text-white py-2" style="background-color: rgb(52, 58, 64,0.87)">Personal
                        Information</h4>
                </div>
                <div class="row py-3">
                    <div class="form-group col-md-4">
                        <label for="nam" class="form-label">Student Name:</label>
                        <input type="text" id="nam"
                            name="student_name"class="form-control @error('student_name') is-invalid
                        @enderror"
                            placeholder="Enter student's name" value="{{ old('student_name') }}">
                        @error('student_name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="con" class="form-label">Contact Number:</label>
                        <input type="text"
                            class="form-control @error('contact_number')
                        is-invalid

                        @enderror"
                            name="contact_number" id="con" placeholder="Enter contact number"
                            value="{{ old('contact_number') }}">
                        @error('contact_number')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group col-md-4">
                        <label for="img" class="form-label ">Image:</label>
                        <input type="file" value="{{ old('image') }}"id="img" name="image"
                            class="form-control @error('image')is-invalid
                    @enderror" />
                        @if (Session::has('image_req'))

                                <p class="invalid-feedback">{!!Session::get('image_req') !!}</p>
                        @endif
                        @error('image')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="row py-3">
                    <div class="form-group col-md-4">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email"
                            name="email"class="form-control @error('email') is-invalid
                        @enderror"
                            placeholder="Enter student's email" value="{{ old('email') }}">
                        @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dob" class="form-label">Date of Birth:</label>
                        <input type="date" id="dob"
                            name="dob"class="form-control @error('dob') is-invalid
                        @enderror"
                            value="{{ old('dob') }}">
                        @error('dob')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="gender" class="form-label">Gender:</label>
                        <div class="d-flex px-2">
                            <div class="form-check">
                                <input
                                    class="form-check-input  @error('gender') is-invalid
                                  @enderror"
                                    type="radio" name="gender" id="flexRadioDefault1" value="male" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check ml-3">
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                    name="gender" id="flexRadioDefault2" value="female">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Female
                                </label>
                            </div>
                            <div class="form-check ml-3">
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                    name="gender" id="flexRadioDefault2" value="other">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Other
                                </label>
                            </div>

                        </div>
                        @error('gender')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror

                    </div>
                </div>
                <div class="row py-2">
                    <div class="form-group col-md-4">
                        <label for="pro" class="form-label">Province:</label>
                        <input type="text" id="pro" name="province" placeholder="Enter Province name"
                            class="form-control @error('province') is-invalid
                        @enderror"
                            value="{{ old('province') }}">
                        @error('province')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="district" class="form-label">District:</label>
                        <input type="text" id="district" name="district" placeholder="Enter district name"
                            class="form-control @error('district') is-invalid
                        @enderror"
                            value="{{ old('district') }}">
                        @error('district')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="mun" class="form-label">Municipality/Rural:</label>
                        <input type="text" placeholder="Enter local address" id="mun"
                            name="local_area"class="form-control @error('local_area') is-invalid
                        @enderror"
                            value="{{ old('local_area') }}">
                        @error('local_area')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="form-group ">
                    <label for="ad" class="form-label">Address:</label>
                    <input type="text" id="ad" name="address" placeholder="Enter full address"
                        class="form-control @error('address') is-invalid
                    @enderror"
                        value="{{ old('address') }}">
                    @error('address')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="information px-0">
                    <h4 class="h5 text-center text-white py-2" style="background-color: rgb(52, 58, 64,0.87)">Parent's
                        Information</h4>
                </div>
                <div class="row py-3">
                    <div class="form-group col-md-4">
                        <label for="name" class="form-label">Father's Name:</label>
                        <input type="text" id="fathers_name"
                            name="fathers_name"class="form-control @error('fathers_name') is-invalid
                        @enderror"
                            placeholder="Enter father's name" value="{{ old('fathers_name') }}">
                        @error('fathers_name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="name" class="form-label"> Email Address:</label>
                        <input type="email" id="parents_email"
                            name="parents_email"class="form-control @error('parents_email') is-invalid
                        @enderror"
                            placeholder="Enter email address" value="{{ old('parents_email') }}">
                        @error('parents_email')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="parents_contact_number" class="form-label"> Contact Number:</label>
                        <input type="number" id="parents_contact_number"
                            name="parents_contact_number"class="form-control @error('parents_contact_number') is-invalid
                        @enderror"
                            placeholder="Enter parent's contact number" value="{{ old('parents_contact_number') }}">
                        @error('parents_contact_number')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="row py-2">
                    <div class="form-group col-md-4">
                        <label for="fathers_occupation" class="form-label"> Father's occupation:</label>
                        <input type="text" id="fathers_occupation"
                            name="fathers_occupation"class="form-control @error('fathers_occupation') is-invalid
                        @enderror"
                            placeholder="Enter Father's occupation" value="{{ old('fathers_occupation') }}">
                        @error('fathers_occupation')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="mothers_name" class="form-label">Mother's Name:</label>
                        <input type="text" id="mothers_name"
                            name="mothers_name"class="form-control @error('mothers_name') is-invalid
                        @enderror"
                            placeholder="Enter mother's name" value="{{ old('mothers_name') }}">
                        @error('mothers_name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="mothers_occupation" class="form-label"> Mother's occupation:</label>
                        <input type="text" id="mothers_occupation"
                            name="mothers_occupation"class="form-control @error('mothers_occupation') is-invalid
                        @enderror"
                            placeholder="Enter Mother's occupation" value="{{ old('mothers_occupation') }}">
                        @error('mothers_occupation')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-info">
                        Save Student
                    </button>
                </div>
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
