<?php

  if (!defined('BASEPATH'))
       exit('No direct script access allowed');

  class Cart extends App_Controller {

       public function __construct() {
            parent::__construct();
            $this->load->library('cart');
            $this->load->model('product_model');
            $this->load->model('user_model');
            /* Load title, css, js etc... */
            $this->page_title = "General Tech Services LLC -". STATIC_TITLE;
            $this->page_meta_keywords = '';
            $this->page_meta_description = '';
            $this->assets_css = array('reset.css', 'header_footer.css', 'style.css',
                'meanmenu.css', 'responsiveslides.css', 'bootstrap.min.css', 'main.css', 'responsive.css');
            $this->assets_js = array('jquery-1.11.2.min.js', 'responsiveslides.min.js',
                'jquery.carouFredSel-6.0.4-packed.js', 'jquery.meanmenu.js', 'bootstrap.min.js', 'my.script.min.js', 'jquery.simple.select.js');
            /* Load title, css, js etc... */
       }

       function index() {
            $this->page_title = "Cart | General Tech Services LLC -". STATIC_TITLE;
            
            $this->render_page(strtolower(__CLASS__) . '/index');
       }

       function addToCart() {

            // Set array for send data.
            $id = $this->input->post('id');
            $qty = $this->input->post('qty');
            $qty = empty($qty) ? 1 : $qty;
            $productDetails = $this->product_model->getProducts($id);
            $productDetails = isset($productDetails['product_details']['0']) ? $productDetails['product_details']['0'] : array();
            $cart_data = array(
                'id' => $id,
                'name' => $productDetails['prd_name'],
                'price' => $productDetails['prd_price'],
                'qty' => $qty,
                'product_details' => $productDetails
            );

            $this->cart->insert($cart_data);
            $count = count($this->cart->contents());
            echo json_encode(array('status' => 'success', 'msg' => $productDetails['prd_name'] . ' added to cart', 'cart_count' => $count));
            exit;
       }

       function remove($rowid) {
            // Check rowid value.
            if ($rowid === "all") {
                 // Destroy data which store in  session.
                 $this->cart->destroy();
            } else {
                 // Destroy selected rowid in session.
                 $data = array(
                     'rowid' => $rowid,
                     'qty' => 0
                 );
                 // Update cart data, after cancle.
                 $this->cart->update($data);
            }

            // This will show cancle data in cart.
            $this->session->set_flashdata('app_success', 'Product removed from cart!');
            redirect('cart');
       }

       function update_cart() {

            // Recieve post values,calcute them and update
            $cart_info = $_POST['cart'];
            foreach ($cart_info as $id => $cart) {
                 $rowid = $cart['rowid'];
                 $price = $cart['price'];
                 $amount = $price * $cart['qty'];
                 $qty = $cart['qty'];

                 $data = array(
                     'rowid' => $rowid,
                     'price' => $price,
                     'amount' => $amount,
                     'qty' => $qty
                 );

                 $this->cart->update($data);
            }
            $this->session->set_flashdata('app_success', 'Cart updated successfully!');
            redirect('cart');
       }

       function checkout($section = '') {
            
            $this->page_title = "Checkout | General Tech Services LLC -". STATIC_TITLE;
            
            $data['section'] = $section;
            $this->assets_css = array('reset.css', 'header_footer.css', 'style.css',
                'meanmenu.css', 'bootstrap.min.css', 'main.css', 'responsive.css', 'myaccount.css', 'component.css', 'metro.css');
            $this->assets_js = array('jquery.validate.min.js', 'easyResponsiveTabs.js','my.script.min.js');

            if (!check_login()) {
                 $this->session->set_flashdata('app_success', 'Please login first!');
                 $this->session->set_userdata('redirect_after_login', 'checkout');
                 redirect(strtolower('user/login'));
            } else {
                 $data['defaultBilling'] = get_logged_user();
                 $data['defaultShipping'] = get_logged_user();

                 $billingAddress = $this->user_model->getBillingAddress(get_logged_user('id'));
                 $data['billingAddress'] = $billingAddress;

                 $shippingAddress = $this->user_model->getShippingAddress(get_logged_user('id'));
                 $data['shippingAddress'] = $shippingAddress;

                 //debug($billingAddress);
                 $this->render_page(strtolower(__CLASS__) . '/checkout', $data);
            }
       }

       function newBillingAddress() {
            $_POST['is_billing_add'] = 1;
            $this->user_model->addNewAddress($this->input->post(), get_logged_user('id'));
            redirect(strtolower('cart/checkout/2'));
       }

       function billing_address() {
            $this->session->set_userdata('billing_add', $this->input->post('cmbBillingAdd'));
            redirect(strtolower('cart/checkout/2'));
       }

       function newShippingAddress() {
            $_POST['is_shipping_add'] = 1;
            $this->user_model->addNewAddress($this->input->post(), get_logged_user('id'));
            redirect(strtolower('cart/checkout/3'));
       }

       function shipping_address() {
            $this->session->set_userdata('shipping_add', $this->input->post('cmbShippingAdd'));
            redirect(strtolower('cart/checkout/3'));
       }

       function place_order() {

            $billing_add = $this->session->userdata('billing_add');
            $shipping_add = $this->session->userdata('shipping_add');

            $billingAdd = $this->user_model->getAddress($billing_add);
            $shippingAdd = $this->user_model->getAddress($shipping_add);

            $data['shippingAdd'] = $shippingAdd;
            $data['billingAdd'] = $billingAdd;
            $data['cartDetails'] = $this->cart->contents();

            $orderDetails['ord_id'] = rand(0, 99999999);
            $orderDetails['ord_user_id'] = get_logged_user('id');
            $orderDetails['ord_shipping_id'] = $shipping_add;
            $orderDetails['ord_billing_id'] = $billing_add;
            $orderDetails['ord_status'] = 1;
            $data['orderId'] = $orderDetails['ord_id'];
            $this->user_model->addNewOrder($orderDetails, $this->cart->contents());
            $mesage = $this->load->view('cart/order_template', $data, true);

            /* Mail to user */
            $this->load->library('email');
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from(MAILID_CHECKOUT, MAIL_FROM_NAME);
            $this->email->to(get_logged_user('email'));
            $this->email->reply_to('noreply@generaltech.com');
            $this->email->subject('Your Cart!');
            $this->email->message($mesage);
            $this->email->send();
            /* Mail to admin */
            $this->load->library('email');
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from(MAILID_CHECKOUT, MAIL_FROM_NAME);
            $this->email->to(MAILID_CHECKOUT);
            $this->email->reply_to('noreply@generaltech.com');
            $this->email->subject('Products Purchased');
            $this->email->message($mesage);
            $this->email->send();
            $this->cart->destroy();
            $this->session->set_flashdata('app_success', 'Your cart successfully submitted!');
            redirect('home');
       }

  }
  