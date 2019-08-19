<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class OwnInvestments extends Model
{

	protected $primaryKey = 'investment_id';
	protected $table = 'own_investments';
	public $timestamps = false;

}
