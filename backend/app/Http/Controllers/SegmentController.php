<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSegmentRequest;
use App\Http\Requests\DeleteSegmentRequest;
use App\Http\Requests\EditSegmentRequest;
use App\Http\Requests\GetSegmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SegmentController extends Controller
{
    public function getAll(){
        return DB::table('segments')->get();
    }
    public function get(GetSegmentRequest $request){
        $data = $request->validated();
        return DB::table('segments')
            ->where('id','=',$data['id'])
            ->get();
    }
    public function add(AddSegmentRequest $request){
        $data = $request->validated();
        DB::table('segments')
            ->insert([
                'description' => $data['description'],
                'project_id' => $data['project_id']
            ]);
    }
    public function edit(EditSegmentRequest $request){
        $data = $request->validated();
        if(isset($data['project_id'])){
            DB::table('segment')
                ->where('id','=',$data['id'])
                ->update([
                    'project_id' => $data['project_id']
                ]);
        }
        if(isset($data['description'])){
            DB::table('segment')
                ->where('id','=',$data['id'])
                ->update([
                    'description' => $data['description']
                ]);
        }
        if(isset($data['done'])){
            DB::table('segment')
                ->where('id','=',$data['id'])
                ->update([
                    'done' => $data['done']
                ]);
        }
    }
    public function delete(DeleteSegmentRequest $request){
        $data = $request->validated();
        DB::table('segment')
            ->delete($data['id']);
    }
}
