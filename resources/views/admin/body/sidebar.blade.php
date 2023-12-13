@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();

@endphp



<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('backend/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">JC Brand</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>


			<!--navigation-->
			<ul class="metismenu" id="menu">

				<li class=" {{($route == 'dashboard')? 'active':''}} ">
					<a href="{{ url('admin/dashboard') }}" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>

				</li>


				<li class=" {{($prefix == '/brand')?'active':''}} ">
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Brands</div>
					</a>
					<ul>
						<li class=" {{($route == 'all.brand')?'active':''}} "> <a href=" {{route('all.brand')}} "><i class="bx bx-right-arrow-alt"></i>All Brand</a>
						</li>

					</ul>
				</li>




				<li class=" {{ ($prefix == '/category')?'active':'' }}  ">
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Category</div>
					</a>
					<ul>
						<li class=" {{ ($route == 'all.category')? 'active':'' }} "> <a href=" {{ route('all.category') }} "><i class="bx bx-right-arrow-alt"></i>All Category</a>
						</li>


						<li class=" {{ ($route == 'all.subcategory')? 'active':'' }} "> <a href=" {{ route('all.subcategory') }} "><i class="bx bx-right-arrow-alt"></i>All SubCategory</a>
						</li>


						<li class=" {{ ($route == 'all.subsubcategory')? 'active':'' }} "> <a href=" {{ route('all.subsubcategory') }} "><i class="bx bx-right-arrow-alt"></i>All Sub->SubCategory</a>
						</li>

					</ul>
				</li>



				<li class="menu-label">UI Elements</li>

				<li>
					<a href="widgets.html">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Widgets</div>
					</a>
				</li>


				<li class="{{ ($prefix == '/product')?'active':'' }}  ">
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Products</div>
					</a>
					<ul>
						<li class="{{ ($route == 'add-product')? 'active':'' }}"> <a href="{{ route('add-product') }}"><i class="bx bx-right-arrow-alt"></i>Add Products</a>
						</li>
						<li class="{{ ($route == 'manage-product')? 'active':'' }}"> <a href="{{ route('manage-product') }}"><i class="bx bx-right-arrow-alt"></i>Manage Products</a>
						</li>

					</ul>
				</li>


			</ul>
			<!--end navigation-->
		</div>