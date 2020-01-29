<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;



class BoardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //To authorize function of this class use bellow line of codes. 
        //$this->middleware('auth',['only'=>['store','show']]);
        //OR
        //$this->middleware('auth',['except'=>'store']);
        //To get Authorized pass api_token in parameter.
    }
    public function index()
    {
        return Board::all();
    }
    public function show($board_id)
    {
        $board = Board::findorFail($board_id);
        return $board;
    }
    
    public function store(Request $request)
    {
        Board::create([
            'name'=>$request->name,
            'user_id'=>1,
        ]);
        return response()->json(['message'=>'Board Created Successfully'],200);
    }
    public function update(Request $request,$board_id)
    {
        $board = Board::findorFail($board_id);
        $board->update($request->all());
        return response()->json(['message'=>'success','board'=>$board],200);
        
    }
    public function destroy($board_id)
    {
        if(Board::destroy($board_id) )
        {
            return response()->json(['status'=>'success','message'=>'Board Deleted Successfully'],200);
        }
        return response()->json(['status'=>'error','message'=>'something went wrong...']);
    }
}
