<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES.,JSC. All rights reserved
 * @Createdate 2-9-2010 14:43
 */

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $lang_module['setting'];
$savesetting = $nv_Request->get_int( 'savesetting', 'post', 0 );
if ( ! empty( $savesetting ) )
{
    $array_config = array();
    $array_config['indexfile'] = filter_text_input( 'indexfile', 'post', '', 1 );
    $array_config['per_page'] = $nv_Request->get_int( 'per_page', 'post', 0 );
    $array_config['st_links'] = $nv_Request->get_int( 'st_links', 'post', 0 );
    $array_config['homewidth'] = $nv_Request->get_int( 'homewidth', 'post', 0 );
    $array_config['homeheight'] = $nv_Request->get_int( 'homeheight', 'post', 0 );
    $array_config['blockwidth'] = $nv_Request->get_int( 'blockwidth', 'post', 0 );
    $array_config['blockheight'] = $nv_Request->get_int( 'blockheight', 'post', 0 );
    $array_config['imagefull'] = $nv_Request->get_int( 'imagefull', 'post', 0 );
    
    $array_config['activecomm'] = $nv_Request->get_int( 'activecomm', 'post', 0 );
    $array_config['emailcomm'] = $nv_Request->get_int( 'emailcomm', 'post', 0 );
    $array_config['auto_postcomm'] = $nv_Request->get_int( 'auto_postcomm', 'post', 0 );
    $array_config['setcomm'] = $nv_Request->get_int( 'setcomm', 'post', 0 );
    $array_config['copyright'] = filter_text_input( 'copyright', 'post', '', 1 );
    $array_config['showhometext'] = $nv_Request->get_int( 'showhometext', 'post', 0 );
    $array_config['module_logo'] = filter_text_input( 'module_logo', 'post', '', 0 );
    $array_config['structure_upload'] = filter_text_input( 'structure_upload', 'post', '', 0 );
    
    if ( ! nv_is_url( $array_config['module_logo'] ) and file_exists( NV_DOCUMENT_ROOT . $array_config['module_logo'] ) )
    {
        $lu = strlen( NV_BASE_SITEURL );
        $array_config['module_logo'] = substr( $array_config['module_logo'], $lu );
    }
    elseif ( ! nv_is_url( $array_config['module_logo'] ) )
    {
        $array_config['module_logo'] = $global_config['site_logo'];
    }
    
    foreach ( $array_config as $config_name => $config_value )
    {
        $db->sql_query( "REPLACE INTO `" . NV_CONFIG_GLOBALTABLE . "` (`lang`, `module`, `config_name`, `config_value`) VALUES('" . NV_LANG_DATA . "', " . $db->dbescape( $module_name ) . ", " . $db->dbescape( $config_name ) . ", " . $db->dbescape( $config_value ) . ")" );
    }
    $db->sql_freeresult();
    
    nv_del_moduleCache( 'settings' );
    nv_del_moduleCache( $module_name );
    Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op . "&rand=" . nv_genpass() );
    die();
}

$module_logo = ( isset( $module_config[$module_name]['module_logo'] ) ) ? $module_config[$module_name]['module_logo'] : $global_config['site_logo'];

$module_logo = ( ! nv_is_url( $module_logo ) ) ? NV_BASE_SITEURL . $module_logo : $module_logo;

$contents .= "<form action=\"" . NV_BASE_ADMINURL . "index.php\" method=\"post\">";
$contents .= "<input type=\"hidden\" name =\"" . NV_NAME_VARIABLE . "\"value=\"" . $module_name . "\" />";
$contents .= "<input type=\"hidden\" name =\"" . NV_OP_VARIABLE . "\"value=\"" . $op . "\" />";
$contents .= "<table summary=\"\" class=\"tab1\">
<tfoot>
<tr><td style=\"text-align: center;\" colspan=\"2\">
        <input type=\"submit\" value=\" " . $lang_module['save'] . " \" name=\"Submit1\" />
        <input type=\"hidden\" value=\"1\" name=\"savesetting\" /></td>
