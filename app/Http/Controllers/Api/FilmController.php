<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\FilmCollection;
use App\Http\Resources\FilmResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $film = Film::paginate(1);
        return new FilmCollection($film);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=> 'required',
            'description'=> 'required',
            'release_date'=> 'required|date_format:Y-m-d|after:today',
            'rating'=> 'required|integer|between:1,5',
            'ticket_price'=> 'required|numeric',
            'country'=> 'required',
            'genre'=> 'required',
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validator->messages()
            ], 422); 
        } else {
            $requestData = $request->all();

            if (!empty($request->photo)) {
                $file =$request->file('photo');
                $extension = $file->getClientOriginalExtension(); 
                $filename = time().'.' . $extension;
                $file->move(public_path('uploads/'), $filename);
                $requestData['photo'] = 'uploads/'.$filename;
            }
            $requestData['slug'] = Str::slug($requestData['name'], '-');
            $Film = Film::create($requestData);
            return response()->json([
                'status' => true,
                'data' => new FilmResource($Film),
            ], 201); 
        }
        
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
