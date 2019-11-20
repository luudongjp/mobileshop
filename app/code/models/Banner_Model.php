<?php

class Banner_Model extends Base_Model
{
    protected $table = 'banner';

    function getActiveBanners()
    {
        $query = "select * from {$this->table} where visible = 1";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }
}
