<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class RejectGoods extends Model
{

	protected $primaryKey = 'reject_good_id';
	protected $table = 'reject_goods';
	public $timestamps = false;

}
