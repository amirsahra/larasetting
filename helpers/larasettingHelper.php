<?php

use Amirsahra\Larasetting\Exceptions\SettingRecordNotFoundException;
use Amirsahra\Larasetting\Larasetting;

if (!function_exists('get_setting')) {
    /**
     *  Helper function for larasetting package.
     * Get a specific setting by key, or retrieve all settings if key is not provided.
     *
     * @param string|null $key The key of the setting to retrieve. (Optional)
     * @param mixed|null $default The default value to return if the setting is not found. (Optional)
     * @param bool|null $is_active Filter settings by their active status. (Optional)
     *
     * @return mixed If key is provided:
     *               - Returns the value of the setting if found.
     *               - If setting is not found:
     *                   - If default value is provided, creates and returns the setting with the default value.
     *                   - Throws SettingRecordNotFoundException if no default value is provided.
     *               If key is not provided:
     *               - Returns all settings based on the active status if provided.
     * @throws SettingRecordNotFoundException
     */
    function get_setting(string $key = null, mixed $default = null, bool $is_active = null): mixed
    {
        $larasetting = new Larasetting();
        return $larasetting->getSetting($key, $default, $is_active);
    }
}

if (!function_exists('set_setting')) {
    /**
     * Set a specific setting by key with a given value, or retrieve all settings if key is not provided.
     *
     * @param string $key The key of the setting to set.
     * @param mixed $value The value to set for the setting.
     * @param bool|null $is_active Filter settings by their active status. (Optional)
     *
     * @return mixed If key is provided:
     *               - Updates the value of the setting if found.
     *               - If setting is not found, creates the setting with the provided value.
     *               If key is not provided:
     *               - Returns all settings based on the active status if provided.
     * @throws SettingRecordNotFoundException
     */
    function set_setting(string $key, mixed $value, bool $is_active = null): mixed
    {
        $larasetting = new Larasetting();
        return $larasetting->setSetting($key, $value, $is_active);
    }
}
