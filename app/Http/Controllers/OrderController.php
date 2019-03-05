<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Order;
use Gate;
use Auth;
use DB;
use App\User;
class OrderController extends Controller
{

    public function ViewProduct($id=null){
        $type='';
        $match=array(1,2,3);
        if (in_array($id,$match)){
            switch ($id) {
                case 1:
                    $type='small';
                    break;
                case 2:
                    $type='medium';
                    break;
                case 3:
                    $type='large';
                    break;
            }
            $products= product::where('type',$type)->paginate(6);

            return view('FrontEnd.Customer.ViewProduct',['products'=>$products]);
        }
        return redirect('/home');
    }
    public function orderProduct($id=null){
        $productById= product::where('id',$id)->first();
        session()->put('prooductid',$productById->id);
        session()->put('OwnerId',$productById->ownerId);

        return view('FrontEnd.Customer.OrderProduct');
    }
    public function storeOrderProduct(Request $request){
        $this->validate($request,[
            'Address'=>'required|max:180',
            'rentType'=>'required',
            'phone'=>'required|regex:/(^01[123456789]{1}[0-9]{8}$)/u',
            'date'=>'required',
            'time'=>'date_format:H:i',
        ]);
        $prooductid=Session::get('prooductid');
        $OwnerId=Session::get('OwnerId');
        if(!isset($prooductid) || !isset($OwnerId)){
            return redirect('/home')->with('message','First select type of vehicle you want to rent for shifting');
        }
        $Owner=User::where('id',$OwnerId)->first();
        $OwnerName=$Owner->name;
        //return 0;
        $Order=new Order();
        $Order->Address=$request->Address;
        $Order->rentType=$request->rentType;
        $Order->phone=$request->phone;
        $Order->date=$request->date;
        $Order->time=$request->time;
        $Order->cutomerName=Auth::user()->name;
        $Order->cutomerId=Auth::user()->id;
        $Order->productId=$prooductid;
        $Order->ownerName=$OwnerName;
        $Order->ownerId=$OwnerId;
        $Order->save();
        return redirect('/')->with('message','Thank you, We will process your order soon.');

    }
    public function NewOrder(){
        $this->checkOwner();
        return view('FrontEnd.Owner.order.newOrder');
    }
    public function ViewNewOrder(){
        $this->checkOwner();

    }
    public function ViewDetailOrder(){
        $this->checkOwner();
        return view('FrontEnd.Owner.order.detailOrder');

    }
    public function checkOwner(){
        if(!Gate::allows('isOwner')){
            abort(404,"sorry , you can do this actions");
        }
    }
    public function ProcessingAllOrder(Request $request){
        $OwnerId=Auth::user()->id;
        $columns = array(
            0 => 'productCode',
            1 => 'productName',
            2 => 'CustomerName',
            3 => 'type',
            5 => 'action'
        );
        $product = DB::table('orders')
            ->join('products', 'orders.productId', '=', 'products.id')
            ->join('users', 'orders.cutomerId', '=', 'users.id')
            ->where('products.ownerId','=', $OwnerId)
            ->where('orders.is_seen','=','0')
            ->select('products.productCode as productCode','products.name as productName',
                'users.name as CustomerName','orders.rentType as type','orders.id as id')
            ->get();

        $totalData = $product->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');




        if (empty($request->input('search.value'))) {
            $posts = product::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = product::count();
        } else {
            $search = $request->input('search.value');
            $product = product::where('orders.is_seen','=','0')->where('ownerId', '=', $OwnerId)->where('quantity', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = product::where('ownerId', '=', $OwnerId)->where('orders.is_seen','=','0')->where('quantity', 'like', "%{$search}%")
                ->count();
        }


        $data = array();
        if ($product) {
            foreach ($product as $r) {
                $nestedData['productCode'] = $r->productCode;
                $nestedData['productName'] = $r->productName;
                $nestedData['CustomerName'] = str_limit($r->CustomerName,18);
                $nestedData['type'] = $r->type;
                //class="btn btn-sm btn-primary"
                $nestedData['action'] = '
                    <a href="/Orderview/' . $r->id . '" class="btn btn-xs btn-success" title="View Product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a href="/Orderdelete/' . $r->id . '" class="btn btn-xs btn-danger" onclick="return confirm(Are you sure to delete);" title="Delete Product"><i class="fa fa-trash" aria-hidden="true"></i></a>
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


    public function query(){
        $OwnerId=Auth::user()->id;
        $product = DB::table('orders')
            ->join('products', 'orders.productId', '=', 'products.id')
            ->join('users', 'orders.cutomerId', '=', 'users.id')
            ->where('products.ownerId','=', $OwnerId)
            ->select('products.productCode as productCode','products.name as productName',
                'users.name as OrderController','orders.rentType as type')
            ->get();
        return $product;
    }
    public function Orderview($id=null){
        $datas=Order::findOrFail($id);
        if ($datas->is_seen==0){
            $datas->is_seen=1;
            $datas->update();
        }

        $data=DB::table('products')
            ->join('orders', 'products.id', '=', 'orders.productId')
            ->select('orders.cutomerName as cutomerName','orders.phone as phone','products.name as VehicleName','products.image as image'
                ,'products.productCode as VehicleCode','orders.ownerName as ownerName','orders.ownerId as ownerId','orders.cutomerId as cutomerId')
            ->where('orders.id','=', $id)
            ->orderBy('products.id', 'DESC')
            ->get();
        return view('FrontEnd.Owner.Order.viewOrder',['data'=>$data]);
    }
    public function Orderdelete($id=null){
        Order::find($id)->delete();
        return redirect('/ViewAllOrder')->with('message','Order deleted successfully');
    }
    public function processDetailsOrder(Request $request){
        $OwnerId=Auth::user()->id;
        $columns = array(
            0 => 'productCode',
            1 => 'productName',
            2 => 'CustomerName',
            3 => 'type',
            5 => 'action'
        );
        $product = DB::table('orders')
            ->join('products', 'orders.productId', '=', 'products.id')
            ->join('users', 'orders.cutomerId', '=', 'users.id')
            ->where('products.ownerId','=', $OwnerId)
            ->select('products.productCode as productCode','products.name as productName',
                'users.name as CustomerName','orders.rentType as type','orders.id as id')
            ->get();

        $totalData = $product->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');




        if (empty($request->input('search.value'))) {
            $posts = product::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = product::count();
        } else {
            $search = $request->input('search.value');
            $product = product::where('ownerId', '=', $OwnerId)->where('quantity', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = product::where('ownerId', '=', $OwnerId)->where('quantity', 'like', "%{$search}%")
                ->count();
        }


        $data = array();
        if ($product) {
            foreach ($product as $r) {
                $nestedData['productCode'] = $r->productCode;
                $nestedData['productName'] = $r->productName;
                $nestedData['CustomerName'] = str_limit($r->CustomerName,18);
                $nestedData['type'] = $r->type;
                //class="btn btn-sm btn-primary"
                $nestedData['action'] = '
                    <a href="/Orderview/' . $r->id . '" class="btn btn-xs btn-success" title="View Product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a href="/Orderdelete/' . $r->id . '" class="btn btn-xs btn-danger" onclick="return confirm(Are you sure to delete);" title="Delete Product"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

}
