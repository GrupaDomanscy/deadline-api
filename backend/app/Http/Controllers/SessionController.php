<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeSegmentRequest;
use App\Http\Requests\StartSessionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function start(StartSessionRequest $request)
    {
        $data = $request->validated();
        $session = DB::table('sessions')
            ->insertGetId([
                'started_at' => now(),
            ]);
        DB::table('sessions_data')
            ->insert([
                'user_id' => auth()->id(),
                'segment_id' => $data['segment_id'],
                'session_id' => $session
            ]);
    }
    public function end(){
        DB::table('sessions')
            ->update([
                'ended_at' => now()
            ]);
    }
    public function changeSegment(ChangeSegmentRequest $request){
        $data = $request->validated();
        DB::table('sessions_data')
            ->insert([
                'user_id' => auth()->id(),
                'segment_id' => $data['segment_id'],
                'session_id' => $data['session_id']
            ]);
    }
}
