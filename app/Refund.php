<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Refund extends Model
{

	protected $primaryKey = 'refund_id';
	protected $table = 'refund';
	public $timestamps = false;

}
