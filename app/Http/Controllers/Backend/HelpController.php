<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use View;

class HelpController extends Controller {

	public function index() {
		return View::make('backend.help.index');
	}
}
