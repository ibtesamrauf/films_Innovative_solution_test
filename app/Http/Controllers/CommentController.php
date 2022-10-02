<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $film_id = $request->film_id;
        if(!$film_id) return redirect()->route('films.index');
        return view("comment.create",compact('film_id'));
    }

    public function store(Request $request){
        $rules = [
            'name'=> 'required',
            'comment'=> 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $requestData = $request->except('_token');
            $requestData['user_id'] = \Auth::user()->id;
            Comment::create($requestData);
            return redirect()->route('films.index');
        }
    }
}
