<?php

class config{
<<<<<<< Updated upstream
     private $user = 'root';
     private $password = '';
    // public $pdo = null;

    //private $user = 'ceumnlre_root';
    //private $password = 'Eg5c272klko5';
=======
    // private $user = 'root';
    // private $password = '';
    // public $pdo = null;

    private $user = 'ceumnlre_root';
    private $password = 'Eg5c272klko5';
>>>>>>> Stashed changes
    public $pdo = null;

    public function con()
    {
        try {
            //hostinger
<<<<<<< Updated upstream
            // $this->pdo = new PDO('mysql:local=109.106.254.187:3306;dbname=ceumnlre_ord', $this->user, $this->password);

            //local
            $this->pdo = new PDO('mysql:local=127.0.0.1:3306;dbname=ceumnlre_ord', $this->user, $this->password);
=======
            $this->pdo = new PDO('mysql:local=109.106.254.187:3306;dbname=ceumnlre_ord', $this->user, $this->password);

            //local
            // $this->pdo = new PDO('mysql:local=127.0.0.1:3306;dbname=ceumnlre_report', $this->user, $this->password);
>>>>>>> Stashed changes
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $this->pdo;

    }
}

 ?>
