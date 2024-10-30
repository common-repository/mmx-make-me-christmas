<?php
function mmx_settings(){
  // Подключаем стили и скрипты
  wp_enqueue_style('mmx_admin-style', MMX_URL.'assets/css/mmx_admin.css');
  wp_enqueue_script('jquery');
  wp_enqueue_script('jquery-ui-slider');
  wp_enqueue_script('mmx_admin-script', MMX_URL.'assets/js/mmx_admin.js', array('jquery'));
  
  if (isset($_POST['save'])) {
	$mmx_settings_update = array (
      'header' => (isset($_POST['header']) ? true : false),
      'header_z' => (isset($_POST['header_z']) ? true : false),
      'bunting' => (isset($_POST['bunting']) ? true : false),
      'bunting_type' => (isset($_POST['bunting_type']) ? $_POST['bunting_type'] : null),
      'snow' => (isset($_POST['snow']) ? true : false),
      'snow_z' => (isset($_POST['snow_z']) ? true : false),
      'snow_type' => (isset($_POST['snow_type']) ? $_POST['snow_type'] : null),
      'footer' => (isset($_POST['footer']) ? true : false),
      'footer_z' => (isset($_POST['footer_z']) ? true : false),
      'snowman' => (isset($_POST['snowman']) ? true : false),
      'snowman_type' => (isset($_POST['snowman_type']) ? $_POST['snowman_type'] : null),
      'tree' => (isset($_POST['tree']) ? true : false),
      'tree_type' => (isset($_POST['tree_type']) ? $_POST['tree_type'] : null),
      'santa' => (isset($_POST['santa']) ? true : false),
      'footer_anim' => (isset($_POST['footer_anim']) ? true : false)
    );
    update_option( 'mmx_settings', $mmx_settings_update);
  }
  $mmx_settings = get_option('mmx_settings');
?>

  <div class="mmx_wrapper">
    <form action="" method="post">
    <div class="mmx_row">
      <div class="mmx_heading">Make Your Christmas</div>
    </div>
    <div class="mmx_row">
      <div class="mmx_heading">Header</div>
    </div>
    <div class="mmx_row">
      <div class="mmx_column">
        <h4 class="mmx_checkbox_label">Enable Header:</h4>
        <input type="checkbox" class="mmx_checkbox" name="header" id="mmx_header" <?php echo ($mmx_settings['header']) ? 'checked' : ''; ?>>
        <label for="mmx_header"></label>
      </div>
    </div>
    <div class="mmx_row">
      <h4 class="mmx_checkbox_label">Position Regarding The Content:</h4>
      <input type="checkbox" class="mmx_checkbox_img" name="header_z" id="mmx_header_z" <?php echo ($mmx_settings['header_z']) ? 'checked' : ''; ?>>
      <label for="mmx_header_z"></label>
    </div>
    <div class="mmx_row">
      <div class="mmx_column">
        <h4 class="mmx_checkbox_label">Christmas Bunting and Hanging</h4>
        <input type="checkbox" class="mmx_checkbox" name="bunting" id="mmx_bunting" <?php echo ($mmx_settings['bunting']) ? 'checked' : ''; ?>>
        <label for="mmx_bunting"></label>
      </div>
    </div>
    <div class="mmx_row">
      <h4 class="mmx_checkbox_label">Select type:</h4>
		<?php
		  for ($i=1; $i<=10; $i++) {
			echo '<input type="radio" class="mmx_radio" name="bunting_type" id="mmx_bunting_type_0'.$i.'" value="bunting_0'.$i.'"';
				if(!is_null($mmx_settings['bunting_type'])) {
				  $index = substr($mmx_settings['bunting_type'], -1);
				  if($index === '0'){
					  $index = '10';
				  }
				  if($index === (string)$i) {
					echo 'checked';
				  }
				}
			echo '><label class="mmx_prev_img" for="mmx_bunting_type_0'.$i.'" data-previmg="'.MMX_URL.'assets/img/bunting_0'.$i.'_prev.png">'.$i.'</label>';
		  }
		?>
    </div>
    <div class="mmx_row">
      <div class="mmx_heading">Snow on Screen</div>
    </div>
    <div class="mmx_row">
      <div class="mmx_column">
        <h4 class="mmx_checkbox_label">Enable Snow</h4>
        <input type="checkbox" class="mmx_checkbox" name="snow" id="mmx_snow" <?php echo ($mmx_settings['snow']) ? 'checked' : ''; ?>>
        <label for="mmx_snow"></label>
      </div>
    </div>
    <div class="mmx_row">
      <h4 class="mmx_checkbox_label">Position Regarding The Content:</h4>
      <input type="checkbox" class="mmx_checkbox_img" name="snow_z" id="mmx_snow_z" <?php echo ($mmx_settings['snow_z']) ? 'checked' : ''; ?>>
      <label for="mmx_snow_z"></label>
    </div>
    <div class="mmx_row">
      <h4 class="mmx_checkbox_label">Select type:</h4><?php
		  for ($i=1; $i<=10; $i++) {
			echo '<input type="radio" class="mmx_radio" name="snow_type" id="mmx_snow_type_0'.$i.'" value="snowflake_0'.$i.'"';
				if(!is_null($mmx_settings['snow_type'])) {
				  $index = substr($mmx_settings['snow_type'], -1);
				  if($index === '0'){
					  $index = '10';
				  }
				  if($index === (string)$i) {
					echo 'checked';
				  }
				}
			echo '><label class="mmx_prev_img" for="mmx_snow_type_0'.$i.'" data-previmg="'.MMX_URL.'assets/img/snow_0'.$i.'.png">'.$i.'</label>';
		  }
		?>

    </div>
     <div class="mmx_row">
      <div class="mmx_heading">Footer</div>
    </div>
    <div class="mmx_row">
      <div class="mmx_column">
        <h4 class="mmx_checkbox_label">Enable Footer</h4>
        <input type="checkbox" class="mmx_checkbox" name="footer" id="mmx_footer" <?php echo ($mmx_settings['footer']) ? 'checked' : ''; ?>>
        <label for="mmx_footer"></label>
      </div>
    </div>
    <div class="mmx_row">
      <h4 class="mmx_checkbox_label">Position Regarding The Content:</h4>
      <input type="checkbox" class="mmx_checkbox_img" name="footer_z" id="mmx_footer_z" <?php echo ($mmx_settings['footer_z']) ? 'checked' : ''; ?>>
      <label for="mmx_footer_z"></label>
    </div>
    <div class="mmx_row">
      <div class="mmx_column">
        <h4 class="mmx_checkbox_label">Enable Snowman</h4>
        <input type="checkbox" class="mmx_checkbox" name="snowman" id="mmx_snowman" <?php echo ($mmx_settings['snowman']) ? 'checked' : ''; ?>>
        <label for="mmx_snowman"></label>
      </div>
    </div>
    <div class="mmx_row">
	<?php
	  for ($i=1; $i<=10; $i++) {
		echo '<div class="mmx_column">
        <input type="checkbox" class="mmx_checkbox_img_one" name="snowman_type[]" value="'.$i.'" id="snowman_0'.$i.'"';
			if(!is_null($mmx_settings['snowman_type'])) {
			  foreach($mmx_settings['snowman_type'] as $key => $value) {
				$index = substr($value, -1);
				if($index === '0'){
				  $index = '10';
				}
				if($index === (string)$i) {
			      echo 'checked';
				}
			  }
			}
		echo '>
        <label for="snowman_0'.$i.'"><img src="'.MMX_URL.'assets/img/snowman_0'.$i.'.svg"></label>
      </div>';
	  }
	?>
    </div>
    <div class="mmx_row">
      <div class="mmx_column">
        <h4 class="mmx_checkbox_label">Enable Christmas Tree</h4>
        <input type="checkbox" class="mmx_checkbox" name="tree" id="mmx_tree" <?php echo ($mmx_settings['tree']) ? 'checked' : ''; ?>>
        <label for="mmx_tree"></label>
      </div>
    </div>
    <div class="mmx_row">
	<?php
	  for ($i=1; $i<=10; $i++) {
		echo '<div class="mmx_column">
        <input type="checkbox" class="mmx_checkbox_img_one" name="tree_type[]" value="'.$i.'" id="tree_0'.$i.'"';
			if(!is_null($mmx_settings['tree_type'])) {
			  foreach($mmx_settings['tree_type'] as $key => $value) {
				$index = substr($value, -1);
				if($index === '0'){
				  $index = '10';
				}
				if($index === (string)$i) {
			      echo 'checked';
				}
			  }
			}
		echo '>
        <label for="tree_0'.$i.'"><img src="'.MMX_URL.'assets/img/tree_0'.$i.'.svg"></label>
      </div>';
	  }
	?>
    </div>
    <div class="mmx_row">
      <div class="mmx_column">
        <h4 class="mmx_checkbox_label">Enable Santa Clause <span style="color: red;">(Available in premium)</span></h4>
        <input disabled type="checkbox" class="mmx_checkbox" name="santa" id="mmx_santa" <?php echo ($mmx_settings['santa']) ? 'checked' : ''; ?>>
        <label for="mmx_santa"></label>
      </div>
    </div>
    <div class="mmx_row">
      <div class="mmx_column">
        <h4 class="mmx_checkbox_label">Enable Animation for footer <span style="color: red;">(Available in premium)</span></h4>
        <input disabled type="checkbox" class="mmx_checkbox" name="footer_anim" id="mmx_footer_anim" <?php echo ($mmx_settings['footer_anim']) ? 'checked' : ''; ?>>
        <label for="mmx_footer_anim"></label>
      </div>
    </div>
    <div class="wptpa_row">
      <input type="submit" name="save" class="wptpa_ok" value="Save">
      <a href="http://codecanyon.net/item/mmx-make-me-christmas/13618761" class="wptpa_buy" style="position: relative;width: 100%;display: block;font-size: 25px;padding: 25px;background: #FF6A00;text-align: center;color: #fff;">GO TO PREMIUM</a>
    </div>
    <div class="mmx_preview_wrapper"><img src="" alt=""></div>
  </form>
  </div>
  
<?php
}
?>