@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

					<div class="breadcrumb-title pe-3">Sub SubCategory Edit  </div>


					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Sub-SubCategory </li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->Edit Sub-SubCategory </h6>
				<hr/>

				<div class="row">


<!--   ------------ Edit Sub SubCategory Page -------- -->


			<div class="col-12">



				<div class="card border-top border-0 border-4 border-primary">

							<div class="card-body p-5">

								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-blanket me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Edit Sub-SubCategory  </h5>
								</div>

								<hr>

					 <form method="post" action="{{ route('subsubcategory.update') }}" >
	 	                  @csrf


	 	               <input type="hidden" name="id" value="{{ $subsubcategories->id }}">




								 <div class="form-group">

								<label for="inputFirstName" class="form-label">Category Select <span class="text-danger">*</span> </label>

								<div class="controls">
								<select name="category_id" class="form-control"  >
								<option value="" selected="" disabled="">Select Category</option>
								@foreach($categories as $category)
								<option value="{{ $category->id }}" {{ $category->id == $subsubcategories->category_id ? 'selected':'' }} >{{ $category->category_name_en }}</option>
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

							@foreach($subcategories as $subsub)
							<option value="{{ $subsub->id }}" {{ $subsub->id == $subsubcategories->subcategory_id ? 'selected':'' }} >{{ $subsub->subcategory_name_en }}</option>
							@endforeach

							</select>
							@error('subcategory_id')
							<span class="text-danger">{{ $message }}</span>
							@enderror
							</div>
							</div>







								<div class="form-group">
							<label for="inputFirstName" class="form-label">Sub-SubCategory English <span class="text-danger">*</span> </label>
								<div class="controls">
								<input type="text" name="subsubcategory_name_en" class="form-control" value="{{ $subsubcategories->subsubcategory_name_en }}" >
								@error('subsubcategory_name_en')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								</div>
								</div>




					<div class="form-group">Sub-SubCategory Hindi <span class="text-danger">*</span> </label>
						<div class="controls">
					 <input type="text" name="subsubcategory_name_hin" class="form-control"  value="{{ $subsubcategories->subsubcategory_name_hin }}">
				     @error('subsubcategory_name_hin')
					 <span class="text-danger">{{ $message }}</span>
					 @enderror
					  </div>
					</div>

					<br><br>




                   		<div class="text-xs-right">
	                  <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
						</div>


								</form>
							</div>
						</div>



			</div> <!-- End of Col-12 -->



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