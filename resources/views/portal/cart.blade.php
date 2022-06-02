@extends('layouts.app')

@section('content')
    <!-- Header-->

    <!-- Section-->
    <section class="py-5">

        <cart :products="{{json_encode($products)}}"></cart>

    </section>
    <!-- Footer-->
@endsection

