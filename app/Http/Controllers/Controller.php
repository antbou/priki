<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        Carbon::setLocale('fr');
    }

    public function flashBag($request, string $message, ?string $type = null)
    {
        $request->session()->flash('flash_message', $message);
        $request->session()->flash('flash_type', $type);
    }
}
