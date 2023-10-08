    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="/assets/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="/assets/layouts/vertical-light-menu/app.js"></script>
    <script src="/assets/src/plugins/src/font-icons/feather/feather.min.js"></script>
    <script src="/assets/custom/globalcustom.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    @if (request()->is('/'))
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="/assets/src/plugins/src/apex/apexcharts.min.js"></script>
    <script src="/assets/src/assets/js/dashboard/dash_1.js"></script>
    <script src="/assets/src/assets/js/dashboard/dash_2.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    @endif

    @if (request()->is('students/*') || request()->is('roles/*') || request()->is('studentsBirthdays'))
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/select2/vendor/dist/js/select2.min.js"></script>
    <script src="/assets/custom/students/custom.js"></script>
    <script src="/assets/custom/image.js"></script>

    <script src="/assets/src/plugins/src/filepond/filepond.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageCrop.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageResize.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageTransform.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/custom-filepond.js"></script>
    <script src="/assets/src/plugins/src/repeater/repeater.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    @endif

    @if (request()->is('students') || request()->is('student'))
    <script src="/assets/custom/students/custom.js"></script>
    @endif
    @if (request()->is('complaint/create'))
    <script src="/assets/custom/complaints/custom.js"></script>
    @endif
    @if (request()->is('students') || request()->is('student') || request()->is('roles') || request()->is('studentsBirthdays') || request()->is('complaint'))

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>

    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif

    @if (request()->is('classes'))

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>

    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif

        @if (request()->is('userlog'))

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>

    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif


    <!-- //userlog -->

    @if (request()->is('class-sections') )

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>

    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif

    @if (request()->is('employees') || request()->is('employeesBirthdays'))

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>

    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif 

    @if (request()->is('employees/*'))

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/custom/employees/custom.js"></script>
    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/custom/image.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/select2/vendor/dist/js/select2.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/filepond.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageCrop.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageResize.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageTransform.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/custom-filepond.js"></script>
    <script src="/assets/src/plugins/src/repeater/repeater.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif

    @if (request()->is('parents'))

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>

    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif 

    @if (request()->is('families'))

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>

    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif 

    @if (request()->is('families/*'))

    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
    <script src="/assets/custom/families/custom.js"></script>

    @endif

    @if (request()->is('fee-head'))

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>

    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif 

    @if (request()->is('fee-head/*'))

    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
    <script src="/assets/custom/students/custom.js"></script>

    @endif


    @if (request()->is('academic-sessions'))

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>

    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif 

    @if (request()->is('class-sections/*'))

    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
    <script src="/assets/custom/classsection/custom.js"></script>

    @endif
    

    @if (request()->is('campuses'))

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>

    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif 

    @if (request()->is('country') || request()->is('school-visitors') || request()->is('school-visitor'))

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>

    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif 
    @if (request()->is('school-visitor') || request()->is('school-visitors') || request()->is('school-visitors/*'))

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
<script src="/assets/custom/SchoolVisitor/custom.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->  

@endif 


    @if (request()->is('city'))

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>

    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif 

    @if (request()->is('town'))

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
<script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
<script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
<script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
<script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
<script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>

<script src="/assets/src/assets/js/scrollspyNav.js"></script>
<script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
<script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->  

@endif 


    
    
    @if (request()->is('fee-management'))
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>

    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif 

    @if (request()->is('fee-management/*'))
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/select2/vendor/dist/js/select2.min.js"></script>
    <script src="/assets/custom/students/custom.js"></script>
    <script src="/assets/custom/fee_management/custom.js"></script>
    <script src="/assets/src/plugins/src/filepond/filepond.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageCrop.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageResize.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageTransform.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/custom-filepond.js"></script>
    <script src="/assets/src/plugins/src/repeater/repeater.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    @endif
  

    @if (request()->is('paid-fees') || request()->is('generate-challan') || request()->is('paid-fees-index') || request()->is('student-attendence') || request()->is('employee-attendence'))
<!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>
    <script src="/assets/custom/paidfees/custom.js"></script>
    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif 
    @if (request()->is('crm-settings') )
