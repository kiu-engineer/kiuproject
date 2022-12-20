<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->user_id = get_current_user_id();
    }

    public function count_all_orders()
    {
        return $this->db->get('orders')->num_rows();
    }

    public function get_all_orders()
    {
        $id = $this->user_id;
        if (admin_role() == 'admin') {
            $orders = $this->db->query("
                SELECT
                    o.id
                    , o.order_number
                    , o.order_date
                    , o.order_status
                    , o.payment_method
                    , o.total_price
                    , o.total_items
                    , c.name AS coupon
                    , cu.name AS customer
                    , SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");

            return $orders->result();
        } else if (admin_role() == 'salesman') {
            $orders = $this->db->query("
                SELECT
                    o.id
                    , o.order_number
                    , o.order_date
                    , o.order_status
                    , o.payment_method
                    , o.total_price
                    , o.total_items
                    , c.name AS coupon
                    , cu.name AS customer
                    , SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                JOIN users us
                    ON us.id = cu.salesman_id
                WHERE us.id = $id
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");

            return $orders->result();
        } else if (admin_role() == 'adminonline') {
            $orders = $this->db->query("
                SELECT
                    o.id
                    , o.order_number
                    , o.order_date
                    , o.order_status
                    , o.payment_method
                    , o.total_price
                    , o.total_items
                    , c.name AS coupon
                    , cu.name AS customer
                    , SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                JOIN users us
                    ON us.id = cu.salesman_id
                WHERE us.id = $id
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");

            return $orders->result();
        } else if (admin_role() == 'distribusi') {
            $orders = $this->db->query("
                SELECT
                    o.id
                    , o.order_number
                    , o.order_date
                    , o.order_status
                    , o.payment_method
                    , o.total_price
                    , o.total_items
                    , c.name AS coupon
                    , cu.name AS customer
                    , SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");

            return $orders->result();
        } else if (admin_role() == 'kadep') {
            $orders = $this->db->query("
                SELECT
                    o.id
                    , o.order_number
                    , o.order_date
                    , o.order_status
                    , o.payment_method
                    , o.total_price
                    , o.total_items
                    , c.name AS coupon
                    , cu.name AS customer
                    , SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");

            return $orders->result();
        }
    }

    public function get_all_orders_sales()
    {
        $id = $this->user_id;
        $orders = $this->db->query("
            SELECT
                o.id
                , o.order_number
                , o.order_date
                , o.order_status
                , o.payment_method
                , o.total_price
                , o.total_items
                , c.name AS coupon
                , cu.name AS customer
                , SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
            FROM orders o
            LEFT JOIN coupons c
                ON c.id = o.coupon_id
            JOIN customers cu
                ON cu.user_id = o.user_id
            JOIN users us
                ON us.id = cu.salesman_id
            WHERE us.id = $id AND o.order_status!=3
            GROUP BY o.id
            ORDER BY o.order_date DESC
        ");

        return $orders->result();
    }

    public function get_all_orders_distribusi()
    {
        $orders = $this->db->query("
            SELECT
                o.id
                , o.order_number
                , o.order_date
                , o.order_status
                , o.payment_method
                , o.total_price
                , o.total_items
                , c.name AS coupon
                , cu.name AS customer
                , SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
            FROM orders o
            LEFT JOIN coupons c
                ON c.id = o.coupon_id
            JOIN customers cu
                ON cu.user_id = o.user_id
            JOIN users us
                ON us.id = cu.salesman_id
            WHERE o.order_status=3 OR  o.order_status=4 OR o.order_status=6 OR  o.order_status=7
            GROUP BY o.id
            ORDER BY o.order_date DESC
        ");

        return $orders->result();
    }

    public function get_order_payment()
    {
        $id = $this->user_id;
        if (admin_role() == 'admin') {
            $orders = $this->db->query("
                SELECT
                    o.id
                    , o.order_number
                    , o.order_date
                    , o.order_status
                    , o.payment_method
                    , o.total_price
                    , o.total_items
                    , c.name AS coupon
                    , cu.name AS customer
                    , SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                WHERE
                    order_status = 2
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");

            return $orders->result();
        } else {
            $orders = $this->db->query("
                SELECT
                    o.id
                    , o.order_number
                    , o.order_date
                    , o.order_status
                    , o.payment_method
                    , o.total_price
                    , o.total_items
                    , c.name AS coupon
                    , cu.name AS customer
                    , SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                JOIN users us
                    ON us.id = cu.salesman_id
                WHERE us.id = $id
                AND order_status = 2
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");

            return $orders->result();
        }
    }

    public function get_order_process()
    {
        $id = $this->user_id;
        if (admin_role() == 'admin') {
            $orders = $this->db->query("
                SELECT
                    o.id
                    , o.order_number
                    , o.order_date
                    , o.order_status
                    , o.payment_method
                    , o.total_price
                    , o.total_items
                    , c.name AS coupon
                    , cu.name AS customer
                    , SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                WHERE
                    (o.payment_method = 2 AND o.order_status = 1)
                    OR (o.payment_method = 1 &&  o.order_status = 1)
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");

            return $orders->result();
        } else {
            $orders = $this->db->query("
                SELECT
                    o.id
                    , o.order_number
                    , o.order_date
                    , o.order_status
                    , o.payment_method
                    , o.total_price
                    , o.total_items
                    , c.name AS coupon
                    , cu.name AS customer
                    , SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                JOIN users us
                    ON us.id = cu.salesman_id
                WHERE us.id = $id
                AND ((o.payment_method = 2 AND o.order_status = 1)
                OR (o.payment_method = 1 &&  o.order_status = 1))
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");

            return $orders->result();
        }
    }

    public function get_order_packing()
    {
        $orders = $this->db->query("
            SELECT
                o.id
                , o.order_number
                , o.order_date
                , o.order_status
                , o.payment_method
                , o.total_price
                , o.total_items
                , c.name AS coupon
                , cu.name AS customer
                , SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
            FROM orders o
            LEFT JOIN coupons c
                ON c.id = o.coupon_id
            JOIN customers cu
                ON cu.user_id = o.user_id
            JOIN users us
                ON us.id = cu.salesman_id
            WHERE o.order_status = 3
            GROUP BY o.id
            ORDER BY o.order_date DESC
        ");

        return $orders->result();
    }

    public function get_order_deliver()
    {
        $id = $this->user_id;
        if (admin_role() == 'admin' || admin_role() == 'distribusi') {
            $orders = $this->db->query("
                SELECT
                    o.id
                    , o.order_number
                    , o.order_date
                    , o.order_status
                    , o.payment_method
                    , o.total_price
                    , o.total_items
                    , c.name AS coupon
                    , cu.name AS customer
                    , SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                WHERE
                    o.order_status = 4
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");

            return $orders->result();
        } else {
            $orders = $this->db->query("
                SELECT
                    o.id
                    , o.order_number
                    , o.order_date
                    , o.order_status
                    , o.payment_method
                    , o.total_price
                    , o.total_items
                    , c.name AS coupon
                    , cu.name AS customer
                    , SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                JOIN users us
                    ON us.id = cu.salesman_id
                WHERE us.id = $id
                AND o.order_status = 4
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");

            return $orders->result();
        }
    }

    public function get_order_success()
    {
        $id = $this->user_id;
        if (admin_role() == 'admin' || admin_role() == 'distribusi') {
            $orders = $this->db->query("
                SELECT
                    o.id
                    , o.order_number
                    , o.order_date
                    , o.order_status
                    , o.payment_method
                    , o.total_price
                    , o.total_items
                    , c.name AS coupon
                    , cu.name AS customer
                    , SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                WHERE
                  o.order_status = 6
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");

            return $orders->result();
        } else {
            $orders = $this->db->query("
                SELECT
                    o.id
                    , o.order_number
                    , o.order_date
                    , o.order_status
                    , o.payment_method
                    , o.total_price
                    , o.total_items
                    , c.name AS coupon
                    , cu.name AS customer
                    , SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                JOIN users us
                    ON us.id = cu.salesman_id
                WHERE us.id = $id
                AND o.order_status = 6
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");

            return $orders->result();
        }
    }

    public function get_order_success_kadep()
    {
        $orders = $this->db->query("
                SELECT
                    o.id
                    , o.order_number
                    , o.finish_date
                    , o.order_status
                    , c.name AS coupon
                    , cu.name AS customer
                    , o.rating
                    , o.rating_desc
                    , u.name sales

                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                JOIN users u
                    ON cu.salesman_id = u.id
                WHERE
                  o.order_status = 6
                  OR (o.payment_method = 1 AND o.order_status=2)
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");

        return $orders->result();
    }

    public function get_order_cancel()
    {
        $id = $this->user_id;
        if (admin_role() == 'admin' || admin_role() == 'distribusi') {
            $orders = $this->db->query("
                SELECT
                    o.id
                    , o.order_number
                    , o.order_date
                    , o.order_status
                    , o.payment_method
                    , o.total_price
                    , o.total_items
                    , c.name AS coupon
                    , cu.name AS customer
                    , SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                WHERE o.order_status = 7
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");

            return $orders->result();
        } else {
            $orders = $this->db->query("
                SELECT
                    o.id
                    , o.order_number
                    , o.order_date
                    , o.order_status
                    , o.payment_method
                    , o.total_price
                    , o.total_items
                    , c.name AS coupon
                    , cu.name AS customer
                    , SUM(o.total_price + o.shipping_cost + o.insurance) AS final_price
                FROM orders o
                LEFT JOIN coupons c
                    ON c.id = o.coupon_id
                JOIN customers cu
                    ON cu.user_id = o.user_id
                JOIN users us
                    ON us.id = cu.salesman_id
                WHERE us.id = $id
                AND o.order_status = 7
                GROUP BY o.id
                ORDER BY o.order_date DESC
            ");

            return $orders->result();
        }
    }

    public function latest_orders()
    {
        $orders = $this->db->query("
            SELECT o.id, o.order_number, o.order_date, o.order_status, o.payment_method, o.total_price, o.total_items, c.name AS coupon, cu.name AS customer
            FROM orders o
            LEFT JOIN coupons c
                ON c.id = o.coupon_id
            JOIN customers cu
                ON cu.user_id = o.user_id
            ORDER BY o.order_date DESC
            LIMIT 5
        ");

        return $orders->result();
    }

    public function is_order_exist($id)
    {
        return ($this->db->where('id', $id)->get('orders')->num_rows() > 0) ? TRUE : FALSE;
    }

    public function order_data($id)
    {
        $data = $this->db->query("
            SELECT o.*, c.name, c.code, p.id as payment_id, p.payment_price, p.payment_date, p.picture_name, p.payment_status, p.confirmed_date, p.payment_data
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
            SELECT oi.id, oi.order_id, oi.product_id, oi.order_qty, oi.order_price, p.name, p.picture_name
            FROM order_items oi
            JOIN products p
	            ON p.id = oi.product_id
            WHERE order_id = '$id'");

        return $items->result();
    }

    public function set_status($status, $order)
    {
        return $this->db->where('id', $order)->update('orders', array('order_status' => $status));
    }

    public function product_ordered($id)
    {
        $orders = $this->db->query("
            SELECT oi.*, o.id as order_id, o.order_number, o.order_date, c.name, p.product_unit AS unit
            FROM order_items oi
            JOIN orders o
	            ON o.id = oi.order_id
            JOIN customers c
                ON c.user_id = o.user_id
            JOIN products p
	            ON p.id = oi.product_id
            WHERE oi.product_id = '1'");

        return $orders->result();
    }

    public function order_by($id)
    {
        return $this->db->where('user_id', $id)->order_by('order_date', 'DESC')->get('orders')->result();
    }
    public function order_pengiriman($ttb_number)
    {
       return $this->db->where('ttb_number', $ttb_number)
        ->order_by('order_date', 'DESC')
        ->get('orders')
        ->result();

    //  $orders =  $this->db->query("
    //            SELECT
    //                ttb_number
    //                ,	DATE_FORMAT(`delivered_date`, '%d %b %Y') AS delivered_date
    //                , deliver_by
    //                , customers.name AS name
    //            FROM
    //                orders
    //            JOIN
    //                customers on customers.user_id = orders.user_id
    //            WHERE
    //                ttb_number = '$ttb_number'
    //            ORDER BY delivered_date DESC
    //    ");

    //    return $orders->result();
    }

    public function order_overview()
    {
        $overview = $this->db->query("
            SELECT MONTH(order_date) month, COUNT(order_date) sale
            FROM orders
            WHERE order_date >= NOW() - INTERVAL 1 YEAR
            GROUP BY MONTH(order_date)");

        return $overview->result();
    }

    public function income_overview()
    {
        $data = $this->db->query("
            SELECT  MONTH(order_date) AS month, SUM(total_price) AS income
            FROM orders
            GROUP BY MONTH(order_date)");

        return $data->result();
    }

    public function verify($data)
    {
        $status = ($data['payment_method'] == 1) ? '3' : '2';
        $this->db->where('id', $data['id'])
            ->update('orders', array(
                'invoice_number' => $data['invoice_number'],
                'ttb_number' => $data['ttb_number'],
                'due_date' => $data['due_date'],
                'shipping_cost' => $data['shipping_cost'],
                'insurance' => $data['insurance'],
                'order_status' => $status
            ));
    }

    public function update_harga($data)
    {
        $this->db->update_batch('order_items', $data, 'id');
    }

    public function update_pengemasan($data)
    {
        return $this->db->update_batch('orders', $data, 'id');
    }

    public function update_total_harga($order_id, $total_price)
    {
        $this->db->where('id', $order_id)
            ->update('orders', array(
                'total_price' => $total_price
            ));
    }

    public function get_all_pengiriman()
    {
        $suratjalan = $this->db->query("
                SELECT
                    ttb_number
                    ,	DATE_FORMAT(`delivered_date`, '%d %b %Y') AS delivered_date
                    , deliver_by
                FROM
                    orders
                WHERE
                    ttb_number != 'NULL'
                GROUP BY
                    ttb_number
                ORDER BY delivered_date DESC
        ");

        return $suratjalan->result();
    }

}
