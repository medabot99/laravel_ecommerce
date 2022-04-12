<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use App\User;
use App\Role;
use App\Mail\ResetPassword;
use App\Configuration;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use Maatwebsite\Excel\HeadingRowImport;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller

{

    public function display_user(){

        $users = User::all()->except(auth()->user()->id);

        $columns = array(
            'No',
            'Picture',
            'Username',
            'Name',
            'Email',
            'Phone',
            'Address',
            'System Role',
            'Last Updated',
            'Profile',
            'Action'
        );


        return view('users.display',compact('users', 'columns'));

    }

    public function view_user(User $user){

        return view('users.view',compact('user'));

    }

    public function create_user_page(){

        $roles = Role::all();

        return view('users.create', compact('roles'));

    }

    public function create_user(Request $request){

        $request->validate([
            'username' => 'required|unique:users,username|min:3',
            'name' => 'required|min:5',
            'email' => 'required|unique:users,email',
            'role' => 'required',
            'password' => 'required|min:6'
        ]);

        $user = User::create([

            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role

        ]);

        return redirect('/user')->with('success',['User Created']);

    }

    public function edit_user_page(User $user){

        $roles = Role::all();

        return view('users.edit',compact('user','roles'));

    }

    public function update_user(Request $request,User $user){

        $request->validate([
            'username' => 'required|unique:users,username,'.$user->id.'|min:3',
            'name' => 'required|min:5',
            'email' => 'required|unique:users,email,'.$user->id.'',
            'role' => 'required'
        ]);

        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;

        $user->save();

        return redirect('/user')->with('success',['User Info Updated']);

    }

    public function delete_user(User $user){

        $user->delete();

        return redirect('/user')->with('success',['User deleted']);
    }

    public function update_password_page(){

        $user = User::find(auth()->user()->id);

        return view('users.password',compact('user'));

    }

    public function update_password(Request $request){

        $user = User::find(auth()->user()->id);

        $request->validate([
            'old_password' => 'required|min:6',
            'password' => 'required|min:6|confirmed'
        ]);

        if (!Hash::check($request->old_password,$user->password)){

            return redirect()->back()->withErrors(['Current Password is not same!']);

        }

        if (Hash::check($request->password,$user->password)){

            return redirect()->back()->withErrors(['New Password is cannot same with current password. Choose different password!']);

        }

        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->back()->with('success',['Your password updated sucessfully']);

    }

    public function profile_page(){

        $user = User::find(auth()->user()->id);

        return view('users.profile',compact('user'));

    }

    public function profile(Request $request){

        $user = User::find(auth()->user()->id);

        $request->validate([
            'username' => 'required|unique:users,username,'.$user->id.'|min:3',
            'name' => 'required|min:5',
            'email' => 'required|unique:users,email,'.$user->id.'',
        ]);

        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;

        if ($request->has('picture')){

            $img = Image::make($request->file('picture'));

            $size = $img->height() < 100 || $img->width() < 100 ? $img->height() >= $img->width() ? $img->width() : $img->height() : 100;

            $path = 'storage/profile/' . Str::random(40) . '.' . $request->file('picture')->getClientOriginalExtension();
    /*
            if ($user->picture != 'storage/configuration/profile.png'){

                unlink($user->picture);

            }
*/
            $img->resize($size,$size);

            $img->save($path);

            $user->picture = $path;
        }

        $user->save();

        return redirect()->back()->with('success',['Your profile updated sucessfully']);
    }

    public function upload_picture(Request $request){

        $user = User::find(auth()->user()->id);

        $request->validate([
            'image' => 'required'
        ]);

        $img = Image::make($request->file('image'));

        $size = $img->height() >= $img->width() ? $img->width() : $img->height();

        $path = 'storage/profile/' . Str::random(40) . '.' . $request->file('image')->getClientOriginalExtension();

        /*
        if ($user->picture != 'configuration/profile.png'){

            unlink($user->picture);

        }
*/
        $img->save($path);

        $user->picture = $path;

        $user->save();

        return redirect()->back()->with('success',['Your profile updated sucessfully']);
    }

    public function excel_page(){

        $roles = Role::all();

        return view('excel.import', compact('roles'));
    }

    public function excel(Request $request){

        $request->validate([
            'role' => 'required'
        ]);

        $excelFile = $request->file('excel')->store('excel');

        $headings = (new HeadingRowImport)->toArray('storage/'.$excelFile);

        $roleSelected = $request->role;
        $headings = $headings[0][0];

        $roles = Role::all();

        return view('excel.confirm', compact('excelFile', 'roleSelected', 'headings', 'roles'));

    }

    public function excel_confirm(Request $request){

        $request->validate([
            'role' => 'required',
            'password' =>'required|min:6'
        ]);

        Excel::import(new UsersImport($request->name, $request->role, $request->username, $request->email, $request->phone, $request->address, $request->password),
                                        'storage/'.$request->excelFile);

        unlink('storage/'.$request->excelFile);

        return redirect('/user')->with('success', ['Success Import the Excel!']);

    }

    public function loginUsingFacebook()
    {
       return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook(Request $request)
    {

        $state = $request->get('state');
        $request->session()->put('state',$state);

          $userSocial = Socialite::driver('facebook')->user();

          $user = User::where('social_id', $userSocial->id)->first();

        if (User::where('social_id', $userSocial->id)->count() > 0) {
            $user->update([
                'access_token' => $userSocial->token,
                'refresh_token' => $userSocial->refreshToken,
            ]);
        } else {
            $user = User::create([
                'name' => $userSocial->getName(),
                'email' => $userSocial->getEmail(),
                'username' => $userSocial->getId(),
                'access_token' => $userSocial->token,
                'refresh_token' => $userSocial->refreshToken,
                'type' => 'facebook',
                'social_id' => $userSocial->getId(),
                'role_id' => 3,
                'password' => bcrypt($userSocial->getId())
            ]);
        }

        Auth::login($user);

        return redirect('/dashboard');

    }

    public function loginUsingGoogle()
    {
       return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle(Request $request)
    {

        $state = $request->get('state');
        $request->session()->put('state',$state);

          $userSocial = Socialite::driver('google')->user();

          $user = User::where('social_id', $userSocial->id)->first();

        if (User::where('social_id', $userSocial->id)->count() > 0) {
            $user->update([
                'access_token' => $userSocial->token,
                'refresh_token' => $userSocial->refreshToken,
            ]);
        } else {
            $user = User::create([
                'name' => $userSocial->getName(),
                'email' => $userSocial->getEmail(),
                'username' => $userSocial->getId(),
                'access_token' => $userSocial->token,
                'refresh_token' => $userSocial->refreshToken,
                'type' => 'google',
                'social_id' => $userSocial->getId(),
                'role_id' => 3,
                'password' => bcrypt($userSocial->getId())
            ]);
        }

        Auth::login($user);

        return redirect('/dashboard');

    }


}
