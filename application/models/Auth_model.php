<?php
class Auth_model extends CI_model
{
    public function addUser($data)
    {
        $this->db->insert('user', $data);
    }

    public function addAktor($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function cekUnameOrEmail($type, $name)
    {
        if ($type == 'username') {
            $query = "SELECT count(username) jml from user where username = '$name'";
        } else {
            $query = "SELECT count(email) jml from user where email = '$name'";
        }

        return $this->db->query($query)->row_array();
    }

    public function role()
    {
        return $this->db->query('SELECT * FROM role')->result();
    }

    public function cekEmailUsername($field)
    {
        $query = "SELECT * FROM user where username='$field' or email = '$field'";

        return $this->db->query($query)->row_array();
    }
}