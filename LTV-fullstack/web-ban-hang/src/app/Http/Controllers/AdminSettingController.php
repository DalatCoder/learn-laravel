<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use App\Setting;

class AdminSettingController extends Controller
{
    private $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $settings = $this->setting->latest()->paginate(5);
        return view('admin.setting.index', [
            'settings' => $settings
        ]);
    }

    public function create()
    {
        return view('admin.setting.create');
    }

    public function store(SettingAddRequest $request)
    {
        $this->setting->create([
            'config_key' => $request['config_key'],
            'config_value' => $request['config_value'],
            'type' => $request->get('type')
        ]);

        return redirect()->route('settings.index');
    }

    public function edit($id)
    {
        $setting = $this->setting->findOrFail($id);
        return view('admin.setting.edit', [
            'setting' => $setting
        ]);
    }
}
