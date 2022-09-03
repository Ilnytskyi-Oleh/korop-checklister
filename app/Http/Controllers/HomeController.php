<?php

namespace App\Http\Controllers;

use App\Models\ChecklistGroup;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $checklistGroups = ChecklistGroup::with('checklists')->get();
        return view('home', compact('checklistGroups'));
    }
}
