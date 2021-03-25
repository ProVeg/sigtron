<?php
  function base64_encode_image ($filename=string,$filetype=string) {
    if ($filename) {
        $imgbinary = fread(fopen($filename, "r"), filesize($filename));
        return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
    }
  }

  setcookie("sigtron", $_POST["template"] . "###" . $_POST["name"] . "###" . $_POST["title"] . "###" . $_POST["phone"] . "###" . $_POST["additional"] . "###" . $_POST["external"] . "###" . $_POST["pronoun"], time() + (86400 * 365));
  $file = file_get_contents($_POST["template"] . ".template");
  $file = str_replace("###NAME###", $_POST["name"], $file);
  $file = str_replace("###PRONOUN###", $_POST["pronoun"], $file);
  $file = str_replace("###TITLE###", $_POST["title"], $file);
  $file = str_replace("###PHONE###", $_POST["phone"], $file);
  if ($_POST["additional"]) {
    $_POST["additional"] .= "<br />";
  }
  $file = str_replace("###ADDITIONAL###", $_POST["additional"], $file);
  $file = preg_replace_callback("/###(\w+)###(\w+)###/",
    function ($hit) {
      return '<img alt="'.$hit[1].'" src="'.($_POST["external"] ? 'https://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/'.$hit[2].'.png' : base64_encode_image($hit[2].'.png', 'png')).'" />';
    }, $file);

  echo $file;
?>