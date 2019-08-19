<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class SellProjects extends Model
{

	protected $primaryKey = 'sell_project_id';
	protected $table = 'sell_projects';
	public $timestamps = false;

}
