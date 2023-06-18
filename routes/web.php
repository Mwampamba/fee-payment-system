<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{
    AcademicYearController,
    AuthenticationController,
    DashboardController,
    StaffController,
    ProgrammeController,
    SemesterController,
    ClassController,
    ClassPromotionController,
    StudentController,
    StudentAuthenticationController,
    PaymentController,
    StudentPayment
};

Route::group(['middleware' => ['staffAuthentication']], function () {
    #PAYMENTS
    Route::controller(StudentPayment::class)->group(function () {
        Route::get('authentication/payments', 'getAllStudentPayments')->name('getAllStudentPayments');
        Route::get('authentication/individual-student/{student_id}', 'singleStudentPayments')->name('individualStudentPayments');
        Route::get('authentication/generate-exam-number/{student_id}', 'generateExaminationNumber')->name('generateExaminationNumber');
    });
    #ACADEMIC-YEARS
    Route::controller(AcademicYearController::class)->group(function () {
        Route::get('authentication/years', 'index')->name('academicYears')->middleware('can:isAdmin');
        Route::get('authentication/years/add-academic-year', 'create')->name('addAcademicYear')->middleware('can:isAdmin');
        Route::post('authentication/years/add-academic-year', 'save')->name('saveAcademicYear')->middleware('can:isAdmin');
        Route::get('authentication/years/{year_id}', 'edit')->name('editAcademicYear')->middleware('can:isAdmin');
        Route::put('authentication/years/{year_id}', 'update')->name('updateAcademicYear')->middleware('can:isAdmin');
        Route::get('authentication/archives/years/delete/{year_id}', 'destory')->name('deleteAcademicYear')->middleware('can:isAdmin');
    });
    Route::controller(StaffController::class)->group(function () {
        Route::get('authentication/staffs', 'index')->name('staffs');
        Route::get('authentication/staffs/new', 'addNewStaff')->name('addNewStaff')->middleware('can:isAdmin');
        Route::post('authentication/staffs/new', 'saveNewStaff')->name('saveNewStaff')->middleware('can:isAdmin');
        Route::get('authentication/staffs/edit/{staff_id}', 'editStaff')->name('editStaff')->middleware('can:isAdmin');
        Route::put('authentication/staffs/edit/{staff_id}', 'updateStaff')->name('updateStaff')->middleware('can:isAdmin');
        Route::get('authentication/staffs/delete/{staff_id}', 'deleteStaff')->name('deleteStaff')->middleware('can:isAdmin');
    });
    # STAFFS-DASHBOARD
    Route::controller(DashboardController::class)->group(function () {
        Route::get('authentication/dashboard', 'dashboard')->name('dashboard');
        Route::get('authentication/update-password', 'getPasswordUpdate')->name('getPasswordUpdate');
        Route::put('authentication/update-password', 'changeStaffPassword')->name('changeStaffPassword');
        
        Route::get('authentication/logout', 'logout')->name('staffLogout');
    });
    #PROGRAMMES
    Route::controller(ProgrammeController::class)->group(function () {
        Route::get('authentication/programmes', 'index')->name('programmes')->middleware('can:isAdmin');
        Route::get('authentication/programmes/add-programme', 'create')->name('addProgramme')->middleware('can:isAdmin');
        Route::post('authentication/programmes/add-programme', 'save')->name('saveProgramme')->middleware('can:isAdmin');
        Route::get('authentication/programmes/{programme_id}', 'edit')->name('editProgramme')->middleware('can:isAdmin');
        Route::put('authentication/programmes/{programme_id}', 'update')->name('updateProgramme')->middleware('can:isAdmin');
        Route::get('authentication/programmes/delete/{programme_id}', 'destroy')->name('deleteProgramme')->middleware('can:isAdmin');
    });
     #SEMESTERS
     Route::controller(SemesterController::class)->group(function () {
        Route::get('authentication/semesters', 'index')->name('semesters')->middleware('can:isAdmin');
        Route::get('authentication/semesters/add-semester', 'create')->name('addSemester')->middleware('can:isAdmin');
        Route::post('authentication/semesters/add-semester', 'save')->name('saveSemester')->middleware('can:isAdmin');
        Route::get('authentication/semesters/{semester_id}', 'edit')->name('editSemester')->middleware('can:isAdmin');
        Route::put('authentication/semesters/{semester_id}', 'update')->name('updateSemester')->middleware('can:isAdmin');
        Route::get('authentication/semesters/deactivate/{semester_id}', 'deactivate')->name('deactivateSemester')->middleware('can:isAdmin');
        Route::get('authentication/archives/semesters', 'deactivated_semesters')->name('getDeactivatedSemesters')->middleware('can:isAdmin');
        Route::get('authentication/archives/semesters/{semester_id}', 'restore_semesters')->name('restoreSemesters')->middleware('can:isAdmin');
        Route::get('authentication/archives/semesters/delete/{year_id}', 'destroy')->name('deleteSemester')->middleware('can:isAdmin');
    });
    #CLASSES
    Route::controller(ClassController::class)->group(function () {
        Route::get('authentication/classes', 'index')->name('classes')->middleware('can:isAdmin');
        Route::get('authentication/class/individual/{student_id}', 'studentClassPayments')->name('studentClassPayments');
        Route::get('authentication/classes/view/{class_id}', 'viewClassMembers')->name('viewClassMembers')->middleware('can:isAdmin');
        Route::get('authentication/classes/add-class', 'create')->name('addClass')->middleware('can:isAdmin');
        Route::post('authentication/classes/add-class', 'save')->name('saveClass')->middleware('can:isAdmin');
        Route::get('authentication/classes/{class_id}', 'edit')->name('editClass')->middleware('can:isAdmin');
        Route::put('authentication/classes/{class_id}', 'update')->name('updateClass')->middleware('can:isAdmin');
        Route::get('authentication/classes/delete/{class_id}', 'destroy')->name('deleteClass')->middleware('can:isAdmin');
    });
    #PROMOTION
    Route::controller(ClassPromotionController::class)->group(function () {
        Route::get('authentication/promotion', 'create')->name('classPromotion')->middleware('can:isAdmin');
        Route::post('authentication/promotion', 'save')->name('saveClassPromotion')->middleware('can:isAdmin');
    });
    #STUDENTS
    Route::controller(StudentController::class)->group(function () {
        Route::get('authentication/students', 'index')->name('students');
        Route::get('authentication/students/add-student', 'create')->name('addStudent')->middleware('can:isAdmin');
        Route::post('authentication/students/add-student', 'save')->name('saveStudent')->middleware('can:isAdmin');
        Route::get('authentication/students/{student_id}', 'edit')->name('editStudent')->middleware('can:isAdmin');
        Route::put('authentication/students/{student_id}', 'update')->name('updateStudent')->middleware('can:isAdmin');
        Route::get('authentication/students/delete/{student_id}', 'destroy')->name('deleteStudent')->middleware('can:isAdmin');
        Route::get('authentication/students/individual/{student_id}', 'studentPayments')->name('studentAllPayments');
    });
});
#STUDENT
Route::group(['middleware' => ['studentAuthentication']], function () {
    Route::controller(StudentAuthenticationController::class)->group(function () {
        #DASHBOARD
        Route::get('student/dashboard', 'dashboard')->name('studentDashboard');
        Route::get('student/update-password', 'getPasswordUpdateForm')->name('getPasswordUpdateForm');
        Route::put('student/update-password', 'changePassword')->name('changePassword');
        Route::get('student/logout', 'logout')->name('studentLogout');
    });

    Route::controller(PaymentController::class)->group(function () {
        #PAYMENT
        Route::get('student/individual-payments', 'singleStudentPayments')->name('studentPayments');
        Route::get('student/payments/create', 'createPayments')->name('createPayments');
        Route::get('authentication/generate-invoice', 'generateInvoice')->name('generateInvoice');
        Route::post('pay', 'pay')->name('savePayment');
        Route::get('success', 'success'); 

    });
});

# STAFFS-AUTHENTICATION
Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/', 'get_login')->name('getLogin');
    Route::post('/', 'post_login')->name('postLogin');
    Route::get('/forgot-password', 'get_forgot_password')->name('getForgotPassword');
    Route::post('/forgot-password', 'post_forgot_password')->name('postForgotPassword');
    Route::get('/reset-password/{token}', 'reset_password')->name('resetPassword');
    Route::put('/update-password', 'update_password')->name('updatePassword');
    # STUDENT
    Route::get('/student/forgot-password', 'studentGetForgotPassword')->name('studentGetForgotPassword');
    Route::post('/student/forgot-password', 'studentPostForgotPassword')->name('studentPostForgotPassword');
    Route::get('/student/reset-password/{token}', 'studentResetPassword')->name('studentResetPassword');
    Route::put('/student/update-password', 'studentUpdatePassword')->name('studentUpdatePassword');
});

