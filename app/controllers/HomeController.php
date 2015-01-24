<?php

class HomeController extends BaseController
{

    private $page;
    private $lapangan;
    public function __construct(Page $page, Lapangan $lapangan)
    {
        $this->page = $page;
        $this->lapangan = $lapangan;
    }

    public function getIndex()
    {
        $dt = \Carbon\Carbon::now();
        if (Input::has('tahun')) {
            $tahun = Input::get('tahun');
        }else{
            $tahun = $dt->year;
        }

        if (Input::has('bulan')) {
            $bulan = Input::get('bulan');
        }else{
            $bulan = $dt->month;
        }

        if (Input::has('tanggal')) {
            $tanggal = Input::get('tanggal');
        }else{
            $tanggal = $dt->day;
        }

        $lapangans = $this->lapangan
            ->with(array('jam' => function ($q) use ($tahun, $bulan, $tanggal){
                $q->with(array('booking' => function($q) use ($tahun, $bulan, $tanggal){
                    $q->where('tanggal','=', $tahun.'-'.$bulan.'-'.$tanggal);

                }));
            }))
            ->get();
        $promo = $this->page->find(PAGE_PROMO);
        $data = array(
            'tahun' => $tahun,
            'bulan' => $bulan,
            'tanggal' => $tanggal,
            'bulans' => Lang::get('bulan'),
            'lapangans' => $lapangans,
            'promo' => $promo->contents,
        );
        return View::make('home.index', $data);
    }

    public function getNowDate()
    {
        return \Carbon\Carbon::now();
    }

    public function getYear()
    {
        return $this->getNowDate()->year;
    }

    public function getMonth()
    {
        return $this->getNowDate()->month;
    }

    public function getDate()
    {
        return $this->getNowDate()->day;
    }
}
