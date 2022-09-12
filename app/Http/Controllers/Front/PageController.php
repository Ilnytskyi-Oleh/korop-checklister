<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        $page = Page::findOrFail(1);

        return view('front.page.page', compact('page'));
    }

    public function consultation()
    {
        $page = Page::findOrFail(2);

        return view('front.page.page', compact('page'));
    }
}
