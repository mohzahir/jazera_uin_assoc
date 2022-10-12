<?php

namespace App\Admin\Controllers;

use App\Models\Expense;
use App\Models\ExpenseType;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ExpenseController extends AdminController
{
    protected $title = 'Expense';

    protected function grid()
    {
        $grid = new Grid(new Expense());

        $grid->column('id', __('Id'));
        // $grid->column('name', __('Name'));
        // $grid->column('expense_type_id', __('Expense type'));
        $grid->column('expenseType', __('Expense Type'))->display(function ($expense_type) {
            return $expense_type[0]['name'];
        });
        $grid->column('user', __('Created By'))->display(function ($user) {
            return $user['name'];
        });
        $grid->column('amount', __('amount'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(Expense::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('expense_type_id', __('Expense type'));
        $show->field('user_id', __('user'));
        $show->field('amount', __('amount'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Expense());

        // $form->textarea('Expense_type_id', __('Expense_type_id'));
        $form->select('expense_type_id', __('Expense Type'))->options(function ($id) {
            $Expense_type = ExpenseType::find($id);

            if ($Expense_type) {
                return [$Expense_type->id => $Expense_type->name];
            }
        })->ajax('/admin/api/expense_types')->rules('required|exists:expense_types,id');
        // $form->textarea('user_id', __('user_id'));
        $form->hidden('admin_user_id')->value(auth()->guard('admin')->user()->id);
        // $form->select('user_id', __('Created By'))->options(function ($id) {
        //     $user = User::find($id);

        //     if ($user) {
        //         return [$user->id => $user->name];
        //     }
        // })->ajax('/admin/api/users')->rules('required|exists:users,id');
        // $form->string('amount', __('amount'));
        $form->text('amount', __('Amount'))->rules('required|numeric');

        return $form;
    }
}
