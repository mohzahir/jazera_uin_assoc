<?php

namespace App\Models;

use Encore\Admin\Auth\Database\Administrator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseType extends Model
{
    use HasFactory;

    protected $guarded = 'id';

    public function user()
    {
        return $this->belongsTo(Administrator::class, 'admin_user_id', 'id');
    }

    public function expense()
    {
        return $this->belongsTo(Expense::class);
    }
}
