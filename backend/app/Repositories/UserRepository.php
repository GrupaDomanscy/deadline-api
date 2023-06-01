<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function findByUsername(string $username): \stdClass|null
    {
        return DB::table("users")->where("username", $username)->first();
    }

    public function delete(int $id): int
    {
        return DB::table("users")->where("id", $id)->delete();
    }
}
