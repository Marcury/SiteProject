<?php

class wiadomosciDB {
    
    private $imie;
    private $wiadomosc;
    private $data;
    private $ip_Adress;
    private $mysqli;
    
    public function __construct($imie, $wiadomosc, $data,$ip_Adress,$serwer, $user, $pass, $baza)
    {
    
        $this->imie=$imie;
        $this->wiadomosc=$data;
        $this->ip_Adress=$ip_Adress;
       
        $this->mysqli = new mysqli($serwer, $user, $pass, $baza);
        /* sprawdz połączenie */
        if ($this->mysqli->connect_errno) {
            printf("Nie udało sie połączenie z serwerem: %s\n", $mysqli->connect_error);
            exit();
        }
        if ($this->mysqli->set_charset("utf8")) {
//udało sie zmienić kodowanie
        }
    }
       function __destruct() {
        $this->mysqli->close();
    }

    public function getAllMessages($sql, $pola) {
      
        
         $data= array();
         $result2 = $this->mysqli->query($sql);
                        while($rs = $result2->fetch_array()) { $data[] = $rs; }
                            
                        $intCnt = count($data);
                        
                          for($iRow=0;$iRow<$intCnt;$iRow++) { 
                            echo '<tr>';
                                echo '<td>';
                                    echo '<table width="100%">';
                                        echo '<tr>';
                                            echo "<td>"; echo $data[$iRow]["imie"].'</td>';
                                        echo '</tr>';
                                        
                                        echo '<tr>';
                                            echo'<td>';  echo $data[$iRow]["wiadomosc"].'</td>';
                                        echo '</tr>';
                                        
                                        echo '<tr>';
                                            echo '<td><a href="edit.php?id=' . $data[$iRow]["id"] . '">Edytuj</a>'.'                   ';
                                            echo '<a href="usun.php?id=' . $data[$iRow]["id"] . '">Usuń</a></td>';
                                        echo '<tr>';
                                            echo '<td colspan="2" height="20"><hr size="1" /></td>';
                                        echo '</tr>';
                                    echo '</table>';
                            echo '</tr>';
                             } 

}
    public function getMessage($sql)
    {
        $result = $this->mysqli->query($sql);
        //$zmienna[]=array();
        while ($row = $result->fetch_assoc()) {
                $zmienna = $row['wiadomosc'];
            }
         //   $wynik = implode(" ", $zmienna);
        return $zmienna;
}
    public function edytuj($id,$wiadomosc)
    {
        $this->wiadomosc=  mysqli_real_escape_string($this->mysqli,$escapestr);
        $sql="UPDATE `wiadomosci` SET `wiadomosc`='$wiadomosc' WHERE `id`='$id'";
        $this->mysqli->query($sql);
        $this->mysqli->commit();
            if ($this->mysqli->error) {
       printf("Errormessage: %s\n", $this->mysqli->error);
    }
    }
    public function usun($id)
    {
        $this->id=$id;
        $sql="DELETE FROM `wiadomosci` WHERE `id`=$id";
        $this->mysqli->query($sql);
        $this->mysqli->commit();
            if ($this->mysqli->error) {
       printf("Errormessage: %s\n", $this->mysqli->error);
    }
    }
}
?>
