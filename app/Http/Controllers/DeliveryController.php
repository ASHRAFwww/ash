<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator as ValidationValidator;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $deliveries = Delivery::orderBy('id' , 'desc')->paginate(7);
        return response()->view('cms.delivery.index' , compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.delivery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator($request->all(),[
            'name' => 'required|string|min:3|max:10',
            'address' => 'required|string|min:3|max:10',
            'email' => 'required|email',
            'password' => 'required|numeric|min:3',
            'date' => 'required|min:3|max:20',
            'img' => 'required|string|min:3',
            'salary' => 'required|numeric|digits:3'
        ] , [
            'name.required'=>'حقل اسم الدولة مطلوب',
            'address.required'=>'حقل العنوان مطلوب',
            'email.required'=>'حقل  الايميل  مطلوب',
            'password.required'=>'حقل كلمة السر مطلوب',
            'date.required'=>'حقل التاريخ مطلوب',
            'img.required'=>'حقل الصورة مطلوب',
            'salary.required'=>'حقل الراتب مطلوب',

            'name.string'=>'حقل اسم الدولة يجب ان يكون نصا',
            'address.string'=>'حقل العنوان يجب ان يكون نصا',
            'email.email'=>'(@)حقل  الايميل  يجب ان يحتوي على ',
            'password.numeric'=>'حقل كلمة السر يجب ان يكون ارقام',
            'date.required'=>'حقل التاريخ يجب ان يكون ارقام',
            'salary.numeric'=>'حقل الراتب يجب ان يكون ارقام',




        ]);
        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        } else {

        $deliveries = new Delivery ();
        $deliveries->name = $request->input('name');
        $deliveries->address = $request->input('address');
        $deliveries->email = $request->input('email');
        $deliveries->password = $request->input('password');
        $deliveries->date = $request->input('date');
        $deliveries->img = $request->input('img');
        $deliveries->salary = $request ->input('salary');
        $isSaved = $deliveries->save();
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
    public function show($id)
    {
        $deliveries =  Delivery::findorFail($id);

          return response()->view('cms.delivery.show' , compact('deliveries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $deliveries =  Delivery::findorFail($id);
        return response()->view('cms.delivery.edit' , compact('deliveries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator($request->all(),[
            'name' => 'required|string|min:3|max:10',
            'address' => 'required|string|min:3|max:10',
            'email' => 'required|email',
            'password' => 'required|numeric|min:3',
            'date' => 'required|min:3|max:20',
            'img' => 'required|string|min:3',
            'salary' => 'required|numeric|digits:3'
        ] , [
            'name.required'=>'حقل اسم الدولة مطلوب',
            'address.required'=>'حقل العنوان مطلوب',
            'email.required'=>'حقل  الايميل  مطلوب',
            'password.required'=>'حقل كلمة السر مطلوب',
            'date.required'=>'حقل التاريخ مطلوب',
            'img.required'=>'حقل الصورة مطلوب',
            'salary.required'=>'حقل الراتب مطلوب',

            'name.string'=>'حقل اسم الدولة يجب ان يكون نصا',
            'address.string'=>'حقل العنوان يجب ان يكون نصا',
            'email.email'=>'(@)حقل  الايميل  يجب ان يحتوي على ',
            'password.numeric'=>'حقل كلمة السر يجب ان يكون ارقام',
            'date.required'=>'حقل التاريخ يجب ان يكون ارقام',
            'salary.numeric'=>'حقل الراتب يجب ان يكون ارقام',




        ]);
        if (!$validator->fails()) {

            $deliveries = Delivery::findOrFail($id);
            $deliveries->name = $request->input('name');
            $deliveries->address = $request->input('address');
            $deliveries->email = $request->input('email');
            $deliveries->password = $request->input('password');
            $deliveries->date = $request->input('date');
            $deliveries->img = $request->input('img');
            $deliveries->salary = $request->input('salary');

            $isSaved = $deliveries->save();
if ($isSaved) {
    return['redirect' => route('delivery.index')];

}



        } else {

            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);

            }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $deliveries = Delivery::destroy($id);

    }
}
