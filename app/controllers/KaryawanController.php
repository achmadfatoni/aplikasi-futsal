<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of KaryawanController
 *
 * @author Achmad Fatoni
 */
class KaryawanController extends BaseController {

    public function getIndex() {
//        return Karyawan::with('pangkat')->get();
        $data = array(
            'createUrl' => URL::to('karyawan/create'),
            'list' => Karyawan::all(),
        );
        return View::make('karyawan.index', $data);
    }

    public function getCreate() {
        $data = array(
            'actionUrl' => URL::to('karyawan/save'),
            'pangkatLov' => Pangkat::all(),
        );
        return View::make('karyawan.create_edit', $data);
    }

    public function getEdit($id) {
        $karyawan = Karyawan::find($id);
        $data = array(
            'karyawan' => $karyawan,
            'actionUrl' => URL::to('karyawan/save'),
            'id' => $id,
            'pangkatLov' => Pangkat::all(),
        );
        return View::make('karyawan.create_edit', $data);
    }

    public function postSave() {
        $input = Input::all();
        if (Input::has('id')) {
            $karyawans = Karyawan::find(Input::get('id'));
            $action = $karyawans->update($input);
        } else {
            $karyawans = new Karyawan();
            $action = $karyawans->create($input);
        }
        if ($action) {
            return Redirect::to('karyawan')->with('success', 'Karyawan berhasil dibuat');
        } else {
            return Redirect::to('karyawan')->with('error', 'Karyawan Gagal dibuat');
        }
    }

    public function getDelete($id) {
        $karyawan = Karyawan::find($id);
        if ($karyawan->delete()) {
            return Redirect::to('karyawan')->with('success', 'Karyawan berhasil dihapus');
        } else {
            return Redirect::to('karyawan')->with('error', 'Karyawan Gagal dihapus');
        }
    }

}
