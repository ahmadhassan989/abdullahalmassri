@extends('layouts.admin.sidebar')
<style>
    .btn{
        float: right;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
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
								<option value="DRF">Draft</option>
								<option value="PCH">Pending Review</option>
								
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
                                                                        <p>Are you sure you want to delete account?</p>                                                        
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
        
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
    dataTable = $("#example").DataTable({
      "columnDefs": [
            {
            
                "visible": false
            }
        ]
      
    });
  

  
    $('.filter-checkbox').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      dataTable.column(1).search(searchTerms.join('|'), true, false, true).draw();
    });
  
    // $('.status-dropdown').on('change', function(e){
    //   var status = $(this).val();
    //   $('.status-dropdown').val(status)
    //   console.log(status)
    //   //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
    //   dataTable.column(7).search(status).draw();
    // })
});
        </script>
	</body>
</html>