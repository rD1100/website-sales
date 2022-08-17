<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    //update_menu
    public function update_data($where, $data)
    {
        $this->db->where($where);
        $this->db->update('user_menu', $data);
    }
    //hapus_menu
    public function hapus_data($where)
    {
        $this->db->where($where);
        $this->db->delete('user_menu');
    }
    //update_submenu
    public function getSubmenu()
    {
        $query = "SELECT `user_sub_menu`. *,`user_menu`.`menu` 
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";
        return $this->db->query($query)->result_array();
    }

    //editSubmenu
    public function editsub($where, $data)
    {
        $this->db->where($where);
        $this->db->update('user_sub_menu', $data);
    }
    //hapusSubmenu
    public function hapus_sub($where)
    {
        $this->db->where($where);
        $this->db->delete('user_sub_menu');
    }
}
