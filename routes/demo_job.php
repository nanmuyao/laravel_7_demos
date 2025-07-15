<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoJobController;

Route::get('/dispatch-demo-job', [DemoJobController::class, 'dispatchDemoJob']);
