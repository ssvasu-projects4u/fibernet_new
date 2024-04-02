<div class="card-header my-0 py-0 pl-0">
<nav class="toptabs navbar navbar-expand-sm bg-light navbar-light py-0  pl-0">


</nav>
</div>

<div class="card-header bottom-submenu my-0 py-0 pl-0 pt-0 pr-2">
<nav class="navbar py-0">
<ul class="nav">

@if(Request::segment(3) == 'product-categories')
  @can("create-product-category")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/inventory/product-categories/create')}}">Create Product Category</a></li>
  @endcan
  @can("product-categories")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/inventory/product-categories')}}">List Product Categories</a></li>
  @endcan
@endif

@if(Request::segment(3) == 'warehouse')
  @can("create-warehouse")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/inventory/warehouse/create')}}">Create Warehouse</a></li>
  @endcan
  @can("warehouses")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/inventory/warehouse')}}">List Warehouses</a></li>
  @endcan
@endif

@if(Request::segment(3) == 'products')
  @can("create-product")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/inventory/products/create')}}">Create Product</a></li>
  @endcan
  @can("products")
  <li class="nav-item"><a class="nav-link" href="{{url('admin/inventory/products')}}">List Products</a></li>
  @endcan
@endif

@if(Request::segment(3) == 'vendors-suppliers')
  @can("create-vendors-suppliers")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/inventory/vendors-suppliers/create')}}">Create Vendor/Supplier</a></li>
  @endcan
  @can("vendors-suppliers")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/inventory/vendors-suppliers')}}">List Vendors & Suppliers</a></li>
  @endcan
@endif

@if(Request::segment(3) == 'stocks')
  @can("add-stock")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/inventory/stocks/fiber')}}">Add Stock</a></li>
  @endcan
  @can("manage-stocks")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/inventory/stocks/fibermanage')}}">Manage Stocks</a></li>
  @endcan
  @can("warehouse-stocks")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/inventory/stocks/fiberwarehouse-wise')}}">Warehouse Stocks</a></li>
  @endcan  
  @can("distributor-stocks")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/inventory/stocks/fiberdistributor-wise')}}">Distributor Stocks</a></li>
  @endcan
  @can("branch-stocks")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/inventory/stocks/fiberbranch-wise')}}">Branch Stocks</a></li>
  @endcan
  @can("franchise-stocks")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/inventory/stocks/fiberfranchise-wise')}}">Franchise Stocks</a></li>
  @endcan
  @can("employee-stocks")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/inventory/stocks/employee-fiberwise')}}">Employee Stocks</a></li>
  @endcan

  @can("stock-upload-history")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/inventory/stocks/fiberstock-upload-history')}}">Stock Upload History</a></li>
  @endcan
@endif
</ul>
</nav>
</div>