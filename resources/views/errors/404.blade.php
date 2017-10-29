@extends('layout.master')
@section('title')
    404
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-sm-12">
            <div class="error_page"><img class="wow shake" src="images/error-img.png" alt="">
                <p><span>Ohh.....</span>Your Requested Page Could Not Be Found!</p>
                <a href="index.php">Home</a>
            </div>
        </div>
    </div>
@endsection