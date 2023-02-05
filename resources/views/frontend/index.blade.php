@extends('frontend.layouts.main')
@section('content')
<div class="container-fluid">
    <div class="front-page px-5 py-5">
        <h1 class="text-center text-success">You are Welcome!</h1>

    </div>
</div>

@endsection


@section('style')
<style>
    .card{
        width: 18rem;
    }
</style>
@endsection
@section('script')
<script>
    document.getElementById('text').innerHTML='Welcome';
</script>
@endsection
