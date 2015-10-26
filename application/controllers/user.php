<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class User extends App_Controller {

       public function __construct() {
            parent::__construct();

            /* Load title, css, js etc... */
            $this->page_title = "General Tech Services LLC -". STATIC_TITLE;
            $this->page_meta_keywords = '';
            $this->page_meta_description = '';
            $this->assets_css = array('reset.css', 'header_footer.css', 'style.css',
                'meanmenu.css', 'responsiveslides.css', 'bootstrap.min.css', 'main.css', 'responsive.css', 'metro.css');
            $this->assets_js = array('jquery-1.11.2.min.js', 'responsiveslides.min.js',
                'jquery.carouFredSel-6.0.4-packed.js', 'jquery.meanmenu.js', 'bootstrap.min.js', 'my.script.min.js');
            $this->load->model('user_model');
            /* Load title, css, js etc... */
       }

       public function login() {
            $this->page_title = "Login | General Tech Services LLC -". STATIC_TITLE;
            $this->render_page(strtolower(__CLASS__) . '/login');
       }

       public function doLogin() {

            if ($this->user_model->checkLogin($this->input->post())) {
                 $this->user_model->newUserLog();  
                 echo json_encode(array('status' => 'success', 'msg' => 'The email/password combination you entered is incorrect.'));
            } else {
                 echo json_encode(array('status' => 'failed', 'msg' => 'The email/password combination you entered is incorrect.'));
            }
       }

       public function logout() {
            $this->session->unset_userdata('gtech_logged_user');
            $this->session->set_flashdata('app_success', 'Logout succefully!');
            $this->session->set_userdata('redirect_after_login', 'home');
            $this->load->library('cart');
            $this->cart->destroy();
            redirect(strtolower('home'));
       }

       function successLogin() {
            $this->session->set_flashdata('app_success', 'Login succefully!');
            $secion = $this->session->userdata('redirect_after_login');
            $this->session->set_userdata('redirect_after_login', 'home');
            if ($secion == 'checkout') {
                 redirect(strtolower('cart/checkout'));
            } elseif ($secion == 'myaccount') {
                 redirect(strtolower('user/myaccount'));
            } else {
                 redirect(strtolower('home'));
            }
       }

       public function register() {
            $this->page_title = "Register | General Tech Services LLC -". STATIC_TITLE;
            $this->render_page(strtolower(__CLASS__) . '/register');
       }

       public function doRegister() {
            if ($this->user_model->newUser($this->input->post())) {
                 $mesage = $this->load->view('user/register_template', $this->input->post(), true);
                 $this->load->library('email');
                 $config['charset'] = 'iso-8859-1';
                 $config['wordwrap'] = TRUE;
                 $config['mailtype'] = 'html';
                 $this->email->initialize($config);
                 $this->email->from(MAILID_REGISTRATION, MAIL_FROM_NAME);
                 $this->email->to($_POST['email']);
                 $this->email->reply_to('noreply@generaltech.com');
                 $this->email->subject('User Registration');
                 $this->email->message($mesage);
                 $this->email->send();
                 echo json_encode(array('status' => 'success', 'msg' => 'Registration successfully completed!'));
            } else {
                 echo json_encode(array('status' => 'failed', 'msg' => 'Registration failed!'));
            }
       }

       public function userAlreadyRegistered() {
            if ($this->user_model->getUserByEmail($this->input->post('email'))) {
                 echo 'false';
            } else {
                 echo 'true';
            }
       }

       function forgot_password() {
            $this->page_title = "Forgot Password | General Tech Services LLC -". STATIC_TITLE;
            $this->render_page(strtolower(__CLASS__) . '/forgot_password');
       }

       function doForgotPassword() {
            $email = $this->input->post('email');
            if ($email) {
                 $user = $this->user_model->getUserByEmail($email);
                 if (!empty($user)) {

                      $templateArray = array(
                          'password' => get_original_password($user['password']),
                          'email' => $email,
                          'first_name' => $user['first_name'],
                          'last_name' => $user['last_name']
                      );
                      $mesage = $this->load->view('user/register_template', $templateArray, true);

                      $this->load->library('email');
                      $config['charset'] = 'iso-8859-1';
                      $config['wordwrap'] = TRUE;
                      $config['mailtype'] = 'html';
                      $this->email->initialize($config);
                      $this->email->from(MAILID_CONTACTUS, MAIL_FROM_NAME);
                      $this->email->to($email);
                      $this->email->reply_to('noreply@generaltech.com');
                      $this->email->subject('Welcome, ' . $user['first_name'] . ' ' . $user['last_name'] . '!');
                      $this->email->message($mesage);
                      $this->email->send();
                      echo json_encode(array('status' => 'failed', 'msg' => 'Your password has been sent to email.'));
                 } else {
                      echo json_encode(array('status' => 'failed', 'msg' => 'No user associated with this email.'));
                 }
            }
       }

       public function myaccount($section = '', $addid = '') {
            
            $this->page_title = "My Account | General Tech Services LLC -". STATIC_TITLE;
            
            $this->assets_css = array('reset.css', 'header_footer.css', 'style.css',
                'meanmenu.css', 'bootstrap.min.css', 'main.css', 'responsive.css', 'myaccount.css', 'component.css', 'metro.css');

            $this->assets_js = array('jquery.validate.min.js', 'easyResponsiveTabs.js', 'my.script.min.js');
            if (check_login()) {
                 $data['logedUser'] = get_logged_user();
                 $data['addressBook'] = $this->user_model->getBillingAddressBook();
                 $data['section'] = $section;
                 $data['addid'] = $addid;
                 $data['addToEdit'] = ($addid) ? $this->user_model->getAddress($addid) : null;
                 $data['myorder'] = $this->user_model->getOrderByUser(get_logged_user('id'));
                 $this->render_page(strtolower(__CLASS__) . '/myaccount', $data);
            } else {
                 $this->session->set_flashdata('app_success', 'Please login first!');
                 $this->session->set_userdata('redirect_after_login', 'myaccount');
                 redirect(strtolower('user/login'));
            }
       }

       public function checkValidPassword() {
            if (check_login()) {
                 $old_password = $this->input->post('old_password');
                 $logedUser = $this->session->userdata('gtech_logged_user');
                 $userDetails = $this->user_model->getUser($logedUser['id']);
                 $userpass = $userDetails['password'];
                 if ($userpass == get_hashed_password($old_password)) {
                      echo 'true';
                 } else {
                      echo 'false';
                 }
            } else {
                 echo 'false';
            }
       }

       public function updateAccountInfo() {
            if (check_login()) {
                 $updateArray = array();
                 $newPassword = get_hashed_password($this->input->post('password'));
                 $oldPasswordUserEntered = get_hashed_password($this->input->post('old_password'));

                 $logedUser = $this->session->userdata('gtech_logged_user');
                 $userDetails = $this->user_model->getUser($logedUser['id']);
                 $oldPassword = $userDetails['password'];

                 if (empty($newPassword)) {
                      $updateArray = array(
                          'first_name' => $this->input->post('first_name'),
                          'last_name' => $this->input->post('last_name'),
                          'email' => $this->input->post('email')
                      );
                 } else {
                      if ($oldPasswordUserEntered == $oldPassword) {
                           $updateArray = array(
                               'first_name' => $this->input->post('first_name'),
                               'last_name' => $this->input->post('last_name'),
                               'email' => $this->input->post('email'),
                               'password' => $newPassword
                           );
                      }
                 }
                 if (!empty($updateArray)) {
                      if ($this->user_model->editUser($updateArray, $logedUser['id'])) {

                           echo json_encode(array('status' => 'success', 'msg' => 'The account information has been saved successfully'));
                      } else {
                           echo json_encode(array('status' => 'failed', 'msg' => "Can't update user information"));
                      }
                 }
            } else {
                 echo json_encode(array('status' => 'failed', 'msg' => 'Your not logged in'));
            }
       }

       function newAddress() {
            $logedUser = $this->session->userdata('gtech_logged_user');
            if ($this->user_model->addNewAddress($this->input->post(), $logedUser['id'])) {
                 $this->session->set_flashdata('app_success', 'New address added!');
                 redirect(strtolower('user/myaccount/3'));
            }
       }

       function updateAddress() {
            if ($this->user_model->updateAddress($this->input->post())) {
                 $this->session->set_flashdata('app_success', 'Address updated!');
                 redirect(strtolower('user/myaccount/3'));
            } else {
                 $this->session->set_flashdata('app_success', "Can't update address!");
                 redirect(strtolower('user/myaccount/3'));
            }
       }

       function deleteAddress() {
            $id = $this->input->post('id');
            if ($id) {
                 if ($this->user_model->deleteAddress($id)) {
                      echo json_encode(array('status' => 'success', 'msg' => 'This address deleted successfully'));
                 } else {
                      echo json_encode(array('status' => 'failed', 'msg' => "Can't delete this address"));
                 }
            }
       }
       function order_details($id) {
            $this->page_title = "Order Details | General Tech Services LLC -". STATIC_TITLE;
            if ($id) {
                 $orderInfo = $this->user_model->getOrder(get_logged_user('id'), $id);
                 $this->render_page(strtolower(__CLASS__) . '/order_details', $orderInfo);
            }
       }
  }
  