<!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>
   
    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif 
    
    @if (request()->is('student-attendence'))

    <script src="/assets/custom/attendence/custom.js"></script>
   

    @endif
    @if (request()->is('employee-attendence'))

    <script src="/assets/custom/attendence/employee.js"></script>
   

    @endif 


    @if (request()->is('parentallInvoices'))
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>

    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif 


    @if (request()->is('users') || request()->is('users/*'))
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
        <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
        <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
        <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
        <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
        <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>
        <script src="/assets/custom/users/custom.js"></script>
        <script src="/assets/custom/image.js"></script>
        <script src="/assets/src/assets/js/scrollspyNav.js"></script>
        <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
        <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>

        <script src="/assets/src/plugins/src/filepond/filepond.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageCrop.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageResize.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageTransform.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/custom-filepond.js"></script>
    <script src="/assets/src/plugins/src/repeater/repeater.js"></script>
        <!-- END PAGE LEVEL SCRIPTS -->  
    
        @endif 
        @if (request()->is('reports') || request()->is('reports-defaulters'))
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
            <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
            <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
            <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
            <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
            <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>
            <script src="/assets/custom/reports/custom.js"></script>
            <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
            <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
            <script src="/assets/src/assets/js/scrollspyNav.js"></script>
            <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
            <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
            <script src="/assets/src/assets/js/scrollspyNav.js"></script>
            <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
            <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
            <!-- END PAGE LEVEL SCRIPTS -->  
        
            @endif 

            @if (request()->is('invoices'))
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
            <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
            <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
            <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
            <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
            <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>
            <script src="/assets/custom/reports/custom.js"></script>
            <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
            <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
            <script src="/assets/src/assets/js/scrollspyNav.js"></script>
            <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
            <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
            <script src="/assets/src/assets/js/scrollspyNav.js"></script>
            <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
            <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>

           

       <!-- END PAGE LEVEL SCRIPTS -->  
        
            @endif 

        @if (request()->is('manage-permission'))
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
        <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
        <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
        <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
        <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
        <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>
        <script src="/assets/custom/permission-management/custom.js"></script>
        <script src="/assets/src/assets/js/scrollspyNav.js"></script>
        <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
        <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
        <!-- END PAGE LEVEL SCRIPTS -->  
    
        @endif 
        @if (request()->is('permissions'))
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
        <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
        <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
        <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
        <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
        <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>
        <script src="/assets/custom/permission-management/custom.js"></script>
        <script src="/assets/src/assets/js/scrollspyNav.js"></script>
        <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
        <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
        <!-- END PAGE LEVEL SCRIPTS -->  
    
        @endif 


        @if (request()->is('studentSchools'))
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="/assets/src/plugins/src/table/datatable/datatables.js"></script>
            <script src="/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
            <script src="/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>    
            <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
            <script src="/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
            <script src="/assets/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>
        
            <script src="/assets/src/assets/js/scrollspyNav.js"></script>
            <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
            <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
            <!-- END PAGE LEVEL SCRIPTS -->  
        
            @endif 

    @if (request()->is('paid-fees/*'))
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/select2/vendor/dist/js/select2.min.js"></script>
    <script src="/assets/custom/students/custom.js"></script>
    <script src="/assets/src/plugins/src/filepond/filepond.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageCrop.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageResize.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageTransform.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/custom-filepond.js"></script>
    <script src="/assets/src/plugins/src/repeater/repeater.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    @endif



    @if (request()->is('parentallInvoices/*'))
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/select2/vendor/dist/js/select2.min.js"></script>
    <script src="/assets/custom/students/custom.js"></script>
    <script src="/assets/src/plugins/src/filepond/filepond.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageCrop.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageResize.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageTransform.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/custom-filepond.js"></script>
    <script src="/assets/src/plugins/src/repeater/repeater.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    @endif




    @if (request()->is('invoices/*'))
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
    <script src="/assets/src/assets/js/scrollspyNav.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js"></script>
    <script src="/assets/src/plugins/src/select2/vendor/dist/js/select2.min.js"></script>
    <script src="/assets/custom/students/custom.js"></script>
    <script src="/assets/src/plugins/src/filepond/filepond.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageCrop.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageResize.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/FilePondPluginImageTransform.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js"></script>
    <script src="/assets/src/plugins/src/filepond/custom-filepond.js"></script>
    <script src="/assets/src/plugins/src/repeater/repeater.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    @endif

    
    @if (request()->is('invoices/create') || request()->is('edit_single_invoice') )
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/custom/invoices/custom.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    @endif 


    
