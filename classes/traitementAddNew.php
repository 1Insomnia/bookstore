<?php

if (($_SERVER["REQUEST_METHOD"] == "POST") && (!empty($_POST))) {
  $title =  $_POST["title"] ?? "";
  $author = $_POST["author"] ?? "";
  $active = $_POST["active"] ?? "";


  echo "<pre class='text-danger'>";
  // var_dump($_POST);
  var_dump([$title, $author, $active]);
  echo "</pre>";
}


function parse_data(string $inputData)
{
  if (empty($inputData)) return;

  $filter_1 = htmlspecialchars($inputData);
  $res = filter_var($filter_1, FILTER_SANITIZE_STRING);

  return $res;
}
