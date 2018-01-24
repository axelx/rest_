<?php


class Auth extends Db
{

    public function __construct($method = 0,$dataQ = 0,$dataInput=0)
    {
        parent::__construct();

    }

    public function checkAuth(array $user)
    {
        if (count($user) != 2){
            throw new Exception('Вы не авторизованы_');
            return false;
        }


        $sql = 'SELECT id FROM user WHERE username = :username AND password = :password';

        $sth = $this->db->prepare($sql);
        $sth->execute([':username'=> $user['user'],':password' =>$user['password']]);
        $res = $sth->fetch();

//        var_dump($user);
//
//        var_dump($res);
//
//        die;
        if (!$res){
            throw new Exception('Вы не авторизованы_1');
        }

        return $res;


    }



}