<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_mal extends CI_Model
{
    public function getMal()
    {
        return $this->db->get('tb_mal');
    }
    public function malWhere($where)
    {
        return $this->db->get_where('tb_mal', $where);
    }
    public function updateMal($data = null, $where = null)
    {
        $this->db->update('tb_mal', $data, $where);
    }

    public function hapusMal($where)
    {
        $this->db->delete('tb_mal', $where);
    }
}
