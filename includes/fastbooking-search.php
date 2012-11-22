<form target="dispoprice" name="idForm" id="booking-form">
    <input type='hidden' name='showPromotions' value='1'>
    <input type='hidden' name='langue' value=''>
    <input type='hidden' name='Clusternames' value='ASIAKHHTLCasa'>
    <input type='hidden' name='Hotelnames' value='ASIAKHHTLCasa'>
    <input type="hidden" name="theme" />
    <input type="hidden" name="fromday" id="fromday" />
    <input type="hidden" name="frommonth" id="frommonth" />
    <input type="hidden" name="fromyear" id="fromyear" />
    <input type="hidden" name="endday" />
    <input type="hidden" name="endmonth" />
    <input type="hidden" name="endyear" />
    <input type="hidden" name="nbdays" id="nbdays" />
    <ul>
    <li>
    <label name="checkindate">Check In Date: </label>
    <input type="text" id="checkinDate" name="checkindate" value="<?php echo date('Y-m-d'); ?>" class="icon-calendar" />
	</li>
    <li>
    <label name="checkoutdate">Check Out Date: </label>
    <input type="text" id="checkoutDate" name="checkoutdate" value="<?php echo date('Y-m'); ?>-<?php echo date('d')+1; ?>" class="icon-calendar" />
	</li>
    <li>
    <label name="adulteresa">Adult: </label>
    <select name='adulteresa'><option value='1' selected>1</option><option value='2' >2</option><option value='3' >3</option><option value='4' >4</option></select>
    </li>
    <li>
    <label name="childteresa">Child: </label>
    <select name='childteresa'><option value='1' selected>1</option><option value='2' >2</option><option value='3' >3</option><option value='4' >4</option></select>
    </li>
    <li>        
     <label name="AccessCode">Access code: </label> 
     <input type='password' name='AccessCode' value='' class="txt-small"> 
    </li>
    <li>
    <a href="javascript:;" onclick="hhotelDispoprice(document.idForm);" class="dark-purple check-available">Check Availability</a>
    </li>
    <li>
    <a href="javascript:;" onClick="hhotelcancel('ASIAKHHTLCasa','');" class="dark-purple cancel-resa">Cancel</a>
    </li>
	</ul>
    <SCRIPT SRC='<?php bloginfo('template_url'); ?>/js/fastbooking/fbfulltrack.js'></script>
</form>
<script type="text/javascript">
	$(document).ready(function(){
		$(".icon-calendar").datepicker({
			constrainInput: true,
			dateFormat: 'yy-m-d',
			numberOfMonths: 2,
			showButtonPanel: true,
			minDate: 0,
			onSelect: function(dateText, inst) {
				if (inst.id=='checkinDate') {
					//set from dates
					var sdate = $.datepicker.parseDate('yy-m-d',dateText);
					$('#fromday').val(sdate.getDate());
					$('#frommonth').val(sdate.getMonth()+1);
					$('#fromyear').val(sdate.getFullYear());
		
					//set departure date field to selected date +1 day.
					var sdateplusone = new Date(sdate.getTime()+86400000);
					$("#checkoutDate").datepicker("option","minDate",sdateplusone);
				}
		
				//get arrivate date and departure dates, calculate day difference and update nbdays field
				var adate = $.datepicker.parseDate('yy-m-d',$('#checkinDate').val());
				var ddate = $.datepicker.parseDate('yy-m-d',$('#checkoutDate').val());
				$('#nbdays').val(Math.ceil((ddate.getTime()-adate.getTime())/(1000*60*60*24)));
			}
		});
	});
</script>