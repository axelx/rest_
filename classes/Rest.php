<?php


class Rest
{

    public $methodQuery;
    public $route;
    public $dataQuery;
    public $dataInput;
    public $authInput;


    /**
     * @return mixed
     */
    public function __construct()
    {
        $this->setMethod();

        $this->parseQuery();
    }

    public function parsePhpInput()
    {

        $this->dataInput = false;
        $this->authInput = false;

        if ($this->methodQuery == 'GET'){
//            var_dump("9898");
             return;
        }

        $phpInput = file_get_contents('php://input');
        $phpInput = json_decode($phpInput,true);

        if (!isset($phpInput['auth']) || !isset($phpInput['data'])) {
            return;
        }else{
            $auth = new Auth();
            $this->authInput = $auth->checkAuth($phpInput['auth']);
            $this->dataInput = $phpInput['data'];


        }

//        var_dump("999999");
//        var_dump($this->authInput);
//        var_dump("999999");
        return $this->authInput;


    }





    public function response(){

//        var_dump($this->methodQuery);
//        var_dump(file_get_contents('php://input'));


        $this->parsePhpInput();


//        var_dump($this->dataQuery);
        return new $this->route($this->methodQuery,$this->dataQuery,$this->dataInput);
    }



    /**
     * @return mixed
     */
    public function parseQuery()
    {
//        $query = $_SERVER["REQUEST_URI"];




// Разбираем url
        $url = $_SERVER["REQUEST_URI"] ?? '';




        $url = rtrim($url, '/');
        $urls = explode('/', $url);
        array_shift($urls);
        $this->route = ucfirst($urls[0]);
        array_shift($urls);
        $this->dataQuery = $urls;





//
//        var_dump($this->methodQuery);
//        var_dump($this->route);
//        var_dump($this->dataQuery);
//
//var_dump('0000000000000000000');





    }









    /**
     * @return mixed
     */
    public function setMethod()
    {


        $this->methodQuery = $_SERVER['REQUEST_METHOD'];
    }

}