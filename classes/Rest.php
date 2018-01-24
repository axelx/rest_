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

        return $this->authInput;


    }





    public function response(){

        $this->parsePhpInput();

        return new $this->route($this->methodQuery,$this->dataQuery,$this->dataInput);
    }



    /**
     * @return mixed
     */
    public function parseQuery()
    {


        $url = $_SERVER["REQUEST_URI"] ?? '';




        $url = rtrim($url, '/');
        $urls = explode('/', $url);
        array_shift($urls);
        $this->route = ucfirst($urls[0]);
        array_shift($urls);
        $this->dataQuery = $urls;





    }



    /**
     * @return mixed
     */
    public function setMethod()
    {
        $this->methodQuery = $_SERVER['REQUEST_METHOD'];
    }

}