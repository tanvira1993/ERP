<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Requisitions extends Model
{

	protected $primaryKey = 'pr_id';
	protected $table = 'pr';
	public $timestamps = false;

}
