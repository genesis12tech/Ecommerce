@extends('admin.admin_master')

@section('admin')

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

					<div class="breadcrumb-title pe-3">Brands </div>


					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Edit BRAND</h6>
				<hr/>

				<div class="row">






<!--   ------------ Add Brand Page -------- -->


			<div class="col-12">



				<div class="card border-top border-0 border-4 border-primary">

							<div class="card-body p-5">

								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-blanket me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Edit BRAND</h5>
								</div>

								<hr>

					 <form method="post" action="{{ route('brand.update',$brand->id) }}" enctype="multipart/form-data">
	 	              @csrf

	 	              <input type="hidden" name="id" value="{{ $brand->id }}">
	            <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">




								 <div class="form-group">

								<label for="inputFirstName" class="form-label">Brand Name English <span class="text-danger">*</span> </label>

								<div class="controls">

								<input type="text"  name="brand_name_en" class="form-control" value="{{ $brand->brand_name_en }}" >
								@error('brand_name_en')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								</div>


								</div>





								<div class="form-group">


							<label for="inputFirstName" class="form-label">Brand Name Hindi<span class="text-danger">*</span> </label>


								<div class="controls">
								<input type="text" name="brand_name_hin" class="form-control" value="{{ $brand->brand_name_hin }}" >
								@error('brand_name_hin')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								</div>
								</div>




					<div class="form-group">
						<h5>Brand Image <span class="text-danger">*</span></h5>
						<div class="controls">
					 <input type="file" name="brand_image" class="form-control" >
				     @error('brand_image')
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