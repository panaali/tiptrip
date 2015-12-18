<?php

namespace App\Http\Controllers;

use App\Going;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoingController extends Controller
{


    public function index()
    {

        $Goings  = Going::all();

        return response()->json($Goings);

    }

    public function getLoginRest()
    {
        return response()->json(['success' => 'true']);
    }

    public function getGoing($id)
    {

        $Going  = Going::find($id);

        return response()->json($Going);
    }

    public function getGoingfromids($pid)
    {
        $Going  = Going::where('user_id', Auth::user()->id)->where('place_id', $pid)->get();

        return response()->json($Going);
    }

    public function createGoing(Request $request)
    {
        $Going = Going::create($request->all());

        return response()->json($Going);

    }

    public function deleteGoing($id)
    {
        $Going  = Going::find($id);
        $Going->delete();

        return response()->json('success');
    }

    public function updateGoing(Request $request, $id)
    {
        $Going  = Going::find($id);
        $Going->title = $request->input('title');
        $Going->author = $request->input('author');
        $Going->isbn = $request->input('isbn');
        $Going->save();

        return response()->json($Going);
    }
}
