<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Ixudra\Curl\Facades\Curl;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use PDF; 
use Illuminate\Support\Facades\View;
use App\Models\Employee;
use App\Models\People;
use App\Traits\Common;
use App\Jobs\MyJobs;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;







class dataController extends Controller {

    use Common;

    public function insertPage(){
        return view('insert');     //opens signup page
    }




    public function loginpage(){
        return view('login');      //opens login page
    }




    public function user(){
        return view("user");      //opens user profile
    }




    public function admin(){
        return view("adminsignup");  //opens admin signup page
    }



    public function adminloginpage(){
        return view("adminlogin");          //opens admin login page
    } 


    public function changepasswordpage(){
        return view('changepasswordpage');  //opens change password page
    }


    public function forgetpasswordpage(){
        return view('forgetpassword');     //open forget password page
    }


    public function adminlogin(Request $request ){
        $email = $request->email;   
        $password = $request->password;
        $admin = Admin::where('email', $email)->first();
        $data = User::all();
        if ($admin && Hash::check($password, $admin->password)) {
            if (Auth::guard('admin')->attempt($request->only(['email','password']))){
                // dd("valid credentials");
               return view('admin')->with('value', $admin)->with('users', $data);

            } else {
                dd("Failed to authenticate user");
            }
    
    
            // if (Auth::guard('admin')->once(['email' => $email, 'password' => $password])) {
            //     return view('admin')->with('value', $admin)->with('users', $data);
            // }else {
            //     dd("Failed to authenticate user");
            // }
        } else {
            dd("Invalid details");
        }
        

        // $apiUrl = 'http://localhost:8013/adminlogin';
        // $request->password = bcrypt('secret');
        // $payload = [
        //     'Name' => $request->Name,
        //     'Password' => $request->Password
        // ];
        // $jsonPayload = json_encode($payload);
        // $curl = curl_init($apiUrl);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']); 
        // curl_setopt($curl, CURLOPT_POST, true);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonPayload);
        // $response = curl_exec($curl);
        // curl_close($curl);
        // if($response==='error'){
        //     dd("invalid details");
        // }
        // $name=$response;
        // $data=$this->fetchdata();
        // return view('admin')->with('users',$data)->with('name',$name);
    }


