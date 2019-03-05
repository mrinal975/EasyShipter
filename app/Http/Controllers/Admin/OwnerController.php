<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use DB;
class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        return view('admin.owner.owner');
    }

    public function processAllVehicle(Request $request){
        $columns = array(
            0 => 'name',
            1 => 'VehicleName',
            2 => 'productCode',
            3 => 'action'
        );
        $product = DB::table('users')
            ->join('products', 'users.id', '=', 'products.ownerId')
            ->select('users.name as name','products.name as VehicleName',
                'products.productCode as productCode','users.id as id')
            ->orderBy('users.id', 'DESC')
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
            $product = DB::table('users')
                ->join('products', 'users.id', '=', 'products.ownerId')
                ->select('users.name as name','products.name as VehicleName',
                    'products.productCode as productCode','users.id as id')
                ->where('users.name', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered =$product->count();

            $product = DB::table('users')
                ->join('products', 'users.id', '=', 'products.ownerId')
                ->select('users.name as name','products.name as VehicleName',
                    'products.productCode as productCode','users.id as id')
                ->where('products.productCode', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered =$product->count();
            $product = DB::table('users')
                ->join('products', 'users.id', '=', 'products.ownerId')
                ->select('users.name as name','products.name as VehicleName',
                    'products.productCode as productCode','users.id as id')
                ->where('products.name', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered =$product->count();
        }


        $data = array();
        if ($product) {
            foreach ($product as $r) {
                $nestedData['name'] = $r->name;
                $nestedData['VehicleName'] = $r->VehicleName;
                $nestedData['productCode'] = $r->productCode;
                //class="btn btn-sm btn-primary"
                $nestedData['action'] = '
                    <a href="/admin/VehicleOwner/' . $r->id . '" class="btn btn-xs btn-success" title="View Product">
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

    public function VehicleOwner($id=null){
        $data= DB::table('users')
            ->join('products', 'users.id', '=', 'products.ownerId')
            ->select('users.name as name','products.name as VehicleName','products.image as image',
                'products.productCode as VehicleCode','users.id as id',
                'products.shortDescriptoin as shortDescriptoin','products.longDescriptoin as longDescriptoin',
                'products.productCode as productCode')
            ->orderBy('users.id', 'DESC')
            ->get();
        return view('admin.owner.ViewOwner',['data'=>$data]);
    }
}
