

</div>
<div class="nav-mobile md:hidden">
    
        <div class="mobile-menu-bar">
                        <a href="<?php echo base_url()?>" class="intro-x w-8 h-8 flex mr-auto">
                                <div class="menu__icon"> <i data-feather="home"></i> </div>
                            
                        </a>
                
                    <div class="intro-x dropdown w-8 h-8 flex mr-auto">
                        <div class="dropdown-toggle w-8 h-8 ">
                            <div class="menu__icon"> <i data-feather="align-justify"></i> </div>
                           
                        </div>
                        <div class="dropdown-box  absolute w-56 bottom-0 mb-20 right-0 z-20">
                            <div class="dropdown-box__content box bg-theme-38 text-white">
                                
                                <div class="p-2">
                                    <a href="<?php echo base_url()?>penduduk" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Penduduk </a>
                                    <a href="<?php echo base_url()?>skck" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> SKCK </a>
                               
                                </div>
                                
                            </div>
                        </div>
                    </div>
            
            

                    <div class="intro-x dropdown w-8 h-8 relative">
                        <div class="dropdown-toggle w-8 h-8 ">
                        <div class="menu__icon"> <i data-feather="user"></i> </div>
                        </div>
                        <div class="dropdown-box  absolute w-56 bottom-0 mb-20 right-0 z-20">
                            <div class="dropdown-box__content box bg-theme-38 text-white">
                                <div class="p-4 border-b border-theme-40">
                                    <div class="font-medium">Angelina Jolie</div>
                                    <div class="text-xs text-theme-41">Software Engineer</div>
                                </div>
                                <div class="p-2">
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                                </div>
                                <div class="p-2 border-t border-theme-40">
                                    <a href="<?=base_url('login/logout')?>" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                                </div>
                            </div>
                        </div>
                    </div>
                           
            </div>
            
</div>



        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="<?php echo base_url();?>dist/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>