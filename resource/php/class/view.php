<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ord/resource/php/class/core/init.php';
require_once 'config.php';

class view extends config{

        public function listAppliedFor(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_applied_for` WHERE `state` ='active' ORDER BY LOWER(`appliedfor`)";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
            $x = 1;
                foreach ($rows as $row) {
                echo "<tr style='font-size:80%'>
                        <td class='px-2 py-1 d-none'>q$row[id]</td>
                        <td class='px-2 py-1'>
                            <div><b>".strtoupper($row['appliedfor'])."</b></div>
                            <div class='notes text-danger'><small><em>$row[notes]</em></small</div>
                        </td>
                        <td class='px-2 py-1'><small>$row[price].00</small></td>
                        <td class='px-2 py-1'><input type='number' name='item$x' class='form-control' value='0' onchange='updateTotal()'></td>
                        <td class='px-2 py-1 d-none'><small>$row[point]</small></td>

                    </tr>";
                    $x++;
                }
        }
        public function listAppliedFor2(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_applied_for`ORDER BY LOWER(`appliedfor`)";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
            $x = 1;
                foreach ($rows as $row) {
                echo "<tr>
                        <td class='px-2 py-1'>q$row[id]</td>
                        <td class='px-2 py-1'>
                            <div><b>".strtoupper($row['appliedfor'])."</b></div>
                        </td>
                        <td class='px-2 py-1'><small>$row[price].00</small></td>
                        <td class='px-2 py-1'><input type='number' name='item$x' class='form-control' value='0' onchange='updateTotal()'></td>
                        <td class='px-2 py-1 d-none'><small>$row[point]</small></td>

                    </tr>";
                    $x++;
                }
        }
        public function listCourse(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_course`";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
                  echo '<option data-tokens=".'.$row->course.'." value="'.$row->course.'">'.$row->course.'</option>';
                }
        }
        public function listReason(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_purposes`";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
                  echo '<option data-tokens=".'.$row->purposes.'." value="'.$row->purposes.'">'.$row->purposes.'</option>';
                }
        }

        public function getdpSRA(){
            $user = new user();
            return $user->data()->dp;
        }

        public function getMmSRA(){
            $user = new user();
             return $user->data()->mm;
        }

        public function collegeSP2()
        {
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `collegeschool`";
            $data = $con->prepare($sql);
            $data->execute();
            $rows = $data->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows as $row) {
                echo '<option data-tokens=".' . $row->college_school . '." value="' . $row->college_school . '">' . $row->college_school . '</option>';
                echo 'success';
            }
        }
}
