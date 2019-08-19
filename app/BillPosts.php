<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class BillPosts extends Model
{

	protected $primaryKey = 'bill_post_id';
	protected $table = 'bill_posts';
	public $timestamps = false;

}
