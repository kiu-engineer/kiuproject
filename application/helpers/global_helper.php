<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('get_settings')) {
    function get_settings($key = '')
    {
        $CI = &get_instance();

        $row = $CI->db
            ->select('content')
            ->where('key', $key)
            ->get('settings')
            ->row();

        return $row->content;
    }
}

if (!function_exists('update_settings')) {
    function update_settings($key, $new_content)
    {
        $CI = init();

        $CI->db->where('key', $key)
            ->update('settings', array('content' => $new_content));
    }
}

if (!function_exists('get_store_name')) {
    function get_store_name()
    {
        return get_settings('store_name');
    }
}


if (!function_exists('get_admin_image')) {
    function get_admin_image()
    {
        $id = get_current_user_id();
        $CI = init();

        $data = $CI->db->select('profile_picture')->where('id', $id)->get('users')->row();
        $profile_picture = $data->profile_picture;

        if ($profile_picture != '' && file_exists('assets/uploads/users/' . $profile_picture))
            $file = $profile_picture;
        else
            $file = 'admin.png';

        return base_url('assets/uploads/users/' . $file);
    }
}

if (!function_exists('get_admin_name')) {
    function get_admin_name()
    {
        $data = user_data();

        return $data->name;
    }
}

if (!function_exists('get_user_name')) {
    function get_user_name()
    {
        $CI = init();
        $id = get_current_user_id();

        // if($id == 0){
        //     return  '';
        // }

        if (is_customer()) {
            $user = $CI->db->query("
            SELECT u.*, c.*
            FROM users u
            JOIN customers c
                ON c.user_id = u.id
            WHERE u.id = '$id'
        ")->row();
        } else {
            $user = $CI->db->query("
            SELECT u.*
            FROM users u
            WHERE u.id = '$id'
        ")->row();
        }

        return $user->name;
    }
}

if (!function_exists('get_user_email')) {
    function get_user_email()
    {
        $CI = init();
        $id = get_current_user_id();

        $user = $CI->db->query("
            SELECT u.*, c.*
            FROM users u
            JOIN customers c
                ON c.user_id = u.id
            WHERE u.id = '$id'
        ")->row();

        return $user->email;
    }
}

if (!function_exists('get_user_max_credit')) {
    function get_user_max_credit()
    {
        $CI = init();
        $id = get_current_user_id();

        $user = $CI->db->query("
            SELECT CONCAT('Rp. ', REPLACE(FORMAT(max_credit, 0),',','.') ) as max_credit
            FROM v_tagihan
            WHERE user_id = '$id'
        ")->row();

        return $user->max_credit;
    }
}

if (!function_exists('get_user_credit')) {
    function get_user_credit()
    {
        $CI = init();
        $id = get_current_user_id();

        $user = $CI->db->query("
            SELECT CONCAT('Rp. ', REPLACE(FORMAT(tagihan, 0),',','.') ) as credit
            FROM v_tagihan
            WHERE user_id = '$id'
        ")->row();

        return $user->credit;
    }
}

if (!function_exists('get_user_limit_credit')) {
    function get_user_limit_credit()
    {
        $CI = init();
        $id = get_current_user_id();

        $user = $CI->db->query("
            SELECT
            CONCAT('Rp. ', REPLACE(FORMAT((max_credit - tagihan), 0),',','.') ) as limit_credit
            FROM v_tagihan
            WHERE user_id = '$id'
        ")->row();

        return (isset($user->limit_credit) || !empty($user->limit_credit)) ? 'Rp. ' . $user->limit_credit : 'Rp. 0';
    }
}

//cek sama diatas
if (!function_exists('get_user_limit_transaction')) {
    function get_user_limit_transaction()
    {
        $CI = init();
        $id = get_current_user_id();

        $user = $CI->db->query("
            SELECT max_credit - tagihan as limit_credit
            FROM v_tagihan
            WHERE user_id = '$id'
        ")->row();

        return $user->limit_credit;
    }
}

if (!function_exists('get_user_invoice')) {
    function get_user_invoice()
    {
        $CI = init();
        $id = get_current_user_id();

        $user = $CI->db->query("
            SELECT REPLACE(FORMAT(tagihan, 0),',','.') as total
            FROM v_tagihan
            WHERE user_id = '$id'
        ")->row();

        return (isset($user->total) || !empty($user->total)) ? 'Rp. ' . $user->total : 'Rp. 0';
    }
}

if (!function_exists('get_user_image')) {
    function get_user_image()
    {
        $CI = init();
        $id = get_current_user_id();

        $user = $CI->db->query("
            SELECT u.role, u.profile_picture as admin_picture, c.profile_picture as customer_picture
            FROM users u
            JOIN customers c
                ON c.user_id = u.id
            WHERE u.id = '$id'
        ")->row();

        if (empty($user->role)) {
            return base_url('assets/images/user.png');
        }

        $role = $user->role;


        if ($role == 'admin') {
            $picture = $user->admin_picture;
            $file = './assets/uploads/users/' . $picture;

            if (!file_exists($file))
                $picture_name = $picture;
            else
                $picture_name = 'admin.png';

            return base_url('assets/uploads/users/' . $picture_name);
        } else {
            $picture = $user->customer_picture;
            $file = 'assets/uploads/users/' . $picture;

            if (!file_exists($file))
                $picture_name = $picture;
            else
                $picture_name = 'admin.png';

            return base_url('assets/uploads/users/' . $picture_name);
        }
    }
}

if (!function_exists('get_store_logo')) {
    function get_store_logo()
    {
        $file = get_settings('store_logo');
        return base_url('assets/uploads/sites/' . $file);
    }
}

if (!function_exists('get_formatted_date')) {
    function get_formatted_date($source_date)
    {
        $d = strtotime($source_date);

        $year = date('Y', $d);
        $month = date('n', $d);
        $day = date('d', $d);
        $day_name = date('D', $d);

        $day_names = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jum\'at',
            'Sat' => 'Sabtu'
        );
        $month_names = array(
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        );
        $day_name = $day_names[$day_name];
        $month_name = $month_names[$month];

        $date = "$day_name, $day $month_name $year";

        return $date;
    }
}

if (!function_exists('format_rupiah')) {
    function format_rupiah($rp)
    {
        if ($rp != '' || $rp > 0) {
            return number_format($rp, 0, ',', '.');
        }
        return '-';
    }
}

if (!function_exists('create_product_sku')) {
    function create_product_sku($name, $category, $price, $stock)
    {
        $name = create_acronym($name);
        $category = create_acronym($category);
        $price = create_acronym($price);
        $stock = $stock;
        $key = substr(time(), -3);

        $sku =  $name . $category . $price . $stock . $key;
        return $sku;
    }
}

if (!function_exists('create_acronym')) {
    function create_acronym($words)
    {
        $words = explode(' ', $words);
        $acronym = '';

        foreach ($words as $word) {
            $acronym .= $word[0];
        }

        $acronym = strtoupper($acronym);

        return $acronym;
    }
}

if (!function_exists('count_percent_discount')) {
    function count_percent_discount($discount, $from, $num = 1)
    {
        $count = ($discount / $from) * 100;
        $count = number_format($count, $num);

        return $count;
    }
}

if (!function_exists('get_product_image')) {
    function get_product_image($id)
    {
        $CI = init();
        $CI->load->model('product_model');

        $data = $CI->product_model->product_data($id);
        $picture_name = $data->picture_name;

        if (!$picture_name)
            $picture_name = 'default.jpg';

        $file = './assets/uploads/products/' . $picture_name;

        return base_url('assets/uploads/products/' . $picture_name);
    }
}

if (!function_exists('get_order_status')) {
    function get_order_status($status, $payment)
    {
        if ($status == 1)
            return '<span class="badge bg-warning">Proses oleh Sales</span>';
        else if ($status == 2)
            return '<span class="badge bg-info">Menunggu Pembayaran</span>';
        else if ($status == 3)
            return '<span class="badge bg-primary">Pengemasan</span>';
        else if ($status == 4)
            return '<span class="badge bg-secondary">Pengiriman</span>';
        else if ($status == 5)
            return '<span class="badge bg-dark">Barang Diterima</span>';
        else if ($status == 6)
            return '<span class="badge bg-success">Selesai</span>';
        else if ($status == 7)
            return '<span class="badge bg-danger">Dibatalkan</span>';
    }
}

if (!function_exists('get_payment_status')) {
    function get_payment_status($status)
    {
        if ($status == 1)
            return 'Menunggu konfirmasi';
        else if ($status == 2)
            return 'Berhasil dikonfirmasi';
        else if ($status == 3)
            return 'Pembayaran tidak ditemukan';
    }
}

if (!function_exists('get_payment_status1')) {
    function get_payment_status1($status)
    {
        if ($status == 1)
            return 'Belum terbayar';
        else if ($status == 2)
            return 'Pembayaran selesai';
        else if ($status == 3)
            return 'Pembayaran tidak ditemukan';
    }
}

if (!function_exists('get_payment_method')) {
    function get_payment_method($payment)
    {
        if ($payment == 1)
            return 'Kredit';
        else if ($payment == 2)
            return 'Transfer Bank';
    }
}

if (!function_exists('get_contact_status')) {
    function get_contact_status($status)
    {
        if ($status == 1)
            return 'Belum dibaca';
        else if ($status == 2)
            return 'Sudah dibaca';
        else if ($status == 3)
            return 'Sudah dibalas';
    }
}

if (!function_exists('get_month')) {
    function get_month($mo)
    {
        $months = array(
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        );

        return $months[$mo];
    }
}

if (!function_exists('get_total_order')) {
    function get_total_order()
    {
        $CI = init();

        $id = get_current_user_id();

        // if(admin_role() == 'admin'){
        //     return $CI->db->where('order_status', 1)->or_where('order_status', 2)->or_where('order_status', 4)->get('orders')->num_rows();
        // } else if(admin_role() == 'salesman') {
        //     return $CI->db->query("
        //         SELECT a.*
        //         FROM orders a
        //         JOIN customers b
        //             ON a.user_id = b.user_id
        //         WHERE b.salesman_id = '$id'
        //     ")->num_rows();
        // }

        return $CI->db->query("
            SELECT a.*
            FROM orders a
            JOIN customers b
                ON a.user_id = b.user_id
            WHERE b.salesman_id = '$id' AND a.order_status = 1
        ")->num_rows();
    }
}

if (!function_exists('get_unconfirmed_payment')) {
    function get_unconfirmed_payment()
    {
        $CI = init();

        $id = get_current_user_id();

        // if(admin_role() == 'admin'){
        //     return $CI->db->where('order_status', 1)->or_where('order_status', 2)->or_where('order_status', 4)->get('orders')->num_rows();
        // } else if(admin_role() == 'salesman') {
        //     return $CI->db->query("
        //         SELECT a.*
        //         FROM orders a
        //         JOIN customers b
        //             ON a.user_id = b.user_id
        //         WHERE b.salesman_id = '$id'
        //     ")->num_rows();
        // }

        return $CI->db->query("
            SELECT a.*
            FROM orders a
            JOIN customers b
                ON a.user_id = b.user_id
            JOIN payments c
                ON a.id = c.order_id
            WHERE b.salesman_id = '$id' AND c.payment_status = 1
        ")->num_rows();
    }
}

if (!function_exists('get_total_packing')) {
    function get_total_packing()
    {
        $CI = init();
        return $CI->db->where('order_status', 3)->get('orders')->num_rows();
    }
}

if (!function_exists('all_unread_messages')) {
    function all_unread_messages()
    {
        $CI = init();
        $id = get_current_user_id();
        $query = $CI->db
            ->select('1')
            ->where(array('salesman_id' => $id, 'status' => 2, 'chat_from' => 2))
            ->get('message');

        return $query->num_rows();

        // return $CI->db->select('count(*) as total')->from('message')->where(array('salesman_id'=>$id, 'status'=>2, 'chat_from'=>2))->group_by('customer_id')->row_array()->total;
    }
}

if (!function_exists('unread_messages')) {
    function unread_messages()
    {
        $CI = init();
        $id = get_current_user_id();
        $query = $CI->db
            ->select('1')
            ->where(array('salesman_id' => $id, 'status' => 2, 'chat_from' => 2))
            ->group_by('customer_id')
            ->get('message');

        return $query->num_rows();

        // return $CI->db->select('count(*) as total')->from('message')->where(array('salesman_id'=>$id, 'status'=>2, 'chat_from'=>2))->group_by('customer_id')->row_array()->total;
    }
}

if (!function_exists('get_price')) {
    function get_price($price1, $price2, $price3)
    {
        $login_data = session_data();

        if (!$login_data->is_login) {
            return $price1;
        }

        $level = $login_data->user_level;


        if ($level == 1) {
            return format_rupiah($price1);
        } elseif ($level == 2) {
            return format_rupiah($price2);
        } elseif ($level == 3) {
            return format_rupiah($price3);
        }
    }
}

if (!function_exists('get_v_price')) {
    function get_v_price($price1, $price2, $price3)
    {
        $login_data = session_data();

        if (!$login_data->is_login) {
            return $price1;
        }

        $level = $login_data->user_level;


        if ($level == 1) {
            return $price1;
        } elseif ($level == 2) {
            return $price2;
        } elseif ($level == 3) {
            return $price3;
        }
    }
}

if (!function_exists('level_user')) {
    function level_user()
    {
        $login_data = session_data();
        if ($login_data->is_login) {
            $level = $login_data->user_level;
        } else {
            $level = 1;
        }
        return $level;
    }
}
