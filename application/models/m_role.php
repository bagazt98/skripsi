<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_role extends CI_Model
{
    public function getRole()
    {
        return $this->db->get('tb_roles');
    }
    public function roleWhere($where)
    {
        return $this->db->get_where('tb_roles', $where);
    }
    public function updateRole($data = null, $where = null)
    {
        $this->db->update('tb_roles', $data, $where);
    }

    public function hapusRole($where)
    {
        $this->db->delete('tb_roles', $where);
    }
}
