<?php

namespace App\Http\Controllers;

use App\Models\Locations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class locationsController extends Controller
{
    protected $dbLocations;

    public function __construct(){
        $this->dbLocations = new Locations();
    }

    public function index(){
        $locations = Locations::where('status','active')->get();
        return view('/locations/dataLocations',[
            'locations' => $locations,
        ]);
    }

    public function add(Request $request){
        // Id setting
        $maxId = Locations::max('location_id');
        $numId = (int) substr($maxId,3);

        if ($numId == null) {
            $numId = '0001';
        }else{
            $addNumId = $numId+1;
            $numId = sprintf("%'.04d", $addNumId);
        }
        $newId = 'LOK'.$numId;

        $this->dbLocations->location_id = $newId;
        $this->dbLocations->kelurahan = strtolower($request->kelurahan);
        $this->dbLocations->kecamatan = strtolower($request->kecamatan);
        $this->dbLocations->kabupaten = strtolower($request->kabupaten);
        $this->dbLocations->provinsi = strtolower($request->provinsi);
        $this->dbLocations->status = 'active';
        $insertData = $this->dbLocations->save();

        if ($insertData) {
            Session::flash('status','success');
            Session::flash('message','Data berhasil ditambahkan');
        }else{
            Session::flash('status','failed');
            Session::flash('message','Data gagal ditambahkan');
        }

        return redirect('/lokasi');
    }
}
