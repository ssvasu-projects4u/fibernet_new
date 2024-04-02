<div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <?php echo $breadcrumbs->render(); ?>
            </nav>
        </div>

        <div class="col">
            <div class="btn-group float-right" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">

                    <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Edit Customer
                    </button>
                  
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        
                        <a class="dropdown-item"
                           href="{{ url('admin/customers/update/basic-information/'.$data->customer_id) }}"
                           data-toggle="modal" data-target="#basic-information" title="Basic Information">Basic
                            Information</a>

                        <a class="dropdown-item"
                           href="{{ url('admin/customers/update/change-password/'.$data->customer_id) }}"
                           data-toggle="modal" data-target="#change-password" title="Change Password">Change Password</a>
                        
                        <a class="dropdown-item"
                           href="{{ url('admin/customers/update/location-information/'.$data->customer_id) }}"
                           data-toggle="modal" data-target="#location-information" title="Location Information">Location
                            Information</a>
                        
                        <a class="dropdown-item"
                           href="{{ url('admin/customers/update/upload-documents/'.$data->customer_id) }}"
                           data-toggle="modal" data-target="#upload-documents" title="Upload Documents">Upload Documents</a>
                        
                        <a class="dropdown-item"
                           href="{{ url('admin/customers/update/package-and-prices-change/'.$data->customer_id) }}"
                           data-toggle="modal" data-target="#package-and-prices-change" title="Basic Information">Package and Price Change</a>
                        
                         <a class="dropdown-item"
                           href="{{ url('admin/customers/update/network-information/'.$data->customer_id) }}"
                           title="Change Network">Change Network</a>
                       
                    
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-inr"></i>Payment Pickup</button>
                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Add Complaint</button>
            </div>
        </div>
    </div>
