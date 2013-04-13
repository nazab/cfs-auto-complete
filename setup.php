<?php
/*
Plugin Name: CFS - Auto Complete field  Add-on
Plugin URI: https://uproot.us/
Description: Adds an Auto Complete field type.
Version: 1.1.0
Author: Bejamin AZAN
Author URI: http://benjaminazan.com/
License: GPL2
*/

$cfs_auto_complete_addon = new cfs_auto_complete_addon();

class cfs_auto_complete_addon
{
    public $api_url;

    function __construct()
    {
        $this->api_url = 'https://uproot.us/plugin-api/';
        add_filter('cfs_field_types', array($this, 'cfs_field_types'));
    }

    function cfs_field_types($field_types)
    {
        $field_types['auto_complete'] = dirname(__FILE__) . '/auto_complete.php';
        return $field_types;
    }
}