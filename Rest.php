<?php


class Rest
{

    public $method;
    public $route;
    public $dataQuery;


    /**
     * @return mixed
     */
    public function __construct()
    {
        $this->setMethod();
    }


    /**
     * @return mixed
     */
    public function parseQuery()
    {
        $query = $_SERVER["REQUEST_URI"];




// Разбираем url
        $url = $_SERVER["REQUEST_URI"] ?? '';




        $url = rtrim($url, '/');
        $urls = explode('/', $url);
        array_shift($urls);
        $this->route = ucfirst($urls[0]);
        array_shift($urls);
        $this->dataQuery = $urls;






        var_dump($this->method);
        var_dump($this->route);
        var_dump($this->dataQuery);







    }









    /**
     * @return mixed
     */
    public function setMethod()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

}