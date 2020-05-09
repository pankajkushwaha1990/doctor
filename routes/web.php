<?php
// Admin Route
Route::get('/admin_login', function () { return view('public.admin_login'); });
Route::post('/admin_login_submit', 'PublicController@admin_login_submit');
Route::get('/admin_dashboard', 'AdminController@dashboard');
Route::get('/admin_profile_view', 'AdminController@my_profile_view');
Route::get('/admin_logout',function(){ session()->flush(); return redirect('admin_login'); });
Route::get('/admin_doctors_list','AdminController@doctors_list');
Route::get('/admin_patients_list','AdminController@patients_list');
Route::get('/admin_patient_change_status/{status}/{id}', 'AdminController@admin_patient_change_status');
Route::get('/admin_doctor_change_status/{status}/{id}', 'AdminController@admin_doctor_change_status');
Route::get('/admin_doctor_change_premium_status/{status}/{id}', 'AdminController@admin_doctor_change_premium_status');



// public route
Route::get('/','PublicController@index');
Route::get('/login', function () { return view('public.login'); });
Route::post('/login_submit', 'PublicController@login_submit');
Route::get('/search_doctor', 'PublicController@search_doctor');
Route::get('/doctor_profile_view/{id}', 'PublicController@doctor_profile_view');
Route::get('/doctor_appointment_booking/{id}', 'PublicController@doctor_appointment_booking');
Route::get('/ajax_patient_login', 'PublicController@ajax_patient_login');
Route::get('/patient_appointment_checkout', 'PublicController@patient_appointment_checkout');
Route::post('/patient_appointment_checkout_submit', 'PublicController@patient_appointment_checkout_submit');
Route::get('/patient_booking_success/{id}', 'PublicController@patient_booking_success');
Route::get('/patient_booking_failure/{id}', 'PublicController@patient_booking_failure');
Route::get('/term_condition', function () { return view('public.term_condition'); });
Route::get('/privacy_policy', function () { return view('public.privacy_policy'); });
Route::get('/patient_invoice_view/{id}', 'PublicController@patient_invoice_view');
Route::get('/forgot_password', function () {  return view('public.forgot_password'); });
Route::post('/forget_password_submit', 'PublicController@forget_password_submit');
Route::post('/forget_password_otp_submit', 'PublicController@forget_password_otp_submit');









//doctor route
Route::get('/doctor_registration', function () { return view('public.doctor_registration'); });
Route::post('/doctor_registration_submit', 'PublicController@doctor_registration_submit');
Route::get('/doctor_dashboard', 'DoctorController@doctor_dashboard');
Route::get('/doctor_profile_setting', 'PublicController@doctor_profile_setting');
Route::get('/doctor_logout',function(){ session()->flush(); return redirect('login'); });
Route::get('/doctor_appointments', 'DoctorController@doctor_appointments');
Route::get('/doctor_patients', 'DoctorController@doctor_patients');
Route::get('/doctor_schedule_timings', 'DoctorController@doctor_schedule_timings');
Route::get('/doctor_change_password', 'DoctorController@doctor_change_password');
Route::post('/doctor_profile_setting_submit', 'PublicController@doctor_profile_setting_submit');
Route::post('/doctor_schedule_timings_submit', 'DoctorController@doctor_schedule_timings_submit');
Route::post('/doctor_change_password_submit', 'DoctorController@doctor_change_password_submit');
Route::post('/doctor_registration_otp_submit', 'PublicController@doctor_registration_otp_submit');
Route::get('/doctor_slot_clone/{id}', 'DoctorController@doctor_slot_clone');
Route::post('/doctor_appointments_checked_in_submit', 'PublicController@doctor_appointments_checked_in_submit');
Route::get('/doctor_appointments_checkout_status/{status}/{id}', 'PublicController@doctor_appointments_checkout_status');






// patient route
Route::get('/patient_registration', function () { return view('public.patient_registration'); });
Route::post('/patient_registration_submit', 'PublicController@patient_registration_submit');
Route::get('/patient_dashboard', 'PatientController@patient_dashboard');
Route::get('/patient_logout',function(){ session()->flush(); return redirect('login'); });
Route::get('/patient_profile_setting', 'PublicController@patient_profile_setting');
Route::post('/patient_profile_setting_submit', 'PublicController@patient_profile_setting_submit');
Route::post('/patient_registration_otp_submit', 'PublicController@patient_registration_otp_submit');
















