<?php
/*
Plugin Name: Callback Requests
Plugin URI: https://wsf.com.ua
Description: Заявки Callback
Version: 1.1
Author: WSF
Author URI: https://wsf.com.ua
License: GPL2
*/

/*  Copyright 2017 WSF (email : info@wsf.com.ua)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

global $cbr_db_version;
$cbr_db_version = '1.1';

function cbr_install()
{
    global $wpdb;
    global $cbr_db_version;

    $table_name = $wpdb->prefix . 'callback_request';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        status int NULL DEFAULT 0,
        subject TINYTEXT NOT NULL,
		name TINYTEXT NOT NULL,
		phone VARCHAR(255) NOT NULL,
		mail VARCHAR(255) NULL, 
		question TEXT NULL,
		url VARCHAR(255) NULL,
		
		PRIMARY KEY  (id)
	) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    add_option('jal_db_version', $cbr_db_version);
}

function cbr_install_data()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'callback_request';

    $wpdb->insert(
        $table_name,
        array(
            'time' => current_time('mysql'),
            'status' => '',
            'subject' => '',
            'name' => '',
            'phone' => '',
            'mail' => '',
            'question' => ''
        )
    );
}

function cbr_styles() {
    wp_register_style('callback-requests', plugins_url('./css/cbr.css',__FILE__ ));
    wp_enqueue_style('callback-requests');
}

function cbr_scripts() {
    wp_register_script('callback-requests', plugins_url('./js/cbr.js',__FILE__ ));
    wp_enqueue_script('callback-requests');
}

add_action( 'admin_init','cbr_styles');
add_action( 'admin_init','cbr_scripts');

function cbr_menu()
{
    global $wpdb;
    include 'cbr-admin.php';
}

function cbr_admin_actions()
{
    add_menu_page("Callback заявки", "Callback заявки", 1,
        "Callback заявки", "cbr_menu");
}

add_action( 'wp_ajax_change_status',        'change_status_callback' ); // For logged in users
add_action( 'wp_ajax_nopriv_change_status', 'change_status_callback' ); // For anonymous users

function change_status_callback(){

    global $wpdb;
    $table_name = $wpdb->prefix . 'callback_request';
    $wpdb->update(
        $table_name,
        array('status' => $_POST['status']),
        array('id' => $_POST['id'])
    );
    wp_die();
}

add_action('admin_menu', 'cbr_admin_actions');
register_activation_hook(__FILE__, 'cbr_install');
register_activation_hook(__FILE__, 'cbr_install_data');
