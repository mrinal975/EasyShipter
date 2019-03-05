<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use Auth;
use Gate;
use App\Order;
class ProductController extends Controller
{

    public function ownerProduct(){
        $this->isOwner();
        $id=Auth::user()->id;
        $ProductCount=product::where('ownerId',$id)->count();
        $NewOrnerCount=DB::table('orders')
                    ->join('products', 'orders.productId', '=', 'products.id')
                    ->join('users', 'orders.cutomerId', '=', 'users.id')
                    ->where('products.ownerId','=', $id)
                    ->where('orders.is_seen','=','0')
                    ->select('products.productCode as productCode')
                    ->count();
        return view('FrontEnd.Owner.home.home',['ProductCount'=>$ProductCount,'NewOrnerCount'=>$NewOrnerCount]);
    }
    public function storeProduct(Request $request){
        $this->isOwner();
        $this->validate($request,[
            'name'=>'required|max:180',
            'shortDescriptoin'=>'required',
            'longDescriptoin'=>'required',
            'quantity'=>'required',
            'type'=>'required',
            'fullDayRent'=>'required',
            'halfDayRent'=>'required',
        ]);
        $productImage=$request->file('image');
        $name=$productImage->getClientOriginalName();
        $uploadPath='productImage/';
        $imageUrl=$uploadPath.$name;
        $productImage->move($uploadPath,$name);

        $this->saveProductionInfo($request,$imageUrl);

        return redirect('/product/add')->with('message','Product Info Saved Successfully');

    }
    public function Uniquecode(){
        do{
            $letter="AbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ";
            $number="0123456789";
            $uniqueCode=substr(str_shuffle($letter.$number), 1, 6);
            $wordlist=DB::table('products')->where('productCode', '=',$uniqueCode)
                ->get();
            $count=$wordlist->count();
        }
        while ($count!=0);
        return $uniqueCode;
    }
    public function saveProductionInfo($request,$imageUrl){

        $product=new Product();
        $product->productCode=$this->Uniquecode();
        $product->name=$request->name;
        $product->shortDescriptoin=$request->shortDescriptoin;
        $product->longDescriptoin=$request->longDescriptoin;
        $product->image=$request->image;
        $product->type=$request->type;
        $product->ownerId=Auth::user()->id;
        $product->quantity=$request->quantity;
        $product->fullDayRent=$request->fullDayRent;
        $product->halfDayRent=$request->halfDayRent;
        $product->image=$imageUrl;
        $product->save();

    }
    public function addProduct(){
        $this->isOwner();
        return view('FrontEnd.Owner.product.createproduct');

    }
    public function manageProduct(){
        $this->isOwner();
        return view('FrontEnd.Owner.product.manageproduct');

    }
    public function ProductHome(){
        return view('FrontEnd.Owner.home.home');

    }
    public function deleteProduct($id=null){
        $this->isOwner();
        product::find($id)->delete();
        return redirect('/product/manage')->with('message','Product deleted successfully');

    }
    public function ViewProduct($id=null){
        $this->isOwner();
        $productById= product::where('id',$id)->first();
        return view('FrontEnd.Owner.product.viewproduct',['productById'=>$productById]);
    }
    public function EditProduct($id=null){
        $this->isOwner();
        $productById= product::where('id',$id)->first();
        return view('FrontEnd.Owner.product.editproduct',['productById'=>$productById]);

    }
    public function updateProduct(Request $request){
//        return $request->all();
        $this->validate($request,[
            'name'=>'required|max:180',
            'shortDescriptoin'=>'required',
            'longDescriptoin'=>'required',
            'quantity'=>'required',
            'type'=>'required',
            'fullDayRent'=>'required',
            'halfDayRent'=>'required',
        ]);

        $imageUrl=$this->imageExistStatus($request);
        $productById=Product::where('id',$request->productId)->first();
        //productCode
        $productById->productCode=$request->productCode;
        $productById->name=$request->name;
        $productById->shortDescriptoin=$request->shortDescriptoin;
        $productById->longDescriptoin=$request->longDescriptoin;
        $productById->type=$request->type;
        $productById->ownerId=Auth::user()->id;
        $productById->quantity=$request->quantity;
        $productById->type=$request->type;
        $productById->fullDayRent=$request->fullDayRent;
        $productById->halfDayRent=$request->halfDayRent;
        $productById->image=$imageUrl;
        $productById->save();
        return redirect('/product/manage')->with('message','Product info updated successfully');
    }
    private function imageExistStatus($request){
        $productById=Product::where('id',$request->productId)->first();
        $productImage=$request->file('image');
        if ($productImage){
            unlink($productById->image);
            $name=$productImage->getClientOriginalName();
            $uploadPath='productImage/';
            $productImage->move($uploadPath,$name);
            $imageUrl=$uploadPath.$name;
        }else{
            $imageUrl=$productById->image;
        }
        return $imageUrl;
    }
    //Process for data Table
    public  function processProduct(Request $request)
    {
        $OwnerId=Auth::user()->id;
        $product = product::where('ownerId', '=', $OwnerId)->get();
        $columns = array(
            0 => 'name',
            1 => 'shortDescriptoin',
            2 => 'type',
            3 => 'fullDayRent',
            4 => 'quantity',
            5 => 'action'
        );

        $totalData = Product::where('ownerId', '=', $OwnerId)->count();
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
            $product = product::where('ownerId', '=', $OwnerId)->where('name', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = product::where('ownerId', '=', $OwnerId)->where('name', 'like', "%{$search}%")
                ->count();
            $product = product::where('ownerId', '=', $OwnerId)->where('productCode', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = product::where('ownerId', '=', $OwnerId)->where('productCode', 'like', "%{$search}%")
                ->count();
        }


        $data = array();
        if ($product) {
            foreach ($product as $r) {
                $nestedData['productCode'] = $r->productCode;
                $nestedData['name'] = $r->name;
                $nestedData['shortDescriptoin'] = str_limit($r->shortDescriptoin,18);
                $nestedData['type'] = $r->type;
                $nestedData['fullDayRent'] = $r->fullDayRent;
                $nestedData['quantity'] = $r->quantity;
                //class="btn btn-sm btn-primary"
                $nestedData['action'] = '
                    <a href="/product/edit/' . $r->id . '" class="btn btn-xs btn-warning" title="Edit Product"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="/product/view/' . $r->id . '" class="btn btn-xs btn-success" title="View Product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a href="/product/delete/' . $r->id . '" class="btn btn-xs btn-danger" onclick="return confirm(Are you sure to delete);" title="Delete Product"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
    public function isOwner(){
        if(!Gate::allows('isOwner')){
            abort(404,"sorry , you can do this actions");
        }
    }
}
