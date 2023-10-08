<link href="/assets/layouts/vertical-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="/assets/layouts/vertical-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="/assets/layouts/vertical-light-menu/loader.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="/assets/custom/globalcustom.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="/assets/src/plugins/src/font-icons/fontawesome/css/regular.css">
    <link rel="stylesheet" href="/assets/src/plugins/src/font-icons/fontawesome/css/fontawesome.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css">
    <link href="/assets/src/assets/css/light/components/font-icons.css" rel="stylesheet" type="text/css">
    <!--  BEGIN CUSTOM STYLE FILE  -->

    <link href="/assets/src/assets/css/light/components/tabs.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets//css/dark/components/tabs.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css">
    <link href="/assets/src/assets/css/dark/components/font-icons.css" rel="stylesheet" type="text/css">

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="/assets/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/layouts/vertical-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="/assets/layouts/vertical-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    

    @if (request()->is('/'))
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="/assets/src/plugins/src/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="/assets/src/assets/css/light/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/assets/css/dark/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    
    <link href="/assets/src/assets/css/light/components/list-group.css" rel="stylesheet" type="text/css">
    <link href="/assets/src/assets/css/light/dashboard/dash_2.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/components/list-group.css" rel="stylesheet" type="text/css">
    <link href="/assets/src/assets/css/dark/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @endif

    @if (request()->is('students/*') || request()->is('roles/*'))
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link href="/assets/src/plugins/src/select2/vendor/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/src/plugins/src/filepond/filepond.min.css">
    <link rel="stylesheet" href="/assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.css">
    <link href="/assets/src/plugins/css/light/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />
    <link href="/assets/custom/image.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/assets/css/light/components/carousel.css" rel="stylesheet" type="text/css">
    <link href="/assets/src/assets/css/light/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/assets/css/light/components/tabs.css" rel="stylesheet" type="text/css">
    
    <link href="/assets/src/assets/css/dark/components/carousel.css" rel="stylesheet" type="text/css">
    <link href="/assets/src/assets/css/dark/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/assets/css/dark/components/tabs.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    
    <!--  END CUSTOM STYLE FILE  -->
    @endif

    @if (request()->is('students') || request()->is('student') || request()->is('roles') || request()->is('studentsBirthdays') || request()->is('complaint'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />


    @endif

    @if (request()->is('studentSchools'))
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">

    @endif
    @if (request()->is('reports') || request()->is('reports-defaulters'))
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">

    @endif
    

    @if (request()->is('invoices'))
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">

    @endif


    @if (request()->is('invoices'))
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">

    @endif
    @if (request()->is('permissions'))
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">

    @endif
    @if (request()->is('users') || request()->is('users/*'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">
    <link href="/assets/custom/image.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/filepond/filepond.min.css">
    <link rel="stylesheet" href="/assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.css">
    <link href="/assets/src/plugins/css/light/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />

    @endif
    @if (request()->is('manage-permission'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
   
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />


    @endif

    @if (request()->is('classes'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />


    @endif

        @if (request()->is('userlog'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">

    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />


    @endif


 

    @if (request()->is('class-sections'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />


    @endif
   
    @if (request()->is('employees') || request()->is('employeesBirthdays'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    @endif

    @if (request()->is('employees/*'))

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link href="/assets/src/plugins/src/select2/vendor/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/src/plugins/src/filepond/filepond.min.css">
    <link href="/assets/custom/image.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.css">
    <link href="/assets/src/plugins/css/light/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/light/components/carousel.css" rel="stylesheet" type="text/css">
    <link href="/assets/src/assets/css/light/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/assets/css/light/components/tabs.css" rel="stylesheet" type="text/css">
    
    <link href="/assets/src/assets/css/dark/components/carousel.css" rel="stylesheet" type="text/css">
    <link href="/assets/src/assets/css/dark/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/assets/css/dark/components/tabs.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/light/components/list-group.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/light/users/user-profile.css" rel="stylesheet" type="text/css" />

    <link href="/assets/css/dark/components/list-group.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/dark/users/user-profile.css" rel="stylesheet" type="text/css" />

    @endif

    @if (request()->is('parents'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />


    @endif

    @if (request()->is('families'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />


    @endif

    @if (request()->is('families/*'))

    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">

    @endif


    @if (request()->is('class-sections'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />


    @endif
    

    @if (request()->is('academic-sessions'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />


    @endif

    @if (request()->is('class-sections/*'))

    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">

    @endif
    
    @if (request()->is('reports') || request()->is('reports-defaulters'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    @endif


    @if (request()->is('invoices'))

<link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
<link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

<link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
<link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

<link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">

<link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
<link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
<link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
<link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">
<link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
<link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
@endif

    @if (request()->is('invoices'))

<link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
<link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

<link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
<link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

<link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">

<link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
<link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
<link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
<link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">
<link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
<link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
@endif
    
    @if (request()->is('campuses'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />


    @endif

    @if (request()->is('campuses/*'))

    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">

    @endif


    @if (request()->is('country') || request()->is('school-visitors') || request()->is('school-visitor'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />


    @endif

    @if (request()->is('country/*') || request()->is('school-visitors/*') || request()->is('school-visitor'))

    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">

    @endif


    @if (request()->is('city'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />


    @endif

    @if (request()->is('city/*'))

    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">

    @endif

    @if (request()->is('fee-head'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />


    @endif

    @if (request()->is('fee-head/*'))

    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">

    @endif

    @if (request()->is('fee-management'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />


    @endif

    @if (request()->is('fee-management/*'))

    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">

    @endif


    
    @if (request()->is('town'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />


    @endif

    @if (request()->is('town/*'))

    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">

    @endif

    
    @if (request()->is('paid-fees/*'))
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link href="/assets/src/plugins/src/select2/vendor/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/src/plugins/src/filepond/filepond.min.css">
    <link rel="stylesheet" href="/assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.css">
    <link href="/assets/src/plugins/css/light/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/light/components/carousel.css" rel="stylesheet" type="text/css">
    <link href="/assets/src/assets/css/light/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/assets/css/light/components/tabs.css" rel="stylesheet" type="text/css">
    
    <link href="/assets/src/assets/css/dark/components/carousel.css" rel="stylesheet" type="text/css">
    <link href="/assets/src/assets/css/dark/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/assets/css/dark/components/tabs.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    
    <!--  END CUSTOM STYLE FILE  -->
    @endif


    @if (request()->is('parentallInvoices/*'))
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link href="/assets/src/plugins/src/select2/vendor/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/src/plugins/src/filepond/filepond.min.css">
    <link rel="stylesheet" href="/assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.css">
    <link href="/assets/src/plugins/css/light/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/light/components/carousel.css" rel="stylesheet" type="text/css">
    <link href="/assets/src/assets/css/light/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/assets/css/light/components/tabs.css" rel="stylesheet" type="text/css">
    
    <link href="/assets/src/assets/css/dark/components/carousel.css" rel="stylesheet" type="text/css">
    <link href="/assets/src/assets/css/dark/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/assets/css/dark/components/tabs.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    
    <!--  END CUSTOM STYLE FILE  -->
    @endif
    @if (request()->is('crm-settings') )
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">
   
    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif 


    @if (request()->is('paid-fees') || request()->is('generate-challan') || request()->is('paid-fees-index') || request()->is('student-attendence') || request()->is('employee-attendence'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">
    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    @endif


    @if (request()->is('parentallInvoices'))

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    


    @endif

    @if (request()->is('invoices/*'))
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/forms/switches.css">
    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css">
    <link href="/assets/src/plugins/src/select2/vendor/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/src/plugins/src/filepond/filepond.min.css">
    <link rel="stylesheet" href="/assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.css">
    <link href="/assets/src/plugins/css/light/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/light/components/carousel.css" rel="stylesheet" type="text/css">
    <link href="/assets/src/assets/css/light/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/assets/css/light/components/tabs.css" rel="stylesheet" type="text/css">
    
    <link href="/assets/src/assets/css/dark/components/carousel.css" rel="stylesheet" type="text/css">
    <link href="/assets/src/assets/css/dark/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/assets/css/dark/components/tabs.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    
    <link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    
    <!--  END CUSTOM STYLE FILE  -->
    @endif

    @if (request()->is('invoice'))

<link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/dt-global_style.css">
<link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

<link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
<link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

<link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">

<link href="/assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
<link href="/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

<link href="/assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
<link href="/assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />



@endif