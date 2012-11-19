<form target="dispoprice" name="idForm" id="booking-form">
    <input type='hidden' name='showPromotions' value='1'>
    <input type='hidden' name='langue' value=''><input type='hidden' name='Clusternames' value='ASIAKHHTLCasa'><input type='hidden' name='Hotelnames' value='ASIAKHHTLCasa'>
    <ul>
    <li>
    <label name="checkindate">Check In Date: </label>
    <input type="text" id="checkinDate" name="checkindate" />
	</li>
    <li>
    <label name="checkoutdate">Check Out Date: </label>
    <input type="text" id="checkoutDate" name="checkoutdate" />
	</li>
    <li>
    <label name="adulteresa">Adult: </label>
    <select name='adulteresa'><option value='1' selected>1</option><option value='2' >2</option><option value='3' >3</option><option value='4' >4</option></select><br>
    <li>        
     <label name="AccessCode">Access code/IATA code: </label> 
     <input type='password' name='AccessCode' value=''> 
    </li>
    <li>
    <!-- //// BUTTONS //// -->
    <input name='B1' type='button' value='Check Availability' onclick='hhotelDispoprice(this.form)'>
    </li>
	</ul>
    <SCRIPT SRC='<?php bloginfo('template_url'); ?>/js/fastbooking/fbfulltrack.js'></script>
</form>