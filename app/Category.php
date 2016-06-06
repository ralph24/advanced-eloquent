<?php

namespace AdvancedELOQUENT;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	public function Books() {
		return $this->hasMany(Book::class);
	}
	public function getNumBooksAttribute() {
		return $this->books->count();
	}

}
