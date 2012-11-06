<aside class="sidebar">
    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('News and Event Widget Area')) { }else { ?>
	<div class="non-widget widget">
        <h3>About this Sidebar</h3>
        <ul>
        <li><?php _e('Go to admin backend <strong><em> -&gt; Appearance -&gt; Widgets</em></strong>', 'sp_framework'); ?></li>
        <li><?php _e('And place widgets into the <strong><em>News and Event Widget Area</em></strong>', 'sp_framework'); ?></li>
        </ul>
     </div>  
	<?php } ?>
</aside>