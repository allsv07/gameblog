<?php


namespace app\models;


use system\core\Model;

class Cheat extends Model
{
    protected $table = 'cheats';

//    public function getAllCheats()
//    {
//        $sql = "SELECT CH.id AS ch_id, CH.title, CH.date, CH.image, CH.meta_desc, CH.meta_keywords, C.title AS cat_title FROM {$this->table} AS CH JOIN category AS C ON C.id = CH.cat_id WHERE C.table_name = 'cheats' ORDER BY CH.id DESC";
//        return $this->db->query($sql);
//    }

    /**
     * получаем новости по id категории
     * @param $id
     * @return array
     */
//    public function getCheatsThisCategory($id)
//    {
//        $sql = "SELECT CH.id AS ch_id, CH.title, CH.date, CH.image, CH.meta_desc, CH.meta_keywords, CAT.title AS cat_title FROM {$this->table} AS CH JOIN category AS CAT ON CAT.id = CH.cat_id WHERE CAT.id = ? ORDER BY CH.id DESC";
//        return $this->db->query($sql, [$id]);
//    }


}