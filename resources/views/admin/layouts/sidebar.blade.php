<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <form action="search.html" class="mobile-view">
            <input class="form-control" type="text" placeholder="Search here">
            <button class="btn" type="button"><i class="fa fa-search"></i></button>
        </form>
        <div id="sidebar-menu" class="sidebar-menu">

            <ul>
                <li class="nav-item nav-profile">
                  <a href="#" class="nav-link">
                    <div class="nav-profile-image">
                      <img src="/assets/admin/img/profiles/avatar-17.jpg" alt="profile">
                      
                    </div>
                    <div class="nav-profile-text d-flex flex-column">
                      <span class="font-weight-bold mb-2">David Grey. H</span>
                      <span class="text-white text-small">Project Manager</span>
                    </div>
                    <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                  </a>
                </li>
                
                <li class="">
                    <a href="{{route('admin.dashboard')}}"><i class="feather-home"></i> <span> Home</span></a>
                    {{-- <ul class="sub-menus">
                        <li><a href="index.html" class="active">Deals Dashboard</a></li>
                        <li><a href="projects-dashboard.html">Projects Dashboard</a></li>
                        <li><a href="leads-dashboard.html">Leads Dashboard</a></li>
                    </ul> --}}
                </li>
                
                <li> 
                    <a href="{{route('usersRecord')}}"><i class="feather-user"></i> <span>Users</span></a>
                </li>
                <li> 
                    <a href="{{url('fitness-posts')}}"><i class="feather-list"></i> <span>Manage Posts</span></a>
                </li>
                <li> 
                    <a href="{{url('guided-workouts')}}"><i class="feather-list"></i> <span>Guided Workouts</span></a>
                </li>
                <li> 
                    <a href="{{url('exercise')}}"><i class="feather-list"></i> <span>Exercise List</span></a>
                </li>
                <li> 
                    <a href="{{url('equipment')}}"><i class="feather-list"></i> <span>Equipment List</span></a>
                </li>
                <li> 
                    <a href="{{url('workoutPlans')}}"><i class="feather-list"></i> <span>Workout Plans</span></a>
                </li>
                <li> 
                    <a href="{{url('challenges')}}"><i class="feather-list"></i> <span>Challenges List</span></a>
                </li>
                {{-- <li> 
                    <a href="tasks.html"><i class="feather-check-square"></i> <span>Tasks</span></a>
                </li>
                <li> 
                    <a href="contacts.html"><i class="feather-smartphone"></i> <span>Contacts</span></a>
                </li>
                <li> 
                    <a href="companies.html"><i class="feather-database"></i> <span>Companies</span></a>
                </li>
                
                <li> 
                    <a href="deals.html"><i class="feather-radio"></i> <span>Deals</span></a>
                </li>
                <li> 
                    <a href="projects.html"><i class="feather-grid"></i> <span>Projects</span></a>
                </li>
                <li> 
                    <a href="reports.html"><i class="feather-bar-chart-2"></i> <span>Reports</span></a>
                </li>
                <li> 
                    <a href="activities.html"><i class="feather-calendar"></i> <span>Activities</span></a>
                </li>							
                <li class="submenu">
                    <a href="#"><i class="feather-grid"></i> <span> Blogs</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menus">
                        <li><a href="blog.html" >All Blogs</a></li>
                        <li><a href="add-blog.html">Add Blog</a></li>
                        <li><a href="edit-blog.html">Edit Blog</a></li>
                        <li><a href="blog-Categories.html">Categories</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="feather-clipboard"></i> <span>  Invoices </span> <span class="menu-arrow"></span></a>
                    <ul class="sub-menus">
                        <li><a href="invoices.html" >Invoices List</a></li>
                        <li><a href="invoice-grid.html" >Invoices Grid</a></li>
                        <li><a href="add-invoice.html">Add Invoices</a></li>
                        <li><a href="edit-invoice.html">Edit Invoices</a></li>
                        <li><a href="view-invoice.html">Invoices Details</a></li>
                        <li><a href="invoices-settings.html">Invoices Settings</a></li>
                    </ul>
                </li>
                <li> 
                    <a href="email.html"><i class="feather-mail"></i> <span>Email</span></a>
                </li>
                <li> 
                    <a href="settings.html"><i class="feather-settings"></i> <span>Settings</span></a>
                </li>
                
                <li class="menu-title"> 
                    <span>Pages</span>
                </li>
                
                <li class="submenu">
                    <a href="#"><i class="feather-alert-triangle"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
                    <ul class="sub-menus">
                        <li><a href="error-404.html">404 Error </a></li>
                        <li><a href="error-500.html">500 Error </a></li>
                    </ul>
                </li>
                
                <li class="submenu">
                    <a href="#"><i class="feather-list"></i> <span> Pages </span> <span class="menu-arrow"></span></a>
                    <ul class="sub-menus">
                        <li><a href="faq.html"> FAQ </a></li>
                        <li><a href="terms.html"> Terms </a></li>
                        <li><a href="privacy-policy.html"> Privacy Policy </a></li>
                        <li><a href="blank-page.html"> Blank Page </a></li>
                    </ul>
                </li>
                <li class="menu-title"> 
                    <span>UI Interface</span>
                </li>
                <li> 
                    <a href="components.html"><i class="feather-layout"></i> <span>Components</span></a>
                </li>							
                <li class="submenu">
                    <a href="#"><i class="feather feather-box"></i> <span>Elements </span> <span class="menu-arrow"></span></a>
                    <ul class="sub-menus">
                        <li><a href="sweetalerts.html">Sweet Alerts</a></li>
                        <li><a href="tooltip.html">Tooltip</a></li>
                        <li><a href="popover.html">Popover</a></li>
                        <li><a href="ribbon.html">Ribbon</a></li>
                        <li><a href="clipboard.html">Clipboard</a></li>
                        <li><a href="drag-drop.html">Drag & Drop</a></li>
                        <li><a href="rangeslider.html">Range Slider</a></li>
                        <li><a href="rating.html">Rating</a></li>
                        <li><a href="toastr.html">Toastr</a></li>
                        <li><a href="text-editor.html">Text Editor</a></li>
                        <li><a href="counter.html">Counter</a></li>
                        <li><a href="scrollbar.html">Scrollbar</a></li>
                        <li><a href="spinner.html">Spinner</a></li>
                        <li><a href="notification.html">Notification</a></li>
                        <li><a href="lightbox.html">Lightbox</a></li>
                        <li><a href="stickynote.html">Sticky Note</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                        <li><a href="horizontal-timeline.html">Horizontal Timeline</a></li>
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="feather feather-bar-chart-2"></i> <span> Charts </span> <span class="menu-arrow"></span></a>
                    <ul class="sub-menus">
                        <li><a href="chart-apex.html">Apex Charts</a></li>
                        <li><a href="chart-js.html">Chart Js</a></li>
                        <li><a href="chart-morris.html">Morris Charts</a></li>
                        <li><a href="chart-flot.html">Flot Charts</a></li>
                        <li><a href="chart-peity.html">Peity Charts</a></li>
                        <li><a href="chart-c3.html">C3 Charts</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="feather feather-award"></i> <span> Icons </span> <span class="menu-arrow"></span></a>
                    <ul class="sub-menus">
                        <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                        <li><a href="icon-feather.html">Feather Icons</a></li>
                        <li><a href="icon-ionic.html">Ionic Icons</a></li>
                        <li><a href="icon-material.html">Material Icons</a></li>
                        <li><a href="icon-pe7.html">Pe7 Icons</a></li>
                        <li><a href="icon-simpleline.html">Simpleline Icons</a></li>
                        <li><a href="icon-themify.html">Themify Icons</a></li>
                        <li><a href="icon-weather.html">Weather Icons</a></li>
                        <li><a href="icon-typicon.html">Typicon Icons</a></li>
                        <li><a href="icon-flag.html">Flag Icons</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="feather-credit-card"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
                    <ul class="sub-menus">
                        <li><a href="form-basic-inputs.html">Basic Inputs </a></li>
                        <li><a href="form-input-groups.html" >Input Groups </a></li>
                        <li><a href="form-horizontal.html">Horizontal Form </a></li>
                        <li><a href="form-vertical.html"> Vertical Form </a></li>
                        <li><a href="form-mask.html"> Form Mask </a></li>
                        <li><a href="form-validation.html"> Form Validation </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="feather-box"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
                    <ul class="sub-menus">
                        <li><a href="tables-basic.html">Basic Tables </a></li>
                        <li><a href="data-tables.html">Data Table </a></li>
                    </ul>
                </li>
                <li class="menu-title"> 
                    <span>Extras</span>
                </li>
                
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="feather-command"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
                    <ul class="sub-menus">
                        <li class="submenu">
                            <a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
                            <ul class="sub-menus">
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
                                    <ul class="sub-menus">
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"> <span>Level 1</span></a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->