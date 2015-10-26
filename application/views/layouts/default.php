<!DOCTYPE html>
<html lang="en">
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <base href="<?php echo base_url().'/assets/'; ?>"/>
          <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
          <script>
               var base_url = "<?php echo site_url(); ?>";
               var controller = "<?php echo $controller; ?>";
               <?php
                 $php_array = array('abc', 'def', 'ghi');
                 $js_array = json_encode($this->uri->segment_array());
                 echo "var url_segment = " . $js_array . ";\n";
               ?>
          </script>
          <title><?php echo $template['title'] ?></title>
          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
          <link href='http://fonts.googleapis.com/css?family=PT+Sans:700,400' rel='stylesheet' type='text/css'/>
          <!-- Common js -->
          <script src="scripts/jquery-1.11.2.min.js"></script>
          <link rel="stylesheet" href="styles/jquery-ui.css">
          <!-- Common script --> 
          <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-66625155-1', 'auto');
  ga('send', 'pageview');

</script>
          <?php echo $template['metadata'] ?>
     </head>
     <body class="<?php echo $body_class ?>">
          <?php echo $template['partials']['header']; ?> 
          <?php echo $template['partials']['flash_messages'] ?>
          <?php echo $template['body'] ?>
          <?php echo $template['partials']['footer']; ?>
          <script src="scripts/jquery.meanmenu.js"></script> 
          <!-- Common js -->
          <!-- Common script -->
          <script>
               jQuery(document).ready(function () {
                    jQuery('header nav').meanmenu();
               });
          </script> 
          <script src="scripts/jquery-ui.js"></script>
     </body>
</html>