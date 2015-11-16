<?php
// page version: 2.0
require("../inc/general_conf.inc.php");
if(empty($_SESSION['user'])) {
	header("Location: ". $DOCUMENT_ROOT . "/index.php");
    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php"); 
}
include ("../header.php");
include ('../language/' . $language . '.inc.php'); 
?>

<script>
  function ajax_compare_request() {
    $('#compare').html('<p> <i class="fa fa-spinner fa-spin fa-2x"></i><?php echo $LANG_DB_GETDATA; ?></p>');
    $('#compare').load("optimize_compare_main_history.php");
  }
  
  function ajax_upgrade_request() {
    $('#upgrade').html('<p> <i class="fa fa-spinner fa-spin fa-2x"></i><?php echo $LANG_DB_INSDATA; ?></p>');
    $('#upgrade').load("optimize_insert_history.php");
  }
  
  function ajax_select_delete_request() {
    $('#select').html('<p> <i class="fa fa-spinner fa-spin fa-2x"></i><?php echo $LANG_DB_CHECKDATA; ?></p>');
    $('#select').load("optimize_select_main.php");
  }
  
  function ajax_delete_request() {
    $('#delete').html('<p> <i class="fa fa-spinner fa-spin fa-2x"></i><?php echo $LANG_DB_DELDATA; ?></p>');
    $('#delete').load("optimize_purge_main.php");
  }
</script>
<?php

//Compare enecsys and enecsys_history table for differences
echo "<div class='col-md-3 col-sm-6'>
	  		<div class='widget widget-stats bg-black'>
	        	<div class='stats-icon stats-icon-lg'><i class='fa fa-database fa-fw'></i></div>
	           	<div class='stats-title'>
	            	<div class='stats-number'><button class='btn btn-info' onclick='ajax_compare_request()'>" . $LANG_DB_STEP1_SUB1 . "</button></div>
                <div id='compare'><br><p>" . $LANG_DB_STEP1_SUB2 . "</p></div>
      	</div>
			   </div></div>";

echo "<div class='col-md-3 col-sm-6'>
	  		<div class='widget widget-stats bg-black'>
	        	<div class='stats-icon stats-icon-lg'><i class='fa fa-database fa-fw'></i></div>
	           	<div class='stats-title'>
	            <div class='stats-number'><button class='btn btn-info' onclick='ajax_upgrade_request()'>" . $LANG_DB_STEP2_SUB1 . "</button></div>
                <div id='upgrade'><br><p>" . $LANG_DB_STEP2_SUB2 . "</p></div>
      	</div>
			   </div></div>";

echo "<div class='col-md-3 col-sm-6'>
	  		<div class='widget widget-stats bg-black'>
	        	<div class='stats-icon stats-icon-lg'><i class='fa fa-database fa-fw'></i></div>
	           	<div class='stats-title'>
	            <div class='stats-number'><button class='btn btn-info' onclick='ajax_select_delete_request()'>" . $LANG_DB_STEP3_SUB1 . "</button></div>
                <div id='select'><br><p>" . $LANG_DB_STEP3_SUB2 . "</p></div>
      	</div>
			   </div></div>";

echo "<div class='col-md-3 col-sm-6'>
	  		<div class='widget widget-stats bg-black'>
	        	<div class='stats-icon stats-icon-lg'><i class='fa fa-database fa-fw'></i></div>
	           	<div class='stats-title'>
	            <div class='stats-number'><button class='btn btn-info' onclick='ajax_delete_request()'>" . $LANG_DB_STEP4_SUB1 . "</button></div>
                <div id='delete'><br><p>" . $LANG_DB_STEP4_SUB2 . "</p></div>
      	</div>
			   </div></div>";


?>

<?php include("../footer.php");?>