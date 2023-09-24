<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $countrise = Country::orderBy('id' , 'desc')->paginate(7);
        return response()->view('cms.delivery.index' , compact('countrise'));
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
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:20',
            'code' => 'required|numeric|digits:3'

        ], [
            'name.required' => 'حقل اسم الدولة مطلوب',
            'code.required' => 'حقل كود الدولة مطلوب',
            'code.numeric' => 'يجب إضافة أرقام فقط'

        ]);

        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        } else {
            $countries = new Country();
            $countries->name = $request->get('name');
            $countries->code = $request->input('code');
            // $countries->code = $request->post('code');

            $isSaved = $countries->save();

            if ($isSaved) {
                return response()->json([
                    'icon' => 'success',
                    'title' => 'Created is Successfully',

                ], 200);
            }
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $countries =  Country::findorFail($id);

          return response()->view('cms.delivery.show' , compact('deliveries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $countries =  Country::findorFail($id);
        return response()->view('cms.delivery.edit' , compact('deliveries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator($request->all(), [
            'name' => 'sometimes|required|string|min:3|max:20',
            'code' => 'sometimes|required|numeric|digits:3'

        ], [
            'name.required' => 'حقل اسم الدولة مطلوب',
            'code.required' => 'حقل كود الدولة مطلوب',
            'code.numeric' => 'يجب إضافة أرقام فقط'

        ]);

        if($validator->fails()){
            return response()->json([
                'icon' => 'error' ,
                'title' => $validator->getMessageBag()->first(),
            ] , 400) ;
        }
        else{
            $countries = Country::findOrFail($id);
            $countries->name = $request->get('name');
            $countries->code = $request->input('code');

            $isSaved = $countries->save();

            return ['redirect' => route('countries.index')];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $countries = Country::destroy($id);

    }
}
