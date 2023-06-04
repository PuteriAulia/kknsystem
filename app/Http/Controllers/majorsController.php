<?php

namespace App\Http\Controllers;

use App\Models\Majors;
use App\Models\Faculties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class majorsController extends Controller
{   
    protected $dbMajors, $dbFaculties;

    public function __construct(){
        $this->dbMajors = new Majors();
        $this->dbFaculties = new Faculties();
    }

    public function index(){
        $majors = Majors::where('status','active')->get();
        $faculties = Faculties::where('status','active')->get();

        return view('/majors/dataMajors',[
            'majors' => $majors,
            'faculties' => $faculties,
        ]);
    }

    public function add(Request $request){
        // Id setting
        $maxId = Majors::max('major_id');
        $numId = (int) substr($maxId,3);
        
        if ($numId == null) {
            $numId = '0001';
        }else{
            $addNumId = $numId+1;
            $numId = sprintf("%'.04d",$addNumId);
        }

        $newId = 'JUR'.$numId;
        $name = strtolower($request->name);
        $faculty = $request->faculty;

        // Insert data
        $this->dbMajors->major_id = $newId;
        $this->dbMajors->faculty_id = $faculty;
        $this->dbMajors->name = $name;
        $this->dbMajors->status = 'active';
        $insertData = $this->dbMajors->save();

        if ($insertData) {
            Session::flash('status','success');
            Session::flash('message','Data berhasil ditambahkan');
        }else{
            Session::flash('status','failed');
            Session::flash('message','Data gagal ditambahkan');
        }

        return redirect('/jurusan');
    }

    public function formEdit($id){
        $major = Majors::where('major_id',$id)->get();
        $faculties = Faculties::where('status','active')->get();
        return view('majors.editMajor',[
            'major' => $major,
            'faculties' => $faculties,
        ]);
    }

    public function edit(Request $request, $id){
        $edit = Majors::where('major_id',$id)->update([
            'name' => strtolower($request->name),
            'faculty_id' => $request->faculty,
        ]);

        if ($edit) {
            Session::flash('status','success');
            Session::flash('message','Data berhasil diubah');
        }else{
            Session::flash('status','failed');
            Session::flash('message','Data gagal diubah');
        }

        return redirect('/jurusan');
    }

    public function delete($id){
        $major = Majors::where("major_id",$id)->update([
            'status' => 'non-active',
        ]);

        if ($major) {
            Session::flash('status','success');
            Session::flash('message','Data berhasil dihapus');
        }else{
            Session::flash('status','failed');
            Session::flash('message','Data gagal dihapus');
        }

        return redirect('/jurusan');
    }
}
