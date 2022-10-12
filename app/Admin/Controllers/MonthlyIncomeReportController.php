<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\IncomeType;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonthlyIncomeReportController extends Controller
{

    public function index()
    {
        return Admin::content(function (Content $content) {

            // optional
            $content->header('Monthly Report');

            // optional
            $content->description('List');
            // table 1

            $data_income = DB::table('incomes')
                ->selectRaw('sum(amount) as total_month_income_amount, month(created_at) as month')
                ->groupBy('month')
                ->get()->toArray();
            $data_expense = DB::table('expenses')
                ->selectRaw('sum(amount) as total_month_expense_amount, month(created_at) as month')
                ->groupBy('month')
                ->get()->toArray();
            foreach ($data_income as $key => $value) {
                # code...
                $value->total_month_expense_amount = $data_expense[$key]->total_month_expense_amount;
                $value->total_month = $value->total_month_income_amount - $data_expense[$key]->total_month_expense_amount;
            }

            // dd($data_income);


            $content->view('monthly_report', ['data' => $data_income]);
        });
    }
}
