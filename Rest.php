<?php


class Rest
{

    public $methodQuery;
    public $route;
    public $dataQuery;


    /**
     * @return mixed
     */
    public function __construct()
    {
        $this->setMethod();

        $this->parseQuery();
    }





    public function response(){

//        var_dump($this->methodQuery);
//        var_dump($this->dataQuery);
        return new $this->route($this->methodQuery,$this->dataQuery);
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