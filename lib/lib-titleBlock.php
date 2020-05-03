<?php
class titleBlock {
  private $pdo = null;
  private $stmt = null;

  function __construct () {
    // __construct() : connect to the database
    // PARAM : DB_HOST, DB_CHARSET, DB_NAME, DB_USER, DB_PASSWORD
  
      try {
        $this->pdo = new PDO(
          "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
          ]
        );
        return true;
      } catch (Exception $ex) {
        $this->CB->verbose(0, "DB", $ex->getMessage(), "", 1);
      }
    }


function __destruct () {
    // __destruct() : close connection when done
      
        if ($this->stmt !== null) {
          $this->stmt = null;
      }
        if ($this->pdo !== null) {
            $this->pdo = null;
          }
        }

function get($id){
    //get by id
    $sql = "SELECT * FROM `lffntitleblock` WHERE `id`=?";
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute([$id]);
    $entry = $this->stmt->fetchAll();
    return count($entry)==0 ? false : $entry[0] ;
  }


function getAll () {
    // getAll() : get all users
   
      $sql = "SELECT * FROM `lffntitleblock`";
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute();
      $entry = $this->stmt->fetchAll();
      return count($entry)==0 ? false : $entry ;
    }

function search($document_description){
      
    $sql = "SELECT * FROM `lffntitleblock` WHERE `document_description` LIKE '%".$document_description."%'";
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute();
    return $this->stmt->fetchAll();

}


function add ($handle, $blockname, $project, $document_desc, $project_id, $revision, $scale, $document_num, $drawn_by, $approved_by, $checked_by, $issued_by, $drawn_date, $approved_date, $checked_date, $issued_date, $purpose, $notes) {
    // add() 
      $sql = "INSERT INTO `lffntitleblock` (`handle`, `blockname`, `project`, `document_description`, `project_id`, `revision`, `scale`, `document_num`, `drawn_by`, `approved_by`, `checked_by`, `issued_by`, `drawn_date`, `approved_date`, `checked_date`, `issued_date`, `purpose`, `notes`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $cond = [$handle, $blockname, $project, $document_desc, $project_id, $revision, $scale, $document_num, $drawn_by, $approved_by, $checked_by, $issued_by, $drawn_date, $approved_date, $checked_date, $issued_date, $purpose, $notes];
      try {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($cond);
      } catch (Exception $ex) {
        return false;
      }
      return true;
    }

function edit ($handle, $blockname, $project, $document_desc, $project_id, $revision, $scale, $document_num, $drawn_by, $approved_by, $checked_by, $issued_by, $drawn_date, $approved_date, $checked_date, $issued_date, $purpose, $notes, $id) {
    
        $sql = "UPDATE `lffntitleblock` SET `handle`=?, `blockname`=?, `project`=?, `document_description`=?, `project_id`=?, `revision`=?, `scale`=?, `document_num`=?, `drawn_by`=?, `approved_by`=?, `checked_by`=?, `issued_by`=?, `drawn_date`=?, `approved_date`=?, `checked_date`=?, `issued_date`=?, `purpose`=?, `notes`=? WHERE `id`=?";
        $cond = [$handle, $blockname, $project, $document_desc, $project_id, $revision, $scale, $document_num, $drawn_by, $approved_by, $checked_by, $issued_by, $drawn_date, $approved_date, $checked_date, $issued_date, $purpose, $notes, $id];
        try {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($cond);
        } catch (Exception $ex) {
        return false;
        }
        return true;
    }

function update($handle, $blockname, $project, $document_desc, $project_id, $revision, $scale, $document_num, $drawn_by, $approved_by, $checked_by, $issued_by, $drawn_date, $approved_date, $checked_date, $issued_date, $purpose, $notes, $id){
        $sql = "UPDATE `lffntitleblock` SET `handle`=?, `blockname`=?, `project`=?, `document_description`=?, `project_id`=?, `revision`=?, `scale`=?, `document_num`=?, `drawn_by`=?, `approved_by`=?, `checked_by`=?, `issued_by`=?, `drawn_date`=?, `approved_date`=?, `checked_date`=?, `issued_date`=?, `purpose`=?, `notes`=? WHERE `id`=?";
        $cond = [$handle, $blockname, $project, $document_desc, $project_id, $revision, $scale, $document_num, $drawn_by, $approved_by, $checked_by, $issued_by, $drawn_date, $approved_date, $checked_date, $issued_date, $purpose, $notes, $id];
        try {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($cond);
        } catch (Exception $ex) {
        return false;
        }
        return true;

}


function del ($id) {
    // del() : delete user
    // PARAM $id - user ID
    
        $sql = "DELETE FROM `lffntitleblock` WHERE `id`=?";
        try {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute([$id]);
        } catch (Exception $ex) {
        return false;
        }
        return true;
        }

    }