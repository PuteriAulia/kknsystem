<?php

namespace App\Http\Controllers;

use App\Models\Majors;
use Illuminate\Support\Facades\Session;
use App\Models\Students;
use Illuminate\Http\Request;

class studentsController extends Controller
{
    protected $dbStudents;

    public function __construct(){
        $this->dbStudents = new Students();
    }

    public function index(){
        $students = Students::where('status','active')->get();
        $majors = Majors::where('status','active')->get();
        return view('/students/dataStudents',[
            'students' => $students,
            'majors' => $majors,
        ]);
    }

    public function add(Request $request){
        // Setting id
        $maxId = Students::max('student_id');
        $numId = (int) substr($maxId,3);

        if ($numId == null) {
            $numId = '00001';
        }else{
            $addNumId = $numId+1;
            $numId = sprintf("%'.05d",$addNumId);
        }
        $newId = 'STD'.$numId;

        // File validation
        $request->validate([
            'photo' => 'required|mimes:jpg,png,jpeg'
        ]);

        // Setting image
        if ($request->file('photo')) {
            //Get file extention
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Setting file name
            $photoNewName = $newId.'-'.now()->timestamp.'.'.$extension;
            //Store file to public/photo
            $request->file('photo')->storeAs('photo',$photoNewName);
        }

        // Insert data to db
        $this->dbStudents->student_id = $newId;
        $this->dbStudents->major_id = $request->major;
        $this->dbStudents->name = strtolower($request->name);
        $this->dbStudents->phone = $request->phone;
        $this->dbStudents->photo = $photoNewName;
        $this->dbStudents->status = 'active';
        $this->dbStudents->save();

        return redirect('/mahasiswa')->with('message','Data berhasil ditambahkan');
    }

    public function formEdit($id){
        $student = Students::where('student_id',$id)->get();
        $majors = Majors::where('status','active')->get();
        return view('/students/editStudent',[
            'student' => $student,
            'majors' => $majors
        ]);
    }

    public function editData(Request $request, $id){
        $edit = Students::where('student_id',$id)->update([
            'name' => strtolower($request->name),
            'phone' => $request->phone,
            'major_id' => $request->major,
        ]);

        if ($edit) {
            Session::flash('status','success');
            Session::flash('message','Data berhasil diubah');
        }else{
            Session::flash('status','failed');
            Session::flash('message','Data gagal diubah');
        }

        return redirect('/mahasiswa');
    }

    public function editFoto(Request $request, $id){
        $photo = $request->file('photo');

        //File validation
        $request->validate([
            'photo' => 'required|mimes:jpg,png,jpeg'
        ]);

        if ($photo) {
            $extention = $photo->getClientOriginalExtension();
            $photoNewName = $id.'-'.now()->timestamp.'.'.$extention;
            $photo->storeAs('photo',$photoNewName);
        }

        $edit = Students::where('student_id',$id)->update([
            'photo' => $photoNewName
        ]);

        if ($edit) {
            Session::flash('status','success');
            Session::flash('message','Data berhasil diubah');
        }else{
            Session::flash('status','failed');
            Session::flash('message','Data gagal diubah');
        }

        return redirect('/mahasiswa');
    }

    public function delete($id){
        $delete = Students::where('student_id',$id)->update([
            'status' => 'non-active'
        ]);

        if ($delete) {
            Session::flash('status','success');
            Session::flash('message','Data berhasil dihapus');
        }else{
            Session::flash('status','failed');
            Session::flash('message','Data gagal dihapus');
        }

        return redirect('/mahasiswa');
    }
}
