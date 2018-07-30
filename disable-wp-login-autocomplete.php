<?php
/*
    Plugin Name: Disable WP Login Autocomplete
    Plugin URI: https://github.com/VitalDevTeam/disable-wp-login-autocomplete
    Description: Disables autocomplete on the WordPress login form
    Version: 1.0
    Author: Vital
    Author URI: https://vtldesign.com
    Text Domain: vitaldesign
    License: GPLv2

    Copyright 2018  VITAL  (email : hello@vtldesign.com)

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

if (! defined('ABSPATH')) exit;

add_action('login_init', 'vital_autocomplete_login_init');
add_action('login_form', 'vital_autocomplete_login_form');

function vital_autocomplete_login_init() {
    ob_start();
}

function vital_autocomplete_login_form() {
    $content = ob_get_contents();
    ob_end_clean();
    $content = str_replace('id="user_login"', 'id="user_login" autocomplete="off"', $content);
    $content = str_replace('id="user_pass"', 'id="user_pass" autocomplete="off"', $content);
    echo $content;
}
