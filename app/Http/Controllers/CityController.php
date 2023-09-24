<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::orderBy('id' , 'desc')->paginate(7);
        return response()->view('cms.City.index' , compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.City.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:20',
            'street' => 'required|numeric|digits:3'

        ], [
            'name.required' => 'حقل اسم الدولة مطلوب',
            'street.required' => 'حقل كود الدولة مطلوب',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        } else {
            $cities = new City();
            $cities->name = $request->get('name');
            $cities->street = $request->input('street');
            // $countries->code = $request->post('code');

            $isSaved = $cities->save();

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
     $cities =  City::findorFail($id);

        return response()->view('cms.City.show' , compact('cities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cities =  City::findorFail($id);
        return response()->view('cms.City.edit' , compact('cities'));
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
            'name.required' => 'حقل اسم المدينة مطلوب',
            'code.required' => 'حقل كود المدينة مطلوب',
            'code.numeric' => 'يجب إضافة أرقام فقط'

        ]);

        if($validator->fails()){
            return response()->json([
                'icon' => 'error' ,
                'title' => $validator->getMessageBag()->first(),
            ] , 400) ;
        }
        else{
            $cities = City::findOrFail($id);
            $cities->name = $request->get('name');
            $cities->street = $request->input('street');

            $isSaved = $cities->save();

            return ['redirect' => route('City.index')];
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cities = City::destroy($id);

    }
}
