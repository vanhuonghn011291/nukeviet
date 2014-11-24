<?php

/**
 * @Project NUKEVIET 3.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2012 VINADES.,JSC. All rights reserved
 * @Createdate 29-03-2012 03:29
 */

if( ! defined( 'NV_IS_UPDATE' ) ) die( 'Stop!!!' );

$nv_update_config = array();

$nv_update_config['type'] = 1; // Kieu nang cap 1: Update; 2: Upgrade
$nv_update_config['packageID'] = 'NVUD4010'; // ID goi cap nhat
$nv_update_config['formodule'] = ""; // Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1416814789;
$nv_update_config['author'] = "VINADES.,JSC (contact@vinades.vn)";
$nv_update_config['support_website'] = "http://forum.nukeviet.vn/";
$nv_update_config['to_version'] = "4.0.10";
$nv_update_config['allow_old_version'] = array( "4.0.09" );
$nv_update_config['update_auto_type'] = 1; // 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong

$nv_update_config['lang'] = array();
$nv_update_config['lang']['vi'] = array();
$nv_update_config['lang']['en'] = array();

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_sysdb'] = 'Cập nhật CSDL hệ thống';
$nv_update_config['lang']['vi']['nv_up_newsdb'] = 'Cập nhật CSDL module news (nếu có)';
$nv_update_config['lang']['vi']['nv_up_pagedb'] = 'Cập nhật CSDL module page (nếu có)';
$nv_update_config['lang']['vi']['nv_up_delfiles'] = 'Xóa các file thừa';
$nv_update_config['lang']['vi']['nv_up_finish'] = 'Đánh dấu phiên bản mới';

// English
$nv_update_config['lang']['en']['nv_up_sysdb'] = 'Update system database';
$nv_update_config['lang']['en']['nv_up_newsdb'] = 'Update news database';
$nv_update_config['lang']['en']['nv_up_pagedb'] = 'Update page database';
$nv_update_config['lang']['en']['nv_up_delfiles'] = 'Delete files';
$nv_update_config['lang']['en']['nv_up_finish'] = 'Update new version';

// Require level: 0: Khong bat buoc hoan thanh; 1: Canh bao khi that bai; 2: Bat buoc hoan thanh neu khong se dung nang cap.
// r: Revision neu la nang cap site, phien ban neu la nang cap module

$nv_update_config['tasklist'] = array();
$nv_update_config['tasklist'][] = array( 'r' => '4.0.10', 'rq' => 1, 'l' => 'nv_up_sysdb', 'f' => 'nv_up_sysdb' );
$nv_update_config['tasklist'][] = array( 'r' => '4.0.10', 'rq' => 1, 'l' => 'nv_up_newsdb', 'f' => 'nv_up_newsdb' );
$nv_update_config['tasklist'][] = array( 'r' => '4.0.10', 'rq' => 1, 'l' => 'nv_up_pagedb', 'f' => 'nv_up_pagedb' );
$nv_update_config['tasklist'][] = array( 'r' => '4.0.10', 'rq' => 0, 'l' => 'nv_up_delfiles', 'f' => 'nv_up_delfiles' );
$nv_update_config['tasklist'][] = array( 'r' => '4.0.10', 'rq' => 1, 'l' => 'nv_up_finish', 'f' => 'nv_up_finish' );

// Danh sach cac function
/*
Chuan hoa tra ve:
array(
	'status' =>
	'complete' =>
	'next' =>
	'link' =>
	'lang' =>
	'message' =>
);

status: Trang thai tien trinh dang chay
- 0: That bai
- 1: Thanh cong

complete: Trang thai hoan thanh tat ca tien trinh
- 0: Chua hoan thanh tien trinh nay
- 1: Da hoan thanh tien trinh nay

next:
- 0: Tiep tuc ham nay voi "link"
- 1: Chuyen sang ham tiep theo

link:
- NO
- Url to next loading

lang:
- ALL: Tat ca ngon ngu
- NO: Khong co ngon ngu loi
- LangKey: Ngon ngu bi loi vi,en,fr ...

message:
- Any message

Duoc ho tro boi bien $nv_update_baseurl de load lai nhieu lan mot function
Kieu cap nhat module duoc ho tro boi bien $old_module_version
*/

/**
 * nv_up_sysdb()
 *
 * @return
 */