</tr>        
</tfoot>
<tbody>
<tr>
    <td><strong>" . $lang_module['setting_indexfile'] . "</strong></td>
    <td><select name=\"indexfile\">";
foreach ( $array_viewcat_full as $key => $val )
{
    $contents .= "<option value=\"" . $key . "\"" . ( $key == $module_config[$module_name]['indexfile'] ? " selected=\"selected\"" : "" ) . ">" . $val . "</option>\n";
}
$contents .= "</select></td>
</tr>
</tbody>
<tbody class=\"second\">
<tr>
    <td><strong>" . $lang_module['setting_homesite'] . "</strong></td>
    <td>
        <input type=\"text\" value=\"" . $module_config[$module_name]['homewidth'] . "\" style=\"width: 40px;\" name=\"homewidth\" /> x 
        <input type=\"text\" value=\"" . $module_config[$module_name]['homeheight'] . "\" style=\"width: 40px;\" name=\"homeheight\" />
    </td>
</tr>
</tbody>
<tbody>
<tr>
    <td><strong>" . $lang_module['setting_thumbblock'] . "</strong></td>
    <td>
        <input type=\"text\" value=\"" . $module_config[$module_name]['blockwidth'] . "\" style=\"width: 40px;\" name=\"blockwidth\" /> x 
        <input type=\"text\" value=\"" . $module_config[$module_name]['blockheight'] . "\" style=\"width: 40px;\" name=\"blockheight\" />
    </td>
</tr>
</tbody>
<tbody class=\"second\">
<tr>
    <td><strong>" . $lang_module['setting_imagefull'] . "</strong></td>
    <td>
        <input type=\"text\" value=\"" . $module_config[$module_name]['imagefull'] . "\" style=\"width: 50px;\" name=\"imagefull\" /> 
    </td>
</tr>
</tbody>
<tbody>
<tr>
    <td><strong>" . $lang_module['setting_per_page'] . "</strong></td>
    <td><select name=\"per_page\">";
for ( $i = 5; $i <= 30; $i ++ )
{
    $sl = "";
    if ( $i == $module_config[$module_name]['per_page'] )
    {
        $sl = " selected=\"selected\"";
    }
    
    $contents .= "<option  value=\"" . $i . "\" " . $sl . ">" . $i . "</option>";
}
$contents .= "</select></td>
</tr>
</tbody>
<tbody class=\"second\">
<tr>
    <td><strong>" . $lang_module['setting_st_links'] . "</strong></td>
    <td><select name=\"st_links\">";
for ( $i = 0; $i <= 20; $i ++ )
{
    $sl = "";
    if ( $i == $module_config[$module_name]['st_links'] )
    {
        $sl = " selected=\"selected\"";
    }
    
    $contents .= "<option  value=\"" . $i . "\" " . $sl . ">" . $i . "</option>";
}
$contents .= "</select></td>
</tr>
</tbody>
<tbody>
<tr>
    <td><strong>" . $lang_module['showhometext'] . "</strong></td>
    <td><input type=\"checkbox\" value=\"1\" name=\"showhometext\" " . ( ( $module_config[$module_name]['showhometext'] ) ? "checked=\"checked\"" : "" ) . " /></td>
</tr>
</tbody>
<tbody class=\"second\">
<tr>
    <td><strong>" . $lang_module['activecomm'] . "</strong></td>
    <td><input type=\"checkbox\" value=\"1\" name=\"activecomm\" " . ( ( $module_config[$module_name]['activecomm'] ) ? "checked=\"checked\"" : "" ) . " /></td>
</tr>
</tbody>
<tbody>
<tr>
    <td><strong>" . $lang_module['setting_auto_postcomm'] . "</strong></td>
    <td><input type=\"checkbox\" value=\"1\" name=\"auto_postcomm\" " . ( ( $module_config[$module_name]['auto_postcomm'] ) ? "checked=\"checked\"" : "" ) . " /></td>
