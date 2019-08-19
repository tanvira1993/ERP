<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class SellMaterials extends Model
{

	protected $primaryKey = 'sell_material_id';
	protected $table = 'sell_materials';
	public $timestamps = false;

}
