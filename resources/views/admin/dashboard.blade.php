@extends('admin.layouts.app')

<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
@section('content')
<div class="main-container" id="container">

            <div class="overlay"></div>
            <div class="search-overlay"></div>
            
            <!--  BEGIN CONTENT AREA  -->
            <div id="content" class="main-content">
                <div class="layout-px-spacing">
    
    
                    <div class="row layout-top-spacing">
                        
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="row widget-statistic">
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12 layout-spacing">
                                            <div class="widget widget-one_hybrid widget-followers">
                                                <div class="widget-heading">
                                                    <div class="w-title">
                                                        <div class="w-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                                        </div>
                                                        <div class="">
                                                            <p class="w-value">{{$users}}</p>
                                                            <h5 class="">Users</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content">    
                                                    <div class="w-chart">
                                                        <div id="hybrid_followers"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12 layout-spacing">
                                            <div class="widget widget-one_hybrid widget-followers">
                                                <div class="widget-heading">
                                                    <div class="w-title">
                                                        <div class="w-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>                                                        </div>
                                                        <div class="">
                                                            <p class="w-value">{{$orders}}</p>
                                                            <h5 class="">Orders</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content">    
                                                    <div class="w-chart">
                                                        <div id="hybrid_followers"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12 layout-spacing">
                                            <div class="widget widget-one_hybrid widget-referral">
                                                <div class="widget-heading">
                                                    <div class="w-title">
                                                        <div class="w-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>                                                        </div>
                                                        <div class="">
                                                            <p class="w-value">{{$pending}}</p>
                                                            <h5 class="">Pending Orders</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content">    
                                                    <div class="w-chart">
                                                        <div id="hybrid_followers1"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                    </div>
                                </div>

         

                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <div class="widget widget-table-two">
        
                                    <div class="widget-heading">
                                        <h5 class="">Recent Orders</h5>
                                    </div>
        
                                    <div class="widget-content">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th><div class="th-content">Order id</div></th>
                                                        <th><div class="th-content">Client Name</div></th>
                                                        <th><div class="th-content">Total Cost</div></th>
                                                        <th><div class="th-content">Order Date</div></th>
                                                        <th><div class="th-content">Order Status</div></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 
                                                    <tr>
                                                        <td> <div class="td-content"> 1 </div></td>
                                                        <td><div class="td-content"> Asala </div></td>
                                                        <td><div class="td-content"> 120$ </div></td>
                                                        <td><div class="td-content"> 21-03-2023 </div></td>
                                                        <td><div class="td-content"> <span class="badge badge-danger ">New</span></div></td>
                                                    </tr>
        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
            
                    
                    </div>
    
                </div>

            </div>
            <!--  END CONTENT AREA  -->
    
        </div>
@endsection
