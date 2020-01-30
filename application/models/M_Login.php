<?php 
class M_Login extends CI_Model 
{

    function cek_login($username,$pass){		
    return $this->db->query("SELECT * FROM users WHERE username='{$username}' AND password='{$pass}' LIMIT 1");
    }	
    
    public function GetLogin($username, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('level','users.id_level=level.id_level');
        $array = array('username' => $username, 'password' => $password);
        $this->db->where($array);
        return $this->db->get();
    }
}
