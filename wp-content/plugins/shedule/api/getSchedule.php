<?php
    require_once("../../../../wp-load.php");
    header('Content-type: application/json; charset=utf-8');

    function formatstr($str) 
    {
        $str = trim($str);
        $str = stripslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    }

    global $wpdb;
    $table_name = $wpdb->prefix . "schedule";
    if (isset($_GET['group'])) {
        $query = "SELECT STR_TO_DATE(`date`, '%d.%m.%Y') as `date`, `from`, `to`, subject, Teacher, Cabinet, group_id FROM `$table_name` ";

        if (isset($_GET['group'])) {
            $group =  formatstr($_GET['group']);
            $query .= $wpdb->prepare("WHERE group_id = %s", $group);
        }
    } else if (isset($_GET['teacher'])) {
        $query = "SELECT STR_TO_DATE(`date`, '%d.%m.%Y') as `date`, `from`, `to`, subject, Teacher, Cabinet, wp_groups.group_name FROM `$table_name` INNER JOIN `wp_groups` on `wp_schedule`.`group_id` = `wp_groups`.`id_group` ";

        $teacher = formatstr($_GET['teacher']);
        $query .= $wpdb->prepare("WHERE Teacher LIKE %s", "%" . $teacher . "%");
        
    }

    $query .= " ORDER BY `from` ASC";

    $results = $wpdb->get_results( $query );
    if (!empty($results)) {
        echo json_encode($results);
    } else {
        echo "404";
    }

?>