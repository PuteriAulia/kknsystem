<?php

namespace App\Http\Controllers;

use App\Models\Faculties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class facultiesController extends Controller
{   
    protected $dbFaculties;

    public function __construct(){
        $this->dbFaculties = new Faculties();    
    }

    public function index(){
        $faculties = Faculties::where('status','active')->get();
        return view('faculties/dataFaculties',[
            'faculties'=>$faculties,
        ]);
    }

    public function add(Request $request){
        // Id setting
        $maxId = Faculties::max('faculty_id');
        $numId = (int) substr($maxId,3);
        
        if ($numId == null) {
            $numId = '0001';
        }else{
            $addNumId = $numId+1;
            $numId = sprintf("%'.04d", $addNumId);
        }
        $newId = "FAK".$numId;
        $name = strtolower($request->name);

        // Insert data
        $this->dbFaculties->faculty_id = $newId;
        $this->dbFaculties->name = $name;
        $this->dbFaculties->status = 'active';
        $insertData = $this->dbFaculties->save();

        if ($insertData) {
            Session::flash('status','success');
            Session::flash('message','Data berhasil ditambahkan');
        }else{
            Session::flash('status','failed');
            Session::flash('message','Data gagal ditambahkan');
        }

        return redirect('/fakultas');
    }

    public function formEdit($id){
        $faculty = Faculties::where('faculty_id',$id)->get();
        return view('faculties/editFaculty',[
            'faculty'=>$faculty,
        ]);
    }

    public function edit(Request $request, $id){
        $name = strtolower($request->name);

        $edit = Faculties::where('faculty_id',$id)->update([
            'faculty_id' => $id,
            'name' => $name,
        ]);

        if ($edit) {
            Session::flash('status','success');
            Session::flash('message','Data berhasil diubah');
        }else{
            Session::flash('status','failed');
            Session::flash('message','Data gagal diubah');
        }

        return redirect('/fakultas');
    }

    public function delete($id){
        $delete = Faculties::where('faculty_id',$id)->update([
            'status' => 'non-active',
        ]);

        if ($delete) {
            Session::flash('status','success');
            Session::flash('message','Data berhasil dihapus');
        }else{
            Session::flash('status','failed');
            Session::flash('message','Data gagal dihapus');
        }

        return redirect('/fakultas');
    }
}