Route::get('/dashboard', 'AdminController@dashboard');
Route::get('/logout',function(){ session()->flush(); return redirect('login'); });
Route::get('/package-list', 'AdminController@package_list');
Route::get('/package-create', 'AdminController@package_create');
Route::post('/package-create-submit', 'AdminController@package_create_submit');
Route::get('/package-change-status/{status}/{id}', 'AdminController@package_change_status');
Route::get('/amenities-list', 'AdminController@amenities_list');
Route::get('/amenities-create', 'AdminController@amenities_create');
Route::post('/amenities-create-submit', 'AdminController@amenities_create_submit');
Route::get('/amenities-change-status/{status}/{id}', 'AdminController@amenities_change_status');
Route::get('/amenities-edit/{id}', 'AdminController@amenities_edit');
Route::post('/amenities-edit-submit', 'AdminController@amenities_edit_submit');
Route::get('/amenities-delete/{id}', 'AdminController@amenities_delete');
Route::get('/flight-list', 'AdminController@flight_list');
Route::get('/flight-create', 'AdminController@flight_create');
Route::post('/flight-create-submit', 'AdminController@flight_create_submit');
Route::get('/flight-change-status/{status}/{id}', 'AdminController@flight_change_status');
Route::get('/flight-edit/{id}', 'AdminController@flight_edit');
Route::post('/flight-edit-submit', 'AdminController@flight_edit_submit');
Route::get('/flight-delete/{id}', 'AdminController@flight_delete');
Route::get('/coupon-list', 'AdminController@coupon_list');
Route::get('/coupons-change-status/{status}/{id}', 'AdminController@coupons_change_status');
Route::get('/coupons-edit/{id}', 'AdminController@coupons_edit');
Route::post('/coupon-edit-submit', 'AdminController@coupon_edit_submit');
Route::get('/coupons-delete/{id}', 'AdminController@coupons_delete');
Route::get('/coupons-create', 'AdminController@coupons_create');
Route::post('/coupon-create-submit', 'AdminController@coupon_create_submit');
Route::get('/users-list', 'AdminController@users_list');
Route::get('/user-create', 'AdminController@user_create');
Route::post('/user-create-submit', 'AdminController@user_create_submit');
Route::get('/user-change-status/{status}/{id}', 'AdminController@user_change_status');
Route::get('/user-package-create', 'AdminController@user_package_create');
Route::get('/ajax-user-details-by-id', 'AdminController@ajax_user_details_by_id');
Route::get('/ajax-package-details-by-id', 'AdminController@ajax_package_details_by_id');
Route::post('/user-package-create-submit', 'AdminController@user_package_create_submit');
Route::get('/user-booked-package-list', 'AdminController@user_booked_package_list');
Route::get('/users-package-pay-pending-list', 'AdminController@users_package_pay_pending_list');
Route::post('/user-package-payment-create-submit', 'AdminController@user_package_payment_create_submit');
Route::get('/purchased-package-report-list', 'AdminController@purchased_package_report_list');
Route::get('/purchased-user-report-list', 'AdminController@purchased_user_report_list');
Route::get('/transaction-history-report-list', 'AdminController@transaction_history_report_list');





















































Route::get('/set-new-password/{id}', function ($id) {
    return view('public.set-new-password')->with(array('email'=>$id));
});




