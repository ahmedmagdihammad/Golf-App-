<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Merchant;
use App\Distributer;

class MerchantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchantes = Merchant::all();
        $distributers = Distributer::all();
        return view('pages/users/merchantes', compact('merchantes', 'distributers'));
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
        $merchant  = new Merchant();
        $merchant->name = $request->name;
        $merchant->phone = $request->phone;
        $merchant->address = $request->address;
        $merchant->national_id = $request->national_id;
        $merchant->distributer_id = $request->distributer_id;
        $merchant->created_by = $request->created_by;
        if ($request->hasFile('picture')) {
        $merchant->picture = $this->uploadimage($request->picture);
        }
        
        $merchant->save();
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
        $merchant  = Merchant::find($id);
        $merchant->name = $request->upname;
        $merchant->phone = $request->upphone;
        $merchant->address = $request->upaddress;
        $merchant->national_id = $request->upnational_id;
        $merchant->distributer_id = $request->updistributer_id;
        $merchant->created_by = $request->upcreated_by;
        if ($request->hasFile('uppicture')) {
        $merchant->picture = $this->uploadimage($request->uppicture);
        }
        
        $merchant->save();
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
        Merchant::find($id)->delete();
        return back();
    }
}
