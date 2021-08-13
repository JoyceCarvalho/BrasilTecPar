<?php
namespace App\Controllers;

use BF\Controller\Action;
use League\Csv\CannotInsertRecord;
use League\Csv\Reader;
use League\Csv\Writer;

class indexController extends Action {

    public function index(){
        $this->render("index", "mainlayout");
    }

    public function merge(){

        //Faz a leitura do Clients.csv
        $csv = Reader::createFromPath('csv/Clients.csv', 'r');
        //faz a leitura dos dados do csv
        $records = $csv->getRecords();

        foreach ($records as $offset => $record) {
            $row = array(
                "UUID" => $record[0],
                "NAME" => $record[1]
            );

            $clientsRow[] = $row;
        }      

        //Faz a leitura do Transactions.csv
        $csv2 = Reader::createFromPath('csv/Transactions.csv', 'r');
        //faz a leitura dos dados do csv
        $records2 = $csv2->getRecords();

        foreach ($records2 as $offset => $record) {
            $parts = explode("|", $record[0]);

            $row = $this->getMatchingRow($parts[1], $clientsRow);
            
            if(!is_null($row)){
                $row["UUIDTRANSACTION"]        = $parts[0];
                $row["UUIDCLIENT"]  = $parts[1];
                $row["VALUE"]       = $parts[2];
                $row["DATETIME"]    = $parts[3];
            }

            $finalRow[] = $row;
        }

        if($this->createCSV($finalRow)){
            header('Location: /?msg=success');
        } else {
            header('Location: /?msg=failed');
        }

    }

    function createCSV($records = array()){
       
        try {
            $writer = Writer::createFromPath('csv/Merge.csv', 'w+');
            $writer->insertAll($records);

            return true;

        } catch (CannotInsertRecord $e) {
            $e->getRecord(); //returns [1, 2, 3]
            return false;
        }

    }

    function getMatchingRow($UUIDCLIENT, $rows){
        foreach($rows as $myRow){
            if($myRow["UUID"] == $UUIDCLIENT){
                return $myRow;
            }
        }
        return null;
    }

}
?>