<?php

use App\Setting;

function getConfigValueFromSettingTable($config_key)
{
    $setting = Setting::where('config_key', $config_key)->first();

    $config_value = null;
    if (!empty($setting)) {
        $config_value = $setting->config_value;
    }

    return $config_value;
}

