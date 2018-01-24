<?php



class News extends Db
{



    public $methodQuery;
    public $dataQuery;


    public function __construct($method = 0,$dataQ = 0)
    {
        parent::__construct();

        $this->methodQuery = $method;
        $this->dataQuery = $dataQ;

    }

    public function get(){
        echo "Hi";
    }



    public function getAllNews(){


        $sql = 'SELECT * FROM news';
        $sth = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $sth->execute();

        return $sth->fetchAll();




    }


    public function getOneNews($id){



        $sql = 'SELECT * 
                FROM news
                WHERE id = :id'
        ;

        $sth = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute([':id' => $id]);


        return $sth->fetchAll();


    }




    public function getMethod()
    {

        if ($this->methodQuery === 'GET' && empty($this->dataQuery)){
//            var_dump('sdf');die;
            return $this->getAllNews();
        }
        if ($this->methodQuery === 'GET' && count($this->dataQuery) === 1){
            return $this->getOneNews($this->dataQuery[0]);

        }
//
//        if ($this->methodQuery === 'POST' && empty($this->dataQuery)) {
//            return
//        }
//
//        if ($this->methodQuery === 'PUT' && count($this->dataQuery) === 1) {
//            return
//        }
//
//        if ($this->methodQuery === 'PATCH' && count($this->dataQuery) === 1) {
//            return
//        }
//
//        if ($this->methodQuery === 'DELETE' && count($this->dataQuery) === 1) {
//
//            return
//
//        }
    }






}