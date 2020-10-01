<?php
    require_once("../../../../wp-load.php");
    header('Content-type: application/json; charset=utf-8');

    global $wpdb;
    $table_name = $wpdb->prefix . "groups";
    $query = " SELECT * FROM `$table_name` ";
    $group = $_GET['spec'];
    if (isset($_GET['spec'])) {
        $query .= "WHERE group_name LIKE '";

        if ($group == "ПОИТ") {
            $query .= "П";
        } else if ($group == "ОДвЛ") {
            $query .= "Л";
        } else if ($group == "Правоведение") {
            $query .= "Ю";
        } else if ($group == "БУАиК") {
            $query .= "Б";
        }

        $query .= "%' ORDER BY group_name ASC";
    }

    $results = $wpdb->get_results( $query );
    if (!empty($results)) {
        echo json_encode($results);
    }
?>