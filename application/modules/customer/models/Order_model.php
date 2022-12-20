<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public $user_id;

    public function __construct()
    {
        parent::__construct();

        $this->user_id = get_current_user_id();
    }

    public function count_all_orders()
    {
        $id = $this->user_id;

        return $this->db->where('user_id', $id)->get('orders')->num_rows();
    }

    public function count_process_order()
    {
        $id = $this->user_id;

        return $this->db->where(array('user_id' => $id, 'order_status' => 2))->get('orders')->num_rows();
    }

    public function get_all_orders($filter = 'semua')
    {
        $id = $this->user_id;

        if ($filter == 'semua') {
            $orders = $this->db->query("
                SELECT o.id, o.order_number, o.order_date, o.order_status, o.payment_method, o.total_price, o.total_items, o.due_date, c.name AS coupon, cu.name AS customer, SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                WHERE o.user_id = '$id'
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");
        } elseif ($filter == '1day') {
            $orders = $this->db->query("
                SELECT o.id, o.order_number, o.order_date, o.order_status, o.payment_method, o.total_price, o.total_items, o.due_date, c.name AS coupon, cu.name AS customer, SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                WHERE o.user_id = '$id' AND 
                DATE(o.order_date) = CURDATE()
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");
        } elseif ($filter == '1week') {
            $orders = $this->db->query("
                SELECT o.id, o.order_number, o.order_date, o.order_status, o.payment_method, o.total_price, o.total_items, o.due_date, c.name AS coupon, cu.name AS customer, SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                WHERE o.user_id = '$id' AND 
                date(o.order_date) BETWEEN (NOW() - INTERVAL 14 DAY) AND NOW()
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");
        } elseif ($filter == '1month') {
            $orders = $this->db->query("
                SELECT o.id, o.order_number, o.order_date, o.order_status, o.payment_method, o.total_price, o.total_items, o.due_date, c.name AS coupon, cu.name AS customer, SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                WHERE o.user_id = '$id' AND 
                date(o.order_date) BETWEEN (NOW() - INTERVAL 1 MONTH) AND NOW()
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");
        } elseif ($filter == '6month') {
            $orders = $this->db->query("
                SELECT o.id, o.order_number, o.order_date, o.order_status, o.payment_method, o.total_price, o.total_items, o.due_date, c.name AS coupon, cu.name AS customer, SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                WHERE o.user_id = '$id' AND 
                o.order_date BETWEEN (NOW() - INTERVAL 6 MONTH) AND NOW()
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");
        } elseif ($filter == '1year') {
            $orders = $this->db->query("
                SELECT o.id, o.order_number, o.order_date, o.order_status, o.payment_method, o.total_price, o.total_items, o.due_date, c.name AS coupon, cu.name AS customer, SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                WHERE o.user_id = '$id' AND 
                o.order_date BETWEEN (NOW() - INTERVAL 1 YEAR) AND NOW()
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");
        }

        return $orders->result();
    }

    // public function get_orders($val)
    // {
    //     $id = $this->user_id;

    //     switch ($val) {
    //         case '1':
    //             $orders = $this->db->query("
    //                 SELECT o.id, o.order_number, o.order_date, o.order_status, o.payment_method, o.total_price, o.total_items, c.name AS coupon, cu.name AS customer
    //                 FROM orders o
    //                 LEFT JOIN coupons c
    //                     ON c.id = o.coupon_id
    //                 JOIN customers cu
    //                     ON cu.user_id = o.user_id
    //                 WHERE o.user_id = '$id'
    //                 AND (o.payment_method < 4 AND o.order_status == 2) OR (o.payment_method >= 4 AND o.order_status == 1)
    //                 ORDER BY o.order_date DESC
    //             ");
    //         break;
    //         case '2':
    //             $orders = $this->db->query("
    //                 SELECT o.id, o.order_number, o.order_date, o.order_status, o.payment_method, o.total_price, o.total_items, c.name AS coupon, cu.name AS customer
    //                 FROM orders o
    //                 LEFT JOIN coupons c
    //                     ON c.id = o.coupon_id
    //                 JOIN customers cu
    //                     ON cu.user_id = o.user_id
    //                 WHERE o.user_id = '$id'
    //                 ORDER BY o.order_date DESC
    //             ");
    //         break;
    //         case '3':
    //             $orders = $this->db->query("
    //                 SELECT o.id, o.order_number, o.order_date, o.order_status, o.payment_method, o.total_price, o.total_items, c.name AS coupon, cu.name AS customer
    //                 FROM orders o
    //                 LEFT JOIN coupons c
    //                     ON c.id = o.coupon_id
    //                 JOIN customers cu
    //                     ON cu.user_id = o.user_id
    //                 WHERE o.user_id = '$id'
    //                 ORDER BY o.order_date DESC
    //             ");
    //         break;
    //         case '4':
    //             $orders = $this->db->query("
    //                 SELECT o.id, o.order_number, o.order_date, o.order_status, o.payment_method, o.total_price, o.total_items, c.name AS coupon, cu.name AS customer
    //                 FROM orders o
    //                 LEFT JOIN coupons c
    //                     ON c.id = o.coupon_id
    //                 JOIN customers cu
    //                     ON cu.user_id = o.user_id
    //                 WHERE o.user_id = '$id'
    //                 ORDER BY o.order_date DESC
    //             ");
    //         break;
    //         case '5':
    //             $orders = $this->db->query("
    //                 SELECT o.id, o.order_number, o.order_date, o.order_status, o.payment_method, o.total_price, o.total_items, c.name AS coupon, cu.name AS customer
    //                 FROM orders o
    //                 LEFT JOIN coupons c
    //                     ON c.id = o.coupon_id
    //                 JOIN customers cu
    //                     ON cu.user_id = o.user_id
    //                 WHERE o.user_id = '$id'
    //                 ORDER BY o.order_date DESC
    //             ");
    //         break;

    //         default:
    //             # code...
    //             break;
    //     }



    //     return $orders->result();
    // }

    public function order_with_bank_payments($id)
    {
        // return $this->db->where(array('user_id' => $this->user_id, 'payment_method' => 1, 'order_status' => 1))->order_by('order_date', 'DESC')->get('orders')->result();

        $items = $this->db->query("
        SELECT o.*, SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
        FROM orders o
        WHERE o.id = '$id'
        ");

        return $items->row();
    }

    public function is_order_exist($id)
    {
        $user_id = $this->user_id;

        return ($this->db->where(array('id' => $id, 'user_id' => $user_id))->get('orders')->num_rows() > 0) ? TRUE : FALSE;
    }

    public function order_data($id)
    {
        $data = $this->db->query("
            SELECT o.*, c.name, c.code, c.credit kupon, p.payment_price, p.payment_date, p.picture_name, p.payment_status, p.confirmed_date, p.payment_data,
                  SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
            FROM orders o
            LEFT JOIN coupons c
                ON c.id = o.coupon_id
            LEFT JOIN payments p
                ON p.order_id = o.id
            WHERE o.id = '$id'
        ");

        return $data->row();
    }

    public function order_items($id)
    {
        $items = $this->db->query("
            SELECT oi.product_id, oi.order_qty, oi.order_price, p.name, p.picture_name
            FROM order_items oi
            JOIN products p
	            ON p.id = oi.product_id
            WHERE order_id = '$id'");

        return $items->result();
    }

    public function cancel_order($id)
    {
        $data = $this->order_data($id);
        $payment_method = $data->payment_method;

        $status =  7;

        return $this->db->where('id', $id)->update('orders', array('order_status' => $status));
    }

    public function terima_order($v)
    {
        $data = $this->order_data($v['id']);
        $payment_method = $data->payment_method;

        $status =  ($payment_method == 1) ? 2 : 6;
        $tanggal_selesai = date('Y-m-d H:i:s');
        return $this->db->where('id', $v['id'])->update('orders', array('finish_date' => $tanggal_selesai, 'rating' => $v['rating'], 'rating_desc' => $v['rating_desc'], 'order_status' => $status));
    }

    public function delete_order($id)
    {
        if (($this->db->where('order_id', $id)->get('order_items')->num_rows() > 0))
            $this->db->where('order_id', $id)->delete('order_items');

        if (($this->db->where('order_id', $id)->get('payments')->num_rows() > 0))
            $this->db->where('order_id', $id)->delete('payments');

        $this->db->where('id', $id)->delete('orders');
    }

    public function all_orders()
    {
        return $this->db->where('user_id', $this->user_id)->order_by('order_date', 'DESC')->get('orders')->result();
    }
}
