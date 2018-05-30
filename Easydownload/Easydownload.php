<?php
/*
Plugin Name: Easydownload
Plugin URI: https://liulin.in/wordpress-plugins-easydownload.html
Description: 本插件实现Wordpress文章的附件在独立页面进行下载，界面采用活跃的Google Material Design材料设计语言，完美兼容PC及移动端，请务必把插件文件夹下的download.php放到Wordpress安装目录。
Author:liulin
Author URI: https://liulin.in/
*/

global $wpdb;
define("Easydownload",plugin_dir_path(__FILE__));

function Easydownload_style() {
	echo'<link rel="stylesheet" href="'.plugin_dir_url( __FILE__ ).'css/style.css" type="text/css" />';
}
add_action('wp_head', 'Easydownload_style');

function Easydownload_show_down($content)
{
	if(is_single())
	{
		$Easydownload_start=get_post_meta(get_the_ID(), 'Easydownload_start', true);
		$Easydownload_name=get_post_meta(get_the_ID(), 'Easydownload_name', true);
		$Easydownload_size=get_post_meta(get_the_ID(), 'Easydownload_size', true);
		$Easydownload_date=get_post_meta(get_the_ID(), 'Easydownload_date', true);
		$Easydownload_version=get_post_meta(get_the_ID(), 'Easydownload_version', true);
		$Easydownload_author=get_post_meta(get_the_ID(), 'Easydownload_author', true);
		$Easydownload_baidu=get_post_meta(get_the_ID(), 'Easydownload_baidu', true);
		$Easydownload_downurl2=get_post_meta(get_the_ID(), 'Easydownload_downurl2', true);
		$Easydownload_other=get_post_meta(get_the_ID(), 'Easydownload_other', true);
		$Easydownload_Preview=get_post_meta(get_the_ID(), 'Easydownload_Preview', true);
		//资源名称、资源大小、更新时间、适用版本、作者信息
		if($Easydownload_Preview)
		{
		$Preview_content .= '<strong><a style="text-decoration: none;" class="yanshibtn" rel="external nofollow"   href="'.$Easydownload_Preview.'" target="_blank" title="'.$Easydownload_name.' " >查看演示</a></strong>';
		
		}
		if($Easydownload_start)
		{
			$content .= '<br />';
			$content .= '
			<div class="Easydownload_down_link">
			<p><strong>附件信息：</strong></p>
			<p></p>
			<p>文件名称：'.$Easydownload_name.'</p>
			<p  style="position:relative;">文件大小：'.$Easydownload_size.'<span style="position:absolute;left:40%;">当前版本：v'.$Easydownload_version.'</span></p>
			<p style="position:relative;">更新日期：'.$Easydownload_date.'</p>
			<p class="downlink"><strong><a class="downbtn" style="text-decoration: none;" rel="external nofollow" title="'.$Easydownload_name.'" href="'.site_url().'/download.php?author='.urlencode(get_the_author_meta("nickname",$author_id)).'&btitle='.urlencode(get_bloginfo("name")).'&id='.get_the_ID().'"  target="_blank">点击下载</a></strong> '.$Preview_content.'</p>
			<p></p>
			</div>';
		}
	}

	return $content;
}
add_action('the_content','Easydownload_show_down');
?>
<?php include('meta-box.php'); ?>