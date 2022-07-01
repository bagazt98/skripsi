<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_fitrah extends CI_Model
{
    public function getFitrah()
    {
        return $this->db->get('tb_fitrah');
    }
    public function fitrahWhere($where)
    {
        return $this->db->get_where('tb_fitrah', $where);
    }
    public function updateFitrah($data = null, $where = null)
    {
        $this->db->update('tb_fitrah', $data, $where);
    }

    public function hapusFitrah($where)
    {
        $this->db->delete('tb_fitrah', $where);
    }
}
