<div class="topnav">
	<div class="container-fluid">
		<nav class="navbar navbar-light navbar-expand-lg topnav-menu">
			<div class="collapse navbar-collapse" id="topnav-menu-content">
				<ul class="navbar-nav">
					<li class="nav-item dropdown {{ (request()->is('admin')) ? 'active' : '' }}">
						<a class="nav-link arrow-none" href="{{ route('home') }}" id="topnav-dashboard">
							<i class="mdi mdi-view-dashboard mr-2"></i>{{ __('messages.dashboard') }}
						</a>
					</li>
					<li class="nav-item dropdown {{ (request()->is('admin/user')  || request()->is('admin/user/add')) ? 'active' : '' }}">
						<a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-advanced" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-human mr-2"></i>{{ __('messages.user.manage') }}</a>
						<div class="dropdown-menu dropdown-menu-left" aria-labelledby="topnav-advanced">
							@can('user-list')
							<a href="{{ route('admin.user') }}" class="dropdown-item">{{ __('messages.user.manage') }}</a>
							@endcan
							@can('vendor-list')
							<a href="{{ route('admin.vendor') }}" class="dropdown-item">{{ __('messages.vendor.manage') }}</a>
							@endcan
						</div>
					</li>
					<li class="nav-item dropdown {{ (request()->is('admin/product')  || request()->is('admin/product/add')) ? 'active' : '' }}">
						<a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-advanced" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-bullseye mr-2"></i>{{ __('messages.manage_inventory') }}</a>
						<div class="dropdown-menu dropdown-menu-left" aria-labelledby="topnav-advanced">
							@can('product-list')
							<a href="{{ route('admin.product') }}" class="dropdown-item">{{ __('messages.product.manage') }}</a>
							@endcan
						</div>
					</li>
					<li class="nav-item dropdown {{ (request()->is('admin/role')  || request()->is('admin/role/add')) ? 'active' : '' }}">
						<a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-advanced" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-arrow-down-drop-circle-outline mr-2"></i>{{ __('messages.master') }}</a>
						<div class="dropdown-menu dropdown-menu-left" aria-labelledby="topnav-advanced">
							@can('role-list')
							<a href="{{ route('admin.role') }}" class="dropdown-item">{{ __('messages.role.manage') }}</a>
							@endcan
							@can('productcategory-list')
							<a href="{{ route('admin.productcategory') }}" class="dropdown-item">{{ __('messages.productcategory.manage') }}</a>
							@endcan
							@can('brand-list')
							<a href="{{ route('admin.brand') }}" class="dropdown-item">{{ __('messages.brand.manage') }}</a>
							@endcan
							@can('setting-list')
							<a href="{{ route('admin.setting') }}" class="dropdown-item">{{ __('messages.setting.manage') }}</a>
							@endcan
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>