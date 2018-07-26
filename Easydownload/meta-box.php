<?php
if ( !defined('ABSPATH') ) {exit;}

//回复可见
function reply_to_read($atts, $content=null) {
extract(shortcode_atts(array("notice" => '<p class="reply-to-read" style="color: #231919;background-color: #f0f5f0;margin-top:20px;"><span style="color:#F44336">温馨提示 ：</span>附件解压密码需<a href="#respond" title="评论本文">评论本文</a>后才能查看，评论成功后刷新页面密码自动显示，评论是否成功以邮件通知为准。</p>'), $atts));
$email = null;
$user_ID = (int) wp_get_current_user()->ID;
if ($user_ID > 0) {
$email = get_userdata($user_ID)->user_email;
//对博主直接显示内容 
$admin_email = ''; //Email地址,更换为管理员邮箱 
if ($email == $admin_email) {
return '<h3 id="Extracting-passwords">解压密码:</h3><code>'.$content.'</code>';
}
} else if (isset($_COOKIE['comment_author_email_' . COOKIEHASH])) {
$email = str_replace('%40', '@', $_COOKIE['comment_author_email_' . COOKIEHASH]);
} else {
return $notice;
}
if (empty($email)) {
return $notice;
}
global $wpdb;
$post_id = get_the_ID();
$query = "SELECT `comment_ID` FROM {$wpdb->comments} WHERE `comment_post_ID`={$post_id} and `comment_approved`='1' and `comment_author_email`='{$email}' LIMIT 1";
if ($wpdb->get_results($query)) {
return  '<h3>解压密码: </h3><code>'.do_shortcode($content).'</code>';
} else {
return $notice;
}
} 

add_shortcode('reply', 'reply_to_read'); 

function add_reply_to_read_button($mce_settings) {
?>
<script type="text/javascript">
 QTags.addButton( 'reply', '评论查看', '[reply][/reply]','');
</script>
<?php
}
add_action('after_wp_tiny_mce', 'add_reply_to_read_button');
//回复可见

