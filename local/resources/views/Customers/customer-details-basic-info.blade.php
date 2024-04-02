<div class="col">
    <div class="card mb-4">
        <div class="card-header py-2">
            <div class="float-left">Basic Information</div>
        </div>

        <div class="card-body">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
        @endif
        <!-- Content Row -->
            <div class="row">
                <div class="col">
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-2">
                                    <?php
                                    $path = asset('public/uploads/default-image.png');

                                    $src = asset('public/uploads/customers/photos/' . $data->customer_pic);
                                    if ($data->customer_pic != '') {
                                        $path = $src;
                                    }
                                    ?>
                                    <img src="{{ $path }}" class="general-info-profile-img"
                                            alt="profile picture">
                                </div>
                                <div class="col-md-5">
                                    <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">
                                        <tbody>

                                        <tr>
                                            <td><span>A/C No</span></td>
                                            <td>SLJ{{ sprintf('%08d', $data->account_no) }}</td>
                                        </tr>
                                        <tr>
                                            <td><span>Username</span></td>
                                            <td>{{ $data->f_name_c_name}}</td>
                                        </tr>
                                        <tr>
                                            <td><span>Name</span></td>
                                            <td>{{$data->customer_name}}</td>
                                        </tr>
                                        <tr>
                                            <td><span>Franchise Name</span></td>
                                            <td>{{ $data->franchise_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><span>Branch</span></td>
                                            <td>{{ $data->branch_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><span>City</span></td>
                                            <td>{{ $data->city_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><span>Email</span></td>
                                            <td>{{ $data->email}}</td>
                                        </tr>
                                        <tr>
                                            <td><span>Register Mobile</span></td>
                                            <td>{{ $data->mobile }}</td>
                                        </tr>
                                        <tr>
                                            <td><span>Status</span></td>
                                            
                                            <td>
                                                 @if($data->current_status == 'activated')
                             <span class="badge badge-success">Active</span>
                         @elseif($data->current_status == 'expired')
                         <span class="badge badge-danger">Expired</span>
                          @elseif($data->current_status == 'new')
                         <span class="badge badge-warning">New</span>
                         @elseif($data->current_status == 'technical')
                         <span class="badge badge-primary">Technical</span>
                        
                        
                        
                         
                                @endif
                                        
                                                
                                            </td>
                                        </tr>
                                         <tr>
                                            <td><span>Last Log-Off</span></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-5">
                                    <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">
                                        <tbody>

                                        <tr>
                                            <td><span>Account Type</span></td>
                                            <td>{{ $data->account_type }}</td>
                                        </tr>
                                        <tr>
                                            <td><span>MAC</span></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><span>Broadband Package</span></td>
                                            <td>{{ $data->bpackage_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><span>Sub Broadband Package</span></td>
                                            <td>{{ $data->sbpackage_name}}</td>
                                        </tr>
                                        <tr>
                                            <td><span>Combo Package</span></td>
                                            <td>{{ $data->copackage_name}}</td>
                                        </tr>
                                        <tr>
                                            <td><span>Sub Combo Package</span></td>
                                            <td>{{ $data->scopackage_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><span>Cable</span></td>
                                            <td>
                                                        <?php if ($data->connection_type == "cable")  { ?>
                                                            <?php if ($data->cable_base != "") {
                                                                    $packages = explode(",", $data->cable_base);
                                                                    $cable_bases = \App\CablePackages::whereIn('id', $packages)->select('package_name as name')->get();
                                                                 ?>
                                                            <div>
                                                                <div><strong>Cable Base</strong></div>
                                                                <div>
                                                                    <?php foreach($cable_bases as $cable_base) { ?>
                                                                    <div>{{ $cable_base->name }}</div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            <?php if ($data->cable_packages != "") {
                                                                    $packages = explode(",", $data->cable_packages);
                                                                    $cable_packages = \App\CablePackages::whereIn('id', $packages)->select('package_name as name')->get();
                                                                ?>
                                                            <div>
                                                                <div><strong>Cable Packages</strong></div>
                                                                <div>
                                                                   <?php foreach($cable_packages as $cable_package) { ?>
                                                                  <div>{{ $cable_package->name }}</div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            <?php if ($data->cable_local != "") {
                                                                    $packages = explode(",", $data->cable_local);
                                                                    $cable_locals = \App\CablePackages::whereIn('id', $packages)->select('package_name as name')->get();                                                                
                                                                ?>
                                                            <div>
                                                                <div><strong>Cable Local</strong></div>
                                                                <div>
                                                                <?php foreach($cable_locals as $cable_local) { ?>
                                                                  <div>{{ $cable_local->name }}</div>
                                                                <?php } ?>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            <?php if ($data->cable_allacart != "") {
                                                                $packages = explode(",", $data->cable_allacart);
                                                                $cable_allacarts = \App\CablePackages::whereIn('id', $packages)->select('package_name as name')->get();
                                                                ?>
                                                            <div>
                                                                <div><strong>Cable Allacart</strong></td>
                                                                <div>
                                                                 <?php foreach($cable_allacarts as $cable_allacart) { ?>
                                                                  <div>{{ $cable_allacart->name }}</div>
                                                                 <?php } ?>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </td>
                                        </tr>
                                        <tr>
                                            <td><span>IPTV</span></td>
                                            <td>

                                                        <?php if ($data->connection_type == "iptv")  { ?>
                                                            <?php if ($data->iptv_base != "") {
                                                                    $packages = explode(",", $data->iptv_base);
                                                                    $iptv_bases = \App\IptvPackages::whereIn('id', $packages)->select('package_name as name')->get();
                                                                 ?>
                                                                <div><strong>ITPV Base</strong></div>
                                                                <div>
                                                                    <?php foreach($iptv_bases as $iptv_base) { ?>
                                                                    <div>{{ $iptv_base->name }}</div>
                                                                    <?php } ?>
                                                                </div>
                                                            <?php } ?>
                                                            <?php if ($data->iptv_packages != "") {
                                                                    $packages = explode(",", $data->iptv_packages);
                                                                    $iptv_packages = \App\IptvPackages::whereIn('id', $packages)->select('package_name as name')->get();
                                                                ?>
                                                            <div>
                                                                <div><strong>ITPV Packages</strong></div>
                                                                <div>
                                                                   <?php foreach($iptv_packages as $iptv_package) { ?>
                                                                  <div>{{ $iptv_package->name }}</div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            <?php if ($data->iptv_local != "") {
                                                                    $packages = explode(",", $data->iptv_local);
                                                                    $iptv_locals = \App\IptvPackages::whereIn('id', $packages)->select('package_name as name')->get();                                                                
                                                                ?>
                                                            <div>
                                                                <div><strong>ITPV Local</strong></div>
                                                                <div>
                                                                <?php foreach($iptv_locals as $iptv_local) { ?>
                                                                  <div>{{ $iptv_local->name }}</div>
                                                                <?php } ?>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            <?php if ($data->iptv_allacart != "") {
                                                                $packages = explode(",", $data->iptv_allacart);
                                                                $iptv_allacarts = \App\IptvPackages::whereIn('id', $packages)->select('package_name as name')->get();
                                                                ?>
                                                            <div>
                                                                <div><strong>ITPV Allacart</strong></div>
                                                                <div>
                                                                 <?php foreach($iptv_allacarts as $iptv_allacart) { ?>
                                                                  <div>{{ $iptv_allacart->name }}</div>
                                                                 <?php } ?>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                        <?php } ?>                                            
                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Created On</span></td>
                                            <td>{{ date('d-m-Y H:m:s', strtotime($data->ucreateddt)) }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td><span>Activated On</span></td>
                                            <td>{{ date('d-m-Y H:m:s', strtotime($data->active_updated_date)) }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td><span>Last Renewal Date</span></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><span>Expiry Date</span></td>
                                            <td>{{ $data->expiry_date != "" ?  date('d-m-Y H:m:s', strtotime($data->expiry_date)) :  "" }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
