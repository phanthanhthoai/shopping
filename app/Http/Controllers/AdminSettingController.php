<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AdminSettingController extends Controller
{
    private $setting;
    public function __construct(Setting $setting){
        $this->setting = $setting;
    }
    public function index()
    {
        Paginator::useBootstrap();
        $settings=$this->setting->latest()->paginate(5);
        return view('admin.setting.index',compact('settings'));
    }
}
