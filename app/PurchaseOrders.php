<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class PurchaseOrder extends Model
{

	protected $primaryKey = 'po_id';
	protected $table = 'po';
	public $timestamps = false;

}
