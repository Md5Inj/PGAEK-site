<?php
/**
 * Plugin Name: Расписание занятий
 * Plugin URI: http://pgaek.by/shedule
 * Description: Расписание занятий для УО "ПГАЭК"
 * Version: 1.0
 * Author: md5inj
 * Author URI: http://vk.com/md5inj
 */
header('Content-Type: text/html; charset=utf-8');
defined('ABSPATH') or die('У вас нет доступа!');

include(plugin_dir_path( __FILE__ ).'admin/group_list.php');
include(plugin_dir_path( __FILE__ ).'admin/schedule_list.php');
include(plugin_dir_path( __FILE__ ).'admin/teacher_list.php');
include(plugin_dir_path( __FILE__ ).'csv.php');

class Schedule_plugin 
{
  static $instance;

  public $customers_obj;

  public function __construct() 
  {
    add_filter( 'set-screen-option', function( $status, $option, $value ) {
      return ( $option == 'my_page_per_page' ) ? (int) $value : $status;
    }, 10, 3 );
    add_action( 'admin_menu', [$this, 'plugin_menu' ] );
  }

  public static function set_screen($status, $option, $value) 
  {
    return $value;
  }

  public function plugin_menu() 
  {
    $hook = add_menu_page(
      'Расписание', 
      'Расписание', 
      'manage_options', 
      'main', 
      [ $this, 'schedule_edit'],
      'dashicons-format-aside',
      6
    );

    add_action("load-$hook", [ $this, 'schedule_screen_option']);

    $hook = add_submenu_page(
      'main',
      'Группы', 
      'Группы', 
      'manage_options', 
      'view_groups', 
      [ $this, 'view_groups']
    );
    
    add_action("load-$hook", [ $this, 'screen_option']);

    add_submenu_page(
      'main',
      'Добавить группу',
      'Добавить группу',
      'manage_options', 
      'add_group', 
      [ $this, 'add_group']
    );

    $hook = add_submenu_page(
      'main',
      'Преподаватели',
      'Преподаватели', 
      'manage_options', 
      'view_teachers', 
      [ $this, 'view_teachers']
    );

    add_action("load-$hook", [ $this, 'teacher_screen_option']);

    add_submenu_page(
      'main',
      'Добавить преподавателя',
      'Добавить преподавателя', 
      'manage_options', 
      'add_teacher', 
      [ $this, 'add_teacher']
    );

  }

  public function view_groups() 
  {
  ?>
<div class="wrap">
  <h2>Группы</h2>

  <div id="poststuff">
    <div id="post-body" class="metabox-holder columns-2">
      <div id="post-body-content">
        <div class="meta-box-sortables ui-sortable">
          <form method="post">
            <?php
                $this->groups_obj->prepare_items();
                $this->groups_obj->display();
                ?>
          </form>
        </div>
      </div>
    </div>
    <br class="clear">
  </div>
</div>
<?php
  }

  public function view_teachers() 
  {
  ?>
<div class="wrap">
  <h2>Преподаватели</h2>

  <div id="poststuff">
    <div id="post-body" class="metabox-holder columns-2">
      <div id="post-body-content">
        <div class="meta-box-sortables ui-sortable">
          <form method="post">
            <?php
                $this->teachers_obj->prepare_items();
                $this->teachers_obj->display(); ?>
          </form>
        </div>
      </div>
    </div>
    <br class="clear">
  </div>
</div>
<?php
  }

