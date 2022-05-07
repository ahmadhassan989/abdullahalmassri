@extends('layouts.admin.sidebar')

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
                                                                                <option value="0" >Please select a category</option>
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
                                    <input class="form-control" value="{{old('product_name')}}" name="product_name" placeholder="Product Name" required>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                            <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Product Description</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <input class="form-control" value="{{old('product_description')}}" name="product_description" placeholder="Product description" >
                                </div>
                            </div> 
                            <div class="col-md-6 form-group">
                            <div class="control-container" style="padding:12px">
                                    <label class="control-lable">
                                        <span class="title">Price</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <input type="number" step="0.0001"  value="{{old('price')}}" class="form-control" name="price" placeholder="price" required>
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

                            <div class="col-md-11 form-group customer_records">
                                <div class="control-container ">
                                    <label class="control-lable">
                                        <span class="title">Product Images</span>
                                    </label>
                                    <input type="file" name="product_img" value="{{old('price')}}" class="form-control mt-2" accept="image/*">
                                </div>
                                
                            </div>
                            <div class ="col-md-1 form-group">
                                <a class="extra-fields-customer addbutton"><i class="fa-solid fa-plus"></i></a>
                            </div>
                            
                            <div class="customer_records_dynamic"></div>
                            </div>
                        <div class="action-row">
                            <button class="btn btn-primary" >Save</button>
                            <a href="{{route('product.index')}}" class="btn btn-light">Cancel</a>

                            
                        </div>
                    </div>
                </form>
                </fieldset>
                
            </div>
        </div>
    </div>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    

        $('.extra-fields-customer').click(function() {
        $('.customer_records').clone().appendTo('.customer_records_dynamic');
        $('.customer_records_dynamic .customer_records').addClass('single remove');
        $('.single .extra-fields-customer').remove();
        $('.single').append('<a href="#" class="remove-field btn table-action-btn text-danger">Remove</a>');
        $('.customer_records_dynamic > .single').attr("class", "remove");

        $('.customer_records_dynamic input').each(function() {
            var count = 0;
            var fieldname = $(this).attr("name");
            $(this).attr('name', fieldname + count);
            count++;
        });

        });

        $(document).on('click', '.remove-field', function(e) {
        $(this).parent('.remove').remove();
        e.preventDefault();
        }); 
        </script>

        <script>
            $(document).on("change", '#main_category', function () {
              
                var sub_categoryUrl = "{{ url('api/subCategories')}}";
               
                $.get(sub_categoryUrl,
                        {option: $(this).val()},
                        function (data) {
                            var model = $('#sub_category');
                            model.empty();
                            model.append("<option>Select  subcategory</option>");
                            $.each(data, function (index, element) {
                                model.append("<option value='" + element.id + "'>" + element.title + "</option>");
                            });
                        }
                );
            });
        </script>

<script src="https://kit.fontawesome.com/3da5cff3a5.js" crossorigin="anonymous"></script> 
