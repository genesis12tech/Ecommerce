@extends('admin.admin_master')

@section('admin')

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

					<div class="breadcrumb-title pe-3">Category List</div>


					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Category</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Edit Category</h6>
				<hr/>

				<div class="row">





<!--   ------------ Edit Category Page -------- -->


			<div class="col-12">



				<div class="card ">

							<div class="card-body p-5">

								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-pencil me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Edit Category</h5>
								</div>



				<form method="post" action="{{ route('category.update',$category->id) }}" >
	 	                 @csrf



								 <div class="form-group">

								<label for="inputFirstName" class="form-label">Category English <span class="text-danger">*</span> </label>

								<div class="controls">

								<input type="text"  name="category_name_en" class="form-control" value="{{ $category->category_name_en }}" >
								@error('category_name_en')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								</div>


								</div>





								<div class="form-group">


							<label for="inputFirstName" class="form-label">Category Hindi <span class="text-danger">*</span> </label>


								<div class="controls">
								<input type="text" name="category_name_hin" class="form-control" value="{{ $category->category_name_hin }}" >
								@error('category_name_hin')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								</div>
								</div>




					<div class="form-group">
						<h5>Category Icon  <span class="text-danger">*</span></h5>
						<div class="controls">
					 <input type="text" name="category_icon" class="form-control" value="{{ $category->category_icon }}" >
				     @error('category_icon')
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










@endsection