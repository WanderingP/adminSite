<?php
//Checks for data
if(isset($_POST)){
    //Grab table data from post request
    $export_data = unserialize($_POST['downloadCSV']);
    // filename for export
    $csv_filename = 'db_export_'.date('Y-m-d').'.csv'; 
    //Set csv titles
    $headers = Array("id","HANDLE", "BLOCKNAME", "PROJECT", "DOCUMENT_DESCRIPTION", "PROJECT_IDENTIFIER", "REVISION",  "SCALE", "DOCUMENT_NUMBER", "DRAWN_BY", "APPROVED_BY", "CHECKED_BY", "ISSUED_BY", "DRAWN_DATE", "APPROVED_DATE", "CHECKED_DATE", "ISSUED_DATE", "PURPOSE_OF_ISSUE", "NOTES");
    //Set file headers
    header("Content-type: application/text");
    header("Content-Description: File download");
    header("Content-Disposition: attachment; filename=".$csv_filename."");
    //open file to write
    $file = fopen("php://output", "w");
    //Input csv titles
    fputcsv($file, $headers);
    //Imput table data
    foreach($export_data as $line){
        fputcsv($file,$line);
	    }
    fclose($file);
    //To stop whole page printing
    exit();
    }
else{
    echo "There has been a problem finding your table data.";
}


?>