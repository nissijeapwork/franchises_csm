            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>

                            <!-- <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-dashboards">Dashboards</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="index.html" key="t-default">Default</a></li>
                                    <li><a href="dashboard-saas.html" key="t-saas">Saas</a></li>
                                    <li><a href="dashboard-crypto.html" key="t-crypto">Crypto</a></li>
                                    <li><a href="dashboard-blog.html" key="t-blog">Blog</a></li>
                                    <li><a href="dashboard-job.html" key="t-jobs">Jobs</a></li>
                                </ul>
                            </li> -->

                            <li>
                                <a href="{{ route('home') }}" class="waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-dashboards">Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('franchises.index') }}" class="waves-effect">
                                    <i class="bx bx-store-alt"></i>
                                    <span key="t-franchises">Franchises</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('financials.index') }}" class="waves-effect">
                                    <i class="bx bx-bar-chart-alt-2"></i>
                                    <span key="t-financials">Financials</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('metrics.index') }}" class="waves-effect">
                                    <i class="bx bx-pulse"></i>
                                    <span key="t-metrics">Performance Metrics</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('testimonials.index') }}" class="waves-effect">
                                    <i class="bx bx-chat"></i>
                                    <span key="t-testimonials">Testimonials</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('resources.index') }}" class="waves-effect">
                                    <i class="bx bx-folder-open"></i>
                                    <span key="t-resources">Resources</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('training_support.index') }}" class="waves-effect">
                                    <i class="bx bx-support"></i>
                                    <span key="t-training-support">Training & Support</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('developers.index') }}" class="waves-effect">
                                    <i class="bx bx-id-card"></i>
                                    <span key="t-developer-contacts">Developer Contacts</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('operations.index') }}" class="waves-effect">
                                    <i class="bx bx-bullseye"></i>
                                    <span key="t-operations">Operations</span>
                                </a>
                            </li>



                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->