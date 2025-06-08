<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class MiscWebController extends Controller
{
    public function home(): View
    {
        return view('client.pages.home');
    }

    public function about(): View
    {
        return view('client.pages.about-us');
    }

    public function ourServices(): View
    {
        return view('client.pages.our-services');
    }

    public function legal(?string $type): View
    {
        return view('client.pages.home');
    }
}
