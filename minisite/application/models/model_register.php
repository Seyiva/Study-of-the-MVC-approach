<?php

class Model_Register extends Model
{
    public function get_data()
	{

    }

    public function get_ByEmail($email = null)
    {
        return $this->findOne("SELECT * FROM `users` WHERE email = '$email' ");
    }


    public function add_User($name, $surname, $yearbirth, $email, $password)
    {
        return $this->changeOne(
            "INSERT INTO users (`name`, `surname`, `yearbirth`, `email`, `password`,`login`,`status_id`)
            VALUES ('$name','$surname','$yearbirth', '$email', '$password', '$email', 1 )"
        ) ;
    }
    
}
