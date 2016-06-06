<?php

use AdvancedELOQUENT\Book;
use AdvancedELOQUENT\Category;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('/', function () {
//	return Book::all();

	$books = Book::get();

	return view('destroy', compact('books'));

});

Route::delete('destroy', function (Request $request) {
	$ids = $request->get('ids');
	if (count($ids)) {
		Book::destroy($ids);
	}
	return back();
});

Route::get('/category', function () {
	//$categories = Category::Has('books')->get();
	$categories = Category::WhereHas('books', function ($query) {
		$query->where('status', 'public');
	})->get();

	return view('relationship', compact('categories'));
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
 */

Route::group(['middleware' => ['web']], function () {
	//
});
