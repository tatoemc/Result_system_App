 
<div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false " to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        
                        <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <img src="{{ asset('images/' . Auth::user()->images )}}" class="rounded">  
                            </a>
                         </li>   
                        <li class="nav-item start ">
                            <a href="{{  url('home') }}" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">الرئيسية</span>
                            </a>
                            
                        </li>
                        
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-off" style="color:lime"></i>
                                <span class="title">حسابي</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="/changePassword" class="nav-link ">
                                        <span class="title">تغير كلمة المرور</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-off" style="color:lime"></i>
                                <span class="title">النتيجة</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="/changePassword" class="nav-link ">
                                        <span class="title">تغير كلمة المرور</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                       
                        <li class="nav-item  "> 
                            <a href="" class="nav-link ">
                                        <i class="icon-call-end" style="color:cyan"></i>
                                        <span class="title">الدعم الفنى 249911405218</span>
                                    </a>
                        </li>
                        
                        <li class="nav-item  ">
                            <a href="{{ route('user.logout') }}" class="nav-link ">
                                        <i class="glyphicon glyphicon-off" style="color:red"></i>
                                        <span class="title">خروج</span>
                            </a>
                            
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>