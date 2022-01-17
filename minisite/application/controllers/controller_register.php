<?php
// Регистрация пользователя (имя, фамилия, год рождения ,email(он же логин),пароль)
class Controller_Register extends Controller {
    function action_index()
	{   
        $data = [] ;

        if(!empty($_POST))
        {        
            $flag = false ;
            
            // имя 
            if(!empty($_POST['name']) and (preg_match('#^(([А-ЯЁ]{1}[а-яё]{15})|([A-Z]{1}[a-z]{15}))$#u', $_POST['name']) != 1)){
                $flag = true ;             
            } else {
                $data['have_Name'] = 'Введите имя!';  
            }

            //фамилия
            if(!empty($_POST['surname']) and (preg_match('#^([А-ЯЁ]{1}[а-яё]{15})|([A-Z]{1}[a-z]{15})$#u', $_POST['surname']) != 1)){
                $flag = true ; 
            } else {
                $data['have_Surname'] = 'Введите фамилию!';
            }

            //ГОД рождения
            //проверяем формат года рождения
            if(!empty($_POST['yearbirth']) and (preg_match('#\d{4}#', $_POST['yearbirth']) == 1)){
                $flag = true ;            
            } else {
                $data['have_YearBirth'] = 'Введите дату рождения!';
            }
            //EMAIL(он же логин) 

            // проверяем ввел ли пользователь email
            if(!empty($_POST['email'])) {
                $flag = true ;  
            } else {
                $data['have_email'] = 'Введите Ваш email !';
            }

            // проверяем формат введенного email
            if(!empty($_POST['email']) and (preg_match('#^[A-Za-z0-9_.-]+@[a-z_.-]+\.[a-z]{2,4}$#',$_POST['email']) == 1) ) {
                $flag = true ;  
            } else {
                $data['email_format'] = 'Вы ввели некорректный email';                
            }

            //PASSWORD
            // проверяем ввел ли пользователь пароль
            if(!empty($_POST['password'])) {
                $flag = true ;  
            } else {
                $data['have_password'] = 'Придумайте и введите пароль!';   
            }
            // проверяем длину пароля от 4 до 12 символов
            if(!empty($_POST['password']) AND ( strlen($_POST['password']) > 3  AND strlen($_POST['password']) < 13 ) ) {
                $flag = true ;  
            } else {
                $data['long'] = 'Длина пароля может быть больше 4 и меньше 12 символов';  
            }
            
           if($flag == true) {
                $email = $_POST['email'];

                // Пробуем получить юзера с таким емайлом
                $mod_reg = new Model_Register() ;
                $check_email = $mod_reg->get_ByEmail($email) ;
                
                if(isset($check_email)) {
                    $data['exists_email'] = 'Пользователь с таким емайл уже существует!';
                } else {
                    
                    if(isset($_POST['name']) and isset($_POST['surname']) and isset($_POST['yearbirth']) 
                        and isset($_POST['email']) and isset($_POST['password']) ) {
                        
                        $name = $_POST['name'] ;
                        $surname = $_POST['surname'] ;
                        $yearbirth = $_POST['yearbirth'] ;
                        $email = $_POST['email'] ;
                        $password = $_POST['password'] ;

                        // Делаем вставку нового пользователя в БД
                        $mod_reg->add_User($name, $surname, $yearbirth, $email, $password) ;

                        $data['reg_success'] = 'Вы успешно зарегистрированы!';
                    }                

                }

           }
        }

        //var_dump($data)  ;
        $this->view->generate('register_view.php', 'template_view.php', $data);
    }
    
    /* $this->validate();
    public function validate() {
        
    }*/
}