</tr>
</tbody>
<tbody class=\"second\">
<tr>
    <td><strong>" . $lang_module['setting_setcomm'] . "</strong></td>
    <td><select name=\"setcomm\">\n";
while ( list( $comm_i, $title_i ) = each( $array_allowed_comm ) )
{
    $sl = "";
    if ( $comm_i == $module_config[$module_name]['setcomm'] )
    {
        $sl = " selected=\"selected\"";
    }
    $contents .= "<option value=\"" . $comm_i . "\" " . $sl . ">" . $title_i . "</option>\n";

}
$contents .= "</select></td></tr>
</tbody>
<tbody>
<tr>
    <td><strong>" . $lang_module['emailcomm'] . "</strong></td>
    <td><input type=\"checkbox\" value=\"1\" name=\"emailcomm\" " . ( ( $module_config[$module_name]['emailcomm'] ) ? "checked=\"checked\"" : "" ) . " /></td>
</tr>
</tbody>";
$array_structure_image = array();
$array_structure_image[''] = NV_UPLOADS_DIR . '/' . $module_name;
$array_structure_image['Y'] = NV_UPLOADS_DIR . '/' . $module_name . '/' . date( 'Y' );
$array_structure_image['Ym'] = NV_UPLOADS_DIR . '/' . $module_name . '/' . date( 'Y_m' );
$array_structure_image['Y_m'] = NV_UPLOADS_DIR . '/' . $module_name . '/' . date( 'Y/m' );
$array_structure_image['Ym_d'] = NV_UPLOADS_DIR . '/' . $module_name . '/' . date( 'Y_m/d' );
$array_structure_image['Y_m_d'] = NV_UPLOADS_DIR . '/' . $module_name . '/' . date( 'Y/m/d' );
$array_structure_image['username'] = NV_UPLOADS_DIR . '/' . $module_name . '/username_admin';

$array_structure_image['username_Y'] = NV_UPLOADS_DIR . '/' . $module_name . '/username_admin/' . date( 'Y' );
$array_structure_image['username_Ym'] = NV_UPLOADS_DIR . '/' . $module_name . '/username_admin/' . date( 'Y_m' );
$array_structure_image['username_Y_m'] = NV_UPLOADS_DIR . '/' . $module_name . '/username_admin/' . date( 'Y/m' );
$array_structure_image['username_Ym_d'] = NV_UPLOADS_DIR . '/' . $module_name . '/username_admin/' . date( 'Y_m/d' );
$array_structure_image['username_Y_m_d'] = NV_UPLOADS_DIR . '/' . $module_name . '/username_admin/' . date( 'Y/m/d' );

$structure_image_upload = isset( $module_config[$module_name]['structure_upload'] ) ? $module_config[$module_name]['structure_upload'] : "Ym";
$contents .= "<tbody class=\"second\">
<tr>
    <td><strong>" . $lang_module['structure_image_upload'] . "</strong></td>
    <td><select name=\"structure_upload\">\n";
foreach ( $array_structure_image as $type => $dir )
{
    $sl = "";
    if ( $type == $structure_image_upload )
    {
        $sl = " selected=\"selected\"";
    }
    $contents .= "<option value=\"" . $type . "\" " . $sl . ">" . $dir . "</option>\n";
}
$contents .= "</select></td></tr>
</tbody>

<tbody>
<tr class=\"second\">
    <td><strong>" . $lang_module['module_logo'] . "</strong></td>
    <td>
        <input name=\"module_logo\" id=\"module_logo\" value=\"" . $module_logo . "\" style=\"width: 340px;\" type=\"text\" />
		<input style=\"width: 100px;\" value=\"" . $lang_global['browse_image'] . "\" name=\"selectimg\" type=\"button\" />
    </td>
</tr>
</tbody>
<tbody>
<tr>
    <td><strong>" . $lang_module['setting_copyright'] . "</strong></td>
    <td><textarea style=\"width: 450px\" name=\"copyright\" id=\"copyright\" cols=\"20\" rows=\"4\">" . $module_config[$module_name]['copyright'] . "</textarea></td>
    </tr>
