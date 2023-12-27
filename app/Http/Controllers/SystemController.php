<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Systemsetting;
class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['system'] = Systemsetting::find(1);
        $_SESSION['setting'] = $data['system'];
        return view('backend.dashboard.system_settings', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required',
            'email' =>'email|required'
       ]);
      try{

        $logo = '';
       
        if($request->has('logo') &&  $request->file('logo')){
            $setting  = Systemsetting::find(1);
            if($setting && $setting->logo){
               
                 if(file_exists(public_path("/uploads/$setting->logo"))){
                    unlink(public_path("uploads/$setting->logo"));
                 }
            }
 
         $file  = $request->file('logo');
         $newName = time().'-'. rand(10,9999999999999).'-'.$file->getClientOriginalName();
         $newPath = public_path()."/uploads/";
         $file->move($newPath, $newName);
         $logo = $newName;
        }
 
        $data = [
         'name' =>$request->name,
         'phone' =>$request->mobile,
         'email' =>$request->email,
         'slogan' =>$request->slogan ?? '',
         'logo' =>$logo,
         'address' =>$request->address
        ];
   
        $status  = Systemsetting::updateOrCreate(['id' => 1], $data);

        if($status){
         return redirect()->back()->with(['system' => $status]);
        }
      }catch(\Exception $e) {
        dd($e);
        return redirect()->back()->withInput();
      }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
