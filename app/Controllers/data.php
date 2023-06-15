<?php

namespace App\Controllers;

use App\Models\datamobil;

class data extends BaseController
{
    public function index()
    {
        return view('data/merek');
    }
    public function ubahmobil($id)
    {
        $mobil = new datamobil();
        $data = $this->$mobil->getpem($id);
        return view('data/v_ubahmobil', $data);
    }
    public function detailmobil()
    {
        $mobil = new datamobil();
        $data['data_mobil'] = $mobil->findAll();
        return view('data/v_detailmobil', $data);
    }

    public function ubahmerek()
    {
        return view('data/v_ubahmerek');
    }

    public function ubahcustomer()
    {
        return view('data/v_ubahcustomer');
    }

    public function detailcustomer()
    {
        return view('data/v_detailcustomer');
    }


    public function ubahpesanan()
    {
        return view('data/v_ubahpesanan');
    }

    public function detailpesanan()
    {
        return view('data/v_detailpesanan');
    }

    public function ubahperjalanan()
    {
        return view('data/v_ubahperjalanan');
    }

    public function ubahpembayaran()
    {
        return view('data/v_ubahbayar');
    }
}
