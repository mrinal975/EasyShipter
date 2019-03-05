<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Gate;
class MessageController extends Controller
{
    public function StoreMessage(Request $request){
       // return 0;
        $this->validate($request,[
            'name'=>'required|max:180',
            'email'=>'required',
            'message'=>'required|max:250',
        ]);
        $Message=new Message();
        $Message->name=$request->name;
        $Message->email=$request->email;
        $Message->message=$request->message;
        $Message->save();
        return redirect('/home')->with('message','Your message successfully send .');
    }
    public function isTeacher(){
        if(!Gate::allows('isOwner')){
            abort(404,"sorry , you can do this actions");
        }
    }
}
