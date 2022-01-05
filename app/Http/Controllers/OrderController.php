<?php

namespace App\Http\Controllers;

use App\Http\Tools\Formatter;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->newTask([
            'user' => function () {
                return Order::where('creator_id', '=', Auth::user()->email)->paginate();
            },
            'partner' => function () {
                return Order::where('partner_id', '=', Auth::user()->email)->paginate();
            },
            'core' => function () {
                return Order::paginate();
            }],
            function () {
                echo 'hola casper';
            }
        );
        return view('order.index', compact('orders'))->with('i', (request()->input('page', 1) - 1) * $orders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = new Order();
        return view('order.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Order::$rules);

        $formatter = new Formatter();

        $order = Order::create([
            'order_id' => $formatter->newOrderId(),
            'article_id' => $request->article_id,
            'creator_id' => Auth::user()->email,
            'value_added_taxes' => null,
            'partner_id' => 'redishop',
            'delivery_address' => (isset($request->delivery_address) && $request->delivery_address != null) ? $request->delivery_address : 'Default Address',
            'delivery_information' => $request->delivery_information,
            'estimated_delivery_at' => $formatter->getTime('2 days'),
            'delivered_at' => null
        ]);

        return redirect()->route('pedidos.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where("order_id", '=', $id)->get()[0];

        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::where("order_id", '=', $id)->get()[0];

        //echo (isset($order['order_id']))?$order['order_id']:'no definido';
        /*
                foreach ($order as $i => $reg) {
                    echo "MainKey $i val $reg";
                    foreach ($reg as $key => $val) {
                        //echo "Key $key, value $val<br>";
                        echo "Key $key, value $val<br>";
                    }
                }*/
        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Order $order, $id = '')
    {
        request()->validate(Order::$rules);
        $order->where("order_id", '=', $id)->update([
            'order_id' => $request->order_id,
            'article_id' => $request->article_id,
            //'creator_id' => Auth::user()->email,
            'value_added_taxes' => $request->value_added_taxes,
            'partner_id' => $request->partner_id,
            'delivery_address' => (isset($request->delivery_address) && $request->delivery_address != null) ? $request->delivery_address : 'Default Address',
            'delivery_information' => $request->delivery_information,
            'estimated_delivery_at' => $request->estimated_delivery_at,
            'delivered_at' => $request->delivered_at
        ]);
        return redirect()->route('pedidos.index')->with('success', 'Order updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $order = Order::where("order_id", '=', $id)->delete();

        return redirect()->route('pedidos.index')
            ->with('success', 'Order deleted successfully');
    }
}