</tbody>
</table>";

$contents .= "</form>";
$contents .= "<script type=\"text/javascript\">\n//<![CDATA\n";
$contents .= '[$("input[name=selectimg]").click(function(){';
$contents .= 'var area = "module_logo";';
$contents .= 'var type= "image";';
if ( defined( "NV_IS_SPADMIN" ) )
{
    $contents .= 'var path= "";';
    $contents .= 'var currentpath= "images";';
}
else
{
    $contents .= 'var path= "' . NV_UPLOADS_DIR . '/' . $module_name . '";';
    $contents .= 'var currentpath= "' . NV_UPLOADS_DIR . '/' . $module_name . '";';
}
$contents .= 'nv_open_browse_file("' . NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=upload&popup=1&area=" + area+"&path="+path+"&type="+type+"&currentpath="+currentpath, "NVImg", "850", "400","resizable=no,scrollbars=no,toolbar=no,location=no,status=no");';
$contents .= 'return false;';
$contents .= '});';
$contents .= "//]]>\n</script>\n";

if ( defined( 'NV_IS_ADMIN_FULL_MODULE' ) or ! in_array( 'admins', $allow_func ) )
{
    $savepost = $nv_Request->get_int( 'savepost', 'post', 0 );
    if ( ! empty( $savepost ) )
    {
        $array_config = array();
        $array_pid = $nv_Request->get_typed_array( 'array_pid', 'post' );
        $array_addcontent = $nv_Request->get_typed_array( 'array_addcontent', 'post' );
        $array_postcontent = $nv_Request->get_typed_array( 'array_postcontent', 'post' );
        $array_editcontent = $nv_Request->get_typed_array( 'array_editcontent', 'post' );
        $array_delcontent = $nv_Request->get_typed_array( 'array_delcontent', 'post' );
        
        foreach ( $array_pid as $pid )
        {
            $addcontent = ( isset( $array_addcontent[$pid] ) and intval( $array_addcontent[$pid] ) == 1 ) ? 1 : 0;
            $postcontent = ( isset( $array_postcontent[$pid] ) and intval( $array_postcontent[$pid] ) == 1 ) ? 1 : 0;
            $editcontent = ( isset( $array_editcontent[$pid] ) and intval( $array_editcontent[$pid] ) == 1 ) ? 1 : 0;
            $delcontent = ( isset( $array_delcontent[$pid] ) and intval( $array_delcontent[$pid] ) == 1 ) ? 1 : 0;
            $addcontent = ( $postcontent == 1 ) ? 1 : $addcontent;
            $db->sql_query( "UPDATE `" . NV_PREFIXLANG . "_" . $module_data . "_config_post` SET `addcontent` = '" . $addcontent . "', `postcontent` = '" . $postcontent . "', `editcontent` = '" . $editcontent . "', `delcontent` = '" . $delcontent . "' WHERE `pid` =" . $pid . " LIMIT 1" );
        }
        
        nv_del_moduleCache( 'settings' );
        nv_del_moduleCache( $module_name );
        Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op . "&rand=" . nv_genpass() );
        die();
    }
    
    $array_post_title = array();
    $array_post_title[0][0] = $lang_global['who_view0'];
    
    $array_post_title[1][0] = $lang_global['who_view1'];
    
    $groups_list = nv_groups_list();
    foreach ( $groups_list as $group_id => $grtl )
    {
        $array_post_title[1][$group_id] = $grtl;
    }
    
    $array_post_member = array();
    $array_post_data = array();
    
    $sql = "SELECT pid, member, group_id, addcontent, postcontent, editcontent, delcontent FROM `" . NV_PREFIXLANG . "_" . $module_data . "_config_post` ORDER BY `pid` ASC";
    $result = $db->sql_query( $sql );
    while ( list( $pid, $member, $group_id, $addcontent, $postcontent, $editcontent, $delcontent ) = $db->sql_fetchrow( $result ) )
    {
        if ( isset( $array_post_title[$member][$group_id] ) )
        {
            $array_post_member[$member][$group_id] = $pid;
            $array_post_data[$pid] = array( 
                "pid" => $pid, "member" => $member, "group_id" => $group_id, "addcontent" => $addcontent, "postcontent" => $postcontent, "editcontent" => $editcontent, "delcontent" => $delcontent 
            );
        }
        else
        {
            $db->sql_query( "DELETE FROM `" . NV_PREFIXLANG . "_" . $module_data . "_config_post` WHERE `pid` = " . $pid . " LIMIT 1" );
        }
    }
    $a = 0;
    $contents .= "<form action=\"" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=" . $op . "\" method=\"post\">";
    $contents .= "<table class=\"tab1\">
    <caption>" . $lang_module['group_content'] . "</caption>
        <thead>
            <tr align=\"center\">
                <td>" . $lang_global['who_view3'] . "</td>
                <td>" . $lang_module['group_addcontent'] . "</td>
                <td>" . $lang_module['group_postcontent'] . "</td>
                <td>" . $lang_module['group_editcontent'] . "</td>
                <td>" . $lang_module['group_delcontent'] . "</td>
            </tr>
        </thead>";
    $contents .= "<tfoot><tr><td style=\"text-align: center;\" colspan=\"5\">
        <input type=\"submit\" value=\" " . $lang_module['save'] . " \" name=\"Submit1\" />
        <input type=\"hidden\" value=\"1\" name=\"savepost\" />";
    $contents .= "</td></tr></tfoot>";
    
    foreach ( $array_post_title as $member => $array_post_1 )
    {
        foreach ( $array_post_1 as $group_id => $array_post_2 )
        {
            $a ++;
            $class = ( $a % 2 == 0 ) ? "" : " class=\"second\"";
            $pid = ( isset( $array_post_member[$member][$group_id] ) ) ? $array_post_member[$member][$group_id] : 0;
            if ( $pid > 0 )
            {
                $addcontent = $array_post_data[$pid]['addcontent'];
                $postcontent = $array_post_data[$pid]['postcontent'];
                $editcontent = $array_post_data[$pid]['editcontent'];
                $delcontent = $array_post_data[$pid]['delcontent'];
            }
            else
            {
                $addcontent = $postcontent = $editcontent = $delcontent = 0;
                $pid = $db->sql_query_insert_id( "INSERT INTO `" . NV_PREFIXLANG . "_" . $module_data . "_config_post` 
            (`pid`,`member`, `group_id`,`addcontent`,`postcontent`,`editcontent`,`delcontent`) VALUES 
            (NULL , '" . $member . "', '" . $group_id . "', '" . $addcontent . "', '" . $postcontent . "', '" . $editcontent . "', '" . $delcontent . "'  )" );
            }
            $contents .= "<tbody" . $class . ">
        <tr>
            <td><strong>" . $array_post_2 . "</strong><input type=\"hidden\" value=\"" . $pid . "\" name=\"array_pid[]\" /></td>
            <td align=\"center\"><input type=\"checkbox\" value=\"1\" name=\"array_addcontent[$pid]\" " . ( ( $addcontent ) ? "checked=\"checked\"" : "" ) . " /></td>
            <td align=\"center\"><input type=\"checkbox\" value=\"1\" name=\"array_postcontent[$pid]\" " . ( ( $postcontent ) ? "checked=\"checked\"" : "" ) . " /></td>
            <td align=\"center\"><input type=\"checkbox\" value=\"1\" name=\"array_editcontent[$pid]\" " . ( ( $editcontent ) ? "checked=\"checked\"" : "" ) . " /></td>
            <td align=\"center\"><input type=\"checkbox\" value=\"1\" name=\"array_delcontent[$pid]\" " . ( ( $delcontent ) ? "checked=\"checked\"" : "" ) . " /></td>
            </tr>
        </tbody>";
        }
    }
    
    $contents .= "</table>";
    $contents .= "</form>";
}

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_admin_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );
?>