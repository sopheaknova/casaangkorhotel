<?php

add_action('widgets_init', 'sp_reservation_widgets');

function sp_reservation_widgets() {
	register_widget('reservation');
	}

class reservation extends WP_Widget
{
    function reservation() 
    {
        $widget_ops = array( 
            'classname' => 'reservation-widget', 
            'description' => __( 'Arbitrary text or HTML, with a simple image above text.', 'sp_framework' )
        );

        $control_ops = array( 'id_base' => 'reservation', 'width' => 430 );

        $this->WP_Widget( 'reservation', __( 'CASA: Reservation text', 'sp_framework' ), $widget_ops, $control_ops );      
        
        wp_enqueue_style( 'thickbox' );
        wp_enqueue_script( 'thickbox' );
        wp_enqueue_script( 'media-upload' );
        add_action( 'admin_print_footer_scripts', array( &$this, 'add_script_textimage' ), 999 );
    }
    
    function add_script_textimage()
    {
        ?>   
        <script type="text/javascript">                 

            jQuery(document).ready(function($){
                             
                 $('.upload-image').live('click', function(){
                    var betterwork_this_object = $(this).prev();
                    
                    tb_show('', 'media-upload.php?post_id=0&type=image&TB_iframe=true');    
                
                    window.send_to_editor = function(html) {
                        imgurl = $('img', html).attr('src');
                        betterwork_this_object.val(imgurl);
                        
                        tb_remove();
                    }          
                    
                    return false;
                });
                
  
            });  
        </script> 
        <?php
    }
    
    function form( $instance )
    {
        global $icons_name;
        
        /* Impostazioni di default del widget */
        $defaults = array( 
            'title' => '',
            'text' => '',
			'image'	=> '',
            'autop' => false
        );
        
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
        <p>
            <label>
                <strong><?php _e( 'Title', 'sp_framework' ) ?>:</strong><br />
                <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
            </label>
        </p>                  
        <p>
            <label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" cols="20" rows="16"><?php echo $instance['text']; ?></textarea>
            </label>
        </p>
        
        <p>
            <label>
                <input type="checkbox" id="<?php echo $this->get_field_id( 'autop' ); ?>" name="<?php echo $this->get_field_name( 'autop' ); ?>" value="1"<?php if( $instance['autop'] ) echo ' checked="checked"' ?> />
                <?php _e( 'Automatically add paragraphs', 'sp_framework' ) ?>
            </label>
        </p>
        <p>
            <label><?php _e( 'Image', 'sp_framework' ) ?>:
                <input type="text" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo $instance['image']; ?>" />
                <a href="media-upload.php?type=image&TB_iframe=true" class="upload-image button-secondary">Upload</a>
            </label>
        </p>
        
        <?php
    }
    
    function widget( $args, $instance )
    {
        extract( $args );

        $title = apply_filters('widget_title', $instance['title'] );
		$link = esc_attr($instance['link']);
        
        echo $before_widget;                   
		
		if ( $title ) echo $before_title . $title . $after_title;
				
		$text = $instance['text'] . '<img src="' . sp_process_image( $instance['image'], 220, '', 1, 100 ) . '" alt="' . $instance['title'] . '" />';
		echo apply_filters( 'widget_text', $text ); 
		
        
        echo $after_widget;
    }                     

    function update( $new_instance, $old_instance ) 
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags( $new_instance['title'] );

        $instance['text'] = $new_instance['text'];
        
        $instance['image'] = $new_instance['image'];
        
        $instance['autop'] = $new_instance['autop'];

        return $instance;
    }
    
}     
?>