function nv_up_sysdb()
{
	global $nv_update_baseurl, $db, $db_config;

	$return = array( 'status' => 1, 'complete' => 1, 'next' => 1, 'link' => 'NO', 'lang' => 'NO', 'message' => '', );

	$sqls = array();

	// Các cập nhật cho hệ thống không liên quan tới ngôn ngữ
	$sqls[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " VALUES  ('sys', 'global', 'upload_alt_require', '1')";
	$sqls[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " VALUES  ('sys', 'global', 'upload_auto_alt', '1')";

	// Lấy tất cả ngôn ngữ của site
	$language_query = $db->query( "SELECT lang FROM " . $db_config['prefix'] . "_setup_language WHERE setup = 1" );

	if( ! $language_query )
	{
		$return['status'] = 0;
		$return['complete'] = 0;

		return $return;
	}

	// Duyệt tất cả các ngôn ngữ
	while( list( $lang ) = $language_query->fetch( PDO::FETCH_NUM ) )
	{
		// Các cập nhật hệ thống liên quan đến ngôn ngữ
		$sqls[] = "ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_menu_rows ADD icon VARCHAR(255) NOT NULL DEFAULT '' AFTER link;";
		$sqls[] = "UPDATE " . $db_config['prefix'] . "_" . $lang . "_modfuncs SET func_name = 'sitemap', alias = 'sitemap' WHERE func_name='Sitemap'";
	}

	// Thực hiện truy vấn dữ liệu
	foreach( $sqls as $sql )
	{
		try
		{
			$db->query( $sql );
		}
		catch( PDOException $e )
		{
			$return['status'] = 0;
			$return['complete'] = 0;
			$return['message'] = $e->getMessage();

			return $return;
		}
	}

	return $return;
}

/**
 * nv_up_newsdb()
 *
 * @return
 */
function nv_up_newsdb()
{
	global $nv_update_baseurl, $db, $db_config;

	$return = array( 'status' => 1, 'complete' => 1, 'next' => 1, 'link' => 'NO', 'lang' => 'NO', 'message' => '', );
	$sqls = array();

	// Lấy tất cả ngôn ngữ của site
	$language_query = $db->query( "SELECT lang FROM " . $db_config['prefix'] . "_setup_language WHERE setup = 1" );

	if( ! $language_query )
	{
		$return['status'] = 0;
		$return['complete'] = 0;

		return $return;
	}

	// Duyệt tất cả các ngôn ngữ
	while( list( $lang ) = $language_query->fetch( PDO::FETCH_NUM ) )
	{
		// Lấy tất cả các module news và module ảo của nó
		$mquery = $db->query( "SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'news'" );

		while( list( $mod, $mod_data ) = $mquery->fetch( PDO::FETCH_NUM ) )
		{
			$sqls[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " VALUES  ('" . $lang . "', '" . $mod . "', 'structure_upload', 'Ym')";
			$sqls[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " VALUES  ('" . $lang . "', '" . $mod . "', 'imgposition', '1')";
		}
	}

	// Thực hiện truy vấn dữ liệu
	foreach( $sqls as $sql )
	{
		try
		{
			$db->query( $sql );
		}
		catch( PDOException $e )
		{
			$return['status'] = 0;
			$return['complete'] = 0;
			$return['message'] = $e->getMessage();

			return $return;
		}
	}

	return $return;
}

/**
 * nv_up_pagedb()
 *
 * @return
 */
function nv_up_pagedb()
{
	global $nv_update_baseurl, $db, $db_config;

	$return = array( 'status' => 1, 'complete' => 1, 'next' => 1, 'link' => 'NO', 'lang' => 'NO', 'message' => '', );
	$sqls = array();

	// Lấy tất cả ngôn ngữ của site
	$language_query = $db->query( "SELECT lang FROM " . $db_config['prefix'] . "_setup_language WHERE setup = 1" );

	if( ! $language_query )
	{
		$return['status'] = 0;
		$return['complete'] = 0;

		return $return;
	}

	// Duyệt tất cả các ngôn ngữ
	while( list( $lang ) = $language_query->fetch( PDO::FETCH_NUM ) )
	{
		// Lấy tất cả các module page và module ảo của nó
		$mquery = $db->query( "SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'page'" );

		while( list( $mod, $mod_data ) = $mquery->fetch( PDO::FETCH_NUM ) )
		{
			$sqls[] = "ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . " DROP facebookappid";
			$sqls[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_config ( config_name varchar(30) NOT NULL,  config_value varchar(255) NOT NULL,  UNIQUE KEY config_name (config_name)  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
			$sqls[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_config VALUES  ('viewtype', '0'),  ('facebookapi', '')";
		}
	}

	// Thực hiện truy vấn dữ liệu
	foreach( $sqls as $sql )
	{
		try
		{
			$db->query( $sql );
		}
		catch( PDOException $e )
		{
			$return['status'] = 0;
			$return['complete'] = 0;
			$return['message'] = $e->getMessage();

			return $return;
		}
	}

	return $return;
}

/**
 * nv_up_delfiles()
 *
 * @return
 */
function nv_up_delfiles()
{
	global $nv_update_baseurl;

	$return = array( 'status' => 1, 'complete' => 1, 'next' => 1, 'link' => 'NO', 'lang' => 'NO', 'message' => '', );

	@nv_deletefile( NV_ROOTDIR . '/editors/ckeditor/plugins/autosave/lang/', true );
	@nv_deletefile( NV_ROOTDIR . '/editors/ckeditor/plugins/autosave/plugin.js' );
	@nv_deletefile( NV_ROOTDIR . '/modules/download/funcs/Sitemap.php' );
	@nv_deletefile( NV_ROOTDIR . '/modules/news/funcs/Sitemap.php' );
	@nv_deletefile( NV_ROOTDIR . '/modules/page/funcs/Sitemap.php' );
	@nv_deletefile( NV_ROOTDIR . '/modules/news/admin/blocksajax.php' );

	return $return;
}

/**
 * nv_up_finish()
 *
 * @return
 */
function nv_up_finish()
{
	global $nv_update_baseurl, $db;

	$return = array( 'status' => 1, 'complete' => 1, 'next' => 1, 'link' => 'NO', 'lang' => 'NO', 'message' => '', );

	$db->query( "UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value = '4.0.10' WHERE lang = 'sys' AND module = 'global' AND config_name = 'version'" );

	nv_save_file_config_global();

	return $return;
}

?>
