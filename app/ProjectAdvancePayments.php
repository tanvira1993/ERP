<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class ProjectAdvancePayments extends Model
{

	protected $primaryKey = 'project_advance_payment_id';
	protected $table = 'project_advance_payments';
	public $timestamps = false;

}
