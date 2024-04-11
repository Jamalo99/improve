<?php

use Illuminate\Database\Seeder;

Route::view('/', 'welcome');
Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();
Route::get('session', function() {
    dd(session()->all());
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Capital
    Route::delete('capitals/destroy', 'CapitalController@massDestroy')->name('capitals.massDestroy');
    Route::resource('capitals', 'CapitalController');

    // Macroprocess
    Route::delete('macroprocesses/destroy', 'MacroprocessController@massDestroy')->name('macroprocesses.massDestroy');
    Route::resource('macroprocesses', 'MacroprocessController');

    // Status
    Route::delete('statuses/destroy', 'StatusController@massDestroy')->name('statuses.massDestroy');
    Route::resource('statuses', 'StatusController');

    // Cadence
    Route::delete('cadences/destroy', 'CadenceController@massDestroy')->name('cadences.massDestroy');
    Route::resource('cadences', 'CadenceController');

    // Impact
    Route::delete('impacts/destroy', 'ImpactController@massDestroy')->name('impacts.massDestroy');
    Route::resource('impacts', 'ImpactController');

    // Probability
    Route::delete('probabilities/destroy', 'ProbabilityController@massDestroy')->name('probabilities.massDestroy');
    Route::resource('probabilities', 'ProbabilityController');

    // Workspace
    Route::delete('workspaces/destroy', 'WorkspaceController@massDestroy')->name('workspaces.massDestroy');
    Route::resource('workspaces', 'WorkspaceController');

    // Control Key
    Route::delete('control-keys/destroy', 'ControlKeyController@massDestroy')->name('control-keys.massDestroy');
    Route::resource('control-keys', 'ControlKeyController');

    // Section
    Route::resource('sections', 'SectionController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Risk
    Route::delete('risks/destroy', 'RiskController@massDestroy')->name('risks.massDestroy');
    Route::resource('risks', 'RiskController', ['except' => ['create', 'store', 'show']]);

    // Question
    Route::delete('questions/destroy', 'QuestionController@massDestroy')->name('questions.massDestroy');
    Route::resource('questions', 'QuestionController');

    // Activity
    Route::delete('activities/destroy', 'ActivityController@massDestroy')->name('activities.massDestroy');
    Route::resource('activities', 'ActivityController', ['except' => ['create', 'store', 'show']]);

    // Question Answer
    Route::delete('question-answers/destroy', 'QuestionAnswerController@massDestroy')->name('question-answers.massDestroy');
    Route::resource('question-answers', 'QuestionAnswerController', ['except' => ['create', 'store', 'show']]);

    // Period Answer
    Route::delete('period-answers/destroy', 'PeriodAnswerController@massDestroy')->name('period-answers.massDestroy');
    Route::resource('period-answers', 'PeriodAnswerController', ['except' => ['create', 'store', 'show']]);

    // Protocol
    Route::delete('protocols/destroy', 'ProtocolController@massDestroy')->name('protocols.massDestroy');
    Route::resource('protocols', 'ProtocolController');

    // Protocol Table Question
    Route::delete('protocol-table-questions/destroy', 'ProtocolTableQuestionController@massDestroy')->name('protocol-table-questions.massDestroy');
    Route::resource('protocol-table-questions', 'ProtocolTableQuestionController', ['except' => ['create', 'store', 'show']]);

    // Fraud Answer
    Route::delete('fraud-answers/destroy', 'FraudAnswerController@massDestroy')->name('fraud-answers.massDestroy');
    Route::resource('fraud-answers', 'FraudAnswerController', ['except' => ['create', 'store', 'show']]);

    // Fraud Question
    Route::delete('fraud-questions/destroy', 'FraudQuestionController@massDestroy')->name('fraud-questions.massDestroy');
    Route::resource('fraud-questions', 'FraudQuestionController');

    // Risk Map
    Route::delete('risk-maps/destroy', 'RiskMapController@massDestroy')->name('risk-maps.massDestroy');
    Route::resource('risk-maps', 'RiskMapController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Capital
    Route::delete('capitals/destroy', 'CapitalController@massDestroy')->name('capitals.massDestroy');
    Route::resource('capitals', 'CapitalController');

    // Macroprocess
    Route::delete('macroprocesses/destroy', 'MacroprocessController@massDestroy')->name('macroprocesses.massDestroy');
    Route::resource('macroprocesses', 'MacroprocessController');
    Route::get('fetch-macroprocess', 'MacroprocessController@fetchMacroprocess')->name('macroprocesses.fetch');

    // Status
    Route::delete('statuses/destroy', 'StatusController@massDestroy')->name('statuses.massDestroy');
    Route::resource('statuses', 'StatusController');

    // Cadence
    Route::delete('cadences/destroy', 'CadenceController@massDestroy')->name('cadences.massDestroy');
    Route::resource('cadences', 'CadenceController');

    // Impact
    Route::delete('impacts/destroy', 'ImpactController@massDestroy')->name('impacts.massDestroy');
    Route::resource('impacts', 'ImpactController');

    // Probability
    Route::delete('probabilities/destroy', 'ProbabilityController@massDestroy')->name('probabilities.massDestroy');
    Route::resource('probabilities', 'ProbabilityController');

    // Workspace
    Route::delete('workspaces/destroy', 'WorkspaceController@massDestroy')->name('workspaces.massDestroy');
    Route::resource('workspaces', 'WorkspaceController');

    // Control Key
    Route::delete('control-keys/destroy', 'ControlKeyController@massDestroy')->name('control-keys.massDestroy');
    Route::resource('control-keys', 'ControlKeyController');

    // Section
    Route::resource('sections', 'SectionController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Risk
    Route::delete('risks/destroy', 'RiskController@massDestroy')->name('risks.massDestroy');
    Route::resource('risks', 'RiskController', ['except' => ['create', 'store', 'show']]);

    // Question
    Route::delete('questions/destroy', 'QuestionController@massDestroy')->name('questions.massDestroy');
    Route::resource('questions', 'QuestionController');

    // Activity
    Route::delete('activities/destroy', 'ActivityController@massDestroy')->name('activities.massDestroy');
    Route::resource('activities', 'ActivityController', ['except' => ['create', 'store', 'show']]);
    Route::put('activities', 'ActivityController@update')->name('activities.update');
    Route::delete('activities', 'ActivityController@destroy')->name('activities.destroy');

    // Question Answer
    Route::delete('question-answers/destroy', 'QuestionAnswerController@massDestroy')->name('question-answers.massDestroy');
    Route::resource('question-answers', 'QuestionAnswerController', ['except' => ['create', 'store', 'show']]);
    Route::put('question-answers', 'QuestionAnswerController@update')->name('question-answers.update');

    // Period Answer
    Route::delete('period-answers/destroy', 'PeriodAnswerController@massDestroy')->name('period-answers.massDestroy');
    Route::resource('period-answers', 'PeriodAnswerController', ['except' => ['create', 'store', 'show']]);
    Route::put('period-answers', 'PeriodAnswerController@update')->name('period-answers.update');

    // Protocol
    Route::delete('protocols/destroy', 'ProtocolController@massDestroy')->name('protocols.massDestroy');
    Route::resource('protocols', 'ProtocolController');

    // Protocol Table Question
    Route::delete('protocol-table-questions/destroy', 'ProtocolTableQuestionController@massDestroy')->name('protocol-table-questions.massDestroy');
    Route::resource('protocol-table-questions', 'ProtocolTableQuestionController', ['except' => ['create', 'store', 'show']]);

    // Fraud Answer
    Route::delete('fraud-answers/destroy', 'FraudAnswerController@massDestroy')->name('fraud-answers.massDestroy');
    Route::resource('fraud-answers', 'FraudAnswerController', ['except' => ['create', 'store', 'show']]);
    Route::put('fraud-answers', 'FraudAnswerController@update')->name('fraud-answers.update');

    // Fraud Question
    Route::delete('fraud-questions/destroy', 'FraudQuestionController@massDestroy')->name('fraud-questions.massDestroy');
    Route::resource('fraud-questions', 'FraudQuestionController');

    // Risk Map
    Route::delete('risk-maps/destroy', 'RiskMapController@massDestroy')->name('risk-maps.massDestroy');
    Route::resource('risk-maps', 'RiskMapController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});


