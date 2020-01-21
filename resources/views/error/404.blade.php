@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <img class="img-error" src="https://colorlib.com/wp/wp-content/uploads/sites/2/404-error-template-3.png" alt="error-page">
            <div class="route-back d-flex justify-content-center">
                <a href="{{route('back')}}" class="btn btn-danger">Go Back</a>
            </div>
        </div>  
    </div>
</div>
@endsection
