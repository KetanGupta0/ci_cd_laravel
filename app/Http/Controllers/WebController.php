<?php

namespace App\Http\Controllers;

use App\Jobs\LogUserCount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class WebController extends Controller
{
    public function users()
    {
        // $cached = Cache::has('users.list');
        // $user = Cache::remember('users.list', now()->addMinute(1), function () {
        //     Log::info('Fetching users from database');
        //     return User::all();
        // });
        // return response()->json([
        //     'data' => $user,
        //     'cached' => $cached
        // ], 200);
        LogUserCount::dispatch();
        return response()->json([
            'message' => 'User count logging job dispatched'
        ], 200);
    }
}
