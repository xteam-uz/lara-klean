<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function main()
    {
        return view('pages.main');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function service()
    {
        return view('pages.service');
    }

    public function project()
    {
        return view('pages.project');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