    public function adminsignup(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
    
        if ($admin->save()) {
            Auth::guard('admin')->login($admin);
            return redirect('adminloginpage');
        } else {
            dd("Failed to create admin");
        }
    }
    


    
    public function usersignup(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            Auth::guard('user')->login($user);
            return redirect('loginpage');
        } else {
            dd("Failed to create user");
        }
    }     
    //     $apiUrl = 'http://localhost:8002/signupjwt';
    //     $payload = [
    //         'Name' => $request->name,
    //         'Age' => $request->age,
    //         'Email' => $request->email,
    //         'Password' => $request->password
    //     ];
    //     $jsonPayload = json_encode($payload);

    //     $curl = curl_init($apiUrl);
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']); //api that inserts data of new user
    //     curl_setopt($curl, CURLOPT_POST, true);
    //     curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonPayload);


    //     $response = curl_exec($curl);
    //     if ($response === false) {
    //         $error = curl_error($curl);
    //     } else {
    //         $data = json_decode($response, true);
    //     }
    //     curl_close($curl);
    //     $data = json_decode($response, true);
    //     return view('login');
    // }




    public function userlogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();
        if ($user && Hash::check($password, $user->password)) {
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                return view("user")->with('value', $user);
            } else {
                dd("Failed to authenticate user");
            }
        } else {
            dd("Invalid details");
        }
    }

    //     $apiUrl = 'http://localhost:8003/loginjwt';
    //     $payload = [
    //         'Name' => $request->Name,
    //         'Password' => $request->Password
    //     ];
    //     $jsonPayload = json_encode($payload);
    //     $curl = curl_init($apiUrl);
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']); //api that checks login details and allows access
    //     curl_setopt($curl, CURLOPT_POST, true);
    //     curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonPayload);
    //     $response = curl_exec($curl);
    //     curl_close($curl);
    //     $data = json_decode($response, true);
    //     $token = $data['token'];
    //     if($response=="Login unsuccessful"){
    //         dd("invalid details");
    //     }
    //     else{
    //         $apiUrl = 'http://localhost:8003/auth';
    //         $curl = curl_init($apiUrl); 
    //         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //         curl_setopt($curl, CURLOPT_HTTPHEADER, [
    //             'Content-Type: application/json',
    //             'Authorization: Bearer ' . $token 
    //         ]);
    //         $response = curl_exec($curl);
    //         curl_close($curl);
    //     }
    //     $record = $data['data'];
    //     $Name = $record['Name'];
    //     Session::put('Name', $Name);
    //     return view("user")->with('value',$record);
    // }




    public function logout(){
        // Session::forget($name);
        return redirect('/');
    }



    public function edit($id){
        $user = User::find($id);
        return view('edit')->with('ed',$user);

        // $apiUrl = 'http://localhost:8005/getprofile';
        // $payload = [
        //     'id' => $id
        // ];
        // $jsonPayload = json_encode($payload);
        // $curl = curl_init($apiUrl);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        // curl_setopt($curl, CURLOPT_POST, true);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonPayload);

        // $response = curl_exec($curl);
        // if ($response === false) {
        //     $error = curl_error($curl);
        // } 
        // $data = json_decode($response, true);
        // curl_close($curl);
        // return view("edit")->with('ed',$data);
    }




    public function updateRequest(Request $request){
        $update = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        User::where('id', $request->id)->update($update);
        // return redirect('adminloginpage');


        // $apiUrl = 'http://localhost:8010/edituser';
        // $payload = [
        //     'id' => $id,
        //     'Name' => $request->name,
        //     'Age' => $request->age,
        //     'Email' => $request->email,
        //     'Password' => $request->password
        // ];
        // $jsonPayload = json_encode($payload);
        // $curl = curl_init($apiUrl);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        // curl_setopt($curl, CURLOPT_POST, true);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonPayload);

        // $response = curl_exec($curl);
        // if ($response === false) {
        //     $error = curl_error($curl);
        // } else {
        //     $data = json_decode($response, true);
        // }
        // curl_close($curl);
        // return redirect()->route('admin');
    }



    public function delete($id)
    {
        $record = User::find($id);
    
        if ($record) {
            $record->delete();
    
            return response()->json(['message' => 'Record deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Record not found'], 404);
        }
    
        // return redirect('adminloginpage');
        // $apiUrl = 'http://localhost:8009/deleteuser';
        // $payload = [
        //     'id' => $id
        // ];
        // $jsonPayload = json_encode($payload);
        // $curl = curl_init($apiUrl);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        // curl_setopt($curl, CURLOPT_POST, true);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonPayload);

        // $response = curl_exec($curl);
        // if ($response === false) {
        //     $error = curl_error($curl);
        // } 
        // $data = json_decode($response, true);
        // curl_close($curl);

    }




    public function changepassword(Request $request){
        User::where('password', '$request->oldpassword')->update([
            'password' => bcrypt($request->newpassword)
        ]);
        return redirect()->route('loginpage');

        // $apiUrl = 'http://localhost:8004/changepassword';
        // $payload = [
        //     'password1' => $request->oldpassword,
        //     'password2' => $request->newpassword
        // ];
        // $jsonPayload = json_encode($payload);
        // $curl = curl_init($apiUrl);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        // curl_setopt($curl, CURLOPT_POST, true);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonPayload);
        // $response = curl_exec($curl);
        // if ($response === false) {
        //     $error = curl_error($curl);
        // } 
        // curl_close($curl);
        // return redirect()->route('loginpage');
    }




    public function edituser($pass){
        $apiUrl = 'http://localhost:8004/changepassword';
        $payload = [
            'id' => $id,
            'Name' => $request->name,
            'Age' => $request->age,
            'Email' => $request->email,
            'Password' => $request->password
        ];
        $jsonPayload = json_encode($payload);
        $curl = curl_init($apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonPayload);

        $response = curl_exec($curl);
        if ($response === false) {
            $error = curl_error($curl);
        } else {
            $data = json_decode($response, true);
        }
        curl_close($curl);
        return redirect()->route('admin');
    }




    public function status(Request $request,$id){
        // $apiUrl = 'http://localhost:8011/status';
        // $payload = [
        //     'id' => $id,
        //     'Status' => $request->status,
        // ];
        // $jsonPayload = json_encode($payload);
        // $curl = curl_init($apiUrl);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        // curl_setopt($curl, CURLOPT_POST, true);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonPayload);
        // $response = curl_exec($curl);
        // if ($response === false) {
        //     $error = curl_error($curl);
        // } else {
        //     $data = json_decode($response, true);
        // }
        // curl_close($curl);
    }



    public function forgetpassword(Request $request){
        User::where('email', $request->email)->update([
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('loginpage');

        // $request->password = bcrypt('secret');
        // $apiUrl = 'http://localhost:8007/forgetpassword';
        // $payload = [
        //     'id' => $request->id,
        //     'Password' => $request->password,
        // ];
        // $jsonPayload = json_encode($payload);
        // $curl = curl_init($apiUrl);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        // curl_setopt($curl, CURLOPT_POST, true);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonPayload);
        // $response = curl_exec($curl);
        // if ($response === false) {
        //     $error = curl_error($curl);
        // } else {
        //     $data = json_decode($response, true);
        // }
        // curl_close($curl);
        return view('login');

    }


    // public function database(){
    //     if(DB::connection()->getDatabaseName()){
    //         echo "conncted sucessfully to database ".DB::connection()->getDatabaseName();
    //     }
    // }


    public function helper(){
        $message = myCustomHelper();
        dd($message);
    }


    public function importfromexcel(){
        return view('excel');
    }

    
    public function loginjwt(Request $request)
    {
        $credentials = $request->only('name', 'password');
        $validator = Validator::make($credentials, [
            'password' => 'required|string|min:6|max:50'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException $e) {
            return $credentials;
            return response()->json([
                    'success' => false,
                    'message' => 'Could not create token.',
            ], 500);
        }
         
             //Token created, return with success response and jwt token
        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }


    private function ensureTokenIsValid($token)
    {
       
    }

    






}