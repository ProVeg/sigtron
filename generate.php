<?php
  setcookie("sigtron", $_POST["template"] . "###" . $_POST["name"] . "###" . $_POST["title"] . "###" . $_POST["phone"] . "###" . $_POST["additional"], time() + (86400 * 365));
  $file = file_get_contents($_POST["template"] . ".template");
  $file = str_replace("###NAME###", $_POST["name"], $file);
  $file = str_replace("###TITLE###", $_POST["title"], $file);
  $file = str_replace("###PHONE###", $_POST["phone"], $file);
  $file = str_replace("###ADDITIONAL###", $_POST["additional"], $file);
  echo $file;
?>