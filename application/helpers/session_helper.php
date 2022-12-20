<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('init')) {
    function init()
    {
        $CI = &get_instance();
        return $CI;
    }
}

if (!function_exists('user_data')) {
    function user_data()
    {
        $CI = init();
        $user_id = get_current_user_id();

        $user_data = $CI->db->where('id', $user_id)->get('users')->row();
        return $user_data;
    }
}

if (!function_exists('customer_data')) {
    function customer_data()
    {
        $CI = init();
        $user_id = get_current_user_id();

        $user_data = $CI->db->where('user_id', $user_id)->get('customers')->row();
        return $user_data;
    }
}

if (!function_exists('session_data')) {
    function session_data()
    {
        $CI = init();

        $CI->load->library('encryption');
        $CI->load->helper('cookie');

        $read_session_in_cookie = get_cookie('__ACTIVE_SESSION_DATA');
        $read_session_in_session = $CI->session->userdata('__ACTIVE_SESSION_DATA');

        if ($read_session_in_cookie) {
            $read_data = $CI->encryption->decrypt($read_session_in_cookie);
            $read_data = json_decode($read_data);

            return $read_data;
        } else if ($read_session_in_session) {
            $read_data = $CI->encryption->decrypt($read_session_in_session);
            $read_data = json_decode($read_data);

            return $read_data;
        } else {
            $default_session = new stdClass();

            $default_session->is_login = false;
            $default_session->user_id = 0;
            $default_session->login_at = 0;
            $default_session->remember_me = false;

            return $default_session;
        }
    }
}

if (!function_exists('is_login')) {
    function is_login()
    {
        $login_data = session_data();

        return ($login_data->is_login === TRUE);
    }
}

if (!function_exists('get_current_user_id')) {
    function get_current_user_id()
    {
        $login_data = session_data();
        if (empty(session_data())) {
            return 0;
        }
        return $login_data->user_id;
    }
}

if (!function_exists('get_current_salesman_id')) {
    function get_current_salesman_id()
    {
        $login_data = session_data();
        if (empty(session_data())) {
            return 0;
        }
        return $login_data->salesman_id;
    }
}

if (!function_exists('get_current_salesman_name')) {
    function get_current_salesman_name()
    {
        $CI = init();
        $salesman_id = get_current_salesman_id();

        $user_data = $CI->db->where('id', $salesman_id)->get('users')->row();
        return $user_data->name;
    }
}

if (!function_exists('verify_session')) {
    function verify_session($what_to_verify)
    {
        $current_url = current_url();
        $current_url = base64_encode($current_url);

        if (!is_login()) {
            redirect('auth/login?redir_to=' . $current_url);
        } else if ($what_to_verify == 'admin') {
            if (!is_admin()) {
                redirect('auth/login?redir_to=' . $current_url);
            }
        } else if ($what_to_verify == 'customer') {
            if (!is_customer()) {
                redirect('auth/login?redir_to=' . $current_url);
            }
        }
    }
}

if (!function_exists('verify_login')) {
    function verify_login()
    {
        if (is_login()) {
            $user_data = user_data();
            $role = $user_data->role;
            if ($role == 'admin' || $role == 'salesman' || $role == 'distribusi') {
                redirect('dashboard_admin');
            } else if ($role == 'customer') {
                redirect('home');
            }
        }
    }
}

if (!function_exists('is_admin')) {
    function is_admin()
    {
        $user_data = user_data();
        $role = $user_data->role;

        return ($role == 'admin' || $role == 'adminonline' || $role == 'keuangan' || $role == 'salesman' || $role == 'distribusi' || $role == 'kadep');
    }
}

if (!function_exists('is_real_admin')) {
    function is_real_admin()
    {
        $user_data = user_data();
        $role = $user_data->role;

        return ($role == 'admin');
    }
}

if (!function_exists('is_customer')) {
    function is_customer()
    {
        $user_data = user_data();
        $role = $user_data->role;

        return ($role == 'customer');
    }
}

if (!function_exists('is_member')) {
    function is_member()
    {
        $user_data = session_data();
        $user_level = $user_data->user_level;
        if ($user_level != 1) {
            return 1;
        }
        return 0;
    }
}

if (!function_exists('atc_check')) {
    function atc_check()
    {
        if (empty(session_data())) {
            return 0;
        }

        $user_data = user_data();
        $role = $user_data->role;

        if ($role == 'customer') {
            return 1;
        } else {
            return 0;
        }
    }
}

if (!function_exists('admin_role')) {
    function admin_role()
    {
        if (empty(session_data())) {
            return 0;
        }

        $user_data = user_data();
        $role = $user_data->role;

        return $role;
    }
}
