<?php

use App\Models\ExpenseType;
use App\Models\IncomeType;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Routing\Route;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resource('members', UserController::class);
    $router->resource('income', IncomeController::class);
    $router->resource('expense', ExpenseController::class);
    $router->resource('income_types', IncomeTypesController::class);
    $router->resource('expense_types', ExpenseTypesController::class);
    $router->get('report/monthly_income', 'MonthlyIncomeReportController@index')->name('monthly_income');
});

Route::get('admin/api/users', function (Request $request) {
    $q = $request->get('q');

    return User::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
});
Route::get('admin/api/income_types', function (Request $request) {
    $q = $request->get('q');

    return IncomeType::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
});
Route::get('admin/api/expense_types', function (Request $request) {
    $q = $request->get('q');

    return ExpenseType::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
});
