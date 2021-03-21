 @php
     $usr = Auth::guard('admin')->user();
 @endphp
<div class="sidebar-menu" >
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="{{asset('/')}}public/admin/assets/images/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                <ul class="metismenu" id="menu">
                    @if ($usr->can('dashboard.view'))
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    @endif


                       @if ($usr->can('portfolio.create') || $usr->can('portfolio.view') ||  $usr->can('portfolio.edit') ||  $usr->can('portfolio.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-sitemap"></i><span>
                            Portfolio Information
                        </span></a>

                        <ul class="collapse {{ Route::is('admin.portfolio.create') || Route::is('admin.portfolio') || Route::is('admin.portfolio.edit') || Route::is('admin.portfolio.show') ? 'in' : '' }}">
                            @if ($usr->can('portfolio.view'))
                            <li class="{{ Route::is('admin.portfolio')  || Route::is('admin.portfolio.edit') ? 'active' : '' }}"><a href="{{ route('admin.portfolio') }}">Portfolio</a></li>
                            @endif
                            @if ($usr->can('portfolio.view'))
                            <li class="{{ Route::is('admin.portfolio_category')  || Route::is('admin.portfolio_category.edit') ? 'active' : '' }}"><a href="{{ route('admin.portfolio_category') }}">Portfolio Category</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif


                     @if ($usr->can('service.create') || $usr->can('service.view') ||  $usr->can('service.edit') ||  $usr->can('service.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-sitemap"></i><span>
                            Service Information
                        </span></a>

                        <ul class="service {{ Route::is('admin.service.create') || Route::is('admin.service') || Route::is('admin.service.edit') || Route::is('admin.service.show') ? 'in' : '' }}">
                            @if ($usr->can('service.view'))
                            <li class="{{ Route::is('admin.service')  || Route::is('admin.service.edit') ? 'active' : '' }}"><a href="{{ route('admin.service') }}">Service</a></li>
                            @endif
                            @if ($usr->can('service.view'))
                            <li class="{{ Route::is('admin.service_category')  || Route::is('admin.service_category.edit') ? 'active' : '' }}"><a href="{{ route('admin.service_category') }}">Service Category</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif


                    @if ($usr->can('logo.create') || $usr->can('logo.view') ||  $usr->can('logo.edit') ||  $usr->can('logo.delete'))
                    <li class="{{ Route::is('admin.logo')  || Route::is('admin.logo.edit') || Route::is('admin.logo.create') ? 'active' : '' }}"><a href="{{ route('admin.logo') }}"><i class="ti-image"></i> <span>Logo</span></a></li>
                    @endif
                     
                      @if ($usr->can('banner.create') || $usr->can('banner.view') ||  $usr->can('banner.edit') ||  $usr->can('banner.delete'))
                    <li class="{{ Route::is('admin.banner')  || Route::is('admin.banner.edit') || Route::is('admin.banner.create') ? 'active' : '' }}"><a href="{{ route('admin.banner') }}"><i class="ti-image"></i> <span>Banner</span></a></li>
                    @endif

                     @if ($usr->can('choose.create') || $usr->can('choose.view') ||  $usr->can('choose.edit') ||  $usr->can('choose.delete'))
                    <li class="{{ Route::is('admin.choose')  || Route::is('admin.choose.edit') || Route::is('admin.choose.create') ? 'active' : '' }}"><a href="{{ route('admin.choose') }}"><i class="ti-thumb-up"></i> <span>Choose</span></a></li>
                    @endif


                    




                    @if ($usr->can('feature.create') || $usr->can('feature.view') ||  $usr->can('feature.edit') ||  $usr->can('feature.delete'))
                    <li class="{{ Route::is('admin.feature')  || Route::is('admin.feature.edit') || Route::is('admin.feature.create') ? 'active' : '' }}"><a href="{{ route('admin.feature') }}"><i class="ti-view-list"></i> <span>Feature</span></a></li>
                    @endif


                    @if ($usr->can('social.create') || $usr->can('social.view') ||  $usr->can('social.edit') ||  $usr->can('social.delete'))
                    <li class="{{ Route::is('admin.social')  || Route::is('admin.social.edit') || Route::is('admin.social.create') ? 'active' : '' }}"><a href="{{ route('admin.social') }}"><i class="ti-link"></i> <span>Social Link</span></a></li>
                    @endif

                     @if ($usr->can('client.create') || $usr->can('client.view') ||  $usr->can('client.edit') ||  $usr->can('client.delete'))
                    <li class="{{ Route::is('admin.client_logo')  || Route::is('admin.client_logo.edit') || Route::is('admin.client_logo.create') ? 'active' : '' }}"><a href="{{ route('admin.client_logo') }}"><i class="ti-user"></i> <span>Client</span></a></li>
                    @endif

                    @if ($usr->can('review.create') || $usr->can('review.view') ||  $usr->can('review.edit') ||  $usr->can('review.delete'))
                    <li class="{{ Route::is('admin.review')  || Route::is('admin.review.edit') || Route::is('admin.review.create') ? 'active' : '' }}"><a href="{{ route('admin.review') }}"><i class="ti-star"></i> <span>Review</span></a></li>
                    @endif


                     @if ($usr->can('news.create') || $usr->can('news.view') ||  $usr->can('news.edit') ||  $usr->can('news.delete'))
                    <li class="{{ Route::is('admin.news')  || Route::is('admin.news.edit') || Route::is('admin.news.create') ? 'active' : '' }}"><a href="{{ route('admin.news') }}"><i class="fas fa-newspaper"></i> <span>News</span></a></li>
                    @endif


                

                     

                  

                    


                     @if ($usr->can('about.create') || $usr->can('about.view') ||  $usr->can('about.edit') ||  $usr->can('about.delete'))
                    <li class="{{ Route::is('admin.about')  || Route::is('admin.about.edit') || Route::is('admin.about.create') ? 'active' : '' }}"><a href="{{ route('admin.about') }}"><i class="ti-files"></i> <span>About</span></a></li>
                    @endif



                    @if ($usr->can('team.create') || $usr->can('team.view') ||  $usr->can('team.edit') ||  $usr->can('team.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-sitemap"></i><span>
                            Team Information
                        </span></a>

                        <ul class="collapse {{ Route::is('admin.team.create') || Route::is('admin.team') || Route::is('admin.team.edit') || Route::is('admin.team.show') ? 'in' : '' }}">
                            @if ($usr->can('team.view'))
                            <li class="{{ Route::is('admin.team')  || Route::is('admin.team.edit') ? 'active' : '' }}"><a href="{{ route('admin.team') }}">Team</a></li>
                            @endif
                            @if ($usr->can('team.view'))
                            <li class="{{ Route::is('admin.team_social_link')  || Route::is('admin.team_social_link.edit') ? 'active' : '' }}"><a href="{{ route('admin.team_social_link') }}">Team Social Link</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif



                    @if ($usr->can('address.create') || $usr->can('address.view') ||  $usr->can('address.edit') ||  $usr->can('address.delete'))
                    <li class="{{ Route::is('admin.address')  || Route::is('admin.address.edit') || Route::is('admin.address.create') ? 'active' : '' }}"><a href="{{ route('admin.address') }}"><i class="fas fa-address-card"></i><span>Address</span></a></li>
                    @endif


                    @if ( $usr->can('contact.view') ||  $usr->can('contact.edit') ||  $usr->can('contact.delete'))
                    <li class="{{ Route::is('admin.contact')  || Route::is('admin.contact.edit') || Route::is('admin.contact.create') ? 'active' : '' }}"><a href="{{ route('admin.contact') }}"><i class="fas fa-id-card-alt"></i> <span>Contact</span></a></li>
                    @endif



                   

          


                    @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-sitemap"></i><span>
                            Roles & Permissions
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                            @if ($usr->can('role.view'))
                            <li class="{{ Route::is('admin.roles')  || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles') }}">All Roles</a></li>
                            @endif
                            @if ($usr->can('role.create'))
                            <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-sitemap"></i><span>
                            Admin
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">
                            @if ($usr->can('admin.view'))
                            <li class="{{ Route::is('admin.admins')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins') }}">All Admin</a></li>
                             @endif
                             @if ($usr->can('admin.create'))
                            <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
 @if ($usr->can('permission.create') || $usr->can('permission.view') ||  $usr->can('permission.edit') ||  $usr->can('permission.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-sitemap"></i><span>
                            Permission
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.permission.create') || Route::is('admin.permission') || Route::is('admin.permission.edit') || Route::is('admin.permission.show') ? 'in' : '' }}">
                          @if ($usr->can('permission.view'))
                            <li class="{{ Route::is('admin.permission')  || Route::is('admin.permission.edit') ? 'active' : '' }}"><a href="{{ route('admin.permission') }}">All Permission</a></li>
                            
                            @endif
                            @if ($usr->can('permission.create'))
                            <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a href="{{ route('admin.permission.create') }}">Create Permission</a></li>
                          @endif
                        </ul>
                    </li>
                   @endif

@if ( $usr->can('profile.view') ||  $usr->can('profile.edit'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-sitemap"></i><span>
                            Profile
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.profile') || Route::is('admin.profile.edit') ? 'in' : '' }}">
                          @if ($usr->can('permission.view'))
                            <li class="{{ Route::is('admin.profile')  || Route::is('admin.profile.edit') ? 'active' : '' }}"><a href="{{ route('admin.profile') }}">View Profile</a></li>
                            
                            @endif
                          
                        </ul>
                    </li>
                   @endif
                </ul>
            </nav>
                </div>
            </div>
        </div>