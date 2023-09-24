<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('id' , 'desc')->paginate(9);
       return response()->view('cms.Order.index' , compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.Order.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'address' => 'required|string|min:3|max:10',
            'date' => 'required|date',
            'isReady' => 'required',
            'price' => 'required|numeric|min:3',

        ] , [
            'address.required'=>'حقل العنوان مطلوب',
            'date.required'=>'حقل التاريخ مطلوب',
            'isReady.required'=>'حقل هل تم تحضيره مطلوب',
            'price.required'=>'حقل السعر مطلوب',


            'address.string'=>'حقل السعر يجب ان يكون نصا',
            'date.date'=>'حقل التاريخ يجب ان يكون تاريخ ',
            'isReady.enum'=>' (yes,no) حقل isReady يجب',
            'price.numeric'=>'حقل السعر يجب ان يكون رقما'



        ]);
        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        } else {

        $orders = new  Order();
        $orders->address = $request->input('address');
        $orders->date = $request->input('date');
        $orders->isReady = $request->input('isReady');
        $orders->price = $request->input('price');

        $isSaved = $orders->save();
        }
            if ($isSaved) {
                return response()->json([
                    'icon'=>'success',
                    'title'=>'created is succesflly'

                ], 200);
            }else{
                return response()->json([
                    'icon'=>'error',
                    'title'=>'created is not succesflly'

                ], 400);

            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orders =  Order::findorFail($id);

        return response()->view('cms.Order.show' , compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $orders =  Order::findorFail($id);
        return response()->view('cms.Order.edit' , compact('orders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator($request->all(),[
            'address' => 'required|string|min:3|max:10',
            'date' => 'required|date',
            'isReady' => 'required',
            'price' => 'required|numeric|min:3',

        ] , [
            'address.required'=>'حقل العنوان مطلوب',
            'date.required'=>'حقل التاريخ مطلوب',
            'isReady.required'=>'حقل هل تم تحضيره مطلوب',
            'price.required'=>'حقل السعر مطلوب',


            'address.string'=>'حقل السعر يجب ان يكون نصا',
            'date.date'=>'حقل التاريخ يجب ان يكون تاريخ ',
            'isReady.enum'=>' (yes,no) حقل isReady يجب',
            'price.numeric'=>'حقل السعر يجب ان يكون رقما'



        ]);
        if (! $validator->fails()) {

            $orders = Order::findOrFail($id);
            $orders->address = $request->input('address');
            $orders->date = $request->input('date');
            $orders->isReady = $request->input('isReady');
            $orders->price = $request->input('price');




            $isSaved = $orders->save();
            return ['redirect' => route('orders.index')];
        }
         else {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
