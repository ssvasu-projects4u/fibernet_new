<div class="card-header my-0 py-0 pl-0">
<nav class="toptabs navbar navbar-expand-sm bg-light navbar-light py-0  pl-0">


<ul class="nav nav-tabs my-0 pl-0">


@if(Request::segment(2) == 'customers')
  @can("create-fh")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/customers/add-competator')}}">Add Competator</a></li>
  @endcan
  @can("fh")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/customers/competator')}}">List Competators</a></li>
  @endcan
@endif

</ul>
</nav>
</div>