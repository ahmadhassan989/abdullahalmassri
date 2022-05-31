@extends('admin.layouts.app')

@section('content')
<div class="page-content" style='margin-top:100px'>
        <div class="content">
            <div class="page-title">
                <h4>Add Category</h4>
            </div>
            <!-- Add and delete form  -->
            <div class="page=form">
               
                <fieldset class="fieldset">
                    
                    <legend>
                        <h5>Add New Category</h5>
                    </legend>
                    <form action="{{route('maincategory.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="fieldset-body">
                        <div class="row">
                    
                            <div class="col-12"></div>
                            <div class="col-md-6 form-group">
                            <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Category Name</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <input value="{{old('category_name')}}" class="form-control" name="category_name" placeholder="Category Name" required>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Category Image</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <input value="{{old('category_img')}}" type="file" name="category_img" class="form-control mt-2" accept="image/*">
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                            <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Description</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <input value="{{old('category_description')}}"  class="form-control" name="category_description" placeholder="Category description" required>
                                </div>
                            </div> 
                     
                            </div>

                        <div class="action-row">
                            <button class="btn btn-primary" >Save</button>
                            <!-- <a "></a> -->
                            <a href="{{route('maincategory.index')}}" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                </form>
                </fieldset>
                
            </div>
        </div>
    </div>
    @endsection