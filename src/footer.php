    <footer>
      <div class="">
    	  <p class="pull-right"><?php echo $LANG_DASHBOARD_TITLE;?> | Powered by <a href='http://www.vanmarion.nl' target='_blank'>J. van Marion</a></p>
      </div>
      <div class="clearfix"></div>
    </footer>
<!-- /footer content -->

		</div>
<!-- /page content -->
	</div>
</div>
<div id="custom_notifications" class="custom-notifications dsp_none">
	<ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group"></ul>
	<div class="clearfix"></div>
	<div id="notif-group" class="tabbed_notifications"></div>
</div>

<script src="<?php echo $DOCUMENT_ROOT;?>/js/bootstrap.min.js"></script>

<!-- bootstrap progress js -->
<script src="<?php echo $DOCUMENT_ROOT; ?>/js/progressbar/bootstrap-progressbar.min.js"></script>
<script src="<?php echo $DOCUMENT_ROOT; ?>/js/nicescroll/jquery.nicescroll.min.js"></script>

<script src="<?php echo $DOCUMENT_ROOT; ?>/js/highcharts/highcharts.js"></script>
<script src="<?php echo $DOCUMENT_ROOT; ?>/js/highcharts/modules/exporting.js"></script>

<!-- icheck -->
<script src="<?php echo $DOCUMENT_ROOT; ?>/js/icheck/icheck.min.js"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="<?php echo $DOCUMENT_ROOT; ?>/js/moment.min2.js"></script>
<script type="text/javascript" src="<?php echo $DOCUMENT_ROOT; ?>/js/datepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo $DOCUMENT_ROOT; ?>/js/bootstrap-formhelpers.js"></script>

<script type="text/javascript">
$(document).ready(function () {
$('#build_date').daterangepicker({
  format: "YYYY-MM-DD H:m:s",
  singleDatePicker: true,
  showDropdowns: true,
  calender_style: "picker_2"
}, function (start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
    });
});
</script>
<!-- sparkline -->
<script src="<?php echo $DOCUMENT_ROOT;?>/js/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo $DOCUMENT_ROOT;?>/js/custom.js"></script>

<!-- validator -->
<script src="<?php echo $DOCUMENT_ROOT;?>/js/validator/validator.js"></script>
<script>
  // initialize the validator function
        validator.message['date'] = 'not a real date';

        // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
        $('form')
            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
            .on('change', 'select.required', validator.checkField)
            .on('keypress', 'input[required][pattern]', validator.keypress);

        $('.multi.required')
            .on('keyup blur', 'input', function () {
                validator.checkField.apply($(this).siblings().last()[0]);
            });

        // bind the validation to the form submit event
        //$('#send').click('submit');//.prop('disabled', true);

        $('form').submit(function (e) {
            e.preventDefault();
            var submit = true;
            // evaluate the form using generic validaing
            if (!validator.checkAll($(this))) {
                submit = false;
            }

            if (submit)
                this.submit();
            return false;
        });

        /* FOR DEMO ONLY */
        $('#vfields').change(function () {
            $('form').toggleClass('mode2');
        }).prop('checked', false);

        $('#alerts').change(function () {
            validator.defaults.alerts = (this.checked) ? false : true;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);
    </script>

<!-- skycons -->
<script src="<?php echo $DOCUMENT_ROOT; ?>/js/skycons/skycons.js"></script>


</body>

</html>
