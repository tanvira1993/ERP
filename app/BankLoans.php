<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class BankLoans extends Model
{

	protected $primaryKey = 'bank_loan_id';
	protected $table = 'bank_loans';
	public $timestamps = false;

}
