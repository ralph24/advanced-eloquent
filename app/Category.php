<?php

namespace AdvancedELOQUENT;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	public function Books() {
		return $this->hasMany(Book::class);
	}
	public function getNumBooksAttribute() {
		//return count($this->books);
		return count($this->books->where('status', 'public'));
	}
	public function getBooksPublicAttribute() {
		return $this->books->where('status', 'public');
	}

}
