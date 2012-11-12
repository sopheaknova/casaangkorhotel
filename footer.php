  <?php global $data;?>
  <footer id="footer">
   <nav class="nav-footer">
    <div class="inner">
        <?php echo sp_framework_footer_navigation(); ?>
    </div>
    </nav>
    
   <div class="inner"> 
    <div class="copy-right">
        &copy;&nbsp;<?php echo $data['copyrights'];?>
    </div><!--/#End of copy right-->
    <div class="social">
       <?php echo $data['facebook_link'] == ''? '' : "<a href='". $data['facebook_link']."'><img src='". $data['facebook_logo']."' title='".'facebook'."' /></a>";?>
       <?php echo $data['tripadvisor_link'] == ''? '' : "<a href='". $data['tripadvisor_link']."'><img src='". $data['tripadvisor_logo']."' title='".'tripadvisor'."' /></a>";?>
       <?php echo $data['agoda_link'] == ''? '' : "<a href='". $data['agoda_link']."'><img src='". $data['agoda_logo']."' title='".'agoda'."' /></a>";?>
       <?php echo $data['expedia_link'] == ''? '' : "<a href='". $data['expedia_link']."'><img src='". $data['expedia_logo']."' title='".'expedia.cumumy'."' /></a>";?>
    
    </div><!--/#End of Social Network-->
    </div>
  </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>