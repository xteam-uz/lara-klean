<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index()
    {
        // $users = DB::select('select * from users');
        $users = DB::table('users')->get();
        return view('users.index', compact('users'));
    }

    public function show(Request $request, string $id)
    {
        dd($request->name);
        return 'show';
    }

    // public function create(): View
    // {
    //     return view('users.create');
    // }

    public function store(Request $request): RedirectResponse
    {
        $uri = $request->accepts(['application/json']);
        dd($uri);
        return redirect('/users/create');
    }
}
