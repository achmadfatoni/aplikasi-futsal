<?php

class LapanganController extends BaseController {
    
    private $lapangan;
    private $jam;
    private $lapanganjam;
    private $booking;
    public function __construct(Lapangan $lapangan, Jam $jam, Lapanganjam $lapanganjam, Booking $booking) {
        $this->lapangan = $lapangan;
        $this->jam = $jam;
        $this->lapanganjam = $lapanganjam;
        $this->booking = $booking;
        $this->beforeFilter('auth');
        $this->beforeFilter('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $data = array(
            'detilUrl' => URL::to('lapangan/detil-harga'),
            'list' => $this->lapangan->all(),
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
        $store = $this->lapangan->create($input);
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
        $lapangan = $this->lapangan->find($id);
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
        $get = $this->lapangan->find($id);
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
        $get = $this->lapangan->find($id);
        $store = $get->delete();
        if($store){
            return Redirect::to('lapangan')->with('success','Lapangan Berhasil dihapus');
        }else{
            return Redirect::to('lapangan')->with('success','Lapangan Gagal dihapus');
        }
    }
    
    public function getDetilHarga($lapanganId){
        $lapangan = $this->lapangan->findOrFail($lapanganId);
        $list = $this->jam
            ->with(array('lapangan' => function($q) use ($lapanganId){
                $q->where('id','=', $lapanganId);
            }))->get();
        $editUrl = URL::to('lapangan/set-detil-harga');
        $data = array(
            'list' => $list,
            'editUrl' => $editUrl,
            'lapanganId' => $lapanganId,
            'lapangan' => $lapangan,
        );

        return View::make('lapangans.detil-harga', $data);
    }

    public function setDetilHarga($lapanganId, $jamId)
    {
        $jam = $this->jam->findOrFail($jamId);
        $lapanganjam = $this->lapanganjam
            ->whereLapanganId($lapanganId)
            ->whereJamId($jamId);
        $lapanganjamCount = $lapanganjam->count();
        $lapanganjamGet = $lapanganjam->first();
        if($lapanganjamCount > 0){
            $actionUrl = URL::to('/lapangan/update-detil-harga');
        }else{
            $actionUrl = URL::to('/lapangan/save-detil-harga');
        }
        $data = array(
            'jamId' => $jamId,
            'lapanganId' => $lapanganId,
            'jam' => $jam,
            'actionUrl' => $actionUrl,
            'lapanganjam' => $lapanganjamGet,
        );
        return View::make('lapangans.set-detil-harga', $data);
    }

    public function saveDetilHarga()
    {
        $jam = $this->jam->findOrFail(Input::get('jam_id'));
        $harga = $jam->lapangan()->attach(Input::get('lapangan_id'), Input::all());
        if($harga){
            return Redirect::to('lapangan/detil-harga/'.Input::get('lapangan_id'))->with('success','Detil Harga Berhasil diperbarui');
        }else{
            return Redirect::to('lapangan/detil-harga/'.Input::get('lapangan_id'))->with('success','Detil Harga Berhasil diperbarui');
        }
    }

    public function updateDetilHarga()
    {
        $jam = $this->jam->findOrFail(Input::get('jam_id'));
        $harga = $jam->lapangan()->updateExistingPivot(Input::get('lapangan_id'), Input::all());
        if($harga){
            return Redirect::to('lapangan/detil-harga/'.Input::get('lapangan_id'))->with('success','Detil Harga Berhasil diperbarui');
        }else{
            return Redirect::to('lapangan/detil-harga/'.Input::get('lapangan_id'))->with('success','Detil Harga Berhasil diperbarui');
        }
    }

    public function pemakaian()
    {
        $dt = \Carbon\Carbon::now();
        $bulan = $dt->month;
        if(Input::has('bulan')){
            $bulan = Input::get('bulan');
        }

          $query = $this->booking
            ->with('customer')
            ->with('lapangan')
            ->with('jam')
            ->with(array('lapangan' => function($q){
                $q->with('jam');
            }))
            ->whereStatus(BOOKING_VALIDATED);

        if(Input::has('dari') && Input::has('sampai')){
            $query->where('tanggal','>=', Input::get('dari'))
                ->where('tanggal','<=', Input::get('sampai'));
        }


        $list = $query->get();

        $data = [
            'bulans' => Lang::get('bulan'),
            'list' => $list,
            'bulan' => $bulan,
        ];
        return View::make('lapangans.pemakaian', $data);
    }

    public function export(){
    
          $query = $this->booking
            ->with('customer')
            ->with('lapangan')
            ->with('jam')
            ->with(array('lapangan' => function($q){
                $q->with('jam');
            }))
            ->whereStatus(BOOKING_VALIDATED);

        if(Input::has('dari') && Input::has('sampai')){
            $query->where('tanggal','>=', Input::get('dari'))
                ->where('tanggal','<=', Input::get('sampai'));
        }
        Excel::create('Laporan', function($excel) use ($query){
            $excel->sheet('New sheet', function($sheet) use ($query){
                $list = $query->get();
                $data = [
                    'list' => $list,
                ];
                $sheet->loadView('lapangans.export', $data);
            });

        })->export('xls');
    }

    public function query(){
        $query = $this->booking
            ->with('customer')
            ->with('lapangan')
            ->with('jam')
            ->with(array('lapangan' => function($q){
                $q->with('jam');
            }))
            ->whereStatus(BOOKING_VALIDATED);

        if(Input::has('dari') && Input::has('sampai')){
            $query->where('tanggal','>=', Input::get('dari'))
                ->where('tanggal','<=', Input::get('sampai'));
        }

        return $query->get();
    }

}
