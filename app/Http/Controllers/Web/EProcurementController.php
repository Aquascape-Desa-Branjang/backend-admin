<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class EProcurementController extends Controller
{
    public function index(): View
    {
        return view('client.pages.e-procurement');
    }
}
