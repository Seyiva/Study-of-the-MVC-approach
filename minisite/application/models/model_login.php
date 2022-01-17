<?php

class Model_Login extends Model
{
    public function get_data()
	{

    }

    public function get_ByLogin($login)
    {
        return $this->findOne("SELECT  users.* , statuses.name as status FROM `users` 
                                LEFT JOIN statuses ON users.status_id=statuses.id
                                WHERE `login` = '$login'");
    }
    
        
}