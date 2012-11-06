<!-- widget-home -->
<div id="sidebar-home">
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Home Widget Area')) { }else { ?>
	<div class="non-widget">
        <h3>About this Sidebar</h3>
        <ul>
        <li><?php _e('Go to admin backend <strong><em> -&gt; Appearance -&gt; Widgets</em></strong>', 'sp_framework'); ?></li>
        <li><?php _e('And place image widgets into the <strong><em>Home Widget Area</em></strong>', 'sp_framework'); ?></li>
        </ul>
     </div>  
	<?php } ?>
</div>
<!-- /#widget-home -->