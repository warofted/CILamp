<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Model {




	public function user_login($loginfo)
	{
		return $this->db->query("SELECT * FROM users WHERE email = '{$loginfo[email]}'
								 AND pass = '{$loginfo[pass]}'")->row_array();

	}

	public function user_input($register)
	{
		$name = $_POST["name"];
    $alias = $_POST["alias"];
		$email = $_POST["email"];
    $password = $_POST["pass"];


		$insert_query = "INSERT INTO users (name, alias, email, pass)
							VALUES (?, ?, ?, ?)";
		$values = (array($register['name'], $register['alias'], $register['email'], $register['pass']));
		$this->db->query($insert_query, $values);
		return $this->db->insert_id();


	}
}
