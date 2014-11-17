<?php

class LapanganController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $data = array(
            'list' => Lapangan::all(),
        );
        return View::make('lapangans.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('lapangans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $input = Input::all();
        $store = Lapangan::create($input);
        if($store){
            return Redirect::to('lapangan')->with('success','Lapangan Berhasil ditambah');
        }else{
            return Redirect::to('lapangan')->with('success','Lapangan Gagal ditambah');
        }
                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return View::make('lapangans.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $lapangan = Lapangan::find($id);
        $data = array(
            'lapangan' => $lapangan,
        );
        return View::make('lapangans.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $input = Input::all();
        $get = Lapangan::find($id);
        $store = $get->update($input);
        if($store){
            return Redirect::to('lapangan')->with('success','Lapangan Berhasil diperbarui');
        }else{
            return Redirect::to('lapangan')->with('success','Lapangan Gagal diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $get = Lapangan::find($id);
        $store = $get->delete();
        if($store){
            return Redirect::to('lapangan')->with('success','Lapangan Berhasil dihapus');
        }else{
            return Redirect::to('lapangan')->with('success','Lapangan Gagal dihapus');
        }
    }

}
