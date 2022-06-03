@extends('admin.layouts.app')
<style>
    .btn{
        float: right;
    }
</style>

 <div class="page-content" style='margin-top:100px'>
        <div class="content">
            <div class="page-title">
                <h4>Products</h4>
            </div>

            <div class="action-row">
                    <a href ="{{route('product.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
                </div>


            <div class="page-list">
                <h5 class="form-group">List Of Products</h5>
                <div class="table-responsive">
		

		<div class="container">
			<div class="content">
				<!-- <div class="row">

					<div class="col-4">
						<div class="btn-group submitter-group float-right">
							<div class="input-group-prepend">
								<div class="input-group-text">Status</div>
							</div>
							<select class="form-control status-dropdown">
								<option value="">All</option>
								
							</select>
						</div>
					</div>
				</div> -->
			</div>
			<table id="example" class="table">
				<thead>
					<tr>
                        <th>Product Name</th>
                        <th>Product Main Category</th>
                        <th>Product "Pric/Unit"</th>
                        <th>Product SKU</th>
                        <th class="th-actions">Actions </th>
                    </tr>
				</thead>
				<tbody>

                @foreach($products as $product) 
                                <tr>
                                    <td>
                                        <span class="td-data"> {{$product->product_name}} </span>
                                    </td>
                                    <td>
                                        <span class="td-data">
                                            {{$product->mainCategory->title}}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="td-data">
                                            {{$product->price}}/{{$product->unit->unit}}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="td-data">
                                            {{$product->sku}}
                                        </span>
                                    </td>
                                    
                                    <td class="td-actions-group">
                                        <div class="actions">
                                            <a href="{{route('product.edit',$product->product_slug)}}" class="table-action-btn" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            
                                            <button style="margin: 0 -45px;" class="btn table-action-btn text-danger Click-here" ><i class="fas fa-trash-alt"></i></button>
                                                <!-- pop-up -->
                                                <div class="custom-model-main">
                                                        <div class="custom-model-inner">        
                                                        <div class="close-btn">×</div>
                                                            <div class="custom-model-wrap">
                                                                <div class="pop-up-content-wrap">
                                                                    <form action="{{route('product.destroy',$product->product_slug)}}" method="POST" enctype="multipart/form-data">
                                                                        {{ csrf_field() }}    
                                                                        <input name="_method" type="hidden" value="DELETE"> 
                                                                        <strong>Confirm action</strong>
                                                                        <p>Are you sure you want to delete this product?</p>                                                        
                                                                        <button  class="btn btn-danger">Sure</button>  
                                                                    </form>                                             
                                                                </div>
                                                            </div>
                                                        </div>  
                                                        <div class="bg-overlay"></div>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
           
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
		</div>

