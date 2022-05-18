@extends('layouts.app')

<div class="page-content" style='margin-top:100px'>
    <div class="content">
        <div class="page-title">
            <h4>{{$categories->title}}</h4>
        </div>
        <!-- Add and delete form  -->
        <div class="page=form">
            <fieldset class="fieldset">
                <form action="{{route('maincategory.update',$categories->id)}}" method="POST"
                    enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
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
                                    <input class="form-control" name="category_name" value="{{$categories->title}}"
                                        placeholder="Category Name" required>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Category Image</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    @if($categories->image != null)
                                    <img style="width:100px" src="{{asset($categories->image)}}" alt="">
                                    @endif
                                    <input type="file" name="category_img" class="form-control mt-2" accept="image/*">
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Description</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <input class="form-control" name="category_description"
                                        value="{{$categories->description}}" placeholder="Category description"
                                        required>
                                </div>
                            </div>

                        </div>

                        <div class="action-row">
                            <button class="btn btn-primary">Save</button>

                        </div>
                    </div>
                </form>
            </fieldset>

        </div>
    </div>
</div>