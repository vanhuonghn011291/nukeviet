<?php

define( 'NV_ADMIN', true );

require str_replace( DIRECTORY_SEPARATOR, '/', dirname( __file__ ) ) . '/mainfile.php';
if( defined( 'NV_IS_GODADMIN' ) )
{
	include_once NV_ROOTDIR . '/includes/core/admin_functions.php';
	try
	{
		$db->query( "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " VALUES  ('sys', 'global', 'upload_alt_require', '1')" );
	}
	catch( PDOException $e )
	{
		trigger_error( $e->getMessage( ) );
	}
	try
	{
		$db->query( "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " VALUES  ('sys', 'global', 'upload_auto_alt', '1')" );
	}
	catch( PDOException $e )
	{
		trigger_error( $e->getMessage( ) );
	}

	// Lấy tất cả ngôn ngữ của site
	$language_query = $db->query( "SELECT lang FROM " . $db_config['prefix'] . "_setup_language WHERE setup = 1" );
	// Duyệt tất cả các ngôn ngữ
	while( list( $lang ) = $language_query->fetch( PDO::FETCH_NUM ) )
	{
		try
		{
			$db->query( "ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_menu_rows ADD icon VARCHAR(255) NOT NULL DEFAULT '' AFTER link;" );
		}
		catch( PDOException $e )
		{
			trigger_error( $e->getMessage( ) );
		}

		try
		{
			$db->query( "UPDATE " . $db_config['prefix'] . "_" . $lang . "_modfuncs SET func_name = 'sitemap', alias = 'sitemap' WHERE func_name='Sitemap'" );
		}
		catch( PDOException $e )
		{
			trigger_error( $e->getMessage( ) );
		}

		// Lấy tất cả các module news và module ảo của nó
		$mquery = $db->query( "SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'news'" );
		while( list( $mod, $mod_data ) = $mquery->fetch( PDO::FETCH_NUM ) )
		{
			try
			{
				$db->query( "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " VALUES  ('" . $lang . "', '" . $mod . "', 'structure_upload', 'Ym')" );
			}
			catch( PDOException $e )
			{
				trigger_error( $e->getMessage( ) );
			}
			try
			{
				$db->query( "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " VALUES  ('" . $lang . "', '" . $mod . "', 'imgposition', '1')" );
			}
			catch( PDOException $e )
			{
				trigger_error( $e->getMessage( ) );
			}
		}

		// Lấy tất cả các module page và module ảo của nó
		$mquery = $db->query( "SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'page'" );
		while( list( $mod, $mod_data ) = $mquery->fetch( PDO::FETCH_NUM ) )
		{
			try
			{
				$db->query( "ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . " DROP facebookappid" );
			}
			catch( PDOException $e )
			{
				trigger_error( $e->getMessage( ) );
			}
			try
			{
				$db->query( "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_config ( config_name varchar(30) NOT NULL,  config_value varchar(255) NOT NULL,  UNIQUE KEY config_name (config_name)  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8" );
			}
			catch( PDOException $e )
			{
				trigger_error( $e->getMessage( ) );
			}
			try
			{
				$db->query( "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_config VALUES  ('viewtype', '0'),  ('facebookapi', '')" );
			}
			catch( PDOException $e )
			{
				trigger_error( $e->getMessage( ) );
			}
		}
	}

	@nv_deletefile( NV_ROOTDIR . '/editors/ckeditor/plugins/autosave/lang/', true );
	@nv_deletefile( NV_ROOTDIR . '/editors/ckeditor/plugins/autosave/plugin.js' );
	@nv_deletefile( NV_ROOTDIR . '/modules/download/funcs/Sitemap.php' );
	@nv_deletefile( NV_ROOTDIR . '/modules/news/funcs/Sitemap.php' );
	@nv_deletefile( NV_ROOTDIR . '/modules/page/funcs/Sitemap.php' );
	@nv_deletefile( NV_ROOTDIR . '/modules/news/admin/blocksajax.php' );

	$db->query( "UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value = '4.0.10' WHERE lang = 'sys' AND module = 'global' AND config_name = 'version'" );
	nv_save_file_config_global( );
	die( 'Thực hiện xong. Vui lòng xóa file này ra khỏi host' );
}