  public function schedule_edit() 
  {
    global $wpdb;
    mb_internal_encoding("UTF-8");
    if (isset($_POST['clear'])) 
    {
      $table_name = $wpdb->prefix . "schedule";
      $delete = $wpdb->query("TRUNCATE TABLE $table_name");
    }

    if( isset( $_POST['but_submit'] ) )
    {

    if ($_FILES['file']['name'] != '')
    {
      $table_name = $wpdb->prefix . "schedule";
      $uploadedfile = $_FILES['file'];
      $upload_overrides = array( 'test_form' => false );

      $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
      $filePath = "";
      if ( $movefile && ! isset( $movefile['error'] ) ) 
      {
        $filePath = $movefile['url'];
        $csv = new csv(file_get_contents($filePath));
        $arr = [];
        $rows = $csv->rows();
        foreach ($rows as $row) {
          if ($rows[0] == $row) continue;
          $data = array (
            'date' => $row[0],
            'from' => $row[1],
            'to' => $row[2],
            'subject' => iconv('windows-1251', 'utf-8', $row[3]),
            'Teacher' => iconv('windows-1251', 'utf-8', $row[4]),
            'cabinet' => $row[5],
            'group_id' => $_POST['group']
          );

          $data = $wpdb->_escape($data);
          $date = $row[0];
          $from = $row[1];
          $teacher = iconv('windows-1251', 'utf-8', $row[4]);
          $subject = iconv('windows-1251', 'utf-8', $row[3]);
          $gID = $_POST['group'];

          $schedule_id = $wpdb->get_var(
            "SELECT id_schedule FROM " . $table_name. "
            WHERE 
            date = '$date' AND 
            `from` = '$from' AND 
            group_id = $gID LIMIT 1"
          );

          if ($schedule_id > 0) {
            if ($subject == "0" || $teacher == 0) continue;
            $wpdb->update($table_name, $data, array('id_schedule' => $schedule_id));
          } else {
            if (strtotime($date) === false) {
              continue;
            } else {
              echo iconv('windows-1251', 'utf-8', $arr[3]);
              if (!empty($teacher) && !empty($subject)) {
                $wpdb->insert($table_name, $data);
              }
            }
          }
        }
        unlink(get_home_path().str_replace(site_url().'/','',$filePath));
      } else {
         echo $movefile['error'];
      }
    }
  }
  ?>
<div class="wrap">
  <h2>Добавить расписание</h2>

  <form action="" method="post" >
    <input type="text" name="clear" hidden>
    <input type="submit" id="search-submit" class="button" value="Очистить расписание" style="background:red; color: white">
  </form>
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', () => {
      document.getElementById('file_submit').addEventListener('change', () => {
        let fullPath = document.getElementById('file_submit').value;
        if (fullPath) {
          var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf(
            '/'));
          var filename = fullPath.substring(startIndex);
          if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
            filename = filename.substring(1);
          }
          document.getElementById('file_label').innerHTML =
            `<span class="dashicons dashicons-cloud"></span> ${filename}`;
        }
      });
    });
  </script>
  <div id="poststuff">
    <div id="post-body" class="metabox-holder columns-2">
      <div id="post-body-content">
        <div class="meta-box-sortables ui-sortable">
          <form action='' method="post" enctype="multipart/form-data">
            <label for="group">Выберите группу:</label>
            <select name="group" id="group">
              <?php
                    global $wpdb;
                    $sql = "SELECT * FROM {$wpdb->prefix}groups ORDER BY group_name ASC";
                    $result = $wpdb->get_results($sql, 'ARRAY_A');
                    foreach ($result as $item) {
                      echo '<option value="'.$item["id_group"].'">'.$item['group_name']."</option>";
                    }
                  ?>
            </select>
            <label for="file">Выберите файл: </label>
            <input type="file" name="file" style="display: none;" id="file_submit">
            <label for="file_submit" id="file_label"
              style="display: inline-block; padding: 4px 12px; cursor: pointer; border-radius: 10px; ho"><span
                class="dashicons dashicons-cloud"></span> Загрузить </label>
            <label for="submit"> <span class="dashicons dashicons-yes" style="color: green; font-size: 32px;"></span>
            </label>
            <input type="submit" name="but_submit" id="submit" style="display: none;" value="Загрузить файл">
          </form>
        </div>
      </div>
    </div>
    <br class="clear">
  </div>
