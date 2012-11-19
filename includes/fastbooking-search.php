<form target="dispoprice" name="idForm" id="booking-form">
    <input type='hidden' name='showPromotions' value='1'>
    <input type='hidden' name='langue' value=''><input type='hidden' name='Clusternames' value='ASIAKHHTLCasa'><input type='hidden' name='Hotelnames' value='ASIAKHHTLCasa'>
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
     <label name="AccessCode">Access code/IATA code: </label> 
     <input type='password' name='AccessCode' value=''> 
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