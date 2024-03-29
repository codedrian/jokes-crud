<?php
defined('BASEPATH') or exit('No direct script access allowed');
class JokeModel extends CI_Model
{
    public function get_jokes() {
        $sql = "SELECT * FROM `jokes`" ;
        $query = $this->db->query($sql);

        if ($query){
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function get_joke_by_id($joke_id)
    {
        $sql = "SELECT * FROM `jokes` WHERE `id` = ?";
        $query = $this->db->query($sql, $joke_id);

        if (isset($query)) {
            return $query->row_array();
        } else {
            return null;
        }
    }
    public function delete_joke_by_id($joke_id)
    {
        $this->db->where('id', $joke_id);
        $this->db->delete('jokes');
    }
}
?>
