@extends('admin.layouts.app')

<div class="page-content" style='margin-top:100px'>
    <div class="content">
        <div class="page-title">
            <h4>Add Box</h4>
        </div>
        <!-- Add and delete form  -->
        <div class="page=form">
            <fieldset class="fieldset">

                <legend>
                    <h5>Add New Box</h5>
                </legend>
                <form action="{{route('boxes.store')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="fieldset-body">
                        <div class="row">

                            <div class="col-12"></div>
                 
                                <div class="col-md-6 form-group">
                                    <div class="control-container">
                                        <label class="control-lable">
                                            <span class="title">Box Title</span>
                                            <!-- To hide validate span add class "hide" -->
                                        </label>
                                        <input class="form-control" value="{{old('box_title')}}" name="box_title"
                                            placeholder="Box Title" required>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <div class="control-container">
                                        <label class="control-lable">
                                            <span class="title">Box Description</span>
                                            <!-- To hide validate span add class "hide" -->
                                        </label>
                                        <input class="form-control" value="{{old('box_description')}}"
                                            name="box_description" placeholder="Box description">
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <div class="control-container" style="padding:12px">
                                        <label class="control-lable">
                                            <span class="title">Price</span>
                                            <!-- To hide validate span add class "hide" -->
                                        </label>
                                        <input type="number" step="0.0001" value="{{old('price')}}" class="form-control"
                                            name="price" placeholder="price" required>
                                    </div>
                                </div>
                                {{-- <div id="DynamicInputsWrapperProdaut" class="col-md-12 form-group control-container" >  --}}
                                    {{-- <div style="display: inline-block;"  class="col-md-1 form-group">
                                        <a id="AddMoreFieldProduct" class="extra-fields-customer addbutton"><i class="fas fa-plus"></i></a>
                                    </div>
                                    <div style="display: inline-block;" class="col-md-3 form-group" >
                                        <div class="control-container">
                                            <label class="control-lable">
                                                <span class="title">Main Category</span>
                                                <!-- To hide validate span add class "hide" -->
                                            </label>
                                            <select id="main_category_0" name="main_category" class="form-control mt-2" required>
                                                <option value="">Please select a category</option>
                                                @foreach($productMainCategory as $main)
                                                <option value="{{$main->id}}">{{$main->title}} </option>
                                                @endforeach
    
                                            </select>
                                        </div>
                                    </div>
    
    
                                    <div style="display: inline-block;" class="col-md-3 form-group " >
                                        <div class="control-container">
                                            <label class="control-lable">
                                                <span class="title">Sub Category</span>
                                                <!-- To hide validate span add class "hide" -->
                                            </label>
                                            <select id="sub_category_0" name="sub_category" class="form-control mt-2" required>
                                                <option value="">please select sub Category</option>
    
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div style="display: inline-block;" class="col-md-3 form-group" >
                                        <div class="control-container">
                                            <label class="control-lable">
                                                <span class="title">Product</span>
                                                <!-- To hide validate span add class "hide" -->
                                            </label>
                                            <select multiple id="product_0"  name="product_ids[]" class="form-control mt-2" required>
                                                <option value="">Please select a Product</option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}">{{$product->product_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                {{-- </div> --}}
                                {{-- <div class="new_product"></div> --}}
                    
                                


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
{{-- <script type="text/javascript">
    (function($, window, document) {
        $(document).ready(function() {
            var idCount = 1;
            var MaxInputs       = 100; //maximum extra input boxes allowed
            var InputsWrapper   = $("#DynamicInputsWrapperProdaut"); //Input boxes wrapper ID
            var AddButton       = $("#AddMoreFieldProduct"); //Add button ID

            var FieldCount = InputsWrapper.children('.form-group').length; //initlal text box count
            //on add input button click
            $(AddButton).click(function (e) {
               
                //max input box allowed
                if(FieldCount <= MaxInputs) {
                    //add input box
                    $(InputsWrapper).append('<div id="DynamicInputsWrapperProdaut" class="col-md-12 form-group control-container" ><div style="display: inline-block;" class="col-md-3 form-group" ><div class="control-container"><label class="control-lable"><span class="title">Main Category</span></label><select id="main_category_'+idCount+'" name="main_category" class="form-control mt-2" required> <option value="">Please select a category</option> @foreach($productMainCategory as $main)<option value="{{$main->id}}">{{$main->title}} </option>@endforeach</select></div></div> <div style="display: inline-block;" class="col-md-3 form-group " ><div class="control-container"><label class="control-lable"><span class="title">Sub Category</span></label><select id="sub_category_'+idCount+'" name="sub_category" class="form-control mt-2" required><option value="0">please select sub Category</option></select></div> </div><div style="display: inline-block;" class="col-md-3 form-group" > <div class="control-container"> <label class="control-lable"> <span class="title">Product</span></label><select id="product_'+idCount+'"  name="product_ids[]" class="form-control mt-2" required> <option value="0">Please select a Product</option></select></div></div> <a href="#" class="removeThisInputBox btn table-action-btn text-danger">Remove</a> </div>');
                    

                    FieldCount++; //text box added ncrement
                    idCount++;
                    // Delete the "add"-link if there is 3 fields.
                    if(FieldCount >= MaxInputs)
                        AddButton.attr('disabled', true);
                }
                return false;
            });

            $("body").on("click",".removeThisInputBoxProduct", function(e){ //user click on remove text
                $(this).closest('.control-container').remove(); //remove text box
                FieldCount--;
                AddButton.attr('disabled', false);
                return false;
            })
        });
    }(window.jQuery, window, document));
</script> --}}
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

{{-- <script>
    var count = 0;
    
    $(document).on("change", '#main_category_'+count, function() {
        debugger
        var sub_categoryUrl = "{{ url('admin/api/subCategories')}}";

        $.get(sub_categoryUrl, {
            
                option: $(this).val()
            },
            function(data) {
                
                var model = $('#sub_category_'+count);
                
                model.empty();
                model.append("<option>Select  subcategory</option>");
                $.each(data, function(index, element) {
                    model.append("<option value='" + element.id + "'>" + element.title + "</option>");
                });
                count++;
    });
            }
        )
</script> --}}
{{-- <script>

    $(document).on("change", '#sub_category', function() {

    var productUrl = "{{ url('admin/api/products')}}";

    $.get(productUrl, {
            option: $(this).val()
        },
        function(data) {
            
            var model = $('#product');
            model.empty();
            model.append("<option>Select product</option>");
            $.each(data, function(index, element) {
                model.append("<option value='" + element.id + "'>" + element.product_name + "</option>");
            });
        }
    );
    }); 
</script> --}}