add_action( 'admin_menu', 'Easydownload_create_down_box' );
add_action( 'save_post', 'Easydownload_save_down_data' );
function Easydownload_create_down_box() {
	add_meta_box( 'ali-post-meta-boxes','附件独立页下载', 'Easydownload_post_down_info', 'post', 'normal', 'high' );
}
function Easydownload_down_post_boxes() {  //资源名称、资源大小、更新时间、适用版本、作者信息
	$meta_boxes = array(
	array(
    "name"             => "Easydownload_start",
    "title"            => "启用独立下载",
    "desc"             => "启用下载",
    "type"             => "checkbox",
    "capability"       => "manage_options"
    ),
	array(
			"name"             => "Easydownload_name",
			"title"            => "附件名称",
			"desc"             => "",
			"type"             => "text",
			"capability"       => "manage_options"
	),
	array(
			"name"             => "Easydownload_size",
			"title"            => "附件大小",
			"desc"             => "",
			"type"             => "text",
			"capability"       => "manage_options"
	),
	array(
			"name"             => "Easydownload_type",
			"title"            => "附件类型",
			"desc"             => "",
			"type"             => "text",
			"capability"       => "manage_options"
	),
	array(
			"name"             => "Easydownload_info",
			"title"            => "附件说明",
			"desc"             => "",
			"type"             => "text",
			"capability"       => "manage_options"
	),
	array(
			"name"             => "Easydownload_date",
			"title"            => "更新时间",
			"desc"             => "",
			"type"             => "text",
			"capability"       => "manage_options"
	),
	array(
			"name"             => "Easydownload_version",
			"title"            => "当前版本",
			"desc"             => "",
			"type"             => "text",
			"capability"       => "manage_options"
	),
	array(
			"name"             => "Easydownload_formal",
			"title"            => "官方网盘",
			"desc"             => "",
			"type"             => "text",
			"capability"       => "manage_options"
	),
	array(
			"name"             => "Easydownload_baidu",
			"title"            => "百度网盘",
			"desc"             => "",
			"type"             => "text",
			"capability"       => "manage_options"
	),
	array(
			"name"             => "Easydownload_other",
			"title"            => "其他网盘",
			"desc"             => "",
			"type"             => "text",
			"capability"       => "manage_options"
	),
	array(
			"name"             => "Easydownload_Decompression",
			"title"            => "解压密码",
			"desc"             => "",
			"type"             => "text",
			"capability"       => "manage_options"
	),
	array(
			"name"             => "Easydownload_baidupassword",
			"title"            => "百度密码",
			"desc"             => "",
			"type"             => "text",
			"capability"       => "manage_options"
	),
	array(
			"name"             => "Easydownload_Preview",
			"title"            => "演示地址",
			"desc"             => "",
			"type"             => "text",
			"capability"       => "manage_options"
	),
	array(
			"name"             => "Easydownload_author",
			"title"            => "附件作者",
			"desc"             => "",
			"type"             => "text",
			"capability"       => "manage_options"
	)
	);
	return apply_filters( 'ali_post_boxes', $meta_boxes );
}
function Easydownload_post_down_info() {
	global $post;
	$meta_boxes = Easydownload_down_post_boxes(); 
?>
	<table class="form-table" style="display:inline-block">
	<?php foreach ( $meta_boxes as $meta ) :
		$value = get_post_meta( $post->ID, $meta['name'], true );
		if ( $meta['type'] == 'checkbox' )
			Easydownload_show_checkbox( $meta, $value );
		elseif ( $meta['type'] == 'text' )
			Easydownload_show_text_input( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			Easydownload_show_textarea( $meta, $value );
	endforeach; ?>
	</table>
<?php
}
function Easydownload_show_text_input( $args = array(), $value = false ) {
	extract( $args ); ?>
	<tr style="float:left;">
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
		<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo wp_specialchars( $value, 1 ); ?>" size="30" tabindex="30" style="width: 70%;" />
			<input type="hidden" name="<?php echo $name; ?>_input_name" id="<?php echo $name; ?>_input_name" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}
function Easydownload_show_textarea( $args = array(), $value = false ) {
	extract( $args ); ?>
	<tr style="float:left;">
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<textarea name="<?php echo $name; ?>" id="<?php echo $name; ?>" cols="60" rows="4" tabindex="30" style="width: 97%;"><?php echo wp_specialchars( $value, 1 ); ?></textarea>
			<input type="hidden" name="<?php echo $name; ?>_input_name" id="<?php echo $name; ?>_input_name" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}
function Easydownload_show_checkbox( $args = array(), $value = false ) {
	extract( $args ); ?>
    <tr style="float:left;margin-bottom:200px">
		<th style="width:100%;">
	        <label for="<?php echo $name; ?>"><?php echo $title; ?></label>
	    </th>
	<td>
        <input type="checkbox" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="yes"
    <?php if ( htmlentities( $value, 1 ) == 'yes' ) echo ' checked="checked"'; ?>style="width: auto;" />
        <input type="hidden" name="<?php echo $name; ?>_input_name" id="<?php echo $name; ?>_input_name" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
    </td>
	</tr></br>
	<?php }
function Easydownload_save_down_data( $post_id ) {
		$meta_boxes = array_merge( Easydownload_down_post_boxes() );
		foreach ( $meta_boxes as $meta_box ) :
		if ( !wp_verify_nonce( $_POST[$meta_box['name'] . '_input_name'], plugin_basename( __FILE__ ) ) )
			return $post_id;
		if ( 'page' == $_POST['post_type'] && !current_user_can( 'edit_page', $post_id ) )
			return $post_id;
		elseif ( 'post' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
			return $post_id;
		$data = stripslashes( $_POST[$meta_box['name']] );
		if ( get_post_meta( $post_id, $meta_box['name'] ) == '' )
			add_post_meta( $post_id, $meta_box['name'], $data, true );
		elseif ( $data != get_post_meta( $post_id, $meta_box['name'], true ) )
			update_post_meta( $post_id, $meta_box['name'], $data );
		elseif ( $data == '' )
			delete_post_meta( $post_id, $meta_box['name'], get_post_meta( $post_id, $meta_box['name'], true ) );
	    endforeach;
}
?>
