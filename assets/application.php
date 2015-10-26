<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
          <title>Construction careers Fujairah, Construction careers UAE</title>
          <meta name="description" content="One of the leading construction company in Fujairah, UAE providing services in Pipeline Construction, Power Transmission Lines, Earthworks, Road Construction, & Infrastructure, Foundation Construction, Etc.." />
          <meta name="keywords" content="construction careers fujairah, construction careers uae" />
          <meta name="abstract" content="construction careers uae, construction careers fujairah" />
          <meta name="key-phrases" content="construction careers fujairah, construction careers uae" />
          <meta name="author" content="KAD Construction"/>
          <meta name="language" content="en"/>
          <meta name="copyright" content="www.kad.ae"/>
          <meta name="robots" content="index, follow"/>
          <meta name="document-classification" content="Construction works"/>
          <meta name="document-distribution" content="Global"/>
          <link rel="icon" href="images/favicon.ico" type="image/x-icon" /> 
          <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
          <link href="css/css1.css" rel="stylesheet" type="text/css" />

          <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
               <script>
                    $(function() {
                         $( ".datepicker" ).datepicker();
                    });
               </script>

               <script type="text/JavaScript">
                    <!--
                    function MM_preloadImages() { //v3.0
                         var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
                              var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
                                   if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
                         }
                         //-->
               </script>
     </head>
     <style>
          input {
               border: 1px solid #CCCCCC;
               margin-left: 0px;
          }
          .ctrl_label {
               min-width: 100px;
               float: left;
          }
          .control {

          }
     </style>
     <body>
          <div id="main">
               <div id="main_top"><img src="images/top1.jpg" alt="Sama_Qatar" width="1001" height="11" /></div>
               <div id="main_middle">
                    <div id="banner"><img src="images/banner_career.jpg" alt="Construction careers" width="989" height="334" /></div>
                    <? include('menu.php'); ?>
                    <div id="content_area">
                         <div id="text_box">
                              <?php
                                include('stmngmntfr4kad/operation.php');
                                $operation = new operation();
                                $date = $operation->getdata('kad_careers', '*');
                              ?>
                              <div style="padding-top:20px; margin-left:20px; margin-right:30px;">
                                   <span class="head">Application Form
                                        <select name="app_post">
                                             <?php if (!empty($date)) {
                                                    foreach ($date as $key => $value) {
                                                         ?>
                                                         <option <?php echo ($value['car_id'] == $_GET['id']) ? 'selected="selected"' : ''; ?> value="<?php echo $value['car_id']; ?>"><?php echo $value['car_title'] . ' ' . $value['car_ref_no']; ?></option>                                                          
       <?php }
  } ?>
                                        </select>
                                   </span>
                                   <div style="margin-top:20px; margin-bottom:15px;">
                                        <div id="webfinal-21_">
                                             <form id="form1" name="form1" method="post" action="sentresume.php" enctype="multipart/form-data">


                                                  <input type="hidden" name="career" value="<?php echo isset($_GET['career']) ? $_GET['career'] : ''; ?>" />
                                                  <table>
                                                       <tr>
                                                            <td>
                                                                 <div class="ctrl_label">Full Name*</div>
                                                            </td>
                                                            <td>
                                                                 <div class="control" style="display: table-cell;"><input required name="fullname" type="text" size="45" /></div>
                                                            </td>
                                                            <td>
                                                                 <div class="ctrl_label">Date Of Births*</div>
                                                            </td>
                                                            <td>
                                                                 <div class="control" style="display: table-cell;"><input class="datepicker" required name="dob" type="text" size="45" /></div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>
                                                                 <div class="ctrl_label">Email*</div>
                                                            </td>
                                                            <td>
                                                                 <div class="control" style="display: table-cell;"><input required name="email" type="email" size="45" /></div>
                                                            </td>
                                                            <td>
                                                                 <div class="ctrl_label">Mobile Phone*</div>
                                                            </td>
                                                            <td>
                                                                 <div class="control" style="display: table-cell;"><input required name="mobile" type="text" size="45" /></div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>
                                                                 <div class="ctrl_label">Educational Qualification*</div>
                                                            </td>
                                                            <td>
                                                                 <div class="control" style="display: table-cell;">
                                                                      <input required name="qualification" type="text" size="45" />
                                                                 </div>
                                                            </td>
                                                            <td><div class="ctrl_label">Total Year Of<br /> Experience*</div></td>
                                                            <td>
                                                                 <table>
                                                                      <tr>
                                                                           <td><div class="control" style="display: table-cell;">
                                                                      <select id="app_experience" name="app_experience" class="input_select valid">
                                                                           <option value="Please Select">Please Select</option>
                                                                           <?php for ($i = 0; $i <= 40; $i++) { ?>
                                                                                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
  <?php } ?>
                                                                      </select>
                                                                 </div></td>
                                                                           <td><div class="ctrl_label">GCC Experience</div></td>
                                                                           <td><div class="control" style="display: table-cell;">
                                                                      <select id="app_experience" name="app_gcc_experience" class="input_select valid">
                                                                           <option value="Please Select">Please Select</option>
                                                                           <?php for ($i = 0; $i <= 40; $i++) { ?>
                                                                                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
  <?php } ?>
                                                                      </select>
                                                                 </div></td>
                                                                      </tr>
                                                                 </table>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>
                                                                 <div class="ctrl_label">Present Employer</div>
                                                            </td>
                                                            <td>
                                                                 <div class="control" style="display: table-cell;">
                                                                      <textarea name="present_employer" cols="30" rows="7" class="form" style="width: 340px;"></textarea>
                                                                 </div>
                                                            </td>
                                                            <td>
                                                                 <div class="ctrl_label">Designation</div>
                                                            </td>
                                                            <td>
                                                                 <div class="control" style="display: table-cell;">
                                                                      <textarea name="designation" cols="30" rows="7" class="form" style="width: 340px;"></textarea>
                                                                 </div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>
                                                                 <div class="ctrl_label">Brief Career History</div>
                                                            </td>
                                                            <td colspan="4">
                                                                 <div class="control" style="display: table-cell;">
                                                                      <textarea style="width: 800px !important;" name="carrer_history" width="100%" rows="7"></textarea>
                                                                 </div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>
                                                                 <div class="ctrl_label">Nationality</div>
                                                            </td>
                                                            <td>
                                                                 <div class="control" style="display: table-cell;">
                                                                      <select id="app_nationality" name="app_nationality" class="input_select">
                                                                           <option selected="selected" value="">Please Choose One </option>
                                                                           <option selected="All Nationalities" value="">All Nationalities</option>
                                                                           <option value="Afghanistan">Afghanistan</option>
                                                                           <option value="Albania">Albania</option>
                                                                           <option value="Algeria">Algeria</option>
                                                                           <option value="American Samoa">American Samoa</option>
                                                                           <option value="Andorra">Andorra</option>
                                                                           <option value="Angola">Angola</option>
                                                                           <option value="Anguilla">Anguilla</option>
                                                                           <option value="Antarctica">Antarctica</option>
                                                                           <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                                           <option value="Argentina">Argentina</option>
                                                                           <option value="Armenia">Armenia</option>
                                                                           <option value="Aruba">Aruba</option>
                                                                           <option value="Australia">Australia</option>
                                                                           <option value="Austria">Austria</option>
                                                                           <option value="Azerbaijan">Azerbaijan</option>
                                                                           <option value="Bahamas">Bahamas</option>
                                                                           <option value="Bahrain">Bahrain</option>
                                                                           <option value="Bangladesh">Bangladesh</option>
                                                                           <option value="Barbados">Barbados</option>
                                                                           <option value="Belarus">Belarus</option>
                                                                           <option value="Belgium">Belgium</option>
                                                                           <option value="Belize">Belize</option>
                                                                           <option value="Benin">Benin</option>
                                                                           <option value="Bermuda">Bermuda</option>
                                                                           <option value="Bhutan">Bhutan</option>
                                                                           <option value="Bolivia">Bolivia</option>
                                                                           <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                                                           <option value="Botswana">Botswana</option>
                                                                           <option value="Bouvet Island">Bouvet Island</option>
                                                                           <option value="Brazil">Brazil</option>
                                                                           <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                                           <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                                           <option value="Bulgaria">Bulgaria</option>
                                                                           <option value="Burkina Faso">Burkina Faso</option>
                                                                           <option value="Burundi">Burundi</option>
                                                                           <option value="Cambodia">Cambodia</option>
                                                                           <option value="Cameroon">Cameroon</option>
                                                                           <option value="Canada">Canada</option>
                                                                           <option value="Cape Verde">Cape Verde</option>
                                                                           <option value="Cayman Islands">Cayman Islands</option>
                                                                           <option value="Central African Republic">Central African Republic</option>
                                                                           <option value="Chad">Chad</option>
                                                                           <option value="Chile">Chile</option>
                                                                           <option value="China">China</option>
                                                                           <option value="Christmas Island">Christmas Island</option>
                                                                           <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                                           <option value="Colombia">Colombia</option>
                                                                           <option value="Comoros">Comoros</option>
                                                                           <option value="Congo">Congo</option>
                                                                           <option value="Congo">Congo The Democratic Republic Of The</option>
                                                                           <option value="Cook Islands">Cook Islands</option>
                                                                           <option value="Costa Rica">Costa Rica</option>
                                                                           <option value="Croatia (local name: Hrvatska)">Croatia (local name: Hrvatska)</option>
                                                                           <option value="Cuba">Cuba</option>
                                                                           <option value="Cyprus">Cyprus</option>
                                                                           <option value="Czech Republic">Czech Republic</option>
                                                                           <option value="Denmark">Denmark</option>
                                                                           <option value="Djibouti">Djibouti</option>
                                                                           <option value="Dominica">Dominica</option>
                                                                           <option value="Dominican Republic">Dominican Republic</option>
                                                                           <option value="East Timor">East Timor</option>
                                                                           <option value="Ecuador">Ecuador</option>
                                                                           <option value="Egypt">Egypt</option>
                                                                           <option value="El Salvador">El Salvador</option>
                                                                           <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                           <option value="Eritrea">Eritrea</option>
                                                                           <option value="Estonia">Estonia</option>
                                                                           <option value="Ethiopia">Ethiopia</option>
                                                                           <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                                           <option value="Faroe Islands">Faroe Islands</option>
                                                                           <option value="Fiji">Fiji</option>
                                                                           <option value="Finland">Finland</option>
                                                                           <option value="France">France</option>
                                                                           <option value="France Metropolitan">France Metropolitan</option>
                                                                           <option value="French Guiana">French Guiana</option>
                                                                           <option value="French Polynesia">French Polynesia</option>
                                                                           <option value="French Southern Territories">French Southern Territories</option>
                                                                           <option value="Gabon">Gabon</option>
                                                                           <option value="Gambia">Gambia</option>
                                                                           <option value="Georgia">Georgia</option>
                                                                           <option value="Germany">Germany</option>
                                                                           <option value="Ghana">Ghana</option>
                                                                           <option value="Gibraltar">Gibraltar</option>
                                                                           <option value="Greece">Greece</option>
                                                                           <option value="Greenland">Greenland</option>
                                                                           <option value="Grenada">Grenada</option>
                                                                           <option value="Guadeloupe">Guadeloupe</option>
                                                                           <option value="Guam">Guam</option>
                                                                           <option value="Guatemala">Guatemala</option>
                                                                           <option value="Guinea">Guinea</option>
                                                                           <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                                           <option value="Guyana">Guyana</option>
                                                                           <option value="Haiti">Haiti</option>
                                                                           <option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
                                                                           <option value="Honduras">Honduras</option>
                                                                           <option value="Hong Kong">Hong Kong</option>
                                                                           <option value="Hungary">Hungary</option>
                                                                           <option value="Iceland">Iceland</option>
                                                                           <option value="India">India</option>
                                                                           <option value="Indonesia">Indonesia</option>
                                                                           <option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
                                                                           <option value="Iraq">Iraq</option>
                                                                           <option value="Ireland">Ireland</option>
                                                                           <option value="Israel">Israel</option>
                                                                           <option value="Italy">Italy</option>
                                                                           <option value="Jamaica">Jamaica</option>
                                                                           <option value="Japan">Japan</option>
                                                                           <option value="Jordan">Jordan</option>
                                                                           <option value="Kazakhstan">Kazakhstan</option>
                                                                           <option value="Kenya">Kenya</option>
                                                                           <option value="Kiribati">Kiribati</option>
                                                                           <option value="Kuwait">Kuwait</option>
                                                                           <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                           <option value="Latvia">Latvia</option>
                                                                           <option value="Lebanon">Lebanon</option>
                                                                           <option value="Lesotho">Lesotho</option>
                                                                           <option value="Liberia">Liberia</option>
                                                                           <option value="Libyan ARAb Jamahiriya">Libyan ARAb Jamahiriya</option>
                                                                           <option value="Liechtenstein">Liechtenstein</option>
                                                                           <option value="Lithuania">Lithuania</option>
                                                                           <option value="Luxembourg">Luxembourg</option>
                                                                           <option value="Macao">Macao</option>
                                                                           <option value="Macedonia">Macedonia</option>
                                                                           <option value="Madagascar">Madagascar</option>
                                                                           <option value="Malawi">Malawi</option>
                                                                           <option value="Malaysia">Malaysia</option>
                                                                           <option value="Maldives">Maldives</option>
                                                                           <option value="Mali">Mali</option>
                                                                           <option value="Malta">Malta</option>
                                                                           <option value="Marshall Islands">Marshall Islands</option>
                                                                           <option value="Martinique">Martinique</option>
                                                                           <option value="Mauritania">Mauritania</option>
                                                                           <option value="Mauritius">Mauritius</option>
                                                                           <option value="Mayotte">Mayotte</option>
                                                                           <option value="Mexico">Mexico</option>
                                                                           <option value="Micronesia">Micronesia</option>
                                                                           <option value="Moldova">Moldova</option>
                                                                           <option value="Monaco">Monaco</option>
                                                                           <option value="Mongolia">Mongolia</option>
                                                                           <option value="Montserrat">Montserrat</option>
                                                                           <option value="Morocco">Morocco</option>
                                                                           <option value="Mozambique">Mozambique</option>
                                                                           <option value="Myanmar">Myanmar</option>
                                                                           <option value="Namibia">Namibia</option>
                                                                           <option value="Nauru">Nauru</option>
                                                                           <option value="Nepal">Nepal</option>
                                                                           <option value="Netherlands">Netherlands</option>
                                                                           <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                                           <option value="New Caledonia">New Caledonia</option>
                                                                           <option value="New Zealand">New Zealand</option>
                                                                           <option value="NicARAgua">NicARAgua</option>
                                                                           <option value="Niger">Niger</option>
                                                                           <option value="Nigeria">Nigeria</option>
                                                                           <option value="Niue">Niue</option>
                                                                           <option value="Norfolk Island">Norfolk Island</option>
                                                                           <option value="North Korea">North Korea</option>
                                                                           <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                                           <option value="Norway">Norway</option>
                                                                           <option value="Oman">Oman</option>
                                                                           <option value="Other Country">Other Country</option>
                                                                           <option value="Pakistan">Pakistan</option>
                                                                           <option value="Palau">Palau</option>
                                                                           <option value="Panama">Panama</option>
                                                                           <option value="Papua New Guinea">Papua New Guinea</option>
                                                                           <option value="PARAguay">PARAguay</option>
                                                                           <option value="Peru">Peru</option>
                                                                           <option value="Philippines">Philippines</option>
                                                                           <option value="Pitcairn">Pitcairn</option>
                                                                           <option value="Poland">Poland</option>
                                                                           <option value="Portugal">Portugal</option>
                                                                           <option value="Puerto Rico">Puerto Rico</option>
                                                                           <option value="Qatar">Qatar</option>
                                                                           <option value="Reunion">Reunion</option>
                                                                           <option value="Romania">Romania</option>
                                                                           <option value="Russian Federation">Russian Federation</option>
                                                                           <option value="Rwanda">Rwanda</option>
                                                                           <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                                           <option value="Saint Lucia">Saint Lucia</option>
                                                                           <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                                           <option value="Samoa">Samoa</option>
                                                                           <option value="San Marino">San Marino</option>
                                                                           <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                                           <option value="Saudi ARAbia">Saudi ARAbia</option>
                                                                           <option value="Senegal">Senegal</option>
                                                                           <option value="Seychelles">Seychelles</option>
                                                                           <option value="Sierra Leone">Sierra Leone</option>
                                                                           <option value="Singapore">Singapore</option>
                                                                           <option value="Slovakia (Slovak Republic)">Slovakia (Slovak Republic)</option>
                                                                           <option value="Slovenia">Slovenia</option>
                                                                           <option value="Solomon Islands">Solomon Islands</option>
                                                                           <option value="Somalia">Somalia</option>
                                                                           <option value="South Africa">South Africa</option>
                                                                           <option value="South Korea">South Korea</option>
                                                                           <option value="Spain">Spain</option>
                                                                           <option value="Sri Lanka">Sri Lanka</option>
                                                                           <option value="St. Helena">St. Helena</option>
                                                                           <option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
                                                                           <option value="Sudan">Sudan</option>
                                                                           <option value="Suriname">Suriname</option>
                                                                           <option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
                                                                           <option value="Swaziland">Swaziland</option>
                                                                           <option value="Sweden">Sweden</option>
                                                                           <option value="Switzerland">Switzerland</option>
                                                                           <option value="Syrian ARAb Republic">Syrian ARAb Republic</option>
                                                                           <option value="Taiwan">Taiwan</option>
                                                                           <option value="Tajikistan">Tajikistan</option>
                                                                           <option value="Tanzania">Tanzania</option>
                                                                           <option value="Thailand">Thailand</option>
                                                                           <option value="Togo">Togo</option>
                                                                           <option value="Tokelau">Tokelau</option>
                                                                           <option value="Tonga">Tonga</option>
                                                                           <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                                           <option value="Tunisia">Tunisia</option>
                                                                           <option value="Turkey">Turkey</option>
                                                                           <option value="Turkmenistan">Turkmenistan</option>
                                                                           <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                                           <option value="Tuvalu">Tuvalu</option>
                                                                           <option value="Uganda">Uganda</option>
                                                                           <option value="Ukraine">Ukraine</option>
                                                                           <option value="United Arab Emirates">United Arab Emirates</option>
                                                                           <option value="United Kingdom">United Kingdom</option>
                                                                           <option value="United States">United States</option>
                                                                           <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                                           <option value="Uruguay">Uruguay</option>
                                                                           <option value="Uzbekistan">Uzbekistan</option>
                                                                           <option value="Vanuatu">Vanuatu</option>
                                                                           <option value="Vatican City State (Holy See)">Vatican City State (Holy See)</option>
                                                                           <option value="Venezuela">Venezuela</option>
                                                                           <option value="Vietnam">Vietnam</option>
                                                                           <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                                           <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
                                                                           <option value="Wallis And Futuna Islands">Wallis And Futuna Islands</option>
                                                                           <option value="Western SahARA">Western SahARA</option>
                                                                           <option value="Yemen">Yemen</option>
                                                                           <option value="Yugoslavia">Yugoslavia</option>
                                                                           <option value="Zambia">Zambia</option>
                                                                           <option value="Zimbabwe">Zimbabwe</option>
                                                                      </select>
                                                                 </div>
                                                            </td>
                                                            <td>
                                                                 <div class="ctrl_label">Visa Status*</div>     
                                                            </td>
                                                            <td>
                                                                 <div class="control" style="display: table-cell;">
                                                                      <select id="visa_status" name="visa_status" class="input_select">
                                                                           <option value="Employment Visa">Employment Visa</option>
                                                                           <option avlue="Free Zone Visa">Free Zone Visa</option>
                                                                           <option avlue="Tourist Visa">Tourist Visa</option>
                                                                           <option avlue="Visit Visa">Visit Visa</option>
                                                                           <option avlue="Mission Visa">Mission Visa</option>
                                                                           <option avlue="Business Visa">Business Visa</option>
                                                                           <option avlue="Spouse Sponsor Ship">Spouse Sponsor Ship</option>
                                                                           <option avlue="Other Visa">Other Visa</option>
                                                                           <option value="Not Applicable">Not Applicable</option>
                                                                      </select>
                                                                 </div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>
                                                                 <div class="ctrl_label">Present Salary</div>     
                                                            </td>
                                                            <td>
                                                                 <div style="display: table-cell;"><input required type="text" name="presentSalary" /></div>
                                                            </td>
                                                            <td>
                                                                 <div class="ctrl_label">Notice Period (Availability)*</div>     
                                                            </td>
                                                            <td>
                                                                 <select id="notice_period" name="notice_period" class="input_select">
                                                                      <option value="Immediately">Immediately</option>
                                                                      <option avlue="15 days">15 days</option>
                                                                      <option value="30 Days">30 Days</option>
                                                                      <option value="45 days">45 days</option>
                                                                      <option value="60 Days">60 Days</option>
                                                                      <option value="75 days">75 days</option>
                                                                      <option value="90 days">90 days</option>
                                                                 </select>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>
                                                                 <div class="ctrl_label">Attach CV*</div>     
                                                            </td>
                                                            <td>
                                                                 <div style="display: table-cell;"><input required type="file" name="cv" /></div>
                                                            </td>
                                                            <td>
                                                                 <div class="ctrl_label">Attach Resent Photo</div>     
                                                            </td>
                                                            <td>
                                                                 <div style="display: table-cell;"><input required type="file" name="photo" /></div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>
                                                                 Enter captcha
                                                            </td>
                                                            <td>
