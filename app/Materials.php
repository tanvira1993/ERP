<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Materials extends Model
{

	protected $primaryKey = 'material_id';
	protected $table = 'materials';
	public $timestamps = false;

}
