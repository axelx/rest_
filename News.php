<?php



class News extends Db
{


    public function get(){
        echo "Hi";
    }



    public function getAllNews(){


        $sql = 'SELECT * FROM news';
        $sth = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $sth->execute();

        return $sth->fetchAll();




    }

}