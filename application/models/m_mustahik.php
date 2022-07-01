<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_mustahik extends CI_Model
{
    public function getDm()
    {
        return $this->db->get('tb_dm');
    }
    public function dmWhere($where)
    {
        return $this->db->get_where('tb_dm', $where);
    }
    public function updateDm($data = null, $where = null)
    {
        $this->db->update('tb_dm', $data, $where);
    }
    public function hapusDm($where)
    {
        $this->db->delete('tb_dm', $where);
    }
}
