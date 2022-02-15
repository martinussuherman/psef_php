<?php
function initCurl(string $apiUrl, string $token)
{
  $header = [
    "cache-control: no-cache",
    "Content-Type: application/json"
  ];

  if ($token != "") {
    array_push($header, "Authorization: Bearer {$token}");
  }

  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => $apiUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2TLS,
    CURLOPT_HTTPHEADER => $header
  ));

  return $curl;
}

function execCurl($curl)
{
  if ($curl === false) {
    return false;
  }

  $response = curl_exec($curl);
  $responseCode = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
  curl_close($curl);

  if ($responseCode != 200 && $responseCode != 201 && $responseCode != 204) {
    return json_decode('{"success": false, "result": ' . $responseCode . '}');
  }

  return json_decode('{"success": true, "result": ' . $response . '}');
}

function callGetApi(string $apiUrl, string $token)
{
  $curl = initCurl($apiUrl, $token);
  return execCurl($curl);
}

function callPostApi(string $apiUrl, string $token, $postData)
{
  $curl = initCurl($apiUrl, $token);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
  return execCurl($curl);
}

function dataTableToODataProxy(array $postData, string $apiUrl, string $token)
{
  $draw = (int) $postData["draw"];
  $start = $postData["start"];
  $length = $postData["length"];
  $searchValue = $postData["search"]["value"];
  $columnsSelect = "";
  $orderBy = "";

  if (isset($postData["columns"])) {
    $columnsSelect = implode(",", $postData["columns"]);

    $filter = "";

    foreach ($postData["columns"] as $searchColumn) {
      if ($filter != "") {
        $filter .= " or ";
      }

      $filter .= "contains({$searchColumn}, '{$searchValue}')";
    }
  }

  if (isset($postData["order"])) {
    foreach ($postData["order"] as $orderColumn) {
      if ($orderBy != "") {
        $orderBy .= ", ";
      }

      $orderBy .= "{$orderColumn["column"]} {$orderColumn["dir"]}";
    }
  }

  $oDataUrl = "{$apiUrl}?\$select={$columnsSelect}&\$filter={$filter}&\$orderby={$orderBy}&\$skip={$start}&\$top={$length}&\$count=true";
  $result = callGetApi($oDataUrl, $token);

  // TODO : format result as expected by DataTable protocol
  return $result;
}

// https://www.datatables.net/examples/server_side/scripts/server_processing.php?draw=2&columns%5B0%5D%5Bdata%5D=0&columns%5B0%5D%5Bname%5D=&columns%5B0%5D%5Bsearchable%5D=true&columns%5B0%5D%5Borderable%5D=true&columns%5B0%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B0%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B1%5D%5Bdata%5D=1&columns%5B1%5D%5Bname%5D=&columns%5B1%5D%5Bsearchable%5D=true&columns%5B1%5D%5Borderable%5D=true&columns%5B1%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B1%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B2%5D%5Bdata%5D=2&columns%5B2%5D%5Bname%5D=&columns%5B2%5D%5Bsearchable%5D=true&columns%5B2%5D%5Borderable%5D=true&columns%5B2%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B2%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B3%5D%5Bdata%5D=3&columns%5B3%5D%5Bname%5D=&columns%5B3%5D%5Bsearchable%5D=true&columns%5B3%5D%5Borderable%5D=true&columns%5B3%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B3%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B4%5D%5Bdata%5D=4&columns%5B4%5D%5Bname%5D=&columns%5B4%5D%5Bsearchable%5D=true&columns%5B4%5D%5Borderable%5D=true&columns%5B4%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B4%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B5%5D%5Bdata%5D=5&columns%5B5%5D%5Bname%5D=&columns%5B5%5D%5Bsearchable%5D=true&columns%5B5%5D%5Borderable%5D=true&columns%5B5%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B5%5D%5Bsearch%5D%5Bregex%5D=false&order%5B0%5D%5Bcolumn%5D=0&order%5B0%5D%5Bdir%5D=asc&start=10&length=10&search%5Bvalue%5D=&search%5Bregex%5D=false&_=1638415909991
// Sent parameters

