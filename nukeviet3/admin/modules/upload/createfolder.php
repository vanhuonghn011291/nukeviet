<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES.,JSC. All rights reserved
 * @Createdate 2-2-2010 12:55
 */
if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );
$path = nv_check_path_upload( $nv_Request->get_string( 'path', 'post' ) );
$newname = change_alias( htmlspecialchars( trim( $nv_Request->get_string( 'newname', 'post' ) ), ENT_QUOTES ) );
if ( ! empty( $newname ) && ! file_exists( NV_ROOTDIR . '/' . $path . '/' . $newname ) && $admin_info['allow_create_subdirectories'] && nv_check_allow_upload_dir( $path ) )
{
    $n_dir = nv_mkdir( NV_ROOTDIR . '/' . $path, $newname );
    if ( ! empty( $n_dir[0] ) )
    {
        nv_insert_logs( NV_LANG_DATA, $module_name, $lang_module['createfolder'], $path . '/' . $newname, $admin_info['userid'] );
        echo $path . '/' . $newname;
    }
}

?>