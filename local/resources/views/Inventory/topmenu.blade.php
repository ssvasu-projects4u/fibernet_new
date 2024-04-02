<div class="card-header my-0 py-0 pl-0">
<nav class="toptabs navbar navbar-expand-sm bg-light navbar-light py-0  pl-0">

<ul class="nav nav-tabs my-0 pl-0">

  @canany(["vendors-suppliers", "create-vendors-suppliers"])
  <li class="nav-item dropdown">
    @can("vendors-suppliers")
      <a class="nav-link dropdown-toggle <?php if(Request::segment(3) == 'vendors-suppliers'){echo 'active';} ?>" data-toggle="dropdown" href="{{url('admin/inventory/vendors-suppliers')}}">Vendors & Suppliers</a>
    @endcan
    <div class="dropdown-menu">
      @can("create-vendors-suppliers")
        <a class="dropdown-item" href="{{url('admin/inventory/vendors-suppliers/create')}}">Create Vendor/Supplier</a>
      @endcan
      @can("vendors-suppliers")
        <a class="dropdown-item" href="{{url('admin/inventory/vendors-suppliers')}}">List Vendors & Suppliers</a>
      @endcan
    </div>
  </li>
  @endcanany

  @canany(["warehouses", "create-warehouse"])
  <li class="nav-item dropdown">
    @can("warehouses")
      <a class="nav-link dropdown-toggle <?php if(Request::segment(3) == 'warehouse'){echo 'active';} ?>" data-toggle="dropdown" href="{{url('admin/inventory/warehouse')}}">Warehouses</a>
    @endcan
    <div class="dropdown-menu">
      @can("create-warehouse")
        <a class="dropdown-item" href="{{url('admin/inventory/warehouse/create')}}">Create Warehouse</a>
      @endcan
      @can("warehouses")
        <a class="dropdown-item" href="{{url('admin/inventory/warehouse')}}">List Warehouses</a>
      @endcan
    </div>
  </li>
  @endcanany


@canany([
  "product-categories",
  "create-product-category"
])
  <li class="nav-item dropdown">
    @can("product-categories")
      <a class="nav-link dropdown-toggle <?php if(Request::segment(3) == 'product-categories'){echo 'active';} ?>" data-toggle="dropdown" href="{{url('admin/inventory/product-categories')}}">Product Categories</a>
    @endcan
    <div class="dropdown-menu">
      @can("create-product-category")
        <a class="dropdown-item" href="{{url('admin/inventory/product-categories/create')}}">Create Product Category</a>
      @endcan
      @can("product-categories")
        <a class="dropdown-item" href="{{url('admin/inventory/product-categories')}}">List Product Categories</a>
      @endcan
    </div>
  </li>
@endcanany

  @canany(["products", "create-product"])
  <li class="nav-item dropdown">
    @can("products")
      <a class="nav-link dropdown-toggle <?php if(Request::segment(3) == 'products'){echo 'active';} ?>" data-toggle="dropdown" href="{{url('admin/inventory/products')}}">Products</a>
    @endcan
    <div class="dropdown-menu">
      @can("create-product")
        <a class="dropdown-item" href="{{url('admin/inventory/products/create')}}">Create Product</a>
      @endcan
      @can("products")
        <a class="dropdown-item" href="{{url('admin/inventory/products')}}">List Products</a>
      @endcan
    </div>
  </li>
  @endcanany

  @canany(["stocks", "add-stock", "transfer-stocks", "stock-upload-history"])
  <li class="nav-item dropdown">
    @can("stocks")
      <a class="nav-link dropdown-toggle <?php if(Request::segment(3) == 'stocks'){echo 'active';} ?>" data-toggle="dropdown" href="{{url('admin/inventory/stocks')}}">Stocks</a>
    @endcan
    <div class="dropdown-menu">
      @can("add-stock")
        <a class="dropdown-item" href="{{url('admin/inventory/stocks/add-stock')}}">Add Stock</a>
      @endcan
      @can("stocks")      
        <a class="dropdown-item" href="{{url('admin/inventory/stocks')}}">Manage Stocks</a>
      @endcan
      @can("transfer-stocks")      
        <a class="dropdown-item" href="{{url('admin/inventory/stocks/transfer')}}">Transfer Stocks</a>
      @endcan
      @can("stock-upload-history")
        <a class="dropdown-item" href="{{url('admin/inventory/stocks/stock-upload-history')}}">Stock Upload History</a>
      @endcan
    </div>
  </li>
  @endcanany

  </ul>
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
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/inventory/stocks/add-stock')}}">Add Stock</a></li>
  @endcan
  @can("manage-stocks")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/inventory/stocks')}}">Manage Stocks</a></li>
  @endcan
  @can("warehouse-stocks")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/inventory/stocks/warehouse-wise')}}">Warehouse Stocks</a></li>
  @endcan  
  @can("distributor-stocks")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/inventory/stocks/distributor-wise')}}">Distributor Stocks</a></li>
  @endcan
  @can("branch-stocks")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/inventory/stocks/branch-wise')}}">Branch Stocks</a></li>
  @endcan
  @can("franchise-stocks")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/inventory/stocks/franchise-wise')}}">Franchise Stocks</a></li>
  @endcan
  @can("employee-stocks")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/inventory/stocks/employee-wise')}}">Employee Stocks</a></li>
  @endcan

  @can("stock-upload-history")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/inventory/stocks/stock-upload-history')}}">Stock Upload History</a></li>
  @endcan
@endif
</ul>
</nav>
</div>