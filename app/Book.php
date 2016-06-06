<?php

namespace AdvancedELOQUENT;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model {
	use SoftDeletes;

	public function category() {
		return $this->belongsTo(Category::class);
	}
}