Route::post('/forget-password-submit', 'PublicController@forget_password_submit');
Route::post('/set-new-password-submit', 'PublicController@set_new_password_submit');
Route::get('/update-profile', 'AdminController@update_profile');
Route::post('/update-profile-submit', 'AdminController@update_profile_submit');
Route::get('/change-password', 'AdminController@change_password');
Route::post('/change-password-submit', 'AdminController@change_password_submit');
Route::get('/member-list', 'AdminController@member_list');
Route::get('/member-create', 'AdminController@member_create');
Route::post('/member-create-submit', 'AdminController@member_create_submit');
Route::get('/member-assign-menu/{id}', 'AdminController@member_assign_menu');
Route::post('/member-assign-menu-submit', 'AdminController@member_assign_menu_submit');
Route::get('/setting-list', 'AdminController@setting_list');
Route::get('/setting-edit/{id}', 'AdminController@setting_edit');
Route::post('/setting-edit-submit', 'AdminController@setting_edit_submit');
Route::get('/course-list', 'AdminController@course_list');
Route::get('/course-create', 'AdminController@course_create');
Route::post('/course-create-submit', 'AdminController@course_create_submit');
Route::get('/course-edit/{id}', 'AdminController@course_edit');
Route::post('/course-edit-submit', 'AdminController@course_edit_submit');
Route::get('/course-delete/{id}', 'AdminController@course_delete');
Route::get('/member-edit/{id}', 'AdminController@member_edit');
Route::post('/member-edit-submit', 'AdminController@member_edit_submit');
Route::get('/member-delete/{id}', 'AdminController@member_delete');
Route::get('/student-list', 'AdminController@student_list');
Route::get('/student-create', 'AdminController@student_create');
Route::post('/student-create-submit', 'AdminController@student_create_submit');
Route::get('/student-edit/{id}', 'AdminController@student_edit');
Route::post('/student-edit-submit', 'AdminController@student_edit_submit');
Route::get('/student-view/{id}', 'AdminController@student_view');
Route::post('/student-status-change', 'AdminController@student_status_change');
Route::post('/student-mail-send', 'AdminController@student_mail_send');
Route::get('/student-delete/{id}', 'AdminController@student_delete');
Route::get('/student-export', 'AdminController@student_export');
Route::post('/student-export-submit', 'AdminController@student_export_submit');
Route::get('/student-export/{id}', 'AdminController@student_export');
Route::get('/student-assign-id', 'AdminController@student_assign_id');
Route::get('/student-assign-edit/{id}', 'AdminController@student_assign_edit');
Route::post('/student-assign-edit-submit', 'AdminController@student_assign_edit_submit');
Route::get('/student-offer-letter-list', 'AdminController@student_offer_letter_list');
Route::get('/student-offer-edit/{id}', 'AdminController@student_offer_edit');
Route::post('/student-offer-edit-submit', 'AdminController@student_offer_edit_submit');
Route::get('/student-offer-letter-view/{id}', 'AdminController@student_offer_letter_view');
Route::get('/initial-payment-list', 'AdminController@initial_payment_list');
Route::get('/initial-payment-add', 'AdminController@initial_payment_add');
Route::post('/initial-payment-add-submit', 'AdminController@initial_payment_add_submit');
Route::get('/initial-payment-upload', 'AdminController@initial_payment_upload');
Route::post('/initial-payment-upload-submit', 'AdminController@initial_payment_upload_submit');
Route::get('/student-approval-list', 'AdminController@student_approval_list');
Route::get('/student-approval-change-status/{id}', 'AdminController@student_approval_change_status');
Route::post('/student-approval-change-status-submit', 'AdminController@student_approval_change_status_submit');
Route::get('/agent-commision-list', 'AdminController@agent_commision_list');
Route::get('/initial-payment-edit/{id}', 'AdminController@initial_payment_edit');
Route::post('/initial-payment-edit-submit', 'AdminController@initial_payment_edit_submit');
Route::get('/initial-payment-delete/{id}', 'AdminController@initial_payment_delete');
Route::get('/agent-commision-change-payment-status/{id}/{status}', 'AdminController@agent_commision_change_payment_status');
Route::get('/request-for-invoice', 'AdminController@request_for_invoice');
Route::get('/report-list', 'AdminController@report_list');
Route::get('/report-list-details/{id}', 'AdminController@report_list_details');
Route::get('/report-single', 'AdminController@report_single');
Route::get('/email-compose', 'AdminController@email_compose');
Route::post('/email-compose-submit', 'AdminController@email_compose_submit');
Route::get('/enquiry-list', 'AdminController@enquiry_list');
Route::get('/enquiry-compose', 'AdminController@enquiry_compose');
Route::post('/enquiry-compose-submit', 'AdminController@enquiry_compose_submit');
Route::get('/enquiry-list-view/{id}', 'AdminController@enquiry_list_view');
Route::get('notification-list', 'AdminController@notification_list');
Route::get('notification-create', 'AdminController@notification_create');
Route::post('notification-create-submit', 'AdminController@notification_create_submit');
Route::get('notification-list-view/{id}', 'AdminController@notification_list_view');
Route::get('/student-offer-letter-view-public/{id}', 'PublicController@student_offer_letter_view');



















































