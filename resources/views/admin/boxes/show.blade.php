@extends('admin.layouts.app')

<div class="page-content" style='margin-top:100px'>
    <div class="content">
        <div class="page-title">
            <h4> {{$box->title}}</h4>
        </div>
        <!-- Add and delete form  -->
        <div class="page=form">
            <fieldset class="fieldset">

                <legend>
                    <h5>Edit {{$box->title}}</h5>
                </legend>
                <form action="{{route('boxes.update',$box->id)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">

                    <div class="fieldset-body">
                        <div class="row">

                            <div class="col-12"></div>
                 
                                <div class="col-md-6 form-group">
                                    <div class="control-container">
                                        <label class="control-lable">
                                            <span class="title">Box Title</span>
                                            <!-- To hide validate span add class "hide" -->
                                        </label>
                                        <input class="form-control" value="{{$box->title}}" name="box_title"
                                            placeholder="Box Title" required>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <div class="control-container">
                                        <label class="control-lable">
                                            <span class="title">Box Description</span>
                                            <!-- To hide validate span add class "hide" -->
                                        </label>
                                        <input class="form-control" value="{{$box->description}}"
                                            name="box_description" placeholder="Box description">
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <div class="control-container" style="padding:12px">
                                        <label class="control-lable">
                                            <span class="title">Price</span>
                                            <!-- To hide validate span add class "hide" -->
                                        </label>
                                        <input type="number" step="0.0001" value="{{$box->price}}" class="form-control"
                                            name="price" placeholder="price" required>
                                    </div>
                                </div>
                         
                            
                                    <div style="display: inline-block;" class="col-md-3 form-group" >
                                        <div class="control-container">
                                            <label class="control-lable">
                                                <span class="title">Product</span>
                                                <!-- To hide validate span add class "hide" -->
                                            </label>
                                            <select multiple id="product_0"  name="product_ids[]" class="form-control mt-2" required>
                                                <option value="">Please select a Product</option>
                                                @foreach($products as $product)
                                                    <option  value="{{$product->id}}">{{$product->product_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                           
                    
                                


                                <div id="DynamicInputsWrapper" class="col-md-12 form-group customer_records">
                                    
                                   
                                    <div class="control-container " style="display: inline-block">
                                         <div class="col-md-1 form-group" style="display: inline-block">
                                        <a id="AddMoreField" class="extra-fields-customer addbutton"><i class="fas fa-plus"></i></a>
                                    </div>
                                        <label class="control-lable">
                                            <span class="title">Box Images</span>
                                        </label>
                                        <input type="file" name="imgs[]" id="field_1" value="" class="form-control mt-2"
                                            accept="image/*">
                                    </div>

                                </div>
                    

                                <div class="customer_records_dynamic"></div>
                        </div>
                            <div class="action-row">
                                <button class="btn btn-primary">Save</button>
                                <a href="{{route('product.index')}}" class="btn btn-light">Cancel</a>


                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>


<script src="{{ asset('js/jquery-3.2.1.js')}}"></script>

<script type="text/javascript">
    (function($, window, document) {
        $(document).ready(function() {
            var MaxInputs       = 100; //maximum extra input boxes allowed
            var InputsWrapper   = $("#DynamicInputsWrapper"); //Input boxes wrapper ID
            var AddButton       = $("#AddMoreField"); //Add button ID

            var FieldCount = InputsWrapper.children('.form-group').length; //initlal text box count

            //on add input button click
            $(AddButton).click(function (e) {
                //max input box allowed
                if(FieldCount <= MaxInputs) {
                    //add input box
                    $(InputsWrapper).append('<div class="control-container col-md-3" style="display: inline-block;" > <label class="control-lable"> <span class="title">Box Images</span> </label><input type="file" name="imgs[]" id="field_1" value="" class="form-control mt-2" accept="image/*"><a href="#" class="removeThisInputBox btn table-action-btn text-danger">Remove</a></div>');
                    

                    FieldCount++; //text box added ncrement

                    // Delete the "add"-link if there is 3 fields.
                    if(FieldCount >= MaxInputs)
                        AddButton.attr('disabled', true);
                }
                return false;
            });

            $("body").on("click",".removeThisInputBox", function(e){ //user click on remove text
                $(this).closest('.control-container').remove(); //remove text box
                FieldCount--;
                AddButton.attr('disabled', false);
                return false;
            })
        });
    }(window.jQuery, window, document));
    </script>



