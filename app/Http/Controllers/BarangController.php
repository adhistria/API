<?php

namespace App\Http\Controllers;
use App\User;
use App\Barang;
use Illuminate\Http\Request;
use Mockery\Exception;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barang = Barang::all();
        return response()->json(['code' => 'SUCCES', 'message' => 'OK', 'content' => $barang]);
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
        //
        try{
            $barang = new Barang();
            $barang->nama = $request->nama;
            $barang->harga = $request->harga;
            $barang->user_id = $request->user_id;
            $barang->save();
            return response()->json(['code'=> 'SUCESS', 'message'=> 'OK','content'=> null]);
        }catch (Exception $e){
            return response()->json(['code'=> 'FALI', 'message'=> 'OK','content'=> null]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($idUser)
    {
        //
//        $barang = User::with('barang')
//        return $barang;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
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
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $barang = Barang::find($id);
        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->save();
        return response()->json(['code'=>'SUCCESS', 'message'=>'OK','content'=> null]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $barang = Barang::find($id);
        $barang->destroy();
        return response()->json(['code'=>'SUCCESS','message'=>'OK','content'=>null]);
    }
}
