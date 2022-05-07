 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Butcher</title>

<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/all.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="{{ asset('css/sidemenu.css')}}">

<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="{{ asset('css/sidemenu.css')}}">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
<!-- MDB -->
<link  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"><i  class='bx bx-menu' id="header-toggle"></i> <i class="fa-solid fa-bell" style="margin:10px"></i></div>
       
        <div class="header_img"> <img src="" alt="profile logo"> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo nav_link active"><i class='bx bx-grid-alt nav_icon'></i> <span class="nav_logo-name">Dashboard</span> </a>
                <div class="nav_list"> 
                    <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a> 
                    <a href="#" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> 
                    <a href="{{route('product.index')}}" class="nav_link"> <i class="fa-solid fa-store"></i> <span class="nav_name">Store</span> </a> 
                    <a href="#" class="nav_link"> <i class="fa-solid fa-bag-shopping"></i> <span class="nav_name">Orders</span> </a> 
                    <a href="{{route('maincategory.index')}}" class="nav_link"> <span class="nav_name">Main Category</span></a> 
                    <a href="{{route('subcategory.index')}}" class="nav_link"> <span class="nav_name">SubCategory</span></a> 
                    <a href="{{route('unit.index')}}" class="nav_link"> <span class="nav_name">Units</span></a> 
               
                    
                </div>
            </div> 
            <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
<script src="https://kit.fontawesome.com/5f90913cde.js" crossorigin="anonymous"></script>   

<!-- MDB -->
@extends('layouts.admin.scripts')
<script src="{{ asset('js/sidemenu.js')}}"></script>
