<?php

namespace dacoto\LaravelWizardInstaller\Support;

use dacoto\SetEnv\Facades\SetEnv;

class EnvEditor
{
    public static function setEnv($key, $value = null): void
    {
        SetEnv::setKey($key, $value);
        SetEnv::save();
    }

    public static function getEnv($key, $default = null)
    {
        return env($key, $default);
    }
}
