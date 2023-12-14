<?php
    Route::prefix('System')->group(function() {
    Route::get('/Counties/Index', 'CountyController@index');
    Route::any('/Counties/fetchList','CountyController@fetchList');
    Route::any('/County/Create','CountyController@Create');
    Route::any("County/EditDetails/{id}","CountyController@EditDetails");
    Route::any('Department/Index','DepartmentController@Index');
    Route::any('/Departments/fetchList','DepartmentController@fetchList');
    Route::any('/Departments/Create','DepartmentController@Create');
    Route::any('/Department/EditDetails/{id}','DepartmentController@EditDetails');
    Route::any('Dashboard/MainData','DashboardController@MainData');
    Route::any('/Innovations/GetNodeStats','DashboardController@GetGenStats');
    Route::any('/Dashboard/GetValueChain','DashboardController@GetValueChain');
    Route::any('/Dashboard/getStatisticsByTypes','DashboardController@getStatisticsByTypes');
    Route::any('/Dashboard/getStatisticsByBeneficiary','DashboardController@getStatisticsByBeneficiary');
    Route::any('/Reports/LoadDefault','DashboardController@LoadDefault');

     Route::any('/Entities/GetValueChains/{id}','ValueChainController@GetCountyValues');

     Route::any('/Entities/GetSubCounties/{id}','OrgainizationController@GetSubCounties');
     Route::any('/Innovations/DeleteInnovation/{id}','InnovationController@DeleteInnovation');
    
    Route::any('/Innovations/Create','InnovationController@Create');
    Route::any('/Innovations/edit/{id}','InnovationController@edit');
    Route::any('/Innovations/update/{id}','InnovationController@update')->name('Innovations-update');
    Route::any('/Innovations/Index','InnovationController@Index');
    Route::any('/Innovations/Import','InnovationController@Import');
    Route::any('/Innovations/EditCategory/{id}','InnovationController@EditCategory');
    Route::any('/Innovations/EditBeneficiary/{id}','InnovationController@EditBeneficiary');
    Route::any('/Innovations/EditCoverImage/{id}','InnovationController@EditCoverImage');
    Route::any('/Innovations/fetchList','InnovationController@fetchList');
    Route::any('/Innovations/getWards','InnovationController@GetWards');
    Route::any('/Innovations/Coordinates','InnovationController@Coordinates');
    Route::any('/InnovationCategories/Index','InnovationCategoryController@Index');
    Route::any('/Categories/fetchList','InnovationCategoryController@fetchList');
    Route::any('/InnovationCategories/EditDetails/{id}','InnovationCategoryController@EditDetails');
    Route::any('/InnovationCategories/Create','InnovationCategoryController@Create');
    Route::any('/Innovations/Submit/{id}','InnovationController@Submit');
    Route::any('/Innovations/Submitted','InnovationController@Submitted');
    Route::any('/Publication/Create','PublicationController@Create');
    Route::any('/Publication/Index','PublicationController@Index');
    Route::any('/Publication/fetchList','PublicationController@fetchList');
    Route::any('/Innovations/fetchSubmittedList','InnovationController@fetchSubmittedList');
    Route::any('/Innovations/PendingReview','InnovationController@PendingReview');
    Route::any('/Innovations/fetchSubmittedAdminList','InnovationController@fetchSubmittedAdminList');
    Route::any('/Innovations/MarkApprove/{id}','InnovationController@MarkApprove');


    Route::any('/SuccessStories/Create','SuccessStoryController@CReate');
    Route::any('/SuccessStories/Index','SuccessStoryController@Index');
    Route::any('/SuccessStories/fetchList','SuccessStoryController@fetchList');


    Route::get('/Roles/Index', 'UsermanagementController@index');
    Route::any("/Roles/fetchList","UsermanagementController@fetchList");
    Route::any("/Roles/Create","UsermanagementController@Create");
    Route::any("/Role/ViewPermission/{id}","UsermanagementController@ViewPermission");
    Route::any("/Role/ViewRoleUser/{id}","UsermanagementController@ViewRoleUser");
    Route::any("/Role/Delete/{id}","UsermanagementController@Delete");
    Route::any("/Role/EditDetails/{id}","UsermanagementController@EditDetails");
    Route::any("/Permissions/Index","UsermanagementController@Permissions");
    Route::any("/Permissions/fetchList","UsermanagementController@fetchPemissions");
    Route::any("/Users/CreateAccount","UserController@create");
    Route::any('/Users/Index',"UserController@Index");
    Route::any("/Users/fetchList","UserController@fetchUsers");
    Route::any("/Users/ResetPassword/{id}","UserController@PasswordReset");
    Route::any("/Users/ViewPermission/{id}","UserController@ViewPermission");
    Route::any("/Users/ViewRoleUser/{id}","UserController@ViewRoleUser");
    Route::any("Users/Create","UserController@create");
    Route::any('/SystemAudit/Index','AuditController@Index');
    Route::any('/Audit/fetchList','AuditController@fetchList');
    Route::any('/Users/GetOtherDetails','UserController@GetOtherDetails');

    

});
