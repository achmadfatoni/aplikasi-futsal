<?php

class PeriodeGajiController extends BaseController {

	private $periodeGaji;

	private $gaji;

	public function __construct(PeriodeGaji $periodeGaji, Gaji $gaji)
	{
		$this->periodeGaji = $periodeGaji;
		$this->gaji = $gaji;
        $this->beforeFilter('auth');
        $this->beforeFilter('admin');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = $this->periodeGaji->with('gaji')->get();
		$data = array(
			'list' => $list,
		);
        return View::make('periodegajis.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$now = \Carbon\Carbon::now();
		$currYear = $now->year;
		$data = array(
			'currYear' => $currYear,
			'bulans' => Lang::get('bulan'),
		);
        return View::make('periodegajis.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$store = $this->periodeGaji->create($input);
		if($store){
			return Redirect::to('periode-gaji')->with('success', 'Periode Gaji berhasi di buat');
		}else{
			return Redirect::back()->with('error', 'Periode Gaji gagal di buat');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$periode = $this->periodeGaji->findOrFail($id);
		$now = \Carbon\Carbon::now();
		$currYear = $now->year;
		$bulan = Lang::get('bulan');
		$data = array(
			'currYear' => $currYear,
			'bulans' => $bulan,
			'periode' => $periode,
		);
        return View::make('periodegajis.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		$get = $this->periodeGaji->find($id);
		$update = $get->update($input);
		if($update){
			return Redirect::to('periode-gaji')->with('success','Periode gaji Berhasil diperbarui');
		}else{
			return Redirect::back()->with('error','Jam Gagal diperbarui');
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
		$destroy = $this->periodeGaji
			->find($id)
			->delete();
		if($destroy){
			return Redirect::back()->with('success', 'Periode Gaji Berhasil dihapus');
		}else{
			return Redirect::back()->with('error', 'Periode Gaji gagal dihapus');
		}
	}

}
