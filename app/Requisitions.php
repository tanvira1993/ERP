<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Requisitions extends Model
{

	protected $primaryKey = 'pr_id';
	protected $table = 'pr';
	public $timestamps = false;

	public function material() {
		return $this->belongsTo('App\Materials', 'material_id' , 'material_id');
	}
	public function project() {
		return $this->belongsTo('App\Projects', 'project_id' , 'project_id');
	}
	public function document() {
		return $this->belongsTo('App\Documents', 'document_id' , 'document_id');
	}

}
