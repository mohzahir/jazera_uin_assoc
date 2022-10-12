<?php

namespace App\Admin\Controllers;

use App\Models\Income;
use App\Models\IncomeType;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class IncomeTypesController extends AdminController
{
    protected $title = 'Income Types';

    protected function grid()
    {
        $grid = new Grid(new IncomeType());

        $grid->column('id', __('Id'));
        // $grid->column('name', __('Name'));
        $grid->column('name', __('Name'));
        $grid->column('user', __('Created By'))->display(function ($user) {
            return $user['name'];
        });
        $grid->column('is_active', __('Active'))->bool();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(IncomeType::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('name'));
        $show->field('admin_user_id', __('admin_user_id'));
        $show->field('is_active', __('is_active'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new IncomeType());

        $form->text('name', __('name'));
        $form->hidden('admin_user_id')->value(auth()->guard('admin')->user()->id);
        // $form->select('admin_user_id', __('User'))->options(function ($id) {
        //     $user = User::find($id);

        //     if ($user) {
        //         return [$user->id => $user->name];
        //     }
        // })->ajax('/admin/api/admin_users')->rules('required|exists:users,id');
        // $form->string('amount', __('amount'));
        // $form->text('amount', __('Amount'))->rules('required|numeric');
        $states = [
            'on'  => ['value' => 1, 'text' => 'active', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'inactive', 'color' => 'danger'],
        ];

        $form->switch("is_active", "Status")->states($states);

        return $form;
    }
}
