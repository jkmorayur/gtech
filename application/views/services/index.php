<style>
     .scrollToTop{
          width:45px; 
          height:45px;
          text-align:center; 
          background: whiteSmoke;
          font-weight: bold;
          color: #444;
          text-decoration: none;
          position:fixed;
          bottom:40px;
          right:20px;
          text-indent:9999;
          background:url(images/arrow_up.png) no-repeat;
          opacity: 0.6;
          filter: alpha(opacity=60);
     }
     .scrollToTop:hover{
          text-decoration:none;
          opacity: 0.9;
          filter: alpha(opacity=90);
     }
</style>
<!--CONTACT-->
<div id="sectionb_wrapper">
     <div id="sectionb_inner" style="min-height: 50px;">
          <div id="inner_breadcombmenu">
               <ul>
                    <li><a href="<?php echo site_url(); ?>"> Home &raquo; </a></li>
                    <li><a href="javascript:void(0);" style="color:#d92523;"> Service</a></li>
               </ul>
          </div><!--inner_breadcombmenu-->
          <div style="clear:both"></div>
     </div><!--sectionb_inner-->
</div><!--sectionb_wrapper-->

<!--INNER-->
<div id="contentmatter_wrapper">
     <div id="contentmatter_inner">
          <h1 id="service1">Dimensional Inspection</h1>
          <span> A closer look: verifying dimensional accuracy </span>
          <p>Dimensional inspection, also called dimensional metrology, assesses the geometric characteristics of parts and products to assure their compliance with design specifications. Dimensional inspection verifies the accuracy of product features that can affect reliability and functionality, and can be a critical step during product development or following production.</p>
          <span> The Dimensional Inspection Process </span>
          <img src="images/services_1.jpg" alt="" class="serviceimage"  >
          <p> For the highest degree of accuracy, we minimise factors that contribute to measurement uncertainty. Dimensional inspection services are performed in our environmentally controlled laboratory under regulated temperature and humidity conditions.</p>
          <p>Our dimensional metrology inspectors are thoroughly trained to interpret customer prints and use CMM inspection services and technology for timely, reliable and repeatable dimensional inspection measurements. We use Mitutoyo's CMM for our measurement for products of sizes up to 500x400x400 mm.</p>
          <p>We at GCLC perform dimensional inspection on surface and specialty features of machined parts and products, including internal and external fastener threads. First article inspection and third-party dimensional metrology services are performed according to NAS, MS and ANSI specifications. Our dimensional inspection and measurement capabilities are accredited to ISO/IEC 17025 by DAC (Dubai Accreditation Centre). All of the instrumentation used in the dimensional metrology lab is traceable to NIST (National Institute of Standards and Technology).</p>
          <div style=" float:left;width:100%; margin-top:50px;">
               <h1 id="service2">Valve Testing</h1>
               <img src="images/services_2.jpg" alt="" class="serviceimageb"  >
               <p>Pressure safety valves are installed on process equipment to release excess pressure resulting from faulty process operations. Simply said, the safety valve   , exchangers, boilers and/or any other equipment.</p> 
               <p>It is essential to maintain pressure safety valves and relief valves in good condition. Periodic testing is one of the most important elements of ensuring that the safety valves will provide this important protection. </p>
               <p>The most desirable type of test is one that subjects the pressure relief valve to the full operating conditions that it is designed to endure in practice. Our system enables you to test your spring operated safety valves on site without interrupting the process operation. With this so called 'hot testing' the safety valve stays on-line and no dismantling of the valve or plant shut-down is required. </p>
          </div>

          <div style=" float:left;width:100%; margin-top:50px;">
               <h1 id="service3">Repairs</h1>

               <img src="images/services_4.jpg" alt="" class="serviceimage"  >
               <p>Equipment's usually have a life cycle and sometimes can fail unexpectedly. Having to purchase a replacement can be a costly investment and we understand this hassle. </p>
               <p>At General tech, using our extensive knowledge of calibration, servicing and repair - we are capable of addressing your needs. All repairs carried out are performed by highly technical and capable engineers and is thoroughly tested before dispatch. </p>
               <p>Some of the items we repair include Oven, Furnace, Compression machine, Multimeter, Weigh balance and Dimensional instrument.</p>  
          </div>

          <div style=" float:left;width:100%; margin-top:50px;">
               <h1 id="service4">Authorised Service and Calibration Center</h1>
               <img src="images/services_3.jpg" alt="" class="serviceimageb"  >
               <p> General tech services is the authorised service and calibration center for WIKA DH Budenberg and HIOKI. Capable of repairing and servicing pressure gauges, dead weight testers and more, we are the only 17025 accredited calibration laboratory in UAE that is certified to issue 17025 calibration certificates for dead weight testers. </p>
               <p>Having been audited and thoroughly tested as per the Japanese standards, we are also the authorised service center for HIOKI electrical products. We are authorised to service, repair and calibrate HIOKI products. </p>
          </div>
          <!--<a href="#headertop_wrapper" class="scrollToTop"></a>-->
          <a source="headertop_wrapper" class="smoothscroll scrollToTop" href="javascript:void(0);"></a>
          <div style="clear:both"></div>
     </div><!--contentmatter_inner-->
</div><!--contentmatter_wrapper-->


<script src="scripts/jquery.smooth-scroll.js"></script>
<script src="scripts/jquery.ba-bbq.js"></script>
<script>
     $(document).ready(function () {

          $(document).on('click', 'a[href*="#"]', function () {
               var slashedHash = '#/' + this.hash.slice(1);
               if (this.hash) {

                    if (slashedHash === location.hash) {
                         $.smoothScroll({scrollTarget: this.hash});
                    } else {
                         $.bbq.pushState(slashedHash);
                    }
                    return false;
               }
          });

          $(window).bind('hashchange', function (event) {
               var tgt = location.hash.replace(/^#\/?/, '');
               if (document.getElementById(tgt)) {
                    $.smoothScroll({scrollTarget: '#' + tgt});
               }
          });

          $(window).trigger('hashchange');
     });
</script>