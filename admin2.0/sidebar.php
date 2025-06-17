<div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <!-- Sidenav Menu Heading (Account)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <div class="sidenav-menu-heading d-sm-none">Account</div>
                            <!-- Sidenav Link (Alerts)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <a class="nav-link d-sm-none" href="#!">
                                <div class="nav-link-icon"><i data-feather="bell"></i></div>
                                Alerts
                                <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                            </a>
                            <!-- Sidenav Link (Messages)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <a class="nav-link d-sm-none" href="#!">
                                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                                Messages
                                <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                            </a>
                            <!-- Sidenav Menu Heading (Core)-->
                            <div class="sidenav-menu-heading">Core</div>
                            <!-- Sidenav Accordion (Dashboard)-->
                            <a class="nav-link collapsed" href="dashboard.php" aria-expanded="false" aria-controls="collapseDashboards">
                                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                                Dashboards
                                
                            </a>
                            
                            <!-- Sidenav Accordion (Pages)-->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="nav-link-icon"><i data-feather="grid"></i></div>
                                Broadband Plans
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                 
                                   
                                    <a class="nav-link" href="add-plans.php">Add Plans</a>
                                    <a class="nav-link" href="manage-plans.php">Manage Plans</a>
                                </nav>
                            </div>


                            <!-- Sidenav Accordion (Applications)-->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseApps" aria-expanded="false" aria-controls="collapseApps">
                                <div class="nav-link-icon"><i data-feather="globe"></i></div>
                                DTH Plans
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseApps" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavAppsMenu">
                                    <!-- Nested Sidenav Accordion (Apps -> Knowledge Base)-->
                                    <a class="nav-link collapsed" href="add-dthplan.php" aria-expanded="false" aria-controls="appsCollapseKnowledgeBase">
                                        Add DTH Plan
                                        
                                    </a>
                                 
                                    <!-- Nested Sidenav Accordion (Apps -> User Management)-->
                                    <a class="nav-link collapsed" href="manage-dthplan.php" aria-expanded="false">
                                       Manage DTH Plan
                                       
                                    </a>
                                </nav>
                            </div>
                            <!-- Sidenav Accordion (Flows)-->
              
                            <!-- Sidenav Accordion (Layout)-->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="nav-link-icon"><i data-feather="layout"></i></div>
                                Technicians
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                             <div class="collapse" id="collapseLayouts" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-technicians.php">Add Technicians</a>
                                    <a class="nav-link" href="manage-technicians.php">Manage Technicians</a>
                                </nav>
                            </div>
                           
                            <!-- Sidenav Accordion (Components)-->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseComponents" aria-expanded="false" aria-controls="collapseComponents">
                                <div class="nav-link-icon"><i data-feather="package"></i></div>
                                Broadband Booking Request
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseComponents" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav">
                                    <a class="nav-link" href="new-request.php">New Request</a>
                                    <a class="nav-link" href="assign-request.php">Assign Request</a>
                                    <a class="nav-link" href="completed-request.php">Completed Request</a>
                                    <a class="nav-link" href="rejected-request.php">Rejected Request</a>
                                    <a class="nav-link" href="all-request.php">All Request</a>
                                </nav>
                            </div>
                            
                            <!-- Sidenav Accordion (Utilities)-->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                                <div class="nav-link-icon"><i data-feather="tool"></i></div>
                                DTH Booking Request
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseUtilities" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav">
                                     <a class="nav-link" href="new-dthrequest.php">New Request</a>
                                    <a class="nav-link" href="assign-dthrequest.php">Assign Request</a>
                                    <a class="nav-link" href="completed-dthrequest.php">Completed Request</a>
                                    <a class="nav-link" href="rejected-dthrequest.php">Rejected Request</a>
                                    <a class="nav-link" href="all-dthrequest.php">All Request</a>
                                </nav>
                            </div>

                             <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseUtilities1" aria-expanded="false" aria-controls="collapseUtilities1">
                                <div class="nav-link-icon"><i data-feather="tool"></i></div>
                                Reported Issues
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseUtilities1" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav">
                                     <a class="nav-link" href="request.php">Request</a>
                                    <a class="nav-link" href="query.php">Query</a>
                                    <a class="nav-link" href="complaint.php">Complaint Request</a>
                                    <a class="nav-link" href="feedback.php">Feedback</a>
                                </nav>
                            </div>

                            <!-- Sidenav Link (Charts)-->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseUtilities2" aria-expanded="false" aria-controls="collapseUtilities2">
                                <div class="nav-link-icon"><i data-feather="tool"></i></div>
                                Reports
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseUtilities2" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav">
                                     <a class="nav-link" href="bwdates-broadband-report.php">Broadband Report</a>
                                    <a class="nav-link" href="bwdates-dth-report.php">DTH Report</a>
                                   
                                </nav>
                            </div>
                            <!-- Sidenav Link (Tables)-->
                           <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseUtilities3" aria-expanded="false" aria-controls="collapseUtilities3">
                                <div class="nav-link-icon"><i data-feather="tool"></i></div>
                                Search
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseUtilities3" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav">
                                     <a class="nav-link" href="search-broadband-request.php">Search Broadband Request</a>
                                    <a class="nav-link" href="search-dth-request.php">Search DTH Request</a>
                                   
                                </nav>
                            </div>

              <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseFlows" aria-expanded="false" aria-controls="collapseFlows">
                                <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                                Pages
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseFlows" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav">
                                    <a class="nav-link" href="about-us.php">About Us</a>
                                    <a class="nav-link" href="contact-us.php">Contact Us</a>
                                </nav>
                            </div>
                             <a class="nav-link collapsed" href="reg-users.php" aria-expanded="false" aria-controls="collapseDashboards">
                                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                                Reg Users
                                
                            </a>
                        </div>
                    </div>
                    <!-- Sidenav Footer-->
                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content">
                            <div class="sidenav-footer-subtitle">Logged in as:</div>
                            <div class="sidenav-footer-title">Admin</div>
                        </div>
                    </div>
                </nav>
            </div>