<?php $captcha = rand(0, 99999); ?> 
                                                                 <strong><?php echo $captcha; ?></strong>
                                                                 <input type="hidden" name="valid_captcha" id="valid_captcha" value="<?php echo $captcha; ?>" />
                                                                 <input type="text" name="user_captcha" id="user_captcha" value="" />
                                                            </td>
                                                            <script type = "text/javascript" >
                                                                      window.onload = function () {
                                                                           document.getElementById("valid_captcha").onchange = validatePassword;
                                                                           document.getElementById("user_captcha").onchange = validatePassword;
                                                                      }
                                                                      function validatePassword() {
                                                                           var pass2 = document.getElementById("user_captcha").value;
                                                                           var pass1 = document.getElementById("valid_captcha").value;
                                                                           if (pass1 != pass2)
                                                                                document.getElementById("user_captcha").setCustomValidity("Not valid captcha");
                                                                           else
                                                                                document.getElementById("user_captcha").setCustomValidity('');
                                                                           //empty string means no validation error
                                                                      }
                                                            </script>
                                                       </tr>
                                                       <tr>
                                                            <td>

                                                            </td>
                                                            <td>
                                                                 <input type="submit" value="Submit" />
                                                            </td>
                                                       </tr>
                                                  </table>
                                             </form>                  
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>

<?php include('footer.php'); ?>

          </div>
          <div id="footer">
               <table width="1001" border="0" align="left" cellpadding="0" cellspacing="0">
                    <tr>
                         <td align="center" valign="middle">&nbsp;</td>
                    </tr>
                    <tr>
                         <td align="center" valign="middle" class="footer_link">&nbsp;</td>
                    </tr>
               </table>
               <br />
               <br />
          </div>
          </div>
          </div>
     </body>
</html>