<form target="dispoprice" name="idForm">
		<input type='hidden' name='showPromotions' value='1'>
		<input type='hidden' name='langue' value=''><input type='hidden' name='Clusternames' value='ASIAKHHTLCasa'><input type='hidden' name='Hotelnames' value='ASIAKHHTLCasa'>
		<br><b>Check In Date: </b><br>
		<!-- MONTH -->
		<select name='frommonth'>
		<option value='1'>Jan</option>
		<option value='2'>Feb</option>
		<option value='3'>Mar</option>
		<option value='4'>Apr</option>
		<option value='5'>May</option>
		<option value='6'>Jun</option>
		<option value='7'>Jul</option>
		<option value='8'>Aug</option>
		<option value='9'>Sept</option>
		<option value='10'>Oct</option>
		<option value='11'>Nov</option>
		<option value='12'>Dec</option>
		</select>

		<!-- DAY -->
		<select name='fromday'> 
		<option value='1'>1</option>
		<option value='2'>2</option>
		<option value='3'>3</option>
		<option value='4'>4</option>
		<option value='5'>5</option>
		<option value='6'>6</option>
		<option value='7'>7</option>
		<option value='8'>8</option>
		<option value='9'>9</option>
		<option value='10'>10</option>
		<option value='11'>11</option>
		<option value='12'>12</option>
		<option value='13'>13</option>
		<option value='14'>14</option>
		<option value='15'>15</option>
		<option value='16'>16</option>
		<option value='17'>17</option>
		<option value='18'>18</option>
		<option value='19'>19</option>
		<option value='20'>20</option>
		<option value='21'>21</option>
		<option value='22'>22</option>
		<option value='23'>23</option>
		<option value='24'>24</option>
		<option value='25'>25</option>
		<option value='26'>26</option>
		<option value='27'>27</option>
		<option value='28'>28</option>
		<option value='29'>29</option>
		<option value='30'>30</option>
		<option value='31'>31</option>
		</select>

		<!-- YEAR -->
		<select name='fromyear' onChange='update_departure();'>
		  <option value="0"></option>
		</select>
		<br>

		<b>Check Out Date: </b><br>

<select name='tomonth'>
<option value='1'>Jan</option>
<option value='2'>Feb</option>
<option value='3'>Mar</option>
<option value='4'>Apr</option>
<option value='5'>May</option>
<option value='6'>Jun</option>
<option value='7'>Jul</option>
<option value='8'>Aug</option>
<option value='9'>Sept</option>
<option value='10'>Oct</option>
<option value='11'>Nov</option>
<option value='12'>Dec</option>
</select>


<select name='today'> 
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
<option value='6'>6</option>
<option value='7'>7</option>
<option value='8'>8</option>
<option value='9'>9</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
</select>



<select name='toyear' onchange='update_departure();'><option value='0'></option></select><br>
<br>	
			 
		
		<b>Adults per room:</b>
		<select name='adulteresa'><option value='1' selected>1</option><option value='2' >2</option><option value='3' >3</option><option value='4' >4</option></select><br>
				
		 <strong>Access code/IATA code :</strong> <input type='password' name='AccessCode' value=''><BR> 
		 <br>
		<!-- //// BUTTONS //// -->
		<input name='B1' type='button' value='Check Availability' onclick='hhotelDispoprice(this.form)'>
		<a href="javascript:;" onClick="hhotelcancel('ASIAKHHTLCasa','');">Cancel</a>			
		<SCRIPT SRC='<?php bloginfo('template_url'); ?>/js/fastbooking/fbfulltrack.js'></script>
		</form>