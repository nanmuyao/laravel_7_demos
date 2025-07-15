<?php

namespace App\Http\Controllers;

use App\Jobs\DemoJob;
use Illuminate\Http\Request;

class DemoJobController extends Controller
{
    public function dispatchDemoJob()
    {
        DemoJob::dispatch();
        return response()->json(['status' => 'DemoJob dispatched']);
    }
}
