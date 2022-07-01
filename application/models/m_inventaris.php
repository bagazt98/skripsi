<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_inventaris extends CI_Model
{
    public function getBm()
    {
        return $this->db->get('tb_bm');
    }
    public function bmWhere($where)
    {
        return $this->db->get_where('tb_bm', $where);
    }
    public function updateBm($data = null, $where = null)
    {
        $this->db->update('tb_bm', $data, $where);
    }

    public function hapusBm($where)
    {
        $this->db->delete('tb_bm', $where);
    }

    public function getBk()
    {
        return $this->db->get('tb_bk');
    }
    public function bkWhere($where)
    {
        return $this->db->get_where('tb_bk', $where);
    }
    public function updateBk($data = null, $where = null)
    {
        $this->db->update('tb_bk', $data, $where);
    }

    public function hapusBk($where)
    {
        $this->db->delete('tb_bk', $where);
    }
}
