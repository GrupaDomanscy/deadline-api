<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProjectRequest;
use App\Http\Requests\DeleteProjectRequest;
use App\Http\Requests\EditProjectRequest;
use App\Http\Requests\GetProjectRequest;
use App\Repositories\ProjectRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function __construct(private ProjectRepository $projectRepository){}
    public function getAll(){
        return $this->projectRepository->getAll();
    }
    public function get(GetProjectRequest $request){
        $data = $request->validated();

    }
    public function add(AddProjectRequest $request){
        $data = $request->validated();
        DB::beginTransaction();
        try{
            DB::table('projects')
                ->insert([
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'created_by_id' => auth()->id()
                ]);

            DB::commit();
        }catch (Exception $exception){
            DB::rollBack();
            throw $exception;
        }

    }
    public function edit(EditProjectRequest $request){
        $data = $request->validated();
        if(isset($data['name'])){
            DB::table('projects')
                ->where('id','=',$data['id'])
                ->update([
                    'name' => $data['name']
                ]);
        }
        if(isset($data['description'])){
            DB::table('projects')
                ->where('id','=',$data['id'])
                ->update([
                    'description' => $data['description']
                ]);
        }
        if(isset($data['done'])){
            DB::table('projects')
                ->where('id','=',$data['id'])
                ->update([
                    'done' => $data['done']
                ]);
        }
    }
    public function delete(DeleteProjectRequest $request){
        $data = $request->validated();
        DB::table('projects')
            ->delete($data['id']);
    }
}
