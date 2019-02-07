<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Student;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class AdminController extends Controller
{
    public function Logout(){
        auth()->logout();
        session()->flash('message', 'Some goodbye message');
        return redirect('/login');
    }

    public function create(Request $request)
    {
        return view('students.upload');
    }

    public function store(Request $request) {
        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
                $path = $request->file->getRealPath();
                $data = Excel::load($path, function($reader) {
                })->get();


                if(!empty($data) && $data->count()){
                    foreach ($data as $key => $row) {
                        //dd($row);
                        $insert[] = [
                            'class_room' => strtok($row->class_room, "."),
                            'teachers_name' => $row->teachers_name,
                            'student_firstname' => strtok($row->student_firstname, "."),
                            'student_lastname' => strtok($row->student_lastname, "."),
                            'gender' => strtok($row->gender, "."),
                            'joined_year' => strtok($row->joined_year, "."),
                            'created_at' => Carbon::now()
                        ];

                       // dd($insert);
                    }
                    if(!empty($insert)){
                        $vv = 0;
                        for ($i=0; $i < sizeof($insert) ; $i++) {
                            if (Student::where('student_firstname',$insert[$i]['student_firstname'])->exists() && Student::where('student_lastname',$insert[$i]['student_lastname'])->exists()) {

                            }else {
                                //orders::create($insert[$i]);
                                DB::table('students')->insert($insert[$i]);
                                $vv++ ;
                            }
                        }
                    }
                }


                //die();
                //print_r($vv); die();
                Session::flash('success', $vv.' '.'Records have been Imported/updated ');
                return redirect('/home');

            }else {
                Session::flash('error', 'File is a '.$extension.' failed');
                return back();
            }
        }
    }

    public function searchOrders(Request $request)
    {
        if($request->ajax()) {
            $search = $request->search;
            $searchStudents= Student::latest('created_at')->where(function ($query) use($search) {
                $query->where('class_room', 'like', '%' . $search . '%')
                    ->orWhere('teachers_name', 'like', '%' . $search . '%')
                    ->orWhere('student_firstname', 'like', '%' . $search . '%')
                    ->orWhere('student_lastname', 'like', '%' . $search . '%')
                    ->orWhere('gender', 'like', '%' . $search . '%')
                    ->orWhere('joined_year', 'like', '%' . $search . '%');
            });

            $students = $searchStudents
                ->where('deleted', '0')
                ->paginate(15);

            return view('students.presult')->with([
                'students' => $students
            ]);
        }
    }

    public function editOrder(Request $request) {
        if($request->ajax()){
            $msg['success'] = 'false';
            $id = $request->id;

            $student = Student::where('id',$id)->first();

            $data = [
                'class_room' => $request->class_room,
                'teachers_name' => $request->teachers_name,
                'student_firstname'  => $request->student_firstname,
                'student_lastname'  => $request->student_lastname,
                'gender'  => $request->gender,
                'joined_year'  => $request->joined_year,
            ];

            $student->update($data);
            Session::flash('success','Student' . ' ' .$request->student_firstname. ' ' .$request->student_lastname. ' has been Updated !');

            $msg['success'] = 'true';
            return response()->json($msg);

        }
    }

    public function quickOrder(StudentRequest $request) {
        $input = $request->all();
        Student::create($input);
        return redirect('home')->with('success','Student has been added Successfully.');
    }

    public function deleteOrder(Request $request) {
        if($request->ajax()){
            $msg['success'] = 'false';
            $student = Student::find($request->id);
            if($student) {
                $student->deleted = $request->deleted;
                $student->save();
            }
            $msg['success'] = 'true';
            Session::flash('error','Student has been deleted');
            return response()->json($msg);
        }
    }

}
