<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class CurrentStock extends Model
{

	protected $primaryKey = 'current_stock_id';
	protected $table = 'current_stock';
	public $timestamps = false;

}