// Route::get('/admin',function(){
// 	return view('login.adminLogin');
// });
// Route::get('/employee/login',function(){
// 	return view('member.login');
// });

// Route::get('/agent/login',function(){
// 	return view('member.agentlogin');
// });

// Route::get('/reset-password/{id}',function($data){
// 	return view('member.resetPassword')->with(array('code'=>$data));
// });

// Route::get('/forget-password',function(){
// 	return view('member.forgetPassword');
// });

// Route::get('/logout',function(){
// 	session()->flush();
// 	return view('welcome');
// });

// Route::get('/dashboard', 'DashboardController@index');
// Route::get('showNotification/{id}', 'DashboardController@showNotification');
// Route::get('enqueryView/{id}', 'DashboardController@enqueryView');
// Route::get('/singleReport', 'SettingsController@singleReport');
// Route::get('verify/{id}', 'LoginController@emailVerify');
// Route::post('submitConfirmPassword', 'LoginController@submitConfirmPassword');
// Route::post('forgetPasswordSubmit', 'LoginController@forgetPasswordSubmit');





// Route::get('/home', 'DashboardController@index')->name('home');
// Route::get('/updateProfile', 'DashboardController@updateProfile')->name('updateProfile');
// Route::get('/changePassword', 'DashboardController@changePassword')->name('changePassword');
// Route::patch('/updateProfilePost', 'DashboardController@updateProfilePost')->name('updateProfilePost');
// Route::patch('/changePasswordPost', 'DashboardController@changePasswordPost')->name('changePasswordPost');
// Route::resource('course', 'CourseController');
// Route::resource('agent', 'AgentController');
// Route::resource('student', 'StudentController');
// Route::get('student/{id}/edit_b', 'StudentController@editPartB');
// Route::resource('assign', 'AssignController');
// Route::resource('offer', 'OfferController');
// Route::resource('enrollment', 'EnrollmentController');
// Route::resource('member', 'MemberController');
// Route::get('/employee/dashboard', 'EmployeeController@index');
// Route::get('/studentList', 'DynamicController@index');
// Route::get('/studentAdd', 'DynamicController@studentAdd');
// Route::post('/studentSave', 'DynamicController@studentSave');
// Route::get('studentView/{id}', 'DynamicController@studentView');
// Route::resource('setting', 'SettingsController');
// Route::get('setting/{id}/edit', 'SettingsController@edit');
// Route::resource('payment', 'PaymentController');
// Route::get('addPayment', 'SettingsController@addPayment');
// Route::get('reports', 'SettingsController@reports');
// Route::get('enquiry', 'SettingsController@enquiry');
// Route::get('enqiryToagent', 'SettingsController@enqueryToagent');
// Route::patch('enquerySendToAgent', 'SettingsController@enquerySendToAgent');
// Route::get('notification', 'SettingsController@notification');
// Route::get('notificationToagent', 'SettingsController@notificationToagent');
// Route::patch('notificationSendToAgent', 'SettingsController@notificationSendToAgent');
// Route::get('studentApprovel', 'SettingsController@studentApprovel');
// Route::get('changeStatus/{id}/edit', 'SettingsController@changeApprovalStatus');
// Route::patch('changeApprovalStatus', 'SettingsController@changeApprovalSubmit');
// Route::get('coeList', 'SettingsController@coeApprovel');
// Route::get('coeStatus/{id}/edit', 'SettingsController@changeCoeStatus');
// Route::patch('changeCoeStatus', 'SettingsController@changeCoeSubmit');
// Route::get('export', 'SettingsController@export');
// Route::patch('exportGenerate', 'SettingsController@exportGenerate');
// Route::get('requestForInvoice', 'SettingsController@requestForInvoice');
// Route::get('requestForInvoiceFilter', 'SettingsController@requestForInvoiceFilter');
// Route::patch('requestForInvoiceFilter', 'SettingsController@requestForInvoiceFilter');
// Route::get('comissionList', 'SettingsController@comissionList');
// Route::get('agentPay/{id}/{status}', 'SettingsController@agentPay');
// Route::patch('chnageStudentStatus', 'SettingsController@chnageStatus');
// Route::patch('sendEmail', 'SettingsController@sendEmail');


























