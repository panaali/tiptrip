<?php

namespace App\Http\Controllers;

use App\Place;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PlaceController extends Controller{


    public function index(){

        $Places  = Place::all();

        return response()->json($Places);

    }

    public function getPlace($id){

        $Place  = Place::find($id);

        return response()->json($Place);
    }

    public function createPlace(Request $request){

        $Place = Place::create($request->all());

        return response()->json($Place);

    }

    public function deletePlace($id){
        $Place  = Place::find($id);
        $Place->delete();

        return response()->json('success');
    }

    public function updatePlace(Request $request,$id){
        $Place  = Place::find($id);
        $Place->title = $request->input('title');
        $Place->author = $request->input('author');
        $Place->isbn = $request->input('isbn');
        $Place->save();

        return response()->json($Place);
    }

}
