<?php

namespace dacoto\LaravelInstaller\Support;

use sixlive\DotenvEditor\DotenvEditor;

class EnvEditor
{
    public static function setEnv($key, $value = null): void
    {
        $editor = new DotenvEditor();
        $editor->load(base_path('.env'));
        if (empty($value)) {
            $editor->unset($key);
        } else {
            if ($value === trim($value) && strpos($value, ' ') !== false) {
                $value = '"'.$value.'"';
            }
            $editor->set($key, $value);
        }
        $editor->save();
    }
}
