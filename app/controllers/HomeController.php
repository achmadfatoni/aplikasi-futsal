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

    public function getIndex($tahun = null, $bulan = null, $tanggal = null)
    {
        $dt = \Carbon\Carbon::now();
        if ($tahun == null) {
            $tahun = $dt->year;
        }

        if ($bulan == null) {
            $bulan = $dt->month;
        }

        if ($tanggal == null) {
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
