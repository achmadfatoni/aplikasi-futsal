<?php

class JamController extends BaseController {

	private $jam;
	public function __construct(Jam $jam)
	{
		$this->jam = $jam;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = array(
			'list' => $this->jam->all()
		);
        return View::make('jam.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('jam.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$store = $this->jam->create($input);
		if($store){
			return Redirect::to('jam')->with('success','Jam Berhasil ditambah');
		}else{
			return Redirect::to('jam')->with('success','Jam Gagal ditambah');
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
        return View::make('jam.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$jam = $this->jam->find($id);
		$data = array(
			'jam' => $jam,
		);
        return View::make('jam.edit');
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
		$get = $this->jam->find($id);
		$store = $get->update($input);
		if($store){
			return Redirect::to('jam')->with('success','Jam Berhasil diperbarui');
		}else{
			return Redirect::to('jam')->with('success','Jam Gagal diperbarui');
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
		$get = $this->jam->find($id);
		$store = $get->delete();
		if($store){
			return Redirect::to('jam')->with('success','Jam Berhasil dihapus');
		}else{
			return Redirect::to('jam')->with('success','Jam Gagal dihapus');
		}
	}

}
