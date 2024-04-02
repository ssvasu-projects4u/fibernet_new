<div class="col-md-2 card shadow mb-4" style="border-radius: 0;"><!-- Nav tabs -->
            <ul class="nav nav-messages p5" role="menu">
                <li class="nav-item"><a href="{{ url('/admin/customers/view/general-info/'.$viewtype.'/'.$data->customer_id.'/view-general-info') }}"
                                class="w600 p7 animated animated-short fadeInDown nav-link 
                                <?php if (Request::segment(7) == 'view-general-info') {
                                        echo 'text-dark';
                                    } ?>">
                        <span class="fa"></span> General Info
                    </a>
                    <hr class="mn br-light">
                </li>
                <li class="nav-item"><a href="{{ url('/admin/customers/view/general-info/'.$viewtype.'/'.$data->customer_id.'/renew') }}"
                                class="fw600 p7 animated animated-short fadeInDown nav-link <?php if (Request::segment(7) == 'renew') {
                                        echo 'text-dark';
                                    } ?>">
                        <span class="fa fa-refresh pr5"></span> Renew User
                    </a>
                    <hr class="mn br-light">
                </li>
                {{--  <li class="nav-item"><a href="#"
                                class=" fw600 p7 animated animated-short fadeInDown nav-link">
                        <span class="fa fa-plus pr5"></span> Add Topup
                    </a>
                    <hr class="mn br-light">
                </li>  --}}
                {{--  <li class="nav-item"><a href="#"
                                class=" fw600 p7 animated animated-short fadeInUp nav-link">
                        <span class="fa fa-gift pr5"></span> Addon Services
                    </a>
                    <hr class="mn br-light">
                </li>  --}}
                {{--  <li class="nav-item"><a href="#"
                                class=" fw600 p7 animated animated-short fadeInUp nav-link">
                        <span class="fa fa-envelope pr5"></span> Comments
                    </a>
                    <hr class="mn br-light">
                </li>  --}}
                <li class="nav-item"><a href="{{ url('/admin/customers/view/general-info/'.$viewtype.'/'.$data->customer_id.'/renewal-history') }}"
                                class=" fw600 p7 animated animated-short fadeInUp nav-link <?php if (Request::segment(7) == 'renewal-history') {
                                        echo 'text-dark';
                                    } ?>">
                        <span class="fa fa-inr pr5"></span> Renewal history
                    </a>
                    <hr class="mn br-light">
                </li>
                <li class="nav-item"><a href="{{ url('/admin/customers/view/general-info/'.$viewtype.'/'.$data->customer_id.'/invoices') }}"
                                class=" fw600 p7 animated animated-short fadeInUp nav-link <?php if (Request::segment(7) == 'invoices') {
                                        echo 'text-dark';
                                    } ?>">
                        <span class="fa fa-inr pr5"></span> Invoices
                    </a>
                    <hr class="mn br-light">
                </li>
                <li class="nav-item"><a href="{{ url('/admin/customers/view/general-info/'.$viewtype.'/'.$data->customer_id.'/scheduled-renewal') }}"
                                class=" fw600 p7 animated animated-short fadeInUp nav-link <?php if (Request::segment(7) == 'scheduled-renewal') {
                                        echo 'text-dark';
                                    } ?>">
                        <span class="fa fa-inr pr5"></span> Renewal Scheduled
                    </a>
                    <!-- <hr class="mn br-light"> -->
                </li>
                <!-- <li class=""><a href="#"
                                class=" fw600 p7 animated animated-short fadeInUp">
                        <span class="fa fa-inr pr5"></span> Renewal history
                    </a>
                    <hr class="mn br-light">
                </li> -->
            </ul>
        <!--<ul class="nav nav-messages p5" role="menu">
            <li class="nav-item">
                <a class="nav-link <?php /*if (Request::segment(4) == 'general-info') {
                    echo 'active';
                } */ ?>" id="general-info-tab" data-toggle="pill"
                   href="{{ url( implode('/', Request::Segments())  ) }}" role="tab"
                   aria-controls="general-info" aria-selected="true"><span>General Info</span></a>
            </li>
             <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
            </li>
        </ul>-->
        </div>
