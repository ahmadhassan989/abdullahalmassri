@extends('layouts.admin.sidebar')
<style>

</style>
<div class="page-content" style='margin-top:100px'>
        <div class="content">
            <div class="page-title">
                <h4>{{$product->product_name}}</h4>
            </div>
            <!-- Add and delete form  -->
            <div class="page=form">
                <fieldset class="fieldset">
                    
                    <form action="{{route('product.update',$product->product_slug)}}" method="POST" enctype="multipart/form-data">
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
                                            @if($main->id == $product->main_category_id)
                                                <option selected value="{{$main->id}}">{{$main->title}}</option>
                                            @else
                                                <option value="{{$main->id}}">{{$main->title}} </option>
                                            @endif
                                            {{$main->id}}

                                        @endforeach

                                    </select>
                                    {{$product->main_product_id}}
                                </div>
                            </div>


                            <div class="col-md-6 form-group">
                                <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Sub Category</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <select id="sub_category" name="sub_category" class="form-control mt-2" required>
                                        <option value="{{$product->sub_category_id}}">{{$product->subCategory->title}} </option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                            <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Product Name</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <input class="form-control" value="{{$product->product_name}}" name="product_name" placeholder="Product Name" required>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                            <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Product Description</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <input class="form-control" name="Product_description" value="{{$product->product_description}}" placeholder="Product description" >
                                </div>
                            </div> 
                            <div class="col-md-6 form-group">
                            <div class="control-container" style="padding:12px">
                                    <label class="control-lable">
                                        <span class="title">Price</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <input class="form-control" name="price" value="{{$product->price}}" placeholder="price" required>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Unit</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <select name="unit" class="form-control mt-2" required>
                                        <option value="">{{$product->unit->unit}}</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-11 form-group customer_records">
                                <div class="control-container ">
                                    <label class="control-lable">
                                        <span class="title">Product Images</span>
                                    </label>
                                    @if($product->img_url != null)
                                       <img style="width:100px" src="{{asset($product->img_url)}}" alt="">
                                    @endif
                                    <input type="file" name="product_img" class="form-control mt-2" accept="image/*">
                                </div>
                                
                            </div>
                            <div class ="col-md-1 form-group">
                                <a class="extra-fields-customer addbutton"></a>
                            </div>
                            
                            <div class="customer_records_dynamic"></div>
                            </div>
                        <div class="action-row">
                            <button class="btn btn-primary" >Save</button>
                            
                        </div>
                    </div>
                </form>
                </fieldset>
                
            </div>
        </div>
    </div>


    @extends('layouts.admin.scripts')
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
