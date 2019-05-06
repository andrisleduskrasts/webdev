<?php

if (isset($_POST['action']) AND $_POST['action'] == 'loadtemplate') {
  foreach($_POST['data'] as $fieldname => $value){ if (!is_array($value)) $ev = "\$" . $fieldname . "='" . addslashes(htmlspecialchars($value)) . "';"; eval($ev); }//end foreach

  //echo '$template'.$template;
  include( '../'.$template.'.php');
  exit;
}