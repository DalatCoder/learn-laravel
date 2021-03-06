<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use App\Http\Requests\SettingUpdateRequest;
use App\Setting;
use Illuminate\Support\Facades\Log;

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

    public function update(SettingUpdateRequest $request, $id)
    {
        $setting = $this->setting->findOrFail($id);

        $setting->update([
            'config_key' => $request['config_key'],
            'config_value' => $request['config_value'],
            'type' => $request->get('type')
        ]);

        return redirect()->route('settings.index');
    }

    public function delete($id)
    {
        $setting = $this->setting->findOrFail($id);

        try {
            $setting->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $e) {
            $message = 'Message: ' . $e->getMessage() . '. Line: ' . $e->getLine();
            Log::error($message);

            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
}
