<!-- sidebar menu -->
<style type="text/css">
  .svg-inline--fa{
    width: 0.75em !important;
  }
</style>
<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li class="{{ (request()->is('admin')) ? 'active' : '' }}"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>  <span>&nbsp;&nbsp;Dashboard</span></a></li>
      @can('user-list')
      <li class="{{ (request()->is('admin/user')  || request()->is('admin/user/add')) ? 'active' : '' }}"><a href="{{ route('admin.user') }}"><i class="fa fa-key"></i>  <span>&nbsp;&nbsp;{{ __('messages.user.manage') }}</span></a></li>
      @endcan
      @can('vendor-list')
      <li class="{{ (request()->is('admin/vendor')  || request()->is('admin/vendor/add')) ? 'active' : '' }}"><a href="{{ route('admin.vendor') }}"><i class="fa fa-key"></i>  <span>&nbsp;&nbsp;{{ __('messages.vendor.manage') }}</span></a></li>
      @endcan
      
      @can('product-list')
      <li class="{{ (request()->is('admin/product')  || request()->is('admin/product/add')) ? 'active' : '' }}"><a href="{{ route('admin.product') }}"><i class="fa fa-key"></i>  <span>&nbsp;&nbsp;{{ __('messages.product.manage') }}</span></a></li>
      @endcan
      <li class="{{ (request()->is('admin/user/changepassword')  || request()->is('admin/user/changepassword')) ? 'active' : '' }}"><a href="{{ route('admin.user.changepassword') }}"><i class="fa fa-key"></i>  <span>&nbsp;&nbsp;{{ __('messages.user.change_password') }}</span></a></li>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>&nbsp;&nbsp;Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('role-list')
              <li class="{{ (request()->is('admin/role') || request()->is('admin/role/add')) ? 'active' : '' }}"><a href="{{ route('admin.role') }}""><i class="fa fa-user-tag"></i>  <span>&nbsp;&nbsp;{{ __('messages.role.manage') }}</span></a></li>
            @endcan
            @can('productcategory-list')
              <li class="{{ (request()->is('admin/productcategory')  || request()->is('admin/productcategory/add')) ? 'active' : '' }}"><a href="{{ route('admin.productcategory') }}"><i class="fa fa-key"></i>  <span>&nbsp;&nbsp;{{ __('messages.productcategory.manage') }}</span></a></li>
            @endcan
            @can('brand-list')
              <li class="{{ (request()->is('admin/brand')  || request()->is('admin/brand/add')) ? 'active' : '' }}"><a href="{{ route('admin.brand') }}"><i class="fa fa-key"></i>  <span>&nbsp;&nbsp;{{ __('messages.brand.manage') }}</span></a></li>
            @endcan
          </ul>
        </li>
        @can('setting-list')
          <li class="{{ (request()->is('admin/setting')  || request()->is('admin/setting/add')) ? 'active' : '' }}"><a href="{{ route('admin.setting') }}"><i class="fa fa-user"></i>  <span>&nbsp;&nbsp;{{ __('messages.setting.manage_setting') }}</span></a></li>
        @endcan
        
    </ul>
  </section>
</aside>
<!-- /.sidebar -->