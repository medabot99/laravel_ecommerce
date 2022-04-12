<?php

namespace App\Http\Controllers;

use App\Category;
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
use App\Product;
use Carbon\Carbon;

class HomeController extends Controller
{
        /*
    public function push_early_data(){

        $roles_name = array('Admin','User');

        $configurations = array('theme' => 'dark',
                                'appName' => config('app.name'),
                                'navbarColor'=>'dark',
                                'sidebarColor' => 'primary',
                                'cardColor' => 'primary',
                                'logo' => 'storage/configuration/logo.png');

        foreach($roles_name as $role){
            Role::create([
                'name' => $role,
            ]);
        }

        $user = User::create([
            'username' => 'root',
            'name' => 'Root User',
            'role_id' => 1,
            'email' => config('app.email'),
            'password' => bcrypt('123456')
        ]);

        foreach ($configurations as $key => $configuration) {
            Configuration::create([
                'key' => $key,
                'value' => $configuration
            ]);
        }

        return redirect('/');
    }*/

    public function index(){

        $products = Product::all();

        return view('malls.home', compact('products'));

    }

    public function login_page(){

        if (Auth::check()){
            return redirect()->route('dashboard');
        }

        return view('login');

    }

    public function login(Request $request){

        if (
                Auth::attempt([
                'username' => $request->username,
                'password' => $request->password
                ],$request->has('remember')
               )
            ){

                Auth::login(auth()->user(),$request->has('remember'));

                return redirect()->intended();

            }

           return redirect()->back()->withErrors(['Wrong Username or Password']);
    }

    public function register_page(){

        $roles = Role::all();

        return view('register',compact('roles'));

    }

    public function register(Request $request){

        $request->validate([
            'username' => 'required|unique:users|min:3',
            'name' => 'required|min:5',
            'email' => 'required|unique:users',
            'agree' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([

            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 3

        ]);

        return redirect('/login')->with('success',['Thank you for registering!']);

    }

    public function dashboard(){

        $numLatestUsers = User::count() >= 8 ? 8 : User::count();

        $latestUsers = User::latest()->take($numLatestUsers)->get();

        return view('dashboard', compact('latestUsers'));

    }


    public function forgot_password_page(){

        return view('forgot_password');

    }

    public function forgot_password(Request $request){

        $user = User::where('email' , $request->email)->get();

        if (count($user)){

            $token = Str::random(100);

            DB::insert('insert into password_resets (email,token,created_at,updated_at) values (?, ?, ?, ?)', [$user->first()->email, $token,NOW(),NOW()]);

            Mail::to($user->first())->send(new ResetPassword($user->first(),$token));

            return redirect()->back()->with('success',['Email has been sent to reset your password']);
        }

        return redirect()->back()->withErrors(['Email is not is the system']);

    }

    public function reset_password_page($token,$email){

        if ( DB::table('password_resets')->where('token',$token)->where('email',$email)->exists() ){
            return view('reset_password',[ 'token' => $token, 'email' => $email ]);
        }
        abort(404);
    }

    public function reset_password(Request $request){

        if ( DB::table('password_resets')->where('token',$request->token)->where('email',$request->email)->exists() ){

            $user = User::where('email' , $request->email)->first();

            $request->validate([
                'password' => 'required|confirmed|min:6'
            ]);

            if (Hash::check($request->password,$user->password)){
                return redirect()->back()->withErrors(['Password cannot be same as old password']);
            }

            $user->password = bcrypt($request->password);

            $user->save();

            return redirect('/login')->with('success',['Your password has been successfully changed']);
        }
        abort(404);
    }

    public function logout(){

        Auth::logout();

        return redirect('/login');

    }

    //API Section

    public function dashboardUserStatsApi(){

        $query = DB::table('users')->selectRaw("COUNT(`id`) AS NUM, EXTRACT(YEAR_MONTH FROM `created_at`) AS YEARMONTH, YEAR(`created_at`) AS YEAR, MONTH(`created_at`) AS MONTH")->whereRaw("DATEDIFF(`created_at` , NOW()) <= 0 AND DATEDIFF(`created_at` , NOW()) >= -210")->groupBy("YEARMONTH", "YEAR" ,"MONTH")->orderBy("YEARMONTH")->get();

        $monthName = array();
        $dataMonth = array();

        for($i = 7; $i >= 0 ; $i--){

            $todayDate = Carbon::now();

            $todayDate->subMonth($i);

            array_push($monthName, $todayDate->englishMonth . ' ' . $todayDate->year);

            if ($query->where("MONTH", $todayDate->month)->where("YEAR", $todayDate->year)->count() > 0){
                $data = $query->where("MONTH", $todayDate->month)->where("YEAR", $todayDate->year)->first();

                array_push($dataMonth, $data->NUM);
            }else{
                array_push($dataMonth, 0);
            }

        }

        return response()->json(['labels' => $monthName, 'data' => $dataMonth]);
    }

    public function shop_all(){

        $products = Product::where('status', 0)->where('quantity', '!=', 0)->take(9)->get();
        $categories = Category::all();
        $cat = false;
        $limit = 9;

        return view('malls.shop', compact('products', 'categories', 'cat', 'limit'));
    }

    public function shop_category(Category $category){

        $products = $category->products->take(9);
        $categories = Category::all();
        $cat = true;
        $limit = 9;

        return view('malls.shop', compact('products', 'categories', 'category', 'cat', 'limit'));
    }

    public function shop_filter(Request $request){

        $products = Product::where('status', 0)->where('quantity', '!=', 0)->get();
        $category = null;
        $cat = false;
        if ($request->has('cat')){
            $category = Category::find( $request->cat);
            $cat = true;
            $products = $category->products;
        }
        $sort = $request->sort;
        $limit = $request->limit;
        switch ($sort) {
            case 'price_low_high':
                $products = $products->sortBy('price', SORT_NUMERIC);
                break;
            case 'price_high_low':
                $products = $products->sortByDesc('price', SORT_NUMERIC);
                break;
            default:
                $products = $products;
                break;
        }
        $products = $limit != "all" ? $products->take($limit) : $products;
        $categories = Category::all();

        return view('malls.shop', compact('products', 'categories', 'category', 'cat', 'sort', 'limit'));
    }

    public function mall(){

        return view('malls.home');
    }

    public function shop_search(Request $request){

        $products = Product::where('name', 'like', '%' . $request->search . '%')->where('status', 0)->where('quantity', '!=', 0)->take(9)->get();
        $categories = Category::all();
        $cat = false;
        $limit = 9;

        return view('malls.shop', compact('products', 'categories', 'cat', 'limit'));

    }

    public function contact(){

        return view('malls.contact');
    }
}
