@extends('layouts.admin.sidebar')

<div class="page-content" style='margin-top:100px'>
        <div class="content">
            <div class="page-title">
                <h4>Add Sub Category</h4>
            </div>
            <!-- Add and delete form  -->
            <div class="page=form">
                <!-- <a href="{{route('maincategory.store')}}">qqqqq</a> -->
                <fieldset class="fieldset">
                    
                    <legend>
                        <h5>Add New Sub Category</h5>
                    </legend>
                    <form action="{{route('subcategory.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="fieldset-body">
                        <div class="row">
                    
                            <div class="col-12"></div>
                            <div class="col-md-6 form-group">
                                <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Main Category</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <select name="main_category" class="form-control mt-2" required>
                                        <option value="">Select a Category</option>
                                        @foreach($mainCategories as $main)
                                            <option value="{{$main->id}}">{{$main->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                            <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Sub Category Name</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <input value="{{old('category_name')}}" class="form-control" name="category_name" placeholder="Sub Category Name" required>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                            <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Description</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <input  value="{{old('category_description')}}" class="form-control" name="category_description" placeholder="Sub Category Description" >
                                </div>
                            </div> 
                     
                            </div>

                        <div class="action-row">
                            <button class="btn btn-primary" >Save</button>
                            <!-- <a "></a> -->
                            <a href="{{route('subcategory.index')}}" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                </form>
                </fieldset>
                
            </div>
        </div>
    </div>
    @extends('layouts.admin.scripts')