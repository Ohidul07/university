<?php

namespace Modules\TMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\User;
use Auth;
use App\models\tms\Teacher;
class TMSController extends Controller
{

    public function index()
    {
        return view('tms::index');
    }


    public function create()
    {
        return view('tms::create');
    }


    public function store(Request $request)
    {

    }

    public function approved(){
       
       $teachers=User::where('user_type','teacher')->where('activated',1)->get();
       return view('tms::approved',compact('teachers'));
    }

    public function pending(){
         
        $teachers=User::where('user_type','teacher')->where('activated',0)->get();
        return view('tms::pending',compact('teachers'));

    }

    public function approving($id){

        $UserId=Auth::user()->id;

        $user=User::find($id);
        $user->activated = 1;
        
        if($user->update()){
            $teacher= new Teacher();
            $teacher->user_id=$id;
            $teacher->first_name=$user->first_name;
            $teacher->second_name=$user->second_name;
            $teacher->updated_by=$UserId;
            $teacher->created_by=$UserId;
            if($teacher->save()){

                $teachers=User::where('user_type','teacher')->where('activated',0)->get();
                return view('tms::pending',compact('teachers'));

            }
        }

    }


    public function show()
    {
        return view('tms::show');
    }


    public function edit($id)
    {
        $user=User::where('id',$id)->first();
        $teacher=Teacher::where('user_id',$id)->first();
        return view('tms::edit',compact('user','teacher'));
    }

    public function view($id)
    {
        $user=User::where('id',$id)->first();
        $teacher=Teacher::where('user_id',$id)->first();
        return view('tms::view',compact('user','teacher'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'first_name' => 'required',
            'second_name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'photo_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cv_url' =>'required', 
        ]);

            $data = $request->all();
            
        if ($request->hasFile('photo_url')) {

            $TeacherData = Teacher::where('user_id',$id)->first();
            $image = $request->file('photo_url');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $TeacherData->photo_url = $name;

            if ($request->hasFile('cv_url')) {

                $cv = $request->file('cv_url');
                $name = time().'.'.$cv->getClientOriginalExtension();
                $destinationPath = public_path('/pdfs');
                $cv->move($destinationPath, $name);
                $TeacherData->cv_url = $name;

                $UserData=User::find($id);

                $UserData->first_name=$data['first_name'];
                $UserData->second_name=$data['second_name'];
                $UserData->email=$data['email'];

            if($UserData->update()){

                $TeacherData->gender=$data['gender'];
                $TeacherData->designation=$data['designation'];
                $TeacherData->mobile_no=$data['mobile_no'];
                $TeacherData->write_cv=$data['write_cv'];


            if($TeacherData->update()){

                return redirect()->route('approved-teacher');
            }   

            }
      }
    }
}


    public function destroy($id)
    {

        $value=User::find($id);
        if($value->delete()){
            return redirect()->back();
        }
    }
}
