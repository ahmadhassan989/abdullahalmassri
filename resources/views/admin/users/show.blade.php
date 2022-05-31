@extends('admin.layouts.app')
<div class="page-content">
            <div class="content">
            <br> <br>
                <!-- Add and delete form  -->
                <div class="page=form">
                    <fieldset class="fieldset">
                        <div class="fieldset-body">
                            <div class="user-info">
                                <div class="user-img">
                                    <img src="{{asset('images/user.png')}}">
                                </div>
                                <div class="info">
                                    <h5>{{$user->name}}</h5>
                                    <p>{{$user->phone}}</p>
                                    <p>{{$user->email}}</p>
                                </div>

                                <div>
                                <form action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                                    <input name="_method" type="hidden" value="PUT">
                                    {{ csrf_field() }}
                                    <select class="form-control" name="status" id="status" onchange="this.form.submit()">
                                        <option @if($user->status == "1") selected @endif value="1">Active</option>
                                        <option @if($user->status == "0") selected @endif value="0">Deactive</option>
                                    </select>
                                </form>
                                </div>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Orders</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    <div class="page-list">


                                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                                            <div class="page-list">

                                                <h5 class="form-group">List Of Orders</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th> Order No.</th>
                                                                <th> Order Info</th>
                                                                <th> Deliver Address</th>
                                                                <th> Total Cost </th>
                                                                <th> Order Cost</th>
                                                                <th> Delivery Cost</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                                <td> <span class="td-data"> 554  </span>
                                                                </td>
                                                                <td>
                                                                    <span class="td-data">
                                                                <a class="btn btn-link" data-target="#orderInfoModal" data-toggle="modal">
                                                                    1Kg rice, 2Kg Tomate, 1 Pice Tea 250 G
                                                                </a>
                                                            </span>
                                                                </td>
                                                                <td>
                                                                    <span class="td-data">
                                                                25 El-salam St. Omman
                                                            </span>
                                                                </td>
                                                                <td>
                                                                    <span class="td-data">
                                                                125$
                                                            </span>
                                                                </td>
                                                                <td>
                                                                    <span class="td-data">
                                                                120$
                                                            </span>
                                                                </td>
                                                                <td>
                                                                    <span class="td-data">
                                                                5$
                                                            </span>
                                                                </td>
                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </fieldset>
                    </div>
                    </div>
                </div>