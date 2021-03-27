<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $log = Activity::all();

        return view('admin.activity-log.index', compact('log'));
    }
}
