@extends('admin.layouts.app')
<style>
.btn {
    float: right;
}
</style>

<div class="page-content" style='margin-top:100px'>
    <div class="content">
        <div class="page-title">
            <h4>Promocodes</h4>
        </div>

        <div class="action-row">
            <a href="{{route('promocodes.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
        </div>


        <div class="page-list">
            <h5 class="form-group">List Of promocodes</h5>
            <div class="table-responsive">

                <table id="example" class="table">
                    <thead>
                        <tr>
                            <th>PromoCode</th>
                            <th>Reward</th>
                            <th>User Count</th>
                            <th>Expires_at</th>
                            <th class="th-actions">Actions </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($promocodes as $promocode)
                        <tr>
                            <td>
                                
                                <span class="td-data"> {{$promocode->code}} </span>
                            </td>
                            <td>
                                <span class="td-data">
                                    {{$promocode->reward}}
                                </span>
                            </td>
                            <td>
                                <span class="td-data">
                                    {{$promocode->remaining_quantity}}/{{$promocode->total_quantity}}
                                </span>
                            </td>
                            <td>
                                <span class="td-data">
                                    {{$promocode->expires_at}}
                                </span>
                            </td>

                            <td class="td-actions-group">
                                <div class="actions">
                                    <a href="{{route('promocodes.edit',$promocode->code)}}" class="table-action-btn"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button style="margin: 0 -45px;" class="btn table-action-btn text-danger Click-here" ><i class="fas fa-trash-alt"></i></button>
                                    <!-- pop-up -->
                                    <div class="custom-model-main">
                                            <div class="custom-model-inner">        
                                            <div class="close-btn">×</div>
                                                <div class="custom-model-wrap">
                                                    <div class="pop-up-content-wrap">
                                                        <form action="{{route('promocodes.destroy',$promocode->id)}}" method="POST" enctype="multipart/form-data">
                                                            {{ csrf_field() }}    
                                                            <input name="_method" type="hidden" value="DELETE"> 
                                                            <strong>Confirm action</strong>
                                                            <p>Are you sure you want to delete this promocode?</p>                                                        
                                                            <button  class="btn btn-danger">Sure</button>  
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