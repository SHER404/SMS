<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/addf', function () {
return view('modules/fee-management/add');
});

Route::GET('create-complaint', [App\Http\Controllers\UserComplaintController::class ,'create']);
Route::POST('store-complaint', [App\Http\Controllers\UserComplaintController::class ,'store']);
Route::GET('track-complaint', [App\Http\Controllers\UserComplaintController::class ,'track']);


Route::get('logout', [App\Http\Controllers\UsersController::class, 'logout']);
Route::get('createrole', [App\Http\Controllers\UserRoleController::class, 'createRole']);
Route::get('createpermission', [App\Http\Controllers\UserRoleController::class, 'createPermission']);
Route::get('assignpermission', [App\Http\Controllers\UserRoleController::class, 'assignPermission']);
Route::get('assignrole', [App\Http\Controllers\UserRoleController::class, 'assignRole']);
Route::middleware([
'auth:sanctum',
config('jetstream.auth_session'),
'verified'
])->group(function () {
Route::get('/dashboard', function () {
return view('dashboard');
})->name('dashboard');
//Index Route
Route::get('/', function () {
return view('index');
});
//Students routes
Route::Resource('students', App\Http\Controllers\StudentsController::class);
Route::POST('student',[App\Http\Controllers\StudentsController::class,'index']);
Route::GET('studentsBirthdays', [App\Http\Controllers\StudentsController::class,'birthdays']);
//Students fee
// permission
Route::post('manage-permission', [App\Http\Controllers\UserRoleController::class , 'allPermissions']);
Route::post('change-user-status', [App\Http\Controllers\UserRoleController::class , 'changeStatus']);
Route::post('delete-confirm', [App\Http\Controllers\UsersController::class , 'deleteConfirm']);
Route::post('change-user-permission', [App\Http\Controllers\UserRoleController::class , 'changePermission']);
Route::Resource('roles',App\Http\Controllers\UserRoleController::class);
Route::Resource('fee-management', App\Http\Controllers\StudentsFeeController::class);
Route::Resource('permissions', App\Http\Controllers\PermissionsController::class);
//fee head
Route::Resource('fee-head', App\Http\Controllers\FeeHeadController::class);

//User log
Route::Resource('userlog', App\Http\Controllers\HistoriesController::class);
// Route::POST('userlog', [App\Http\Controllers\HistoriesController::class, 'newlog']);


// School Visitor 
Route::Resource('school-visitors', App\Http\Controllers\SchoolVisitorController::class);
Route::Resource('school-visitors', App\Http\Controllers\SchoolVisitorController::class);
Route::POST('school-visitor',[ App\Http\Controllers\SchoolVisitorController::class,'index']);
Route::post('change-visitor-status', [App\Http\Controllers\SchoolVisitorController::class , 'changeStatus']);
// School Visitor end

//Student Attendence
Route::POST('student-attendence',[ App\Http\Controllers\StudentAttendenceController::class,'index']);
Route::post('update-student-attendence', [App\Http\Controllers\StudentAttendenceController::class , 'updateAttendence']);
Route::post('update-student-attendence-default', [App\Http\Controllers\StudentAttendenceController::class , 'updateAttendenceDefault']);
Route::Resource('student-attendence-settings', App\Http\Controllers\StudentAttendenceSettingsController::class);
Route::Resource('student-holidays', App\Http\Controllers\StudentsAttendenceHolidaysController::class);
//Employees Attendence
Route::POST('employee-attendence',[ App\Http\Controllers\EmployeesAttendenceController::class,'index']);
Route::post('update-employee-attendence', [App\Http\Controllers\EmployeesAttendenceController::class , 'updateAttendence']);
Route::post('update-employee-attendence-default', [App\Http\Controllers\EmployeesAttendenceController::class , 'updateAttendenceDefault']);
Route::Resource('employee-attendence-settings', App\Http\Controllers\EmployeesAttendenceSettingsController::class);
Route::Resource('employee-holidays', App\Http\Controllers\EmployeesAttendenceHolidaysController::class);
//Country routes
Route::Resource('country', App\Http\Controllers\CountryController::class);
Route::post('new-country', [App\Http\Controllers\CountryController::class , 'newCountry']);
Route::get('create_city_model', [App\Http\Controllers\CountryController::class, 'createcityModel']);
//Country routes
Route::Resource('city', App\Http\Controllers\CityController::class);
Route::post('get-cities', [App\Http\Controllers\CityController::class, 'getCities']);
Route::get('create_town_model', [App\Http\Controllers\CityController::class, 'createtownModel']);
Route::post('new-city', [App\Http\Controllers\CityController::class , 'newCity']);
//Town routes
Route::Resource('town', App\Http\Controllers\TownController::class);
Route::post('getTowns', [App\Http\Controllers\TownController::class, 'getTowns']);
Route::post('new-town', [App\Http\Controllers\TownController::class , 'newTown']);
//students languages routes
Route::Resource('StudentLanguage', App\Http\Controllers\StudentLanguageController::class);
//studenthealth languages routes
Route::Resource('studenthealth', App\Http\Controllers\StudenthealthController::class);
//studenthealth languages routes
Route::Resource('RescuePhone', App\Http\Controllers\RescuePhoneController::class);
//studenthealth languages routes
Route::Resource('EmergencyPhone', App\Http\Controllers\EmergencyPhoneController::class);
//studentfamilymember languages routes
Route::Resource('FamilyMember', App\Http\Controllers\FamilyMemberController::class);
//Classes routes
Route::Resource('classes', App\Http\Controllers\StudentClassController::class);
Route::get('create_section_model', [App\Http\Controllers\StudentClassController::class, 'createclassModel']);
Route::post('new-class', [App\Http\Controllers\StudentClassController::class, 'newClass']);
Route::post('getClasses', [App\Http\Controllers\StudentClassController::class, 'getClasses']);
//Class sections routes
Route::Resource('class-sections', App\Http\Controllers\ClassSectionController::class);
Route::post('new-class-section', [App\Http\Controllers\ClassSectionController::class, 'newClassSection']);
Route::post('getClassSections', [App\Http\Controllers\ClassSectionController::class, 'getSections']);
//Parents Class sections routes
Route::Resource('parents', App\Http\Controllers\StudentParentController::class);
Route::post('new-parent', [App\Http\Controllers\StudentParentController::class , 'newParent']);
Route::get('fetchparents', [App\Http\Controllers\StudentParentController::class, 'fetchParents']);
//Acadmicsessions Class sections routes
Route::Resource('academic-sessions', App\Http\Controllers\AcademicSessionController::class);
//campuses sections routes
Route::Resource('campuses', App\Http\Controllers\CampusesController::class);
Route::Get('crm-settings', [App\Http\Controllers\CampusesController::class , 'getSettings']);
//Employees routes
Route::Resource('employees', App\Http\Controllers\EmployeesController::class);
Route::GET('employeesBirthdays', [App\Http\Controllers\EmployeesController::class,'birthdays']);
//Parents routes
//piadfees routes
Route::Resource('paid-fees-index', App\Http\Controllers\PaidFeesController::class);
Route::POST('paid-fees',[ App\Http\Controllers\PaidFeesController::class,'index']);



//piadfees routes
Route::POST('parentInvoice', [App\Http\Controllers\InvoicesController::class,'parentInvoice']);
Route::GET('generate-challan',[ App\Http\Controllers\InvoicesController::class,'generateChallan']);
Route::POST('add_parent_invoice',[App\Http\Controllers\InvoicesController::class,'add_parent_invoice']);
Route::GET('parentallInvoices', [App\Http\Controllers\InvoicesController::class,'parentallInvoices']);
Route::GET('all_Invoices',[App\Http\Controllers\InvoicesController::class,'all_Invoices']);

Route::POST('edit_single_invoice',[App\Http\Controllers\InvoicesController::class,'edit_single_invoice']);
Route::POST('exportPdf',[App\Http\Controllers\InvoicesController::class,'exportpdf']);
Route::GET('exportPdfview',[App\Http\Controllers\InvoicesController::class,'exportpdfView']);

//User complaints
Route::Resource('complaint', App\Http\Controllers\UserComplaintController::class);
Route::POST('complaintstatus', [App\Http\Controllers\UserComplaintController::class ,'complaintstatus']);

//invoices routes
Route::Resource('invoices', App\Http\Controllers\InvoicesController::class);
//invoice Head routes
Route::Resource('invoice', App\Http\Controllers\InvoiceHeadController::class);
//invoice Users routes
Route::Resource('users', App\Http\Controllers\UsersController::class);
Route::POST('create-user', [App\Http\Controllers\UsersController::class,'createEmpUser']);
Route::POST('store-emp-user',[ App\Http\Controllers\UsersController::class,'storeEmpUser']);
// studentSchool routes
Route::Resource('studentSchools', App\Http\Controllers\StudentSchoolController::class);
// report routes
//   Route::Resource('reports', App\Http\Controllers\ReportController::class);
Route::POST('reports', [App\Http\Controllers\ReportController::class,'index']);
Route::POST('reports-defaulters', [App\Http\Controllers\ReportController::class,'reportsDefaulters']);
Route::POST('show_invoice',[App\Http\Controllers\ReportController::class,'show_invoice']);
//Fee Management routes
Route::get('/fee-management', function () {
return view('modules.fee-management.index');
});
//Parents routes
/*Route::get('/families', function () {
return view('modules.families.index');
});*/
// Route::get('student_fees', function () {
//     return view('modules.student_fees.index');
// });
Route::Resource('families', App\Http\Controllers\FamilyController::class);
Route::post('new-family', [App\Http\Controllers\FamilyController::class, 'newFamily']);
Route::get('create_family_model', [App\Http\Controllers\FamilyController::class, 'createFamilyModel']);
});