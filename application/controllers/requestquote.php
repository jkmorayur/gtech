<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Requestquote extends App_Controller {

       public function __construct() {
            parent::__construct();
            /* Load title, css, js etc... */
            $this->page_title = "General Tech Services LLC -". STATIC_TITLE;
            $this->page_meta_keywords = '';
            $this->page_meta_description = '';
            $this->assets_css = array('reset.css', 'header_footer.css', 'style.css',
                'meanmenu.css', 'bootstrap.min.css', 'main.css', 'responsive.css',
                'component.css', 'metro.css', 'requesttab.css');

            $this->assets_js = array('easyResponsiveTabs.js', 'jquery.validate.min.js');
            /* Load title, css, js etc... */
       }

       function index() {
            $this->page_title = "Request Quote | General Tech Services LLC -". STATIC_TITLE;
            
            $this->render_page(strtolower(__CLASS__) . '/index');
       }

//       function processRequestquote() {
//
//            $fileData = array();
//            if (isset($_FILES['reqEquipmentList']['name']) &&
//                    !empty($_FILES['reqEquipmentList']['name'])) {
//
//                 $this->load->library('upload');
//                 $newFileName = rand(9999999, 0) . $_FILES['reqEquipmentList']['name'];
//                 $config['upload_path'] = './assets/uploads/quotes/';
//                 $config['allowed_types'] = 'gif|jpg|png';
//                 $config['file_name'] = $newFileName;
//                 $this->upload->initialize($config);
//                 if ($this->upload->do_upload('reqEquipmentList')) {
//                      $fileData = $this->upload->data();
//                 }
//            }
//
//            $coomnMethod = '';
//            $calibrationServiceOptions = '';
//            if (isset($_POST['reqCommnMethod'])) {
//                 $coomnMethod = "<tr><td>First Name</td><td>" . $_POST['reqCommnMethod'] . "</td></tr>";
//            }
//            if (isset($_POST['reqCalibServiceOptns'])) {
//                 $calibrationServiceOptions = "<tr><td>Accredited Calibration Service Options</td><td>" . $_POST['reqCalibServiceOptns'] . "</td></tr>";
//            }
//            
//            $message = "<h3>Contact information</h3><table>"
//                    . "<tr>"
//                    . "<td>First Name</td><td>" . $_POST['reqFirstname'] . "</td></tr>"
//                    . "<tr><td>Last Name</td><td>" . $_POST['reqLastname'] . "</td></tr>"
//                    . "<tr><td>Job Title</td><td>" . $_POST['reqJobTitle'] . "</td></tr>"
//                    . "<tr><td>Email</td><td>" . $_POST['reqEmail'] . "</td></tr>"
//                    . "<tr><td>Phone</td><td>" . $_POST['reqPhone'] . "</td></tr>"
//                    . "<tr><td>Company</td><td>" . $_POST['reqCompany'] . "</td></tr>"
//                    . "<tr><td>Address</td><td>" . $_POST['reqAddress'] . "</td></tr>"
//                    . "<tr><td>City</td><td>" . $_POST['reqCity'] . "</td></tr>"
//                    . "<tr><td>State</td><td>" . $_POST['reqState'] . "</td></tr>"
//                    . "<tr><td>Post Code</td><td>" . $_POST['reqPostCode'] . "</td></tr>"
//                    . "<tr><td>Country</td><td>" . $_POST['reqCountry'] . "</td></tr>"
//                    . "<tr><td>How Did You Hear About Us?</td><td>" . $_POST['reqHearAboutUs'] . "</td></tr>"
//                    . $coomnMethod . "</table><br />";
//
//            if (!empty($_POST['optionTwo'])) {
//                 $message2 = "<h3>Accredited Calibration Quick Quote</h3><table>" . $calibrationServiceOptions
//                         . "<tr><td>Comments or special instructions </td><td>" . $_POST['reqSpecialinstructions'] . "</td></tr>";
//                 foreach ($_POST['optionTwo'] as $key => $value) {
//
//                      $message2 .= "<tr><td>Quantity</td><td>" . $_POST['optionTwo'][$key]['reqOptionTwoQty'] . "</td></tr>";
//                      $message2 .= "<tr><td>Manufacturer</td><td>" . $_POST['optionTwo'][$key]['reqOptionTwoManftr'] . "</td></tr>";
//                      $message2 .= "<tr><td>Model#</td><td>" . $_POST['optionTwo'][$key]['reqOptionTwoModel'] . "</td></tr>";
//                      $message2 .= "<tr><td>Item Description</td><td>" . $_POST['optionTwo'][$key]['reqOptionTwoDesc'] . "</td></tr>";
//                      $message2 .= "<tr style='margine-bottom:10px;'><td>Cal Interval</td><td>" . $_POST['optionTwo'][$key]['reqOptionTwoCalIntvl'] . "</td></tr>";
//                 }
//                 $message2 .= "</table>";
//            }
//
//            if (!empty($_POST['prodQukQuote'])) {
//                 $message3 = "<br /><h3>Option #2</h3><table>";
//                 foreach ($_POST['prodQukQuote'] as $key => $value) {
//                      $message3 .= "<tr><td>Product Name</td><td>" . $_POST['prodQukQuote'][$key]['reqProdName'] . "</td></tr>";
//                      $message3 .= "<tr><td>Quantity</td><td>" . $_POST['prodQukQuote'][$key]['reqProdQty'] . "</td></tr>";
//                      $message3 .= "<tr><td>Brands</td><td>" . $_POST['prodQukQuote'][$key]['reqProdBrand'] . "</td></tr>";
//                      $message3 .= "<tr><td>Model #</td><td>" . $_POST['prodQukQuote'][$key]['reqProdModel'] . "</td></tr>";
//                      $message3 .= "<tr><td>Item Description</td><td>" . $_POST['prodQukQuote'][$key]['reqProdDesc'] . "</td></tr>";
//                 }
//                 $message3 .= "</table>";
//            }
//
//            $count = count($_POST['reqBrands']);
//            if ($count > 0) {
//                 $message4 = "<br /><h3>Product Quick Quote</h3><table>";
//                 for ($i = 0; $i < $count; $i++) {
//                      $message4 .= "<tr><td>Brands</td><td>" . $_POST['reqBrands'][$i] . "</td></tr>";
//                      $message4 .= "<tr><td>Model#</td><td>" . $_POST['reqModel'][$i] . "</td></tr>";
//                      $message4 .= "<tr><td>Brief description of problem</td><td>" . $_POST['reqMessage'][$i] . "</td></tr>";
//                 }
//                 $message4 .= "</table>";
//            }
//
//            $totalMsg = $message . $message2 . $message3 . $message4;
//            $this->load->library('email');
//            $config['charset'] = 'iso-8859-1';
//            $config['wordwrap'] = TRUE;
//            $config['mailtype'] = 'html';
//            $this->email->initialize($config);
//            if (isset($_FILES['reqEquipmentList']['name']) &&
//                    !empty($_FILES['reqEquipmentList']['name'])) {
//                 $this->email->attach('./assets/uploads/quotes/' . $fileData['file_name']);
//            }
//            $this->email->from('jk@webcompanyindia.com', $_POST['reqFirstname']);
//            $this->email->to('jayakrishnan@webcompanyindia.com');
//            $this->email->subject('Request Quote');
//            $this->email->message($totalMsg);
//            $this->email->send();
//            $this->session->set_flashdata('app_success', 'Quote successfully sent!');
//            redirect(strtolower(__CLASS__));
//       }
       function processRequestquote() {

            $fileData = array();
            if (isset($_FILES['reqEquipmentList']['name']) &&
                    !empty($_FILES['reqEquipmentList']['name'])) {

                 $this->load->library('upload');
                 $newFileName = rand(9999999, 0) . $_FILES['reqEquipmentList']['name'];
                 $config['upload_path'] = './assets/uploads/quotes/';
                 $config['allowed_types'] = 'gif|jpg|png';
                 $config['file_name'] = $newFileName;
                 $this->upload->initialize($config);
                 if ($this->upload->do_upload('reqEquipmentList')) {
                      $fileData = $this->upload->data();
                 }
            }

            $mesage = $this->load->view('requestquote/quote_template', $this->input->post(),true);
            $this->load->library('email');
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            if (isset($_FILES['reqEquipmentList']['name']) &&
                    !empty($_FILES['reqEquipmentList']['name'])) {
                 $this->email->attach('./assets/uploads/quotes/' . $fileData['file_name']);
            }
            $this->email->from($_POST['reqFirstname']);
            $this->email->to(MAILID_REQUESTQUOTE);
            $this->email->subject('Request Quote');
            $this->email->message($mesage);
            $this->email->send();
            $this->session->set_flashdata('app_success', 'Quote successfully sent!');
            redirect(strtolower(__CLASS__));
       }
  }
?>