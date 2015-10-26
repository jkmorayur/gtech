<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Contactus extends App_Controller {

       public function __construct() {
            parent::__construct();
       }

       public function index() {
            $this->data['valid_captcha'] = getCaptcha();
            $this->assets_css = array('reset.css', 'header_footer.css', 'style.css', 'component.css',
                'meanmenu.css', 'responsiveslides.css', 'bootstrap.min.css', 'main.css', 'responsive.css',
                'easy-responsive-tabs.css');
           
            $this->assets_js = array('my.script.min.js');
            $this->page_title = "Contact Us | General Tech Services LLC -". STATIC_TITLE;
            $this->current_section = 'contactus';
            $this->render_page(strtolower(__CLASS__) . '/index', $this->data);
       }

       public function sendmail() {
            if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
                 $message = "<table>
                 <tr>
                    <td>First Name</td>
                    <td>" . $_POST['firstname'] . "</tr>
                 </tr>
                 <tr>
                    <td>Last Name</td>
                    <td>" . $_POST['lastname'] . "</tr>
                 </tr>
                 <tr>
                    <td>Email</td>
                    <td>" . $_POST['email'] . "</tr>
                 </tr>
                 <tr>
                    <td>Phone</td>
                    <td>" . $_POST['phone'] . "</tr>
                 </tr>
                 <tr>
                    <td>Company</td>
                    <td>" . $_POST['company'] . "</tr>
                 </tr>
                 <tr>
                    <td>Subject</td>
                    <td>" . $_POST['subject'] . "</tr>
                 </tr>
                 <tr>
                    <td>Message</td>
                    <td>" . $_POST['message'] . "</tr>
                 </tr>
               </table>";
                 $this->load->library('email');
                 $config['charset'] = 'iso-8859-1';
                 $config['wordwrap'] = TRUE;
                 $config['mailtype'] = 'html';
                 $this->email->initialize($config);
                 $this->email->from(MAILID_CONTACTUS,$_POST['firstname']);
                 $this->email->to(MAILID_CONTACTUS);
                 $this->email->subject('get In touch');
                 $this->email->message($message);
                 if (@$this->email->send()) {
                      echo json_encode(array('status' => 'success', 'msg' => 'Mail sent successfully.'));
                 } else {
                      echo json_encode(array('status' => 'success', 'msg' => 'Mail sent failed.'));
                 }
            } else {
                 echo json_encode(array('status' => 'success', 'msg' => 'Captcha failed.'));
            }
            exit;
       }
       
       function newsletter() {
            
            $this->load->model('home_model');
            $email = $this->input->post('email');
            if ($this->home_model->newsletter($email)) {
                 $message = "<table>
                 <tr>
                    <td>Newsletter Sign Up</td>
                 </tr>
                 <tr>
                    <td>Email</td>
                    <td>" . $email . "</tr>
                 </tr>
               </table>";
                 $this->load->library('email');
                 $config['charset'] = 'iso-8859-1';
                 $config['wordwrap'] = TRUE;
                 $config['mailtype'] = 'html';
                 $this->email->initialize($config);
                 $this->email->from('generaltechuae.com');
                 $this->email->to(MAILID_NEWSLETTER);
                 $this->email->subject('Newsletter Sign Up');
                 $this->email->message($message);
                 $this->email->send();
                 echo json_encode(array('status' => 'success', 'msg' => 'Received newsletter'));
            } else {
                 echo json_encode(array('status' => 'fail', 'msg' => "Can't received newsletter"));
            }
            exit;
       }
  } 