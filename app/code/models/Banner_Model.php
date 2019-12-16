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

    public function updateVisibleBanner()
    {
        $allBanners = $this->getAll('banner', null, null);
        // Set all banner is not visible
        for ($j = 0; $j < sizeof($allBanners); $j++) {
            $this->updateRecord('banner', 'idBanner', $allBanners[$j]['idBanner'], 'visible', 0);
        }
        // Set all banner from post is visible
        $post = isset($_POST) ? $_POST : null;
        foreach ($post as $key => $val) {
            $idBanner = trim($key, "visibleOnHome");
            $this->updateRecord('banner', 'idBanner', intval($idBanner), 'visible', 1);
        }
        return true;
    }

}
