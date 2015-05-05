<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 1/14/15
 * Time: 22:22
 * Location : 
 */

class GenerateGajiController extends BaseController{

    private $karyawan;

    private $gaji;

    public function __construct(Karyawan $karyawan, Gaji $gaji)
    {
        $this->karyawan = $karyawan;
        $this->gaji = $gaji;
    }

    public function run($periodeGajiId)
    {
        $karyawanList = $this->karyawan->with('pangkat')->get();
        foreach($karyawanList as $karyawan){
            $this->gaji->create(array(
                'periode_gaji_id' => $periodeGajiId,
                'karyawan_id' => $karyawan->id,
                'nominal' => $karyawan->pangkat->gaji,
                'status' => GAJI_BELUM,
            ));
        }

        return Redirect::back()->with('success', 'Gaji berhasil di generate');
    }
}