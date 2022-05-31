@extends('admin.layouts.app')

   <div class="page-content" style='margin-top:100px'>
       <div class="content">
           <div class="page-title">
               <h4>{{$categories->title}}</h4>
           </div>
           <!-- Add and delete form  -->
           <div class="page=form">
               <fieldset class="fieldset">
                   <form action="{{route('subcategory.update',$categories->id)}}" method="POST"
                       enctype="multipart/form-data">
                       <input name="_method" type="hidden" value="PUT">
                       {{ csrf_field() }}
                       <div class="fieldset-body">
                           <div class="row">

                               <div class="col-12"></div>
                               <div class="col-md-6 form-group">
                                   <div class="control-container">
                                       <label class="control-lable">
                                           <span class="title">Sub Category</span>
                                           <!-- To hide validate span add class "hide" -->
                                       </label>
                                       <select name="main_category" class="form-control mt-2" required>
                                           <option value="">select a Category</option>
                                           @foreach($mainCategories as $main)
                                           @if($main->id == $categories->main_category_id)
                                           <option value="{{$main->id}}" selected> {{$main->title}}</option>
                                           @else
                                           <option value="{{$main->id}}"> {{$main->title}}</option>
                                           @endif
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
                                       <input class="form-control" name="category_name" value="{{$categories->title}}"
                                           placeholder="Category Name" required>
                                   </div>
                               </div>

                               <div class="col-md-12 form-group">
                                   <div class="control-container">
                                       <label class="control-lable">
                                           <span class="title">Sub Category Description</span>
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