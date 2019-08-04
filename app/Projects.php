<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Projects extends Model
{

	protected $primaryKey = 'project_id';
	protected $table = 'projects';
	public $timestamps = false;

}
