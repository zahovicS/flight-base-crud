<?php

function init_config_view(){
    return [
        "title" => get_config("app","title"),
        "locale" => get_config("app","locale")
    ];
}

function now(string $format = "Y-m-d H:i:s")
{
    return date($format);
}


/**
 * Sanitiza un valor ingresado por usuario
 *
 * @param string $str
 * @param boolean $cleanhtml
 * @return void
 */
function clean($str, $cleanhtml = false)
{
    $str = @trim(@rtrim($str));

    if ($cleanhtml === true) {
        return htmlspecialchars($str);
    }

    return filter_var($str, FILTER_SANITIZE_STRING);
}



/**
 * Arregla las diagonales invertidas de una URL
 *
 * @param string $url
 * @return string
 */
function fix_url($url)
{
    return str_replace('\\', '/', $url);
}


/**
 * Regresa el valor de sesión o un index en especial
 *
 * @param string $v
 * @return mixed
 */
function get_session($v = null)
{
    if ($v === null) {
        return $_SESSION;
    }

    /** If it's an array of data must be dot separated */
    if (strpos($v, ".") !== false) {
        $array = explode('.', $v);
        $lvls = count($array);

        for ($i = 0; $i < $lvls; $i++) {
            if (!isset($_SESSION[$array[$i]])) {
                return false;
            }
        }
    }

    if (!isset($_SESSION[$v])) {
        return false;
    }

    if (empty($_SESSION[$v])) {
        unset($_SESSION[$v]);
        return false;
    }

    return $_SESSION[$v];
}


/**
 * Guarda en sesión un valor y un index
 *
 * @param string $k
 * @param mixed $v
 * @return bool
 */
function set_session($k, $v)
{
    $_SESSION[$k] = $v;
    return true;
}