</div>
<div class="wrap">
  <h2>Расписание</h2>

  <div id="poststuff">
    <div id="post-body" class="metabox-holder columns-2">
      <div id="post-body-content">
        <form action="" method="post">
          <p class="search-box">
            <label class="screen-reader-text" for="post-search-input">Поиск записей:</label>
            <input type="search" id="post-search-input" name="s" value="<?php echo $_POST['s'] ?>">
            <input type="submit" id="search-submit" class="button" value="Поиск записей">
            </p>
        </form>
        <div class="meta-box-sortables ui-sortable">
          <form method="post">
            <?php
                $this->schedule_obj->set_s($_POST['s']);
                $this->schedule_obj->prepare_items();
                $this->schedule_obj->display(); ?>
          </form>
        </div>
      </div>
    </div>
    <br class="clear">
  </div>
</div>
<?php
  }

  public function add_group() {
  ?>
<div class="wrap">
  <h2>Добавление группы<h2>
      <form action="../wp-content/plugins/shedule/admin/main.php" method="post">
        <p>
          <input type="text" name="group_name" placeholder="Введите название группы" size="40"></p>
        <hr>
        <p class="submit">
          <input type="submit" name="Submit" value="Добавить" />
        </p>
      </form>
</div>
<?php
  }

  public function add_teacher() {
  ?>
<div class="wrap">
  <h2>Добавление преподавателя<h2>
      <form action="../wp-content/plugins/shedule/admin/main.php" method="post">
        <p>
          <input type="text" name="teacher_name" placeholder="Введите имя преподавателя" size="55"></p>
        <hr>
        <p class="submit">
          <input type="submit" name="Submit" value="Добавить" />
        </p>
      </form>
</div>
<?php
  }

  public function screen_option() {
    $option = 'per_page';
    $args = [
      'label' => 'Количество групп',
      'default' => 10,
      'option' => 'groups_per_page'
    ];

    add_screen_option($option, $args);

    $this->groups_obj = new GroupList();
  }

  public function schedule_screen_option() {
    $option = 'per_page';
    $args = [
      'label' => 'Количество расписания',
      'default' => 10,
      'option' => 'my_page_per_page'
    ];

    add_screen_option($option, $args);

    $this->schedule_obj = new schedule_list();
  }

  public function teacher_screen_option() {
    $option = 'per_page';
    $args = [
      'label' => 'Количество преподавателей',
      'default' => 10,
      'option' => 'my_page_per_page'
    ];

    add_screen_option($option, $args);

    $this->teachers_obj = new teacher_list();
  }

  public static function get_instance() {
    if (!isset(self::$instance)) {
      self::$instance = new self();
    }

    return self::$instance;
  }

}

add_action('plugins_loaded', function() {
  Schedule_plugin::get_instance();
});

function schedule_install () 
{
   global $wpdb;
   $table_name = $wpdb->prefix . "groups";
    $sql = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
      id_group INT AUTO_INCREMENT UNIQUE,
      group_name VARCHAR(55) NOT NULL,
      PRIMARY KEY (id_group)
    );";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    $rows_affected = $wpdb->insert( $table_name, array( 'time' => current_time('mysql'), 'name' => $welcome_name, 'text' => $welcome_text ) );

  $table_name = $wpdb->prefix . "teachers";
    $sql = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
      id_teacher INT AUTO_INCREMENT UNIQUE,
      teacher_name VARCHAR(55) NOT NULL,
      PRIMARY KEY (id_teacher)
    );";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    $rows_affected = $wpdb->insert( $table_name, array( 'time' => current_time('mysql'), 'name' => $welcome_name, 'text' => $welcome_text ) );

  $table_name = $wpdb->prefix . "schedule";
    $sql = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
      id_schedule INT AUTO_INCREMENT UNIQUE,
      `date` DATE NOT NULL,
      `from` TIME NOT NULL,
      `to` TIME NOT NULL,
      subject VARCHAR(40) NOT NULL,
      Teacher VARCHAR(40) NOT NULL,
      cabinet INT NOT NULL CHECK (cabinet > 0),
      group_id INT NOT NULL,
      PRIMARY KEY (id_schedule),
      FOREIGN KEY (group_id) REFERENCES `wp_groups` (id_group)
    );";
    dbDelta($sql);
    $rows_affected = $wpdb->insert( $table_name, array( 'time' => current_time('mysql'), 'name' => $welcome_name, 'text' => $welcome_text ) );
}

register_activation_hook(__FILE__, 'schedule_install');
?>