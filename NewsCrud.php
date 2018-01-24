<?php


interface NewsCrud
{

    public function selectMethod();
//
    public function getAllNews();
    public function getOneNews($id);
    public function addNews(array $data);
    public function updateNews($id, array $data);
    public function deleteNews($id);

}