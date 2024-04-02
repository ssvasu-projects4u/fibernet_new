@extends('layouts.admin')
@section('content')
<!-- Page Heading -->
<div class="card shadow mb-4">
    @include('complaints.topmenu')
    <div class="card-header py-3">
        <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Closed Complaints</h3></div>

    </div>


    <div class="card-body" style="padding:5px;">
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ Session::get('success') }}
            @php
            Session::forget('success');
            @endphp
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-condensed  table-striped" style="font-size:12px;">
                <tr class="table-warning">
                    <th>Actions</th>
                    <th>Ticket No</th>
                    <th>Complaint Time</th>
                    <th>Priority</th>
                    <th>Connection</th>
                    <th>Complaint Type</th>
                    <th>City</th>
                    <th>Distributor</th>
                    <th>Branch</th>
                    <th>Franchise</th>
                    <th>Customer Id</th>
                    <th>Customer Name</th>
                    <th>Mobile</th>
                    <th>Call From</th>
                </tr>
                @forelse ($data as $datarow)
                <tr>
                    <td align="center">
                        <div class="btn-group">
                            <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i
                                    class="fas fa-bars"></i></button>
                            @canany([
                              "edit-closed-complaint",
                              "delete-closed-complaint",
                            ])
                            <ul class="dropdown-menu dropdown-default" role="menu">
                              @can("edit-closed-complaint")
                                <li><a class="dropdown-item" href="{{url('admin/complaints/edit/'.$datarow->id)}}">
                                <i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
                              @endcan
                              @can("delete-closed-complaint")                              
                                <li class="divider">
                                    <hr class="py-0 my-0 mb-4">
                                </li>
                                <li><a class="dropdown-item" href="{{url('admin/complaints/delete/'.$datarow->id)}}"
                                       title='delete' onclick="return confirm('Are you sure to delete?')"><i
                                            class="fa fa-trash" aria-hidden="true"></i> Delete</a></li>
                              @endcan
                            </ul>
                            @endcanany
                        </div>
                    </td>
                    <td>@can("edit-closed-complaint")<a href="{{url('admin/complaints/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>@endcan {{ $datarow->complaint_slno }}</td>
                    <td>{{ date("d-M-Y h:i:s a",strtotime($datarow->created_at)) }}</td>
                    <td>{{ ucfirst($datarow->priority) }}</td>
                    <td>{{ $datarow->complaint_type }}</td>
                    <td>{{ $datarow->complaint_sub_type }}</td>
                    <td>{{ $datarow->city_name }}</td>
                    <td>{{ $datarow->distributor_name }}</td>
                    <td>{{ $datarow->branch_name }}</td>
                    <td>{{ $datarow->franchise_name }}</td>
                    <td>{{ $datarow->customerid }}</td>
                    <td>{{ $datarow->name }}</td>
                    <td>{{ $datarow->mobile }}</td>
                    <td>{{ $datarow->call_from }}</td>
                </tr>
                @empty
                <tr><td colspan="15" align="center">No Complaints</td></tr>
                @endforelse
            </table>
            {{ $data->links() }}
        </div>


    </div>
</div>
@stop
