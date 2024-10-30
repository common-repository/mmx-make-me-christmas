<?php
/*
Plugin Name: MMX - Make Me Christmas
Plugin URI: http://codecanyon.net/item/mmx-make-me-christmas/13618761
Description: The magic of Christmas on your wordpress website. Surprise your visitors wonder of Christmas, Christmas Hanging and Bunting, Snow, Snowman, Christmas tree and of course Santa Claus.
Version: 1.0.0
Author: Derick Wire
Author URI: http://codecanyon.net/user/mmetrodw

	Copyright 2015  Derick Wire  (email: artgure@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
// Путь к папке с плагином и адресс к папке
define('MMX_DIR', plugin_dir_path(__FILE__));
define('MMX_URL', plugin_dir_url(__FILE__));

// Активация/деактивация плагина
register_activation_hook(__FILE__, 'mmx_activation');
register_deactivation_hook(__FILE__, 'mmx_deactivation');

// Функция при активации
function mmx_activation() {
  // Проверям, если записи плагина не существует создаем их
  $no_exists_value = get_option("mmx_settings");
  
  if(!$no_exists_value){
    $mmx_settings = array (
      'header' => false,
      'header_z' => false,
      'bunting' => false,
      'bunting_type' => null,
      'snow' => false,
      'snow_z' => false,
      'snow_type' => null,
      'footer' => false,
      'footer_z' => false,
      'snowman' => false,
      'snowman_type' => null,
      'tree' => false,
      'tree_type' => null,
      'santa' => false,
      'footer_anim' => false
    );
    add_option("mmx_settings", $mmx_settings);
  }
}

// Функция при деактивации
function mmx_deactivation() {
  delete_option('mmx_settings');
}

// Подключаем страницу настроек
function mmx_load(){
  if(is_admin()) // подключаем файлы администратора, только если он авторизован
  require_once(MMX_DIR.'inc/mmx_admin.php');
}

mmx_load();

// Добавляем ссылку на страницу настроек в меню
function register_mmx_menu_page(){
	add_menu_page("MMX Settings", "MMX Settings", 'edit_posts', 'mmx_settings', "mmx_settings", "dashicons-smiley");
}

add_action( 'admin_menu', 'register_mmx_menu_page' );

function mmx_function() {
	$mmx_settings = get_option('mmx_settings');
	if(is_null($mmx_settings["snowman_type"])){
	  $mmx_settings["snowman_type"] = array();
	}
	if(is_null($mmx_settings["tree_type"])){
	  $mmx_settings["tree_type"] = array();
	}
	echo '
	<script>
	jQuery("body").MMX({
	  header: '.(int)$mmx_settings["header"].',
      headerZ: '.(int)$mmx_settings["header_z"].',
      bunting: '.(int)$mmx_settings["bunting"].',
      buntingName: "'.$mmx_settings["bunting_type"].'",
      footer: '.(int)$mmx_settings["footer"].',
      footerZ: '.(int)$mmx_settings["footer_z"].',
      anim: '.(int)$mmx_settings["footer_anim"].',
      snowman: '.(int)$mmx_settings["snowman"].',
      snwmanHeight: 75,
      snwmanNum: ['.implode(", ", $mmx_settings["snowman_type"]).'],
      tree: '.(int)$mmx_settings["tree"].',
      treeHeight: 150,
      treeNum: ['.implode(", ", $mmx_settings["tree_type"]).'],
      snow: '.(int)$mmx_settings["snow"].',
      snowZ: '.(int)$mmx_settings["snow_z"].',
      snowtype: "'.$mmx_settings["snow_type"].'",
      santa: '.(int)$mmx_settings["santa"].'
	})
	</script>
	';
}

// Plugin initializing

add_action( 'init', 'mmx_init');
if(!function_exists('mmx_init')){
    function mmx_init(){
        if(!is_admin()){
            $op = get_option('mmx_settings');
            if($op){
				wp_enqueue_style('mmx-style', MMX_URL.'assets/css/mmx.css');
				wp_enqueue_script('jquery');
				wp_enqueue_script('mmx-script', MMX_URL.'assets/js/mmx.js', array('jquery'));
				wp_enqueue_script('mmx-svg_array', MMX_URL.'assets/js/mmx_svg_array.json', array('jquery'));
				add_action( 'wp_footer', 'mmx_function' );
            }    
        }
    } // End loading_page_init
}

?>
