<?php
defined('BASEPATH') or exit('No direct script access allowed');
class JokeModel extends CI_Model
{
    public function get_jokes()
    {
        $sql = "SELECT * FROM `jokes`";
        $query = $this->db->query($sql);

        if ($query) {
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
        $sql = "DELETE FROM `jokes` WHERE `id` = ?";
        $query = $this->db->query($sql, $joke_id);
    }
    public function add_joke($joke_title, $joke_content)
    {
        $sql = "INSERT INTO `jokes` (`title`, `content`) VALUES (?, ?)";
        $query = $this->db->query($sql, array($joke_title, $joke_content));

        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return null;
        }
    }
}