// When making a request to the server using server-side processing, DataTables will send the following data in order to let the server know what data is required:
// Parameter name	Type	Description
// draw 	integer 	Draw counter. This is used by DataTables to ensure that the Ajax returns from server-side processing requests are drawn in sequence by DataTables (Ajax requests are asynchronous and thus can return out of sequence). This is used as part of the draw return parameter (see below).
// start 	integer 	Paging first record indicator. This is the start point in the current data set (0 index based - i.e. 0 is the first record).
// length 	integer 	Number of records that the table can display in the current draw. It is expected that the number of records returned will be equal to this number, unless the server has fewer records to return. Note that this can be -1 to indicate that all records should be returned (although that negates any benefits of server-side processing!)
// search[value] 	string 	Global search value. To be applied to all columns which have searchable as true.
// search[regex] 	boolean 	true if the global filter should be treated as a regular expression for advanced searching, false otherwise. Note that normally server-side processing scripts will not perform regular expression searching for performance reasons on large data sets, but it is technically possible and at the discretion of your script.
// order[i][column] 	integer 	Column to which ordering should be applied. This is an index reference to the columns array of information that is also submitted to the server.
// order[i][dir] 	string 	Ordering direction for this column. It will be asc or desc to indicate ascending ordering or descending ordering, respectively.
// columns[i][data] 	string 	Column's data source, as defined by columns.data.
// columns[i][name] 	string 	Column's name, as defined by columns.name.
// columns[i][searchable] 	boolean 	Flag to indicate if this column is searchable (true) or not (false). This is controlled by columns.searchable.
// columns[i][orderable] 	boolean 	Flag to indicate if this column is orderable (true) or not (false). This is controlled by columns.orderable.
// columns[i][search][value] 	string 	Search value to apply to this specific column.
// columns[i][search][regex] 	boolean 	Flag to indicate if the search term for this column should be treated as regular expression (true) or not (false). As with global search, normally server-side processing scripts will not perform regular expression searching for performance reasons on large data sets, but it is technically possible and at the discretion of your script.

// The order[i] and columns[i] parameters that are sent to the server are arrays of information:

//     order[i] - is an array defining how many columns are being ordered upon - i.e. if the array length is 1, then a single column sort is being performed, otherwise a multi-column sort is being performed.
//     columns[i] - an array defining all columns in the table.

// In both cases, i is an integer which will change to indicate the array value. In most modern server-side scripting environments this data will automatically be available to you as an array.
// Returned data

// Once DataTables has made a request for data, with the above parameters sent to the server, it expects JSON data to be returned to it, with the following parameters set:
// Parameter name	Type	Description
// draw 	integer 	The draw counter that this object is a response to - from the draw parameter sent as part of the data request. Note that it is strongly recommended for security reasons that you cast this parameter to an integer, rather than simply echoing back to the client what it sent in the draw parameter, in order to prevent Cross Site Scripting (XSS) attacks.
// recordsTotal 	integer 	Total records, before filtering (i.e. the total number of records in the database)
// recordsFiltered 	integer 	Total records, after filtering (i.e. the total number of records after filtering has been applied - not just the number of records being returned for this page of data).
// data 	array 	The data to be displayed in the table. This is an array of data source objects, one for each row, which will be used by DataTables. Note that this parameter's name can be changed using the ajax option's dataSrc property.
// error 	string 	Optional: If an error occurs during the running of the server-side processing script, you can inform the user of this error by passing back the error message to be displayed using this parameter. Do not include if there is no error.

// In addition to the above parameters which control the overall table, DataTables can use the following optional parameters on each individual row's data source object to perform automatic actions for you:
// Parameter name	Type	Description
// DT_RowId 	string 	Set the ID property of the tr node to this value
// DT_RowClass 	string 	Add this class to the tr node
// DT_RowData 	object 	Add the data contained in the object to the row using the jQuery data() method to set the data, which can also then be used for later retrieval (for example on a click event).
// DT_RowAttr 	object 	Add the data contained in the object to the row tr node as attributes. The object keys are used as the attribute keys and the values as the corresponding attribute values. This is performed using using the jQuery param() method. Please note that this option requires DataTables 1.10.5 or newer.
