<?php

namespace App\Models;

class App
{
    public static function all($includePrivate = false) {
        $enabledApps = config('hub.settings.public_apps') ?? [];
        if($includePrivate) {
            $private_apps = config('hub.settings.private_apps') ?? [];
            $enabledApps = array_merge($apps, $private_apps);
        }
        $apps = [];
        foreach($enabledApps as $enabledApp) {
            $apps[$enabledApp] = config('hub.apps.' . $enabledApp . "." . $enabledApp);
        }
        return collect($apps);
    }
}
