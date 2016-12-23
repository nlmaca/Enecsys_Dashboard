<?php
require("../include/init.php");
include ("../header.php");
//check if session is valid for login
if(empty($_SESSION['user'])) {
  header("Location: ". $DOCUMENT_ROOT . "/index.php");
    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php");
}
//e2pv edit
// define a variable to switch on/off error messages
	$mysqliDebug = true;

  $e2pvId = $connect->escape_string(htmlspecialchars($_POST['data_id']);

  $sql = "select * from e2pv_settings where data_id = $e2pvId";
	$result = $connect->query($sql);

	if (!$result and $mysqliDebug) {
				// the query failed and debugging is enabled
				echo "<p>" . $LANG_ERROR_INQUERY . $sql . "</p>";
				echo $mysqli->error;
	}
	else if ($result) {
		while($row = mysqli_fetch_array($result)) {
			?>
			<div class="right_col" role="main">
			<div class="">
				<div class="x_content">
					<form class="form-horizontal form-label-left" action="<?php htmlentities($_SERVER['PHP_SELF']);?>" method='POST' novalidate>";
						<span class="section"><?php echo $LANG_PAGES_E2PV_EDITSETTINGS;?></span>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"><?php echo $LANG_PAGES_E2PV_TOTALINVERTERS; ?> <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="number" id="e2pv_idcount" name="e2pv_idcount" required="required" data-validate-minmax="0"
									class="form-control col-md-7 col-xs-12" value="<?php echo $row['e2pv_idcount']; ?>">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation"><?php echo $LANG_PAGES_E2PV_PVOUTPUT_API; ?> <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="e2pv_apikey" name="e2pv_apikey" required="required" data-validate-minmax="0"
									class="form-control col-md-7 col-xs-12" value="<?php echo $row['e2pv_apikey']; ?>">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"><?php echo $LANG_PAGES_E2PV_PVOUTPUT_SYSTEM; ?> <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="number" id="e2pv_systemid" name="e2pv_systemid" required="required" data-validate-minmax="0"
									class="form-control col-md-7 col-xs-12" value="<?php echo $row['e2pv_systemid']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $LANG_PAGES_E2PV_LIFETIME; ?> </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="form-control" name="e2pv_lifetime">
									<option value="<?php echo $row['e2pv_lifetime']; ?>"><?php echo $row['e2pv_lifetime']; ?></option>
									<option>0</option>
									<option>1</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"><?php echo $LANG_PAGES_E2PV_AC; ?> </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="form-control" name="e2pv_ac">
									<option value="<?php echo $row['e2pv_ac']; ?>"><?php echo $row['e2pv_ac']; ?></option>
									<option>0</option>
									<option>1</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-3">
								<button id="send" type="submit" name="e2pv_update" class="btn btn-success"><?php echo $LANG_BUTTON_SAVE;?></button>
								<a href='settings_e2pv.php'class='btn btn-info'><?php echo $LANG_BUTTON_CANCEL;?></a>
								<input type='hidden' name='data_id' value='<?php echo $row['data_id'];?>'>
							</div>
						</div>
					</form>
				</div>
			</div>
	<?php
		}
	}
	else {
		echo $LANG_ERROR_NODATAFOUND;
	}

?>
</div>
<!-- footer content -->
<?php include ("../footer.php"); ?>
