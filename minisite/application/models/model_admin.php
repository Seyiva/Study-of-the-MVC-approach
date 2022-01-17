<?php

class Model_Admin extends Model
{
    public function get_data()
	{

    }

    public function get_Users($from, $usersOnPage)
    {
        return $this->findMany("SELECT  users.* , statuses.name as status FROM `users` 
                                LEFT JOIN statuses ON users.status_id=statuses.id 
                                WHERE users.id > 0 LIMIT $from,$usersOnPage ");
    }

    public function get_CountUsers()
    {
        return $this->getQuantityByKey("SELECT COUNT(*) as count FROM `users` ") ;
    }

    public function get_ByLogin($slugLogin)
    {
        return $this->findOne("SELECT  users.* , statuses.name as status FROM `users` 
                                LEFT JOIN statuses ON users.status_id=statuses.id
                                WHERE `login` = '$slugLogin'");
    }
    
    public function update_ByLogin($slugLogin, $name=0, $surname=0, $status_id=0) {
        return $this->changeOne("UPDATE `users` SET `name` = '$name', `surname` = '$surname', 
                `status_id` = '$status_id' WHERE `login` = '$slugLogin'") ;
    }

    public function delete_ByLogin($slugLogin) {
        return $this->changeOne("DELETE FROM `users` WHERE `login` = '$slugLogin'") ;
    }
}