@extends('admin.admin_master')

@section('admin')


<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

					<div class="breadcrumb-title pe-3">Product List <span class="badge bg-primary"> {{ count($products) }} </span> </div>


					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Product</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">ALL Product </h6>
				<hr/>

				<div class="row">



			<div class="col-8">



				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
								<th>Image </th>
								<th>Product En</th>
								<th>Product Price </th>
								<th>Quantity </th>
								<th>Discount </th>
								<th>Status </th>
								<th>Action</th>
									</tr>
								</thead>

								<tbody>

	 @foreach($products as $item)
	 <tr>
		<td> <img src="{{ asset($item->product_thambnail) }}" style="width: 60px; height: 50px;">  </td>
		<td>{{ $item->product_name_en }}</td>
		 <td>{{ $item->selling_price }} $</td>
		 <td>{{ $item->product_qty }} Pic</td>

		 <td>
		 	@if($item->discount_price == NULL)
		 	<span class="badge bg-danger">No Discount</span>

		 	@else
		 	@php
		 	$amount = $item->selling_price - $item->discount_price;
		 	$discount = ($amount/$item->selling_price) * 100;
		 	@endphp
   <span class="badge bg-danger">{{ round($discount)  }} %</span>

		 	@endif



		 </td>

		 <td>
		 	@if($item->status == 1)
		 	<span class="badge bg-success"> Active </span>
		 	@else
           <span class="badge bg-danger"> InActive </span>
		 	@endif

		 </td>


		<td width="30%">
 <a href="{{ route('product.edit',$item->id) }}" class="btn btn-primary" title="Product Details Data"><i class="bx bxs-eye"></i> </a>

 <a href="{{ route('product.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="bx bxs-edit"></i> </a>

 <a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
 	<i class="bx bxs-trash"></i></a>

@if($item->status == 1)
 <a href="{{ route('product.inactive',$item->id) }}" class="btn btn-danger" title="Inactive Now"><i class="bx bsx-arrow-down"></i> </a>
	 @else
 <a href="{{ route('product.active',$item->id) }}" class="btn btn-success" title="Active Now"><i class="bx bxs-arrow-up"></i> </a>
	 @endif




		</td>

	 </tr>
	  @endforeach



								</tbody>
								<tfoot>
									<tr>
								<th>Image </th>
								<th>Product En</th>
								<th>Product Price </th>
								<th>Quantity </th>
								<th>Discount </th>
								<th>Status </th>
								<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div> <!-- End of card -->



			</div> <!-- End of Col-8 -->




		</div> <!-- End of Row -->








			</div>
		</div>










@endsection