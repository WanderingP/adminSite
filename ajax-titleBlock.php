<?php
// INIT
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";
if (!is_array($_SESSION['user'])) {
    die("ERR");
  }

require PATH_LIB . "lib-titleBlock.php";
$titleBlockLib = new titleBlock();
$titles = Array();

switch ($_POST['req']) {
/* [INVALID REQUEST] */
default:
    die("ERR");
    break;

    case "list":
        $titles = $titleBlockLib->getAll();?>

        
      <div class="headContainer">
        <h1>LFFN Data</h1>
        <input type="button" value="Add Row" onclick="titleBlock.addEdit()"/>
        <form class = "searchForm" onsubmit="return titleBlock.search()">
          <input id = "search" type="text">
          <button id = "submit" type="submit" style="margin-left: 0px;padding-left: 14px;padding-right: 14px;" onclick='titleBlock.search()'><i class="fa fa-search"></i></button>
        </form>
      </div>
    
    <?php
        if (is_array($titles)) {
            echo "<table class='zebra'>
            <tr><td>Handle</td><td>Description</td><td>Document Number</td><tr>";
            foreach ($titles as $t) {
                printf("<tr><td>%s</td><td>%s<td>%s</td><td class='right'>"
                  . "<input type='button' value='Delete' onclick='titleBlock.del(%u)'>"
                  . "</td></tr>", 
                  $t['handle'], $t['document_description'], $t['document_num'],
                  $t['id']
                );
              }
              echo "</table>";
            } else {
              echo "<div>No data found.</div>";
            }
            break;
    
      case "addEdit":
      $edit = isset($_POST['id']);
      if ($edit) {
        $titles = $titleBlockLib->get($_POST['id']);
      } ?>
      <h1><?=$edit?"EDIT":"ADD"?> Title Block</h1>
      <form onsubmit="return titleBlock.save()">
        <input type="hidden" id="id" value="<?=$titles['id']?>"/>
        <label for="handle">Handle:</label>
        <input type="text" id="handle" required value="<?=$titles['handle']?>"/>
        <label for="blockname">Block Name:</label>
        <input type="text" id="blockname" value="<?=$titles['blockname']?>"/>
        <label for="project">Project:</label>
        <input type="text" id="project" value="<?=$titles['project']?>"/>
        <label for="document_description">Document Description:</label>
        <input type="text" id="document_description" required value="<?=$titles['document_description']?>"/>
        <label for="project_id">Project id:</label>
        <input type="text" id="project_id" value="<?=$titles['project_id']?>"/>
        <label for="revision">Revision:</label>
        <input type="text" id="revision" value="<?=$titles['revision']?>"/>
        <label for="scale">Scale:</label>
        <input type="text" id="scale"  value="<?=$titles['scale']?>"/>
        <label for="document_num">Document Number:</label>
        <input type="text" id="document_num" required value="<?=$titles['document_num']?>"/>
        <label for="drawn_by">Drawn By:</label>
        <input type="text" id="drawn_by" value="<?=$titles['drawn_by']?>"/>
        <label for="approved_by">Approved By:</label>
        <input type="text" id="approved_by" value="<?=$titles['approved_by']?>"/>
        <label for="checked_by">Checked By:</label>
        <input type="text" id="checked_by"  value="<?=$titles['checked_by']?>"/>
        <label for="issued_by">Issued By:</label>
        <input type="text" id="issued_by" value="<?=$titles['issued_by']?>"/>
        <label for="drawn_date">Drawn Date:</label>
        <input type="text" id="drawn_date" value="<?=$titles['drawn_date']?>"/>
        <label for="approved_date">Approved Date:</label>
        <input type="text" id="approved_date" value="<?=$titles['approved_date']?>"/>
        <label for="checked_date">Checked Date:</label>
        <input type="text" id="checked_date" value="<?=$titles['checked_date']?>"/>
        <label for="issued_date">Issued Date:</label>
        <input type="text" id="issued_date" value="<?=$titles['issued_date']?>"/>
        <label for="purpose">Purpose Of Issue:</label>
        <input type="text" id="purpose" value="<?=$titles['purpose']?>"/>
        <label for="notes">Notes:</label>
        <input type="text" id="notes" value="<?=$titles['notes']?>"/>
        <input type="button" value="Cancel" onclick="titleBlock.list()"/>
        <input type="submit" value="Save"/>
      </form>
      <?php break;
    
    case "add":
      
      echo $titleBlockLib->add($_POST['handle'], $_POST['blockname'], $_POST['project'], $_POST['document_description'], $_POST['project_id'], $_POST['revision'], $_POST['scale'], $_POST['document_num'], $_POST['drawn_by'], $_POST['approved_by'], $_POST['checked_by'], $_POST['issued_by'], $_POST['drawn_date'], $_POST['approved_date'], $_POST['checked_date'], $_POST['issued_date'], $_POST['purpose'], $_POST['notes']) ? "OK" : "ERR" ;
      break;
  
    /* [EDIT USER] */
    case "edit":
      echo $titleBlockLib->edit($_POST['handle'], $_POST['blockname'], $_POST['project'], $_POST['document_description'], $_POST['project_id'], $_POST['revision'], $_POST['scale'], $_POST['document_num'], $_POST['drawn_by'], $_POST['approved_by'], $_POST['checked_by'], $_POST['issued_by'], $_POST['drawn_date'], $_POST['approved_date'], $_POST['checked_date'], $_POST['issued_date'], $_POST['purpose'], $_POST['notes'], $_POST['id']) ? "OK" : "ERR" ;
      break;

    case "update":
      echo $titleBlockLib->update($_POST['handle'], $_POST['blockname'], $_POST['project'], $_POST['document_description'], $_POST['project_id'], $_POST['revision'], $_POST['scale'], $_POST['document_num'], $_POST['drawn_by'], $_POST['approved_by'], $_POST['checked_by'], $_POST['issued_by'], $_POST['drawn_date'], $_POST['approved_date'], $_POST['checked_date'], $_POST['issued_date'], $_POST['purpose'], $_POST['notes'], $_POST['id']) ? "OK" : "ERR" ;
      break;
  
    /* [DELETE USER] */
    case "del":
      echo $titleBlockLib->del($_POST['id']) ? "OK" : "ERR" ;
      break;

  

    case "search":
      
      $titles = $titleBlockLib->search($_POST['document_description']);
      $download = $titleBlockLib->search($_POST['document_description']);
      $download = serialize($download);
      
      ?>
      
    
        <h1>LFFN Data</h1>
        <input class = "header" type="button" value="Add Row" onclick="titleBlock.addEdit()"/>
        
        <form class = "header" action="csv_download.php" method="POST">
        <textarea style="display:none" name="downloadCSV"><?php echo $download ?></textarea>
        <input id="submit" type="submit" value="Download CSV" />
        </form>

        <form class = "header" action="tsv_download.php" method="POST">
        <textarea style="display:none" name="downloadTSV"><?php echo $download ?></textarea>
        <input id="submit" type="submit" value="Download TSV" />
        </form>
     
    
    
    <?php
        if (is_array($titles)) {
            echo "<div class = 'searchformstyles' style='overflow-x:auto'><table class='zebra' width='100%'>
            <thead>
              <tr>
                <th colspan='1'></th>
                <th>Handle</th>
                <th>BlockName</th>
                <th>Project</th>
                <th>Description</th>
                <th>Project Id</th>
                <th>Revision</th>
                <th>Scale</th>
                <th>Document Number</th>
                <th>Drawn By</th>
                <th>Approved By</th>
                <th>Checked By</th>
                <th>Issued By</th>
                <th>Drawn Date</th>
                <th>Approved Date</th>
                <th>Checked Date</th>
                <th>Issued Date</th>
                <th>Purpose</th>
                <th>Notes</th>

              <tr>
            </thead>
            <tbody>";
            foreach ($titles as $t) {
                echo ("<tr>
                          <td class='left'>
                            <input type='button' value='update' onclick='titleBlock.update(".$t['id'].")' />
                            <input type='button' value='Delete' onclick='titleBlock.del(".$t['id'].")' />
                            <input type='hidden' id='id' value='".$t['id']."' />
                            
                          </td>
                          <td>
                            <input type='text' id = 'handle' value='".$t['handle']."' />
                          </td>
                          
                          <td>
                            
                            <input type='text'  id = 'blockname' value='".$t['blockname']."' />
                          </td>
                          <td>
                            
                            <input type='text'  id = 'project' value='".$t['project']."' />
                          </td>
                          <td>
                            <input type='text'  id = 'document_description' value='".$t['document_description']."' />
                          </td>
                          <td>
                            <input type='text'  id = 'project_id' value='".$t['project_id']."' />
                          </td>
                          <td>
                            <input type='text'  id = 'revision' value='".$t['revision']."' />
                          </td>
                          <td>
                            <input type='text'  id = 'scale' value='".$t['scale']."' />
                          </td>
                          <td>
                            <input type='text'  id = 'document_num' value='".$t['document_num']."' />
                          </td>
                          <td>
                            <input type='text'  id = 'drawn_by' value='".$t['drawn_by']."' />
                          </td>
                          <td>
                            <input type='text'  id = 'approved_by' value='".$t['approved_by']."' />
                          </td>
                          <td>
                            <input type='text'  id = 'checked_by' value='".$t['checked_by']."' />
                          </td>
                          <td>
                            <input type='text' ' id = 'issued_by' value='".$t['issued_by']."' />
                          </td>
                          <td>
                            <input type='text'  id = 'drawn_date' value='".$t['drawn_date']."' />
                          </td>
                          <td>
                            <input type='text' id = 'approved_date' value='".$t['approved_date']."' />
                          </td>
                          <td>
                            <input type='text' id = 'checked_date' value='".$t['checked_date']."' />
                          </td>
                          <td>
                            <input type='text'id = 'issued_date' value='".$t['issued_date']."' />
                          </td>
                          <td>
                            <input type='text'id = 'purpose' value='".$t['purpose']."' />
                          </td>
                          <td>
                            <input type='text' id = 'notes' value='".$t['notes']."' />
                          </td>
                      </tr>" 

                );
              }
              echo "</tbody></table></div>";
            } else {
              echo "<div>No data found.</div>";
            }
            break;
    



    }
























        