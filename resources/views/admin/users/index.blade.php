@extends('admin.layouts.app')
<style>
.btn {
    float: right;
}
</style>

<div class="page-content" style='margin-top:100px'>
    <div class="content">
        <div class="page-title">
            <h4>users</h4>
        </div>

        <div class="page-list">
            <h5 class="form-group">List Of users</h5>
            <div class="table-responsive">


                <div class="container">
                    <div class="content">

                    </div>
                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Phone</th>
                                <th class="th-actions">Actions </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <span class="td-data"> {{$user->name}} </span>
                                </td>
                                <td>
                                    <span class="td-data">
                                        {{$user->email}}
                                    </span>
                                </td>
                                <td>
                                    <span class="td-data">
                                        {{$user->phone}}
                                    </span>
                                </td>
                                <td class="td-actions-group">
                                    <div class="actions">
                                        <a href="{{route('users.show',$user->id)}}" class="table-action-btn"
                                            title="Edit">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <button style="margin: 0 -45px;"
                                            class="btn table-action-btn text-danger Click-here"><i
                                                class="fas fa-trash-alt"></i></button>
                                        <!-- pop-up -->
                                        <div class="custom-model-main">
                                            <div class="custom-model-inner">
                                                <div class="close-btn">×</div>
                                                <div class="custom-model-wrap">
                                                    <div class="pop-up-content-wrap">
                                                        <form action="{{route('users.destroy',$user->id)}}"
                                                            method="POST" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <strong>Confirm action</strong>
                                                            <p>Are you sure you want to delete account?</p>
                                                            <button class="btn btn-danger">Sure</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-overlay"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
