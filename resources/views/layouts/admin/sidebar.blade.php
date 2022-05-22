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
<link rel="stylesheet" href="{{ asset('css/all.min.css')}}">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"><i  class='bx bx-menu' id="header-toggle"></i> <i class="fas fa-bell" style="margin:10px"></i></div>
       
        <div class="header_img"> <img src="" alt="profile logo"> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="{{route('admin.index')}}" class="nav_logo nav_link active"><i class='bx bx-grid-alt nav_icon'></i> <span class="nav_logo-name">Dashboard</span> </a>
                <div class="nav_list"> 
                    <a href="{{route('users.index')}}" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> 
                    <a href="{{route('product.index')}}" class="nav_link"> <i class="fas fa-store"></i> <span class="nav_name">Store</span> </a> 
                    <a href="#" class="nav_link"> <i class="fas fa-shopping-bag"></i> <span class="nav_name">Orders</span> </a> 
                    <a href="{{route('maincategory.index')}}" class="nav_link"> <i class="fas fa-layer-group"></i><span class="nav_name">Main Category</span></a> 
                    <a href="{{route('subcategory.index')}}" class="nav_link"> <i class="fas fa-cubes"></i> <span class="nav_name">SubCategory</span></a> 
                    <a href="{{route('unit.index')}}" class="nav_link"> <i class="fas fa-balance-scale-right"></i> <span class="nav_name">Units</span></a> 
                    <a href="{{route('promocodes.index')}}" class="nav_link"><i class="fas fa-percent"></i> <span class="nav_name">Promocodes</span></a> 
                    <a href="{{route('messages.index')}}" class="nav_link"> <i class="fas fa-comments"></i> <span class="nav_name">Messages</span></a> 


                    
                </div>
            </div> 
            
                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                    @csrf
                                            
                  <a href="{{ route('logout') }}" class="nav_link"> <button style="background-color:transparent; border:none"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </button> </a>
                </form>
        </nav>
    </div>
