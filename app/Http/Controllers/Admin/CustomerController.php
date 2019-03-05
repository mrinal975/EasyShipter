<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use DB;
use App\Order;
class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        return view('admin.owner.owner');
    }
    public function CustomerOrder(){
        return view('admin.order.order');
    }
    public function processAllOrder(Request $request){

        $product = DB::table('products')
            ->join('orders', 'products.id', '=', 'orders.productId')
            ->select('orders.cutomerName as cutomerName','orders.phone as phone','products.name as VehicleName'
                ,'products.productCode as VehicleCode','orders.ownerName as ownerName','orders.ownerId as ownerId','orders.cutomerId as cutomerId')
            ->orderBy('products.id', 'DESC')
            ->get();
        $columns = array(
            0 => 'cutomerName',
            1 => 'phone',
            3 => 'VehicleName',
            4 => 'VehicleCode',
            5 => 'ownerName',
            6 => 'action'
        );

        $totalData = $product->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Order::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Order::count();
        } else {
            $search = $request->input('search.value');
            $product = DB::table('products')
                ->join('orders', 'products.id', '=', 'orders.productId')
                ->select('orders.cutomerName as cutomerName','orders.phone as phone','products.name as VehicleName'
                    ,'products.productCode as VehicleCode','orders.ownerName as ownerName','orders.ownerId as ownerId','orders.cutomerId as cutomerId')
                ->where('orders.phone', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = $product->count();
            $product = DB::table('products')
                ->join('orders', 'products.id', '=', 'orders.productId')
                ->select('orders.cutomerName as cutomerName','orders.phone as phone','products.name as VehicleName'
                    ,'products.productCode as VehicleCode','orders.ownerName as ownerName','orders.ownerId as ownerId','orders.cutomerId as cutomerId')
                ->where('orders.cutomerName', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = $product->count();
            $product = DB::table('products')
                ->join('orders', 'products.id', '=', 'orders.productId')
                ->select('orders.cutomerName as cutomerName','orders.phone as phone','products.name as VehicleName'
                    ,'products.productCode as VehicleCode','orders.ownerName as ownerName','orders.ownerId as ownerId','orders.cutomerId as cutomerId')
                ->where('orders.ownerName', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = $product->count();
            $product = DB::table('products')
                ->join('orders', 'products.id', '=', 'orders.productId')
                ->select('orders.cutomerName as cutomerName','orders.phone as phone','products.name as VehicleName'
                    ,'products.productCode as VehicleCode','orders.ownerName as ownerName','orders.ownerId as ownerId','orders.cutomerId as cutomerId')
                ->where('products.productCode', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = $product->count();

            }
        $data = array();
        if ($product) {
            foreach ($product as $r) {
                $nestedData['cutomerName'] = $r->cutomerName;
                $nestedData['phone'] = $r->phone;
                $nestedData['VehicleName'] = $r->VehicleName;
                $nestedData['VehicleCode'] = $r->VehicleCode;
                $nestedData['ownerName'] = $r->ownerName;
                $nestedData['action'] = '
                    <a href="/admin/CustomerOrderView/' . $r->ownerId . '"class="btn btn-xs btn-success" title="View Product">
                    <i class="fa fa-eye" aria-hidden="true"></i></a>
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
    public function CustomerOrderView($id=null){
        $data=DB::table('products')
            ->join('orders', 'products.id', '=', 'orders.productId')
            ->select('orders.cutomerName as cutomerName','orders.phone as phone','products.name as VehicleName','products.image as image'
                ,'products.productCode as VehicleCode','orders.ownerName as ownerName','orders.ownerId as ownerId','orders.cutomerId as cutomerId')
            ->where('orders.id','=', $id)
            ->orderBy('products.id', 'DESC')
            ->get();
        //return $data;
        return view('admin.order.viewproduct',['data'=>$data]);
    }
}
