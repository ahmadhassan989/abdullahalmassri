@extends('layouts.app')

<div class="page-content" style='margin-top:100px'>
    <div class="content">
        <div class="page-title">
            <h4>Add Product</h4>
        </div>
        <!-- Add and delete form  -->
        <div class="page=form">
            <fieldset class="fieldset">

                <legend>
                    <h5>Add New Product</h5>
                </legend>
                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
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
                                    <select id="main_category" name="main_category" class="form-control mt-2" required>
                                        <option value="0">Please select a category</option>
                                        @foreach($productMainCategory as $main)
                                        <option value="{{$main->id}}">{{$main->title}} </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6 form-group">
                                <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Sub Category</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <select id="sub_category" name="sub_category" class="form-control mt-2" required>
                                        <option value="">please select sub Category</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Product Name</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <input class="form-control" value="{{old('product_name')}}" name="product_name"
                                        placeholder="Product Name" required>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Product Description</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <input class="form-control" value="{{old('product_description')}}"
                                        name="product_description" placeholder="Product description">
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
                            <div class="col-md-6 form-group">
                                <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Unit</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <select name="product_unit" class="form-control mt-2" required>
                                        @foreach($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->unit}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                <div class="col-md-1 form-group">
                                    <a id="AddMoreField" class="extra-fields-customer addbutton"><i class="fas fa-plus"></i></a>
                                </div>
                            


                            <div id="DynamicInputsWrapper" class="col-md-11 form-group customer_records">
                                
                                <div class="control-container ">
                                    <label class="control-lable">
                                        <span class="title">Product Images</span>
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

@section('scripts')
<script src="{{ asset('js/jquery-3.2.1.js')}}"></script>
<script type="text/javascript">
    (function($, window, document) {
        $(document).ready(function() {
            var MaxInputs       = 20; //maximum extra input boxes allowed
            var InputsWrapper   = $("#DynamicInputsWrapper"); //Input boxes wrapper ID
            var AddButton       = $("#AddMoreField"); //Add button ID

            var FieldCount = InputsWrapper.children('.form-group').length; //initlal text box count

            //on add input button click
            $(AddButton).click(function (e) {
                //max input box allowed
                if(FieldCount <= MaxInputs) {
                    //add input box
                    $(InputsWrapper).append('<div class="control-container "> <label class="control-lable"> <span class="title">Product Images</span> </label><input type="file" name="imgs[]" id="field_1" value="" class="form-control mt-2" accept="image/*"><a href="#" class="removeThisInputBox btn table-action-btn text-danger">Remove</a></div>');
                    

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

<script>
$(document).on("change", '#main_category', function() {

    var sub_categoryUrl = "{{ url('admin/api/subCategories')}}";

    $.get(sub_categoryUrl, {
            option: $(this).val()
        },
        function(data) {
            var model = $('#sub_category');
            model.empty();
            model.append("<option>Select  subcategory</option>");
            $.each(data, function(index, element) {
                model.append("<option value='" + element.id + "'>" + element.title + "</option>");
            });
        }
    );
});
</script>

@endsection