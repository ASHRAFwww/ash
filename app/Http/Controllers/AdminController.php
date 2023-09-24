<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::withoutTrashed()->OrderBy('id' , 'desc')->paginate(10);
        return response()->view('cms.admin.index' , compact('admins'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.admin.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validator = Validator($request->all(),[
            'name' => 'required|string|min:3|max:10',
            'mobile' => 'required|string|min:3|max:10',
            'email' => 'required|email',
            'address' => 'required|string|min:3',
            'img' => 'required|min:3|max:20',
            'data' => 'required|string|min:3',
            'email' => 'required|email|min:3|max:30',
            'password' => 'required|numeric|digits:8'
        ] , [
            'name.required'=>'حقل اسم الكامل مطلوب',
            'mobile.required'=>'حقل رقم الهاتف مطلوب',
            'address.required'=>'حقل  العنوان  مطلوب',
            'img.required'=>'حقل الصورة مطلوب',
            'data.required'=>'حقل البيانات مطلوب',
            'email.required'=>'حقل الايميل مطلوب',
            'password.required'=>'حقل كلمة السر مطلوب',

            'name.string'=>'حقل الاسم الكامل يجب ان يكون نصا',
            'mobile.numeric'=>'حقل رقم الهاتف يجب ان يكون رقما ',
            'address.string'=>'حقل العنوان يجب ان يكون نص   ',
            'img.string'=>'حقل كلمة الصورة يجب ان يكون صورة',
            'data.required'=>'حقل البيانات يجب ان يكون نصا',
            'email.email'=>'حقل الايميل  يجب ان يحتوي على @',
            'password.numeric'=>'حقل كلمة المرور يجب ان يكون ارقام',


        ]);
        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        } else {

        $admins = new  Admin();
        $admins->name = $request->input('name');
        $admins->mobile = $request->input('mobile');
        $admins->email = $request->input('email');
        $admins->password = $request->input('password');
        $admins->data = $request->input('data');
        $admins->img = $request->input('img');
        $admins->address = $request->input('address');
        $admins->password = $request ->input('password');
        $isSaved = $admins->save();
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
        $admins =  Admin::findorFail($id);

        return response()->view('cms.Admin.show' , compact('admins'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admins =  Admin::findorFail($id);
        return response()->view('cms.Admin.edit' , compact('admins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator($request->all(),[
            'name' => 'required|string|min:3|max:10',
            'mobile' => 'required|string|min:3|max:10',
            'email' => 'required|email',
            'address' => 'required|string|min:3',
            'img' => 'required|min:3|max:20',
            'data' => 'required|string|min:3',
            'email' => 'required|email|min:3|max:30',
            'password' => 'required|numeric|digits:8'
        ] , [
            'name.required'=>'حقل اسم الكامل مطلوب',
            'mobile.required'=>'حقل رقم الهاتف مطلوب',
            'address.required'=>'حقل  العنوان  مطلوب',
            'img.required'=>'حقل الصورة مطلوب',
            'data.required'=>'حقل البيانات مطلوب',
            'email.required'=>'حقل الايميل مطلوب',
            'password.required'=>'حقل كلمة السر مطلوب',

            'name.string'=>'حقل الاسم الكامل يجب ان يكون نصا',
            'mobile.numeric'=>'حقل رقم الهاتف يجب ان يكون رقما ',
            'address.string'=>'حقل العنوان يجب ان يكون نص   ',
            'img.string'=>'حقل كلمة الصورة يجب ان يكون صورة',
            'data.string'=>'حقل البيانات يجب ان يكون نصا',
            'email.email'=>'حقل الايميل  يجب ان يحتوي على @',
            'password.numeric'=>'حقل كلمة المرور يجب ان يكون ارقام',



        ]);

        if(! $validator->fails()){
        $admins = Admin::findOrFail($id);
        $admins->name = $request->input('name');
        $admins->mobile = $request->input('mobile');
        $admins->email = $request->input('email');
        $admins->password = $request->input('password');
        $admins->data = $request->input('data');
        $admins->img = $request->input('img');
        $admins->address = $request->input('address');
        $admins->password = $request ->input('password');
        $isSaved = $admins->save();
       return ['redirect' => route('admins.index')];
}
  else{
                return response()->json([
                    'icon' => 'error' ,
                    'title' => $validator->getMessageBag()->first(),
                ] , 400) ;
                }
            }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){

        $admins = Admin::destroy($id);
        }}
