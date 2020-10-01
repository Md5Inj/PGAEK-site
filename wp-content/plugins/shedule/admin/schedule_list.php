<?php
if (!class_exists('WP_List_Table'))
{
	require_once (ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class schedule_list extends WP_List_Table
{
	public function _construct()
	{
		parent::_construct([
			'singular' => __('Schedule', 'sp'),
			'plural' => __('Schedule', 'sp'),
			'ajax' => false
		]);
	}

	public static function get_schedule(
		int $per_page = 10,
		int $page_number = 1, 
		$s = ""
	) {
		global $wpdb;
		$sql = "SELECT `id_schedule`, `date`, `from`, `to`, `subject`, `Teacher`, `Cabinet`, `wp_groups`.`group_name` 
				FROM {$wpdb->prefix}schedule 
				INNER JOIN `wp_groups` on `wp_schedule`.`group_id` = `wp_groups`.`id_group`";
		if ($s != "") {
			$sql .= " WHERE `wp_schedule`.`group_id` = (SELECT wp_groups.id_group from wp_groups WHERE wp_groups.group_name LIKE '$s%')";
		}
		if (!empty($_REQUEST['orderby']))
			{
			$sql.= ' ORDER BY ' . esc_sql($_REQUEST['orderby']);
			$sql.= !empty($_REQUEST['order']) ? ' ' . esc_sql($_REQUEST['order']) : ' ASC';
			}

		$sql.= " LIMIT $per_page";
		$sql.= ' OFFSET ' . ($page_number - 1) * $per_page;
		$result = $wpdb->get_results($sql, 'ARRAY_A');
		return $result;
		}
		
	public static

	function delete_schedule($id)
		{
		global $wpdb;
		$wpdb->query("DELETE FROM {$wpdb->prefix}schedule WHERE id_schedule = $id");
		}

	function col_act($item) {
		$actions=array(
			'delete'=>sprintf('<a href="?post_type=%s&page=%s&action=%s&student=%s">Delete</a>', $_REQUEST['post_type'], $_REQUEST['page'], 'delete', $item->students_id),
			
			);
			return sprintf('%1$s <span style="color:silver"></span>%2$s',
				/*$1%s*/ $item->id_schedule,
				/*$2%s*/ $this->row_actions($actions)
			);
	}	
	
	public static

	function get_count()
		{
		global $wpdb;
		$sql = "SELECT COUNT(*) FROM {$wpdb->prefix}schedule";
		return $wpdb->get_var($sql);
		}

	public

	function column_default($item, $column_name)
		{
		switch ($column_name)
			{
		case 'id_schedule':
		case 'from':
		case 'to':
		case 'date':
		case 'subject':
		case 'Teacher':
		case 'Cabinet':
		case 'group_name':
			return $item[$column_name];
		default:
			return print_r($item, true);
			}
		}

	public

	function no_items()
		{
		_e('Расписания не найдено.', 'sp');
		}

	function column_cb($item)
		{
		return sprintf('<input type="checkbox" name="bulk-delete[]" value = "%s"', $item['id_schedule']);
		}

	function get_bulk_actions()
		{
		$actions = array(
			'bulk-delete' => 'Удалить'
		);
		return $actions;
		}

	function get_columns()
		{
		$columns = ['cb' => '<input type="checkbox" />', 'id_schedule' => __('id', 'sp'), 'date' => __('Дата', 'sp'), 'from' => __('C', 'sp'), 'to' => __('До', 'sp'), 'subject' => __('Предмет', 'sp'), 'Teacher' => __('Преподаватель', 'sp'), 'Cabinet' => __('Кабинет', 'sp'), 'group_name' => __('Группа', 'sp') ];
		return $columns;
		}

	public

	function get_sortable_columns()
		{
		$sotrable_columns = array(
			'id_schedule' => array(
				'id_schedule',
				false
			) ,
			'date' => array(
				'date',
				false
			),
			'from' => array(
				'from',
				false
			),
			'to' => array(
				'to',
				false
			),
			'subject' => array(
				'subject',
				false
			),
			'Teacher' => array(
				'Teacher',
				false
			),
			'Cabinet' => array(
				'Cabinet',
				false
			),
			'group_name' => array(
				'group_name',
				false
			)
		);
		return $sotrable_columns;
		}

	function usort_reorder($a, $b)
		{
		$orderby = (!empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : 'id_schedule';
		$order = (!empty($_REQUEST['order'])) ? $_REQUEST['order'] : 'asc';
		$result = strnatcmp($a[$orderby], $b[$orderby]);
		return ($order === 'asc') ? $result : -$result;
		}

	public	$s = "";
	public function set_s($s) {
		$this->s = $s; 
	}

	public

	function prepare_items()
		{
		$this->_column_headers = $this->get_column_info();
		$this->process_bulk_action();
		$per_page_option = get_current_screen()->get_option('per_page');
		$per_page = get_user_meta( get_current_user_id(), $per_page_option['option'], true );
		if( ! $per_page )
			$per_page = $per_page_option['default'];
		$current_page = $this->get_pagenum();
		$total_items = self::get_count();
		$this->set_pagination_args(['total_items' => $total_items, 'per_page' => $per_page]);
		$this->items = self::get_schedule($per_page, $current_page, $this->s);
		}

	public

	function process_bulk_action()
		{
		if ('delete' === $this->current_action())
			{
			$nonce = esc_attr($_REQUEST['_wpnonce']);
			if (!wp_verify_nonce($nonce, 'sp_delete_schedule'))
				{
				die('У вас нет доступа!');
				}
			  else
				{
				self::delete_customer(absint($_GET['schedule']));
				wp_redirect(esc_url_raw(add_query_arg()));
				exit;
				}
			}

		if ((isset($_POST['action']) && $_POST['action'] == 'bulk-delete') || (isset($_POST['action2']) && $_POST['action2'] == 'bulk-delete'))
			{
			$delete_ids = esc_sql($_POST['bulk-delete']);
			foreach($delete_ids as $id)
				{
				self::delete_schedule($id);
				}

			wp_redirect(esc_url_raw(add_query_arg()));
			exit;
			}
		}
	}
?>