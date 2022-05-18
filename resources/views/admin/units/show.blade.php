   @extends('layouts.app')

   <div class="page-content" style='margin-top:100px'>
       <div class="content">
           <div class="page-title">
               <h4>{{$unit->unit}}</h4>
           </div>
           <!-- Add and delete form  -->
           <div class="page=form">
               <fieldset class="fieldset">
                   <form action="{{route('unit.update',$unit->id)}}" method="POST" enctype="multipart/form-data">
                       <input name="_method" type="hidden" value="PUT">
                       {{ csrf_field() }}
                       <div class="fieldset-body">
                           <div class="row">

                               <div class="col-12"></div>
                               <div class="col-md-4 form-group">
                                   <div class="control-container">
                                       <label class="control-lable">
                                           <span class="title">Unit Name</span>
                                           <!-- To hide validate span add class "hide" -->
                                       </label>
                                       <input class="form-control" name="unit_name" value="{{$unit->unit}}"
                                           placeholder="Unit Name" required>
                                   </div>
                               </div>



                               <div class="action-row">
                                   <button class="btn btn-primary">Update</button>
                                   <!-- <a "></a> -->
                                   <a href="{{route('unit.index')}}" class="btn btn-light">Cancel</a>
                               </div>
                           </div>
                   </form>
               </fieldset>

           </div>
       </div>
   </div>