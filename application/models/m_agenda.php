<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_agenda extends CI_Model
{
    public function getAk()
    {
        return $this->db->get('tb_agenda');
    }
    public function akWhere($where)
    {
        return $this->db->get_where('tb_agenda', $where);
    }
    public function updateAk($data = null, $where = null)
    {
        $this->db->update('tb_agenda', $data, $where);
    }

    public function hapusAk($where)
    {
        $this->db->delete('tb_agenda', $where);
    }
}
