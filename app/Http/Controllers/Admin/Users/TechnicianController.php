<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Technician;
use App\Merchant;

class TechnicianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technicianes = Technician::all();
        $merchantes = Merchant::all();
        return view('pages/users/technicianes', compact('technicianes', 'merchantes'));
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
        $technician = new Technician();
        $technician->name = $request->name;
        $technician->merchant_id = $request->merchant_id;
        $technician->phone = $request->phone;
        $technician->address = $request->address;
        $technician->national_id = $request->national_id;
        $technician->created_by = $request->created_by;
        if ($request->hasFile('picture')) {
        $technician->picture = $this->uploadimage($request->picture);
        }
        
        $technician->save();
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
        $technician = Technician::find($id);
        $technician->name = $request->upname;
        $technician->merchant_id = $request->upmerchant_id;
        $technician->phone = $request->upphone;
        $technician->address = $request->upaddress;
        $technician->national_id = $request->upnational_id;
        $technician->created_by = $request->upcreated_by;
        if ($request->hasFile('uppicture')) {
        $technician->picture = $this->uploadimage($request->uppicture);
        }
        
        $technician->save();
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
        Technician::find($id)->delete();
        return back();
    }
}
