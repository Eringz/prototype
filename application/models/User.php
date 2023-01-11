<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Model
    {
        function get_user_by_username($username)
        {
            $query = "SELECT * FROM users WHERE username = ?";
            $values = array($username);
            return $this->db->query($query, $values)->row_array();
        }

        function login($user, $password)
        {
            $hash_password = md5($password);

            if($user && $user['password'] == $hash_password){
                return 'success';
            }else{
                return 'Invalid username / password';
            }
        }
    }