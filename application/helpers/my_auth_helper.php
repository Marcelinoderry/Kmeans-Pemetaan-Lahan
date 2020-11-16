<?php
defined('BASEPATH') or exit('No direct script access allowed');

// untuk mengecek session user
if (!function_exists('checking_session')) {
    function checking_session($user_data)
    {
        if ( empty($user_data) ) {
            redirect('home');
        }
    }
}

// untuk mengecek role user
if (!function_exists('checking_role_session')) {
    function checking_role_session($role)
    {
        if ( $role ) {
            return redirect($role.'/dashboard');
        }
    }
}