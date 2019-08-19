<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class GoodReceives extends Model
{

	protected $primaryKey = 'gr_id';
	protected $table = 'gr';
	public $timestamps = false;

}
