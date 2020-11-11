<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Order;
use App\SponsorImage;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $client =new  Client();
//        $request = $client->get('https://jsonplaceholder.typicode.com/users');
//        return redirect('container.order.index')->with($request->getBody());
//        dd(json_decode($request->getBody()));
        $myCollection = DB::table('order')
            ->Select(DB::raw('order.id,order.user_id,users.name,order.total,order.status,order.created_at'))
            ->leftJoin('users','order.user_id','=','users.id')
            ->orderBy('order.id','desc')
            ->get();
        $order = $myCollection->unique('user_id');
        $order->all();
            $order_product = DB::table('order')
                ->leftJoin('users','order.user_id','=','users.id')
                ->leftJoin('product','order.product_id','=','product.id')
                ->get();
            $products= $order_product;

        return view('container.order.index')->with(compact('order','products'));

    }

    public function updateStatus(Request $request)
    {
        if ($request->ajax()) {
            $data= $request->data;
            $id= $request->user_id;
            $order = Order::where('user_id',$id)->update(['status'=> $data]);
            return response()->json($order);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
