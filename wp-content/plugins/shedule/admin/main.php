<?php

	require_once("../../../../wp-load.php");
	if (!is_user_logged_in() || (is_user_logged_in() && !current_user_can('administrator') && !current_user_can('disp_rasp')) )
	{
    	wp_redirect(wp_login_url(), 301);
    	exit;
	}

	if ($_POST['group_name'] &&
	   (current_user_can('administrator') 
	   || current_user_can('disp_rasp'))) 
	{
		global $wpdb;
	    $table_name = $wpdb->prefix . "groups";
	    $data = array ('group_name' => $_POST['group_name']);
	    $data = $wpdb->_escape($data);
	    $wpdb->insert($table_name, $data);
		wp_redirect('../../../../wp-admin/admin.php?page=add_group');
	}

	if ($_POST['teacher_name'] && 
	   (current_user_can('administrator') ||
	   current_user_can('disp_rasp')) ) 
	{
		global $wpdb;
	    $table_name = $wpdb->prefix . "teachers";
	    $data = array ('teacher_name' => $_POST['teacher_name']);
	    $data = $wpdb->_escape($data);
	    $wpdb->insert($table_name, $data);
		wp_redirect('../../../../wp-admin/admin.php?page=add_teacher');
	}
?>