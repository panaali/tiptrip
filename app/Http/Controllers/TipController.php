<?php

namespace App\Http\Controllers;

use App\Tip;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipController extends Controller
{


    public function index(Request $request)
    {
        $pid = $request->input('pid');
        $cat_id = $request->input('cat_id');
        $Tips  = Tip::all();
        if ($pid || $cat_id) {
            if ($pid) {
                $Tips = Tip::where('place_id', $pid);
            }
            if ($cat_id) {
                $Tips = Tip::where('cat_id', $cat_id);
            }
            $Tips = $Tips->get();
        }

        return response()->json($Tips);

    }
    public function indexHtml(Request $request)
    {
        $pid = $request->input('pid');
        $cat_id = $request->input('cat_id');
        $Tips  = Tip::all();
        if ($pid || $cat_id) {
            if ($pid) {
                $Tips = Tip::where('place_id', $pid);
            }
            if ($cat_id) {
                $Tips = Tip::where('cat_id', $cat_id);
            }
            $Tips = $Tips->get();
        }
        foreach ($Tips as $tip) {
            $tip->name = User::find($tip->user_id)->name;
            $tip->username = User::find($tip->user_id)->username;
            $tip->answers = Tip::where('parent_id', $tip->id)->get();
            foreach ($tip->answers as $i => $value) {
                $answer = $tip->answers[$i];
                $answer->name = User::find($answer->user_id)->name;
                $answer->username = User::find($answer->user_id)->username;
            }
        }
        return view('places.index', [
            'tips' => $Tips,
        ]);
    }
    public function getTip($id)
    {

        $Tip  = Tip::find($id);

        return response()->json($Tip);
    }

    public function createTip(Request $request)
    {

        $Tip = Tip::create($request->all());

        return response()->json($Tip);

    }

    public function deleteTip($id)
    {
        $Tip  = Tip::find($id);
        $Tip->delete();

        return response()->json('success');
    }

    public function updateTip(Request $request, $id)
    {
        $Tip  = Tip::find($id);
        $Tip->title = $request->input('title');
        $Tip->author = $request->input('author');
        $Tip->isbn = $request->input('isbn');
        $Tip->save();

        return response()->json($Tip);
    }
}
