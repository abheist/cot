<?php

namespace App\Http\Controllers;

use Hash;
use Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Config;
use \Firebase\JWT\JWT;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    public function login(){
       $data = Request::all();
       return User::where('user_email',$data['user_email'])->get();     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Request::all();
        $data['user_password'] = Hash::make($data['user_password']);
        $data['user_created'] = Carbon::now();
        User::create($data);
        $email= $this->check_email($data['user_email']);
        if($email["status_code"]==200){
            return response()->json(["status_code"=>200,"status_msg"=>"success"]);
        }
        else
            return response()->json(["status_code"=>404,"status_msg"=>"not found"]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $email
     * @return \Illuminate\Http\Response
     * Used for checking for the email in the database.
     * If email exists status 200 is returned
     */
    public function check_email($email){
        $count = User::where('user_email',$email)->count();
        if($count>0){
            return ["status_code"=>200,"status_msg"=>"success"];
         }
         else
            return ["status_code"=>404,"status_msg"=>"not found"];  
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}