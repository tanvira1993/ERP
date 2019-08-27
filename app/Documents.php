<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Documents extends Model
{

	protected $primaryKey = 'document_id';
	protected $table = 'document_types';
	public $timestamps = false;

}
