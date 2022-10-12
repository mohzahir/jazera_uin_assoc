<?php

namespace App\Admin\Controllers;

use App\Models\Income;
use App\Models\IncomeType;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class IncomeController extends AdminController
{
    protected $title = 'Income';

    protected function grid()
    {
        $grid = new Grid(new Income());

        $grid->column('id', __('Id'));
        $grid->column('incomeType', __('Income Type'))->display(function ($income_type) {
            return $income_type[0]['name'];
        });
        $grid->column('user', __('Member'))->display(function ($user) {
            return $user['name'];
        });
        $grid->column('amount', __('amount'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(Income::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('income_type_id', __('income_type_id'));
        $show->field('user_id', __('user_id'));
        $show->field('amount', __('amount'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Income());

        // $form->textarea('income_type_id', __('income_type_id'));
        $form->select('income_type_id', __('Income Type'))->options(function ($id) {
            $income_type = IncomeType::find($id);

            if ($income_type) {
                return [$income_type->id => $income_type->name];
            }
        })->ajax('/admin/api/income_types')->rules('required|exists:income_types,id');
        // $form->textarea('user_id', __('user_id'));
        $form->select('user_id', __('Member'))->options(function ($id) {
            $user = User::find($id);

            if ($user) {
                return [$user->id => $user->name];
            }
        })->ajax('/admin/api/users')->rules('required|exists:users,id');
        // $form->string('amount', __('amount'));
        $form->text('amount', __('Amount'))->rules('required|numeric');

        return $form;
    }
}
