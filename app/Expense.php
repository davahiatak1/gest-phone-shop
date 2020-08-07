<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'date',
    	'description',
    	'expense_type_id',
    	'amount',
    	'receipt',
    ];

    public function expenseType()
    {
        return $this->belongsTo('App\ExpenseType');
    }
}
