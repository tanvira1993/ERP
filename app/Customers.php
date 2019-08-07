<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Customers extends Model
{

	protected $primaryKey = 'customer_id';
	protected $table = 'customers';
	public $timestamps = false;

}
