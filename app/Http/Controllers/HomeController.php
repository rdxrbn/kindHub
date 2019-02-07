<?php

namespace App\Http\Controllers;

use App\Student;
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
    public function index(Request $request)
    {
        $students = Student::latest('created_at')->where('deleted',0)->paginate('15');
        if ($request->ajax()) {
            return view('students.presult', compact(['students']));
        }
        return view('students.students',compact('students'));
    }
}
