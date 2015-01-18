<?php

class GajiController extends BaseController {

	private $gaji;

	public function __construct(Gaji $gaji)
	{
		$this->gaji = $gaji;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($periodeId)
	{
		$gaji = $this->gaji->with('karyawan')->get();
		$data = array(
			'list' => $gaji,
			'periodeId' => $periodeId,
		);
		return View::make('gajis.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('gajis.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('gajis.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('gajis.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($periodeId, $karyawanId)
	{
		$data = $this->gaji->wherePeriodeGajiId($periodeId)
			->whereKaryawanId($karyawanId)
			->first();
		$update = $data->update(array('status' => GAJI_SUDAH));
		if($update){
			return Redirect::back()->with('success', "Gaji berhasil diambil");
		}else{
			return Redirect::back()->with('error', "Gaji gagal diambil");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
