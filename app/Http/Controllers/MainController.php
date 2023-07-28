<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main()
    {
        return redirect('dashboard');
    }
    public function dashboard()
    {
        $applications=Application::latest()->paginate(5);
        return view('dashboard',compact('applications'));
    }
}
