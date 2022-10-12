<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $guarded = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function incomeType()
    {
        return $this->hasMany(IncomeType::class, 'id', 'income_type_id');
    }
}
