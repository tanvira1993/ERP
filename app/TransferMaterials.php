<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class TransferMaterials extends Model
{

	protected $primaryKey = 'transfer_material_id';
	protected $table = 'transfer_materials';
	public $timestamps = false;

}
