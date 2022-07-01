<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_user extends CI_Model
{
    public function getUser()
    {
        return $this->db->get('tb_user');
    }
    public function userWhere($where)
    {
        return $this->db->get_where('tb_user', $where);
    }
    public function updateUser($data = null, $where = null)
    {
        $this->db->update('tb_user', $data, $where);
    }

    public function hapusUser($where)
    {
        $this->db->delete('tb_user', $where);
    }
}
