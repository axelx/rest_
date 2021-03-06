<?php



class News extends Db implements NewsCrud
{



    public $methodQuery;
    public $dataQuery;
    public $phpInput;



    public function __construct($method = 0,$dataQ = 0,$dataInput=0)
    {
        parent::__construct();

        $this->methodQuery = $method;
        $this->dataQuery = $dataQ;

        $this->phpInput = $dataInput;



    }

    public function get(){
        echo "Hi";
    }



    public function getAllNews(){


        $sql = 'SELECT * FROM news AS n ';
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

    public function addNews(array $data){

        if (empty($data['title']) || empty($data['content'])){
            throw new Exception('Один из обязательных параметров не заполнен');
        }


        $sql = 'INSERT INTO `news` (`title`, `content`) VALUES (:title, :content)';


        $sth = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $res = $sth->execute([':title' => $data['title'],':content' => $data['content'],]);


        return $res;


    }

    public function updateNews($id, array $data){

        if (empty($data['title']) && empty($data['content'])){
            throw new Exception('Нет обязательных параметров для обновления');
        }

        $set = '';
        foreach ($data as $k => $datum) {

            $set .= "`$k` = '$datum',";
        }
        $set = substr($set,0,-1);


        $sql = "UPDATE `news`  SET $set WHERE id = :id";


        $sth = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $res = $sth->execute([':id' => $id[0]]);


        return $res;


    }


    public function deleteNews($id){



        $sql = "DELETE FROM `news` WHERE id = :id";


        $sth = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $res = $sth->execute([':id' => $id[0]]);


        return $res;


    }




    public function selectMethod()
    {


        if ($this->methodQuery === 'GET' && empty($this->dataQuery)){
            return $this->getAllNews();
        }

        if ($this->methodQuery === 'GET' && count($this->dataQuery) === 1){
            return $this->getOneNews($this->dataQuery[0]);
        }

        if ($this->methodQuery === 'POST' && empty($this->dataQuery) && !empty($this->phpInput)) {
            return $this->addNews($this->phpInput);
        }

        if ($this->methodQuery === 'PUT' && count($this->dataQuery) === 1  && !empty($this->phpInput)) {
            return $this->updateNews($this->dataQuery, $this->phpInput);
        }

        if ($this->methodQuery === 'PATCH' && count($this->dataQuery) === 1  && !empty($this->phpInput)) {
            return $this->updateNews($this->dataQuery, $this->phpInput);
        }

        if ($this->methodQuery === 'DELETE' && count($this->dataQuery) === 1) {
            return $this->deleteNews($this->dataQuery);
        }


    }






}