@extends('admin.admin_master')

@section('admin')

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

					<div class="breadcrumb-title pe-3">SubCategory Edit</div>


					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit SubCategory</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Edit SubCategory</h6>
				<hr/>

				<div class="row">


<!--   ------------ Edit Sub Category Page -------- -->


			<div class="col-12">



				<div class="card border-top border-0 border-4 border-primary">

							<div class="card-body p-5">

								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-blanket me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Edit SubCategory</h5>
								</div>

								<hr>

					<form method="post" action="{{ route('subcategory.update') }}" >
	 	                  @csrf


	 	                <input type="hidden" name="id" value="{{ $subcategory->id }}">




								 <div class="form-group">

								<label for="inputFirstName" class="form-label">Category Select <span class="text-danger">*</span> </label>

								<div class="controls">
								<select name="category_id" class="form-control"  >
								<option value="" selected="" disabled="">Select Category</option>

								@foreach($categories as $category)
								<option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected': ''}}  >{{ $category->category_name_en }}</option>

								@endforeach
								</select>
								@error('category_id')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								</div>
								</div>


								<div class="form-group">
							<label for="inputFirstName" class="form-label">SubCategory English <span class="text-danger">*</span> </label>
								<div class="controls">
								<input type="text" name="subcategory_name_en" class="form-control" value="{{ $subcategory->subcategory_name_en }}" >
								@error('subcategory_name_en')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								</div>
								</div>




					<div class="form-group">
						<label for="inputFirstName" class="form-label">SubCategory Hindi <span class="text-danger">*</span> </label>
						<div class="controls">
					 <input type="text" name="subcategory_name_hin" class="form-control" value="{{ $subcategory->subcategory_name_hin }}" >
				     @error('subcategory_name_hin')
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



			</div> <!-- End of Col-4 -->



		</div> <!-- End of Row -->








			</div>
		</div>










@endsection