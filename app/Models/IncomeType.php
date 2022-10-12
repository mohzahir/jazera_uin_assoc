<?php

namespace App\Models;

use Encore\Admin\Auth\Database\Administrator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeType extends Model
{
    use HasFactory;

    protected $guarded = 'id';

    protected $table = 'income_types';

    public function user()
    {
        return $this->belongsTo(Administrator::class, 'admin_user_id', 'id');
    }

    public function income()
    {
        return $this->belongsTo(Income::class);
    }
}
