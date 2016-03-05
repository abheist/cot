<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//All the Models required
use App\Profile;
use App\User;
use App\Experience;
use App\Project;
use App\Blog;
use App\Article;
use App\UserEducation;
use App\UserSkill;
use App\UserInterest;
use App\UserRecommendation;

//Models end here
use Auth;
use File;
use Response;	
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class userController extends Controller
{
    public function __construct(){

    	$this->middleware('auth');

    	$this->middleware('profileEditor',['only' =>'edit' ]);

    }

    public function show($username){



        //data of loggedInUser

        $udata =User::with('profile')->whereId(Auth::user()->id)->firstOrFail();

        //Getting all the user data
    	$data=User::with('profile','blog')->where('user_name','=',$username)->firstOrFail();

        $data->experience=Experience::with('company')->where('user_id','=',$data->id)->orderBy('experience_start_year','desc')->get();

        $data->projects= Project::where('user_id','=',$data->id)->orderBy('project_started')->get();

        $data->skill = UserSkill::with('skill')->where('user_id','=',$data->id)->get();

        $data->interest = UserInterest::with('interest')->where('user_id','=',$data->id)->get();

        if($data->blog)
        $data->blog->articles = Article::where('blog_id','=',$data->blog->blog_id)->orderBy('updated_at','desc')->take(3)->get();

        $data->education = UserEducation::with('college','courseMajor.course')->where('user_id','=',$data->id)->get();

        $data->recommendations = UserRecommendation::with('recommender')->where('user_id','=',$data->id)->get();

        //We are putting counting variables
        $data->countEdu=0;
        $data->countExp=0;
        $data->countSki=0;
        $data->countPro=0;
        $data->countSki=0;
        $data->countInt=0;
        $data->countRec=0;

        if($data->profile==null)
            $data->profile= new Profile;
        if($data->profile->profile_pic==null || !File::exists('user_profile_pics/'.$data->profile->profile_pic))
            $data->profile->profile_pic= "profilepic.jpg";
        if(!File::exists('user_resume/'.$data->profile->resume))
            $data->profile->resume=null;

        if($data->blog)        
        foreach($data->blog->articles as $article){
            if($article->cover_pic==null || !File::exists('article_pics/'.$article->cover_pic))
            $article->cover_pic= "default.png";
        }

        foreach($data->experience as $experience){
            $data->countExp++;
            if($experience->company->company_logo==null || !File::exists('company_logos/'.$experience->company->company_logo))
            $experience->company->company_logo= "default.png";
        
        }

        foreach($data->education as $education){
            $data->countEdu++;
            if($education->college->college_logo==null || !File::exists('college_logos/'.$education->college->college_logo))
            $education->college->college_logo= "default.png";
        
        }


        foreach($data->projects as $project){

            $data->countPro++;
            $project->project_started=date('F,Y',strtotime($project->project_started));
            if($project->project_ended== '1970-01-01'){
                $project->project_ended= 'PRESENT';
            }
            else
                $project->project_ended=date('F,Y',strtotime($project->project_ended));
        }

        foreach($data->skill as $skill ){
            $data->countSki++;
        }

        foreach ($data->interest as $interest) {
            $data->countInt++;
            # code...
        }

        foreach( $data->recommendations as $rec){
            $data->countRec++;
        }

        if($udata->profile==null)
            $udata->profile= new Profile;
        if($udata->profile->profile_pic==null || !File::exists('user_profile_pics/'.$udata->profile->profile_pic))
            $udata->profile->profile_pic= "profilepic.jpg";
        if(!File::exists('user_resume/'.$udata->profile->resume))
            $udata->profile->resume=null;
    	return view('profile.view')->with('user',$data)->with('logInUser',$udata);
    }

    public function edit(){
    	$data=User::with('profile')->whereId(Auth::user()->id)->first();
    	return view('profile.edit')->with('logInUser',$data);
    }



    public function update($user_name, Request $request){
    	

    	$this->validate($request, [
            'location' => 'min:3',
            'bio' => 'min:100',
            'tagline' => 'min:10',
            'profile_pic' => 'mimes:jpeg,bmp,png',
            'resume' => 'mimes:pdf'
        ]);
        

        $user = User::with('profile')->where('user_name','=', $user_name)->firstOrFail(); 
		
		$input = Input::only('location','bio','github','linkedin','website','tagline','resume','profile_pic');

        $profile = Input::file('profile_pic');

        $file = Input::file('resume');


        if($profile != null && $profile->isValid()){
        $input['profile_pic']= 'profile_'.Auth::user()->id.'_'.str_random(5).'.'.$profile->getClientOriginalExtension();
        $destinationPath='user_profile_pics/';
        $profile->move($destinationPath, $input['profile_pic']);
        }

        if($file != null && $file->isValid()){
        $input['resume']= 'resume_'.Auth::user()->id.'_'.str_random(5).'.pdf';
        $destinationPath='user_resume/';
        $file->move($destinationPath, $input['resume']);
        }


		if($user->profile == null){
			$input['user_id']=$user->id;
			$profile= new Profile($input);
			$profile->save();
		}

		else{
		$user->profile()->update($input);
	    }


		return redirect()->route('profile');
    }






    public function test(){
       
    } 
}
