<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ProjectRepository
{
    public function getAll(){
        return DB::table('projects')
            ->get();
    }
    public function get($id){
        return DB::table('projects')
            ->where('id','=',$id);
    }
}
