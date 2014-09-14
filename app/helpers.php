<?php
/**
 * Helpers functions
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    September 14, 2014
 */


/**
 * Get the production filename otherwise return original filename
 *
 * @param $filename
 * @return mixed
 */
function css_asset_path($filename)
{
    $manifestPath = app_path('assets/manifest/css.manifest.json');

    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), TRUE);
    } else {
        $manifest = array();
    }

    if (array_key_exists($filename, $manifest)) {
        return $manifest[$filename];
    }

    return $filename;
}

/**
 * Get the production filename otherwise return original filename
 *
 * @param $filename
 * @return mixed
 */
function js_asset_path($filename)
{
    $manifestPath = app_path('assets/manifest/js.manifest.json');

    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), TRUE);
    } else {
        $manifest = array();
    }

    if (array_key_exists($filename, $manifest)) {
        return $manifest[$filename];
    }

    return $filename;
}