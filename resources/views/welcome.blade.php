@extends('layouts.app')

@section('content')
    <!-- Header-->
    <header>
        <div class=" px-0 px-lg-0 my-0">
            {{-- <img class="card-img-top" :src="'/images/siteImages/header.jpg'" alt="..." /> --}}
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <products :products="{{ $products }}"></products>

    </section>
    <!-- Footer-->
@endsection
