<?php
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $id_roles = $ci->session->userdata('id_roles');
        $menu = $ci->uri->segment(1);
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];
        $userAccess = $ci->db->get_where('user_access_menu', [
            'id_roles' => $id_roles,
            'id_menu' => $menu_id
        ]);
        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
function check_access($id_roles, $menu_id)
{
    $ci = get_instance();
    $ci->db->where('id_roles', $id_roles);
    $ci->db->where('id_menu', $menu_id);
    $result = $ci->db->get('user_access_menu');
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
function check_access_dept($id_user, $dept_id)
{
    $ci = get_instance();
    $ci->db->where('id_user', $id_user);
    $ci->db->where('id_dept', $dept_id);
    $result = $ci->db->get('user_access_dept');
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
function check_access_sec($id_user, $sec_id)
{
    $ci = get_instance();
    $ci->db->where('id_user', $id_user);
    $ci->db->where('id_sec', $sec_id);
    $result = $ci->db->get('user_access_sec');
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
function check_access_dir($id_user, $dir_id)
{
    $ci = get_instance();
    $ci->db->where('id_user', $id_user);
    $ci->db->where('id_dir', $dir_id);
    $result = $ci->db->get('user_access_dir');
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
