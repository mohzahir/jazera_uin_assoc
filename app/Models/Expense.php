<?php

namespace App\Models;

use Encore\Admin\Admin;
use Encore\Admin\Auth\Database\Administrator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $guarded = 'id';

    public function user()
    {
        return $this->belongsTo(Administrator::class, 'admin_user_id', 'id');
    }

    public function expenseType()
    {
        return $this->hasMany(ExpenseType::class, 'id', 'expense_type_id');
    }
}
