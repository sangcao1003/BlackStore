<?php

/**
 * Check if an input has error, e.g. validation errors from Laravel
 *
 * @param array|string $fields Input fields name
 * @param \Illuminate\Support\MessageBag $errors
 * @param string $errorCssClass   Css class when field has error
 * @param string $noErrorCssClass Css class when field has no error
 *
 * @return string
 */
function has_error($fields, $errors, $errorCssClass = 'has-error', $noErrorCssClass = '')
{
    return $errors->hasAny($fields) ? $errorCssClass : $noErrorCssClass;
}

/**
 * Get the path to a versioned Mix file in public/assets folder
 *
 * @param string $assetPath Relative path in public/assets folder
 *
 * @return \Illuminate\Support\HtmlString|string
 */
function mix_asset($assetPath)
{
    return mix($assetPath, 'assets/public');
}

function set_active($path, $active = 'active')
{
    return call_user_func_array('Request::is', (array) $path) ? $active : '';
}
