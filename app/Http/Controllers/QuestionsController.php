<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class QuestionsController extends Controller
{
	public function index()
    {
    	$questions = Question::all();
    	return view('pages.questions.index',array('questions' => $questions));
    }

    public function create()
    {
    	return view('pages.questions.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request,array(
    		'question' => 'required|min:10',
    		'optiona' => 'required',
    		'optionb' => 'required',
    		'optionc' => 'required',
    		'optiond' => 'required',
    		'answer' => 'required'
    	));
    	$input = $request->except('_token');
    	$question = new Question($input);
    	$question->save();
    	return Redirect::route('questions.index');
    }

    public function show($question)
    {
        
        $question = Question::find($question);
        if($question)
	       return view('pages.questions.show',array('question' => $question));
        else
            return Redirect::route('questions.index');
    }

    public function edit($question)
    {
		$question = Question::find($question);
        return view('pages.questions.edit',array('question' => $question)); 	
    }

    public function update($question,Request $request)
    {   
        $this->validate($request,array(
            'question' => 'required|min:10',
            'optiona' => 'required',
            'optionb' => 'required',
            'optionc' => 'required',
            'optiond' => 'required',
            'answer' => 'required'
        ));
        $input = $request->except(array('_token','_method'));
        $question = Question::find($question);
        $question->fill($input)->save();
        return Redirect::route('questions.show',$question);
    }
  
}
