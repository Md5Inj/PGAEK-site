<?php
    require_once("../../../../wp-load.php");
    header('Content-type: application/json; charset=utf-8');

    global $wpdb;
    $table_name = $wpdb->prefix . "teachers";
    $query = " SELECT * FROM `$table_name` ";
    
    if (isset($_GET['teacher'])) {
        $query .= "WHERE Teacher_name LIKE '";
        $query .= mb_substr($group, 0, 1, "UTF-8");
        $query .= "%' ";
    }
    
    $query .= "ORDER BY `Teacher_name` ASC";

    $results = $wpdb->get_results( $query );
    if (!empty($results)) {
        echo json_encode($results);
    }
?>