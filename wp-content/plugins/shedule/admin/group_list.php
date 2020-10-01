<?php

if (!class_exists('WP_List_Table'))
{
	require_once (ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class GroupList extends WP_List_Table
{
	public function _construct()
	{
		parent::_construct(
			['singular' => __('Group', 'sp'),
			'plural' => __('Groups', 'sp'),
			'ajax' => false]
		);
	}

	public static function get_groups(
		int $per_page = 5,
		int $page_number = 1
	):array {
		global $wpdb;
		$sql = "SELECT * FROM {$wpdb->prefix}groups";
		if (!empty($_REQUEST['orderby'])) {
			$sql.= ' ORDER BY ' . esc_sql($_REQUEST['orderby']);
			$sql.= !empty($_REQUEST['order']) ? ' ' . esc_sql($_REQUEST['order']) : ' ASC';
		}

		$sql.= " LIMIT $per_page";
		$sql.= ' OFFSET ' . ($page_number - 1) * $per_page;
		$result = $wpdb->get_results($sql, 'ARRAY_A');
		return $result;
	}

	public static function delete_group(string $id)
	{
		$wpdb;
		$wpdb->query("DELETE FROM {$wpdb->prefix}groups WHERE id_group = $id");
	}

	public static function get_count(): int
	{
		global $wpdb;
		$sql = "SELECT COUNT(*) FROM {$wpdb->prefix}groups";
		return $wpdb->get_var($sql);
	}

	public function column_default(
		$item,
		$column_name
	) {
		switch ($column_name) {
			case 'id_group':
			case 'group_name':
				return $item[$column_name];
			default:
				return print_r($item, true);
		}
	}

	public function no_items()
	{
		_e('Групп не найдено.', 'sp');
	}

	function column_name($item)
	{
		return "1";
	}

	function column_cb($item)
	{
		return sprintf(
			'<input type="checkbox" name="bulk-delete[]" value = "%s"',
			 $item['id_group']
		);
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
		$columns = [
			'cb' => '<input type="checkbox" />',
			'id_group' => __('id_group', 'sp'),
			'group_name' => __('Группа', 'sp') 
		];

		return $columns;
	}

	public function get_sortable_columns()
	{
		$sotrable_columns = array(
			'id_group' => array(
				'id_group',
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
		$orderby = (!empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : 'id_group';
		$order = (!empty($_REQUEST['order'])) ? $_REQUEST['order'] : 'asc';
		$result = strnatcmp($a[$orderby], $b[$orderby]);
	
		return ($order === 'asc') ? $result : -$result;
	}

	public function prepare_items()
	{
		$this->_column_headers = $this->get_column_info();
		$this->process_bulk_action();
		$per_page = $this->get_items_per_page( 'groups_per_page', 5 );
		$current_page = $this->get_pagenum();
		$total_items = self::get_count();
		$this->set_pagination_args(['total_items' => $total_items, 'per_page' => $per_page]);
		$this->items = self::get_groups($per_page, $current_page);
	}

	public function process_bulk_action()
	{
		if ('delete' === $this->current_action()) {		
			$nonce = esc_attr($_REQUEST['_wpnonce']);
			if (!wp_verify_nonce($nonce, 'sp_delete_group')) {
				die('У вас нет доступа!');
			} else {
				self::delete_customer(absint($_GET['group']));
				wp_redirect(esc_url_raw(add_query_arg()));
				exit;
			}
		}

		if ((isset($_POST['action']) && $_POST['action'] == 'bulk-delete') ||
		    (isset($_POST['action2']) && $_POST['action2'] == 'bulk-delete'))
		{
			$delete_ids = esc_sql($_POST['bulk-delete']);
			foreach($delete_ids as $id) {
				self::delete_group($id);
			}

			wp_redirect(esc_url_raw(add_query_arg()));
			exit;
		}
	}
}
?>