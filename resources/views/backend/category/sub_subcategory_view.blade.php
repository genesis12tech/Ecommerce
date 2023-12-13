@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

					<div class="breadcrumb-title pe-3">Sub SubCategory List <span class="badge bg-primary"> {{ count($subsubcategory) }} </span> </div>


					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Sub SubCategory</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">ALL Sub SubCategory</h6>
				<hr/>

				<div class="row">



			<div class="col-8">



				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
								<th>Category </th>
								<th>SubCategory Name</th>
								<th>Sub-Subcategory English </th>
								<th>Action</th>
									</tr>
								</thead>

								<tbody>

	 @foreach($subsubcategory as $item)
	 <tr>
		<td> {{ $item['category']['category_name_en'] }}  </td>
		<td>{{ $item['subcategory']['subcategory_name_en'] }}</td>
		 <td>{{ $item->subsubcategory_name_en }}</td>
		<td width="30%">
 <a href="{{ route('subsubcategory.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="bx bxs-edit"></i> </a>

 <a href="{{ route('subsubcategory.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
 	<i class="bx bxs-trash"></i></a>
		</td>

	 </tr>
	  @endforeach



								</tbody>
								<tfoot>
									<tr>
								<th>Category </th>
								<th>SubCategory Name</th>
								<th>Sub-Subcategory English </th>
								<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div> <!-- End of card -->



			</div> <!-- End of Col-8 -->


<!--   ------------ Add Sub Category Page -------- -->


			<div class="col-4">



				<div class="card border-top border-0 border-4 border-primary">

							<div class="card-body p-5">

								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-blanket me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Add Sub-SubCategory </h5>
								</div>

								<hr>

					 <form method="post" action="{{ route('subsubcategory.store') }}" >
	 	                  @csrf




								 <div class="form-group">

								<label for="inputFirstName" class="form-label">Category Select <span class="text-danger">*</span> </label>

								<div class="controls">
								<select name="category_id" class="form-control"  >
								<option value="" selected="" disabled="">Select Category</option>
								@foreach($categories as $category)
								<option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
								@endforeach
								</select>
								@error('category_id')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								</div>

								</div>



							<div class="form-group">
						<label for="inputFirstName" class="form-label">SubCategory Select <span class="text-danger">*</span> </label>

							<div class="controls">
							<select name="subcategory_id" class="form-control"  >
							<option value="" selected="" disabled="">Select SubCategory</option>

							</select>
							@error('subcategory_id')
							<span class="text-danger">{{ $message }}</span>
							@enderror
							</div>
							</div>







								<div class="form-group">
							<label for="inputFirstName" class="form-label">Sub-SubCategory English <span class="text-danger">*</span> </label>
								<div class="controls">
								<input type="text" name="subsubcategory_name_en" class="form-control" >
								@error('subsubcategory_name_en')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								</div>
								</div>




					<div class="form-group">Sub-SubCategory Hindi <span class="text-danger">*</span> </label>
						<div class="controls">
					 <input type="text" name="subsubcategory_name_hin" class="form-control" >
				     @error('subsubcategory_name_hin')
					 <span class="text-danger">{{ $message }}</span>
					 @enderror
					  </div>
					</div>

					<br><br>




                   		<div class="text-xs-right">
	                  <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
						</div>


								</form>
							</div>
						</div>



			</div> <!-- End of Col-4 -->



		</div> <!-- End of Row -->








			</div>
		</div>




 <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
    </script>





@endsection