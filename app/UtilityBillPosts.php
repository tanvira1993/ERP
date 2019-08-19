<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class UtilityBillPosts extends Model
{

	protected $primaryKey = 'utility_bill_post_id';
	protected $table = 'utility_bill_posts';
	public $timestamps = false;

}
