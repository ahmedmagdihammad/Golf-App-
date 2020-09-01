<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('pages/users/suppliers', compact('suppliers'));
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
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->national_id = $request->national_id;
        if ($request->hasFile('picture')) {
        $supplier->picture = $this->uploadimage($request->picture);
        }
        $supplier->created_by = $request->created_by;

        $supplier->save();
        return back();
    }

    public function uploadimage($file)
    {
        $imagename = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('images');
        $file->move($destinationPath, $imagename); 
        $returenurl = 'images/'.$imagename; 

        return $returenurl;  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        $supplier->name = $request->upname;
        $supplier->phone = $request->upphone;
        $supplier->address = $request->upaddress;
        $supplier->national_id = $request->upnational_id;
        if ($request->hasFile('uppicture')) {
        $supplier->picture = $this->uploadimage($request->uppicture);
        }
        $supplier->created_by = $request->upcreated_by;

        $supplier->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::find($id)->delete();
        return back();
    }
}
