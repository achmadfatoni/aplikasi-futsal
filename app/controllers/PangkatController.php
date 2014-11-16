<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PangkatController
 *
 * @author Achmad Fatoni
 */
class PangkatController extends BaseController {

    public function getIndex() {
        $data = array(
            'createUrl' => URL::to('pangkat/create'),
            'list' => Pangkat::all(),
        );
        return View::make('pangkat.index', $data);
    }

    public function getCreate() {
        $data = array(
            'actionUrl' => URL::to('pangkat/save'),
        );
        return View::make('pangkat.create_edit', $data);
    }

    public function getEdit($id) {
        $pangkat = Pangkat::find($id);
        $data = array(
            'pangkat' => $pangkat,
            'actionUrl' => URL::to('pangkat/save'),
            'id' => $id,
        );
        return View::make('pangkat.create_edit', $data);
    }

    public function postSave() {
        $input = Input::all();
        if (Input::has('id')) {
            $pangkats = Pangkat::find(Input::get('id'));
            $action = $pangkats->update($input);
        } else {
            $pangkats = new Pangkat();
            $action = $pangkats->create($input);
        }
        if ($action) {
            return Redirect::to('pangkat')->with('success', 'Pangkat berhasil dibuat');
        } else {
            return Redirect::to('pangkat')->with('error', 'Pangkat Gagal dibuat');
        }
    }

    public function getDelete($id) {
        $pangkat = Pangkat::find($id);
        if ($pangkat->delete()) {
            return Redirect::to('pangkat')->with('success', 'Pangkat berhasil dihapus');
        } else {
            return Redirect::to('pangkat')->with('error', 'Pangkat Gagal dihapus');
        }
    }

}
