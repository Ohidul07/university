<?php

namespace Modules\SMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Programme;
use App\Semester;
use App\Session;

//Models...
use App\User;
use App\models\sms\Student;
use Auth;
class SMSController extends Controller
{

    public function index()
    {
        return view('sms::index');
    }

    public function create()
    {
        return view('sms::create');
    }


    public function store(Request $request)
    {

        
    }

    public function approved()
    {
        $students = User::where('user_type', 'student')->where('activated', 1)->get();
        return view('sms::approved',compact('students'));

    }

    public function pending()
    {
        $students = User::where('user_type', 'student')->where('activated', 0)->get();
        return view('sms::pending',compact('students'));
    }

    public function approving($id)
    {

        $userId = Auth::user()->id;

        $user = User::find($id);
        $user->activated = 1;

        if($user->update())
        {

            $student = new Student();
            $student->user_id = $id;
            $student->first_name = $user->first_name;
            $student->second_name = $user->second_name;
            $student->updated_by = $userId;
            $student->created_by = $userId;
            if($student->save())
            {
                $students = User::where('user_type', 'student')->where('activated', 0)->get();
                return view('sms::pending',compact('students'));
            }
        }
    }


    public function view($id){
        $user=User::where('id',$id)->first();
        $student=Student::where('user_id',$id)->first();
        return view('sms::view',compact('user','student'));
    }


    public function show()
    {
        return view('sms::show');
    }


    public function edit($id)
    {
        $user=user::where('id',$id)->first();
        $student=Student::where('user_id',$id)->first();
        $semesters=Semester::all();
        $programmes=Programme::all();
        $sessions=Session::all();

        return view('sms::edit',compact('student','user','sessions','programmes','semesters'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'first_name' => 'required',
            'second_name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'student_id' => 'required',
            'programme_type' => 'required',
            'semester' => 'required',
            'session' => 'required',
            'photo_url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

            $data = $request->all() ;

$studentData = Student::where('user_id',$id)->first();

         if ($request->hasFile('photo_url')) {

            
            $image = $request->file('photo_url');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $studentData->photo_url = $name;

        }
       

        $userData = User::find($id);

            $userData->first_name = $data['first_name'];
            $userData->second_name = $data['second_name'];
            $userData->email = $data['email'];

            if($userData->update())
            {
                $studentData->gender = $data['gender'];
                $studentData->student_id = $data['student_id'];
                $studentData->mobile_no = $data['mobile_no'];
                $studentData->present_address = $data['present_address'];
                $studentData->permanent_address = $data['permanent_address'];
                $studentData->parents_mobile_no = $data['parents_mobile_no'];
                $studentData->programme_type = $data['programme_type'];
                $studentData->semester = $data['semester'];
                $studentData->session = $data['session'];

                if($studentData->update())
                {
                     return redirect()->route('approved-student')
                    ->with('alert.status', 'success')
                    ->with('alert.message', 'Saved Successfully');
                    
                }
            }


    }


    public function destroy($id)
    {
        $value=User::find($id);
        if($value->delete()){
            return redirect()->back();
        }
        else{
            return 'id does not match';
        }

    }
}
