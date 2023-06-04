<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Faculties;
use Illuminate\Http\Request;

class facultiesAPI extends Controller
{
    protected $dbFaculties;

    public function __construct(){
        $this->dbFaculties = new Faculties();    
    }

    public function getAll(){
        $faculties = Faculties::where('status','active')->get();
        if ($faculties) {
            return response([
                'status' => 'ok',
                'data' => $faculties,
            ],200);
        }else{
            return response([
                'status' => 'Not Found',
                'message' => 'Data tidak ditemukan'
            ],404);
        }
    }

    public function edit(Request $request, $id){
        $faculties = Faculties::firstWhere('faculty_id',$id);
        if ($faculties) {
            Faculties::where('faculty_id',$id)->update([
                'name' => $request->name
            ]);

            return response([
                'status' => 'ok',
            ],200);
        }else{
            return response([
                'status' => 'Not found',
                'message' => 'Data tidak ditemukan',
            ]);
        }
    }

    public function delete($id){
        $faculties = Faculties::firstWhere('faculty_id',$id);

        if($faculties) {
            Faculties::where('faculty_id',$id)->update([
                'status' => 'non-active',
            ]);

            return response([
                'status' => 'ok'
            ]);
        }else{
            return response([
                'status' => 'Not found',
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }

    public function store(Request $request){
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

        $this->dbFaculties->faculty_id = $newId;
        $this->dbFaculties->name = $request->name;
        $this->dbFaculties->status = 'active';
        $this->dbFaculties->save();

        return response([
            'status' => 'ok',
        ],200);
    }
}
