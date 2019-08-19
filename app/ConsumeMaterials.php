<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class ConsumeMaterials extends Model
{

	protected $primaryKey = 'Consume_metarial_id';
	protected $table = 'consume_materials';
	public $timestamps = false;

}
