<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Releases extends Model
{

	protected $primaryKey = 'release_id';
	protected $table = 'releases';
	public $timestamps = false;

}
