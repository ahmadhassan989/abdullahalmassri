@extends('layouts.app')
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
                                    {{$promocode->quantity}}
                                </span>
                            </td>
                            <td>
                                <span class="td-data">
                                    {{$promocode->expires_at}}
                                </span>
                            </td>

                            <td class="td-actions-group">
                                <div class="actions">
                                    <a href="{{route('promocodes.edit',$promocode->id)}}" class="table-action-btn"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>


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