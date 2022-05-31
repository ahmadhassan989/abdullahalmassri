@extends('admin.layouts.app')

<style>
.btn {
    float: right;
}
</style>
<div class="page-content" style='margin-top:100px'>
    <div class="content">
        <div class="page-title">
            <h4>Categories</h4>
        </div>

        <div class="action-row">
            <a href="{{route('maincategory.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
        </div>


        <div class="page-list">
            <h5 class="form-group">List Of Categories</h5>
            <div class="table-responsive">
                <table id="example" class="table">
                    <thead>
                        <tr>
                            <th> Name</th>
                            <th> Description</th>
                            <th class="th-actions">Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mainCategories as $category)
                        <tr>
                            <td>
                                <span class="td-data"> {{$category->title}} </span>
                            </td>
                            <td>
                                <span class="td-data">
                                    {{$category->description}}
                                </span>
                            </td>

                            <td class="td-actions-group">
                                <div class="actions">
                                    <a href="{{route('maincategory.edit',$category->id)}}" class="table-action-btn"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button style="margin: 0 -45px;"
                                        class="Click-here btn table-action-btn text-danger "><i
                                            class="fas fa-trash-alt"></i></button>
                                    <!-- pop-up -->
                                    <div class="custom-model-main">
                                        <div class="custom-model-inner">
                                            <div class="close-btn">×</div>
                                            <div class="custom-model-wrap">
                                                <div class="pop-up-content-wrap">
                                                    <form action="{{route('maincategory.destroy',$category->id)}}"
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