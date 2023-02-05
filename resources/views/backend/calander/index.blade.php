@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper mt-0 px-2">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 ">
                    <div class="col-sm-6">
                        <h1 class="m-0">Calender</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active "><a href="{{ url('/home/calander') }}">Calender</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="index-box table-responsive-sm   shadow  mb-2  "
            style="min-height: 530px; border:1px solid rgb(241, 241, 241)">
            <iframe src="https://www.hamropatro.com/widgets/calender-full.php" frameborder="0" scrolling="no"
                marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:100%; height:840px;"
                allowtransparency="true"></iframe>

        </div>

    </div>
@endsection
