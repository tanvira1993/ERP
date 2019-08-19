<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class LabourCosts extends Model
{

	protected $primaryKey = 'labour_cost_id';
	protected $table = 'labour_costs';
	public $timestamps = false;

}
