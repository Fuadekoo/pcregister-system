<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pcregister;
use App\Models\user;
use Illuminate\View\View;
// use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\passwordValidationRules;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    //
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(Request $request): View
    {
        $auntheriseduser=Auth::user();
        if($auntheriseduser->usertype !==1){

        }
        $input= $request->validate( [
            'security_id'=>['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'=>['required'],
            'address'=>['required'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);

        $user= User::create([
            'security_id'=>$input['security_id'],
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'password' => Hash::make($input['password']),
        ]);
        $user=user::where('usertype','0')->count();
        $admin=user::where('usertype','1')->count();
        $fake=user::where('usertype','2')->count();
        $studentpc=pcregister::where('description','student')->count();
        $teacherpc=pcregister::where('description','teacher')->count();
        $otherpc=pcregister::where('description','others')->count();
        return view('admin.dashboard',compact('user','admin','fake','studentpc','teacherpc','otherpc'));
        
    }
    public function component(){
        $user=user::where('usertype','0')->count();
        $admin=user::where('usertype','1')->count();
        $fake=user::where('usertype','2')->count();
        $studentpc=pcregister::where('description','student')->count();
        $teacherpc=pcregister::where('description','teacher')->count();
        $otherpc=pcregister::where('description','others')->count();
        return view('admin.component',compact('user','admin','fake','studentpc','teacherpc','otherpc'));
    }
    public function showsecurity(){
        $users = user::where('usertype','0')->get();
        return view('admin.securitylist', compact('users'));
    }

    public function show_fake_security(){
        $users = user::where('usertype','2')->get();;
        return view('admin.all_fake_user', compact('users'));
    }
    public function show_admin_security(){
        $users = user::where('usertype','1')->get();
        return view('admin.all_admin', compact('users'));
    }
    public function show_stud_pc(){
        $pcregisters = pcregister::where('description','student')->get();
        return view('admin.pclist', compact('pcregisters'));
    }
    public function show_staff_pc(){
        $pcregisters = pcregister::where('description','teacher')->get();
        return view('admin.pclist', compact('pcregisters'));
    }
    public function show_other_pc(){
        $pcregisters = pcregister::where('description','other')->get();
        return view('admin.pclist', compact('pcregisters'));
    }
   public function allregister(){
    return view('admin.allregister');
   }
    public function permission()
    {
        $users = User::all();
        $userType = User::where('usertype', 2)->value('usertype'); // Default user type value
        return view('admin.permission', compact('users', 'userType'));
    }
 
    public function update(Request $request)
    {
        $userId = $request->user_id; // Update parameter name to 'user_id'
        $userType = $request->usertype;
    
        $user = User::find($userId);
    
        if ($user) {
            $user->usertype = $userType;
            $user->save();
    
            return redirect()->back()->with('success', 'User Granted successfully.');
        }
    
        return redirect()->back()->with('error', 'User not Granted!!.');
    }

    public function searchpc(Request $request)
{
    $userId = $request->input('user_id');
    // $user = pcregister::find($userId);
    $user = pcregister::where('user_id',$userId)->first();

    if ($user) {
        return view('admin.pc_result', ['user' => $user]);
       
    } else {
        
        return redirect()->back()->with('error', 'pc is not found.');
    
    }
}




}
