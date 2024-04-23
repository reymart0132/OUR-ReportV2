<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ord/resource/php/class/core/init.php';
require_once 'config.php';

class acfg extends config{

    public function selectGroups(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `tbl_course`";
        $data = $con-> prepare($sql);
        $data ->execute();
        echo '<option disabled>──────────</option>';
        echo '<option data-tokens="1" value="1">1 - Encoder - Regular</option>';
        echo '<option data-tokens="2" value="2">2 - Verifier / Admin</option>';
        echo '<option data-tokens="3" value="3">3 - Releasing</option>';
        echo '<option data-tokens="4" value="4">4 - Encoder - Special</option>';
    }

    public function selectStatus(){
        echo '<option disabled>──────────</option>';
        echo '<option data-tokens="active" value="active">Active</option>';
        echo '<option data-tokens="inactive" value="inactive">Inactive</option>';
    }
}
