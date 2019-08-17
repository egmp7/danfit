<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'user_image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if ($request->hasFile('user_image')){
            //  Get filename with the extension
            $filenameWithExt = $request->file('user_image')->getClientOriginalName();
            //  Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //  Get just ext
            $extension = $request->file ('user_image')->getClientOriginalExtension();
            //  Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //  Upload the image
            $path = $request->file('user_image')->storeAs('public/user_image',$fileNameToStore);
        }else{
            $fileNameToStore = 'boy.png';
        }

        $id = Auth::id();

        //  Update Picture
        $pic = User::find($id);
        if($request->hasFile('user_image')){
            $pic->user_image=$fileNameToStore;
        }
        $pic->save();

        return redirect('/configuracion')->with('success','Perfil Actualizado!');
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
