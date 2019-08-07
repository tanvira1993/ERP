<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Vendors extends Model
{

	protected $primaryKey = 'vendor_id';
	protected $table = 'vendors';
	public $timestamps = false;

}
