<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        return view('admin.message.message');
    }
    public function processAllMessage(Request $request){

        $product = Message::orderBy('id', 'DESC')->get();
        $columns = array(
            0 => 'name',
            1 => 'email',
            2 => 'message',
            5 => 'action'
        );

        $totalData = Message::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Message::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Message::count();
        } else {
            $search = $request->input('search.value');
            $product = Message::where('name', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Message::where('name', 'like', "%{$search}%")
                ->count();
            $product = Message::where('email', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Message::where('email', 'like', "%{$search}%")
                ->count();
            $product = Message::where('message', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Message::where('message', 'like', "%{$search}%")
                ->count();
        }


        $data = array();
        if ($product) {
            foreach ($product as $r) {
                $nestedData['name'] = $r->name;
                $nestedData['email'] = $r->email;
                $nestedData['message'] = str_limit($r->message,22);

                $nestedData['action'] = '
                    <a href="/admin/viewMessage/' . $r->id . '" class="btn btn-xs btn-success" title="View Product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                ';
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }
    public function viewMessage($id=null){
        $data=Message::find($id)->first();
        return view('admin.message.viewMessage',['data'=>$data]);
    }
}
