<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $fillable = [
		'category_id',
		'name',
		'father',
		'mother',
		'photo',
		'village',
		'post',
		'thana',
		'district',
		'division',
		'pvillage',
		'ppost',
		'pthana',
		'pdistrict',
		'pdivision',
		'nid',
		'mobile',
		'emergency_contact',
		'relation',
	];

}
