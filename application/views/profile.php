<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view('includes/header'); ?>
<body>

  <?php $this->load->view('includes/nav'); ?>
  <?php $data = $this->User_model->get_user($_SESSION['user']['uid']); ?>
   <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?= base_url('assets/')?>images/serveathome.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <h1> Profile </h1>
                <p class="mb-0"> Manage Your Profile </p>
              </div>  
            </div>

            
          </div>
        </div>
      </div>
    </div>  
     <!-- <div class="site-section"> -->

      <!-- <h2 class="container text-black"> Profile </h1> -->
      <div class="container" style="padding-bottom: 40px;"> 
        <div class="row mt-5">
          <div class="col-md-4" >
            <div class="mb-8 container"style="background-color: white; box-shadow:  0px 0px 3px grey;"><br>
              <div class="border-bottom">
              <h3 class="h5 text-black"><i class="fa fa-user-circle-o text-black"  aria-hidden="true"></i>  Hello
                <?php $user = $this->User_model->get_user($this->session->userdata('user')['uid']); echo $user[0]['name'];?> </h3><br>
              </div>
              <div class="border-bottom" style="padding-top: 20px;">
                 <h5 class=" pl-4" style="padding-bottom: 20px;">
                    <i class="fa fa-list" style="color: #4287f5;" aria-hidden="true"></i>  
                    <a href="<?=base_url('orders')?>">
                      <b>My Orders</b><i class="fa fa-angle-right" style="float: right; padding-right: 20px;"></i>
                    </a>
                  </h5>
              </div>
              <div class="border-bottom">
              <h5 class="pl-4" style="padding-top: 20px;"><i class="fa fa-user" style="color: #4287f5;" aria-hidden="true"></i> <b class="text-primary">  Account Settings</b></h5>
                <div class="container">
                  <ul>
                    <li class="text-black profile-s-list" id="edit">Personal Information</li>
                    <li class="text-black profile-s-list" id="manageAddress">Manage Address</li>
                   <!--  <li class="text-black profile-s-list" >Pan Card Information</li> -->
                  </ul>
                </div>
              </div>               
           
              <div class="border-bottom">
                <h5 class="pl-4" style="padding-top: 20px;">
                  <i class="fa fa-cogs" style="color: #4287f5;" aria-hidden="true"></i>
                  
                    <b class="text-primary">MY STUFF</b><i class="fa fa-angle-right" style="float: right; padding-right: 20px;"></i>
                 
                </h5>
                <div class="container">
                  <ul>
                    <li class="text-black profile-s-list" id="myCoupan">My Coupans</li>
                    <!-- <li class="text-black profile-s-list" id="">Wallet</li> -->
                    <!-- <li class="text-black profile-s-list" ></li> -->
                  </ul>
                </div>
              </div>
              <div class="border-bottom" style="padding-top: 20px;">
                 <h5 class=" pl-4" style="padding-bottom: 20px;">
                    <i class="fas fa-power-off" style="color: #808080;" aria-hidden="true"></i>  
                    <a href="#">
                      <b style="color: #808080;">Logout</b>
                    </a>
                  </h5>
              </div>
            </div>
          </div>
           <div id="pro" class="col-md-8 container" style="background-color: white; z-index: 1; box-shadow:  0px 0px 3px grey;">
            <form action="<?=base_url("editprofile");?>" method="post" class="p-5 bg-white">
                 <?php 

                      foreach($data as $value){
                          $name=$value['name'];
                          $email=$value['email'];
                          $dob=$value['dob']; 
                          $contact=$value['contact'];
                          $gender=$value['gender'];
                               
                        }?>
                <h3 class="h5 text-black mb-3 border-bottom" style="padding-bottom: 10px;"><i
                  aria-hidden="true"></i> <b><font face="times new roman" size="5">Personal Details</font></b>
                  <b class="pull-right"><font face="times new roman" size="4">Wallet Balance: ₹ <?=$value['wallet'];?></font></b></h3><br>

                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="fname"><b>Full Name</b></label>
                    <span class="editLabel" id="editName">edit</span>
                    <input type="text" id="fname"  name="name" value="<?php if(isset($name)) echo $name;?>"class="form-control" readonly>
                    <span class="text-danger" style="font-size: 12px;"> <?=form_error('name')?></span>
                  </div>
                </div>

                <div class="row form-group">
                  
                  <div class="col-md-6">
                    <label class="text-black" for="email"><b>Email</b></label> 
                    <span class="editLabel" id="editPassword" data-toggle="modal" data-target="#changePassword">change Password</span>
                    <!-- <span class="editLabel" id="editEmail">edit</span> -->
                    <input type="text" id="email" name="email" value="<?php if(isset($email)) echo $email;?>"class="form-control" readonly>
                  </div>
               
                  <div class="col-md-6">
                    <label class="text-black" for="message"><b>Contact Number</b></label> 
                    <span class="editLabel" id="editPhone">edit</span>
                    <input type="text" id="phone"  name="contact" 
                    value="<?php $set = set_value('contact'); if(isset($set)) echo set_value('contact'); if(isset($contact) && $set=='') echo $contact;?>"class="form-control" readonly>
                    <span class="text-danger" style="font-size: 12px;"> <?=form_error('contact')?></span>
                  </div>
                </div>

                <?php $sh=1; if(isset($show)) $sh = $show; ?>

                <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="message"><b>Gender</b></label> 
                  <span class="editLabel" id="editGender">edit</span>
                   <select id="gender" name="gender" class="form-control" disabled="disabled">
                     <option value="Male" <?php if(isset($gender) && $gender=='Male'){ ?> selected="selected"<?php }?>>Male</option>
                     <option value="Female" <?php if(isset($gender) && $gender=='Female'){ ?> selected="selected"<?php } ?>>Female</option>
                   </select>
                   <input type="hidden" name="show" id="show" value="<?=$sh?>">
                </div>
                  
                  <div class="col-md-6">
                    <label class="text-black" for="subject"><b>Date Of Brith</b></label>
                    <span class="editLabel" id="editDOB">edit</span>
                    <input type="date" id="dob"  name="dob" value="<?php if(isset($dob)) echo $dob;?>" class="form-control" readonly>
                  </div>
                </div>

              <div class="row form-group" id="update">
                <div class="col-md-12">
                  <input type="submit" value="Update" class="btn btn-primary py-2 px-4 text-white" readonly="">
                </div>
              </div>
            </form>
          </div>
         <div id="addressDiv" class="col-md-8 container" style="background-color: white; z-index: -1; box-shadow:  0px 0px 3px grey;">
              <form action="<?=base_url('addNewAdderss')?>" method="post" class="p-5 bg-white">
                 <h3 class="h5 text-black mb-3 border-bottom" style="padding-bottom: 10px;"><i
                  aria-hidden="true"></i> <b><font face="times new roman" size="5">Manage address</h3></font></b><br>
                <!--  <div class="row form-group">
                    <div class="col-md-12">
                      <p id="bntAddNew" class="form-control btn btn-outline-primary text-left">+ Add new Address </p>
                    </div>
                  </div> -->
                  <?php $s=0; $address = $this->User_model->get_useraddress($user[0]['uid']); 
                    if(count($address)>0){ $s=1;
                      $getState = $this->Common_model->get_state_by_city($address[0]['cityid']); }
                  ?>
                  <div id="newAddress">
                    <div class="row form-group">
                      <div class="col-md-6">
                        <label class="text-black" for="address"><b>Address</b></label>
                        <textarea class="form-control" id="address"  name="address" rows="2"><?php if($s==1) echo $address[0]['address'];?></textarea>
                        <span class="text-danger" style="font-size: 12px;"> <?=form_error('address')?></span>
                      </div>
                       <div class="col-md-6">
                        <label class="text-black" for="pincode"><b>Pincode</b></label>
                        <input type="text" name="pincode" id="pincode" class="form-control" value="<?php if($s==1) echo $address[0]['pincode'];?>" placeholder="eg. 123456" maxlength="6">
                        <span class="text-danger" style="font-size: 12px;"> <?=form_error('pincode')?></span>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col-md-6">
                        <label class="text-black" for="locality"><b>Locality</b></label>
                        <input type="text" name="locality" id="locality" class="form-control" value="<?php if($s==1) echo $address[0]['locality'];?>" placeholder="colony/street">
                        <span class="text-danger" style="font-size: 12px;"> <?=form_error('locality')?></span>
                      </div>
                       <div class="col-md-6">
                        <label class="text-black" for="landmark"><b>Landmark</b></label>
                        <input type="text" name="landmark" id="landmark" class="form-control" value="<?php if($s==1) echo $address[0]['landmark'];?>" placeholder=" landmark">
                        <span class="text-danger" style="font-size: 12px;"> <?=form_error('landmark')?></span>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6">
                        <label class="text-black" for="state"><b>State</b></label>
                        <select class="form-control" name="state">
                          <option>--Select State--</option>
                          <?php $state=$this->Common_model->get_state();
                            foreach($state as $st):
                              if($getState[0]['stateid'] == $st['stateid']){?>
                                <option value="<?=$st['stateid']?>" selected ><?=$st['state_name']?></option>
                              <?php } else { ?>
                                <option value="<?=$st['stateid']?>"><?=$st['state_name']?></option>
                              <?php } ?> 
                            <?php endforeach; ?>
                        </select>
                        <span class="text-danger" style="font-size: 12px;"> <?=form_error('state')?></span>
                      </div>
                       <div class="col-md-6">
                        <label class="text-black" for="city"><b>City</b></label>
                        <select class="form-control" name="city">
                          <option value="">--Select City--</option>
                           <?php $city=$this->Common_model->get_city(1);
                            foreach($city as $ct):
                              if($ct['cityid'] == $address[0]['cityid']){ ?>
                                <option value="<?=$ct['cityid']?>" selected><?=$ct['city_name']?></option> 
                              <?php } else { ?>
                                <option value="<?=$ct['cityid']?>"><?=$ct['city_name']?></option>

                            <?php } endforeach; ?>
                        </select>
                        <span class="text-danger" style="font-size: 12px;"> <?=form_error('city')?></span>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col-md-4">
                        <input type="submit" name="save" id="save" value="Save" class="btn btn-primary form-control">
                      </div>
                      <!-- <div class="col-md-4">
                        <input type="reset" name="Cancle" id="cancle" value="Cancle" class="btn btn-info form-control">
                      </div> -->
                    </div>
                  </div>
                  
                 <!--   <div id="editAddress">
                    <div class="row form-group">
                      <div class="col-md-6">
                        <label class="text-black" for="address"><b>Address</b></label>
                        <textarea class="form-control" id="Eaddress" name="Eaddress" rows="2"></textarea>
                        <span class="text-danger" style="font-size: 12px;"> <?=form_error('address')?></span>
                      </div>
                       <div class="col-md-6">
                        <label class="text-black" for="pincode"><b>Pincode</b></label>
                        <input type="text" name="Epincode" id="Epincode" class="form-control" value="<?=set_value('pincode')?>" placeholder="eg. 123456" maxlength="6">
                        <span class="text-danger" style="font-size: 12px;"> <?=form_error('pincode')?></span>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col-md-6">
                        <label class="text-black" for="locality"><b>Locality</b></label>
                        <input type="text" name="Elocality" id="Elocality" class="form-control" value="<?=set_value('locality')?>" placeholder="colony/street">
                        <span class="text-danger" style="font-size: 12px;"> <?=form_error('locality')?></span>
                      </div>
                       <div class="col-md-6">
                        <label class="text-black" for="landmark"><b>Landmark</b></label>
                        <input type="text" name="Elandmark" id="Elandmark" class="form-control" value="<?=set_value('landmark')?>" placeholder=" landmark">
                        <span class="text-danger" style="font-size: 12px;"> <?=form_error('landmark')?></span>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6">
                        <label class="text-black" for="Estate"><b>State</b></label>
                        <select class="form-control" name="state">
                          <option value="1">Gujrat</option>
                        </select>
                        <span class="text-danger" style="font-size: 12px;"> <?=form_error('state')?></span>
                      </div>
                       <div class="col-md-6">
                        <label class="text-black" for="city"><b>City</b></label>
                        <select class="form-control" name="Ecity">
                          <option value="1">Surat</option>
                        </select>
                        <span class="text-danger" style="font-size: 12px;"> <?=form_error('city')?></span>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col-md-4">
                        <input type="submit" name="Esave" id="Esave" value="Save" class="btn btn-primary form-control">
                      </div>
                      <div class="col-md-4">
                        <input type="reset" name="ECancle" id="Ecancle" value="Cancle" class="btn btn-info form-control">
                      </div>
                    </div>
                  </div> -->

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="message"><b>Address</b></label> 
                      <?php  
                        foreach($address as $a): ?>
                        <div>
                          <div id="old" class="col-lg-12 p-t-20" style="border: 1px solid #e0ebeb;">
                            <div class="d-block">
                              
                              <p> 
                                
                                 <?php echo $a['address'].', '.$a['locality'].', '.$a['landmark'].', '.$a['city_name'].', '.$a['state_name'].' - <b> '.$a['pincode'].'</b>';

                                ?>
                                 <div>
                                <!--   <a class="btn btn-xs btn-info fa fa-pencil"></a> -->
                                  <a href="<?=base_url('deleteAddress/').$a['addrid']?>" id=""><span class=" fa fa-trash btn btn-xs btn-danger"></span></a>
                                </div>                              
                              </p>
                              
                            </div>
                            
                          </div>
                 
                        </div>
                      <?php endforeach;?>
                    </div>
                  </div>

                 
              </form>
          </div>















          <div id="coupanDiv" class="col-md-8 container" style="background-color: white; z-index: -1; box-shadow:  0px 0px 3px grey;">
              <form action="<?=base_url('addNewAdderss')?>" method="post" class="p-5 bg-white">
                 <h3 class="h5 text-black mb-3 border-bottom" style="padding-bottom: 10px;"><i
                  aria-hidden="true"></i> <b><font face="times new roman" size="5">My Coupans</h3></font></b><br>
               
                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="message"><b>Available coupans</b></label> 
                      <?php $coupans = $this->User_model->get_coupan($_SESSION['user']['uid']); 
                        foreach($coupans as $c): ?>
                        <div>
                          <div id="old" class="col-lg-12 p-t-20" style="border: 1px solid #e0ebeb;">
                            <div class="d-block">
                              
                              <p> <b> <?php echo $c['cpn_code'];?></b>:  <span> <?php echo $c['description'] ;?> </span>
                               <span class="pull-right"><b>Valid Till: </b> <?php echo $c['valid_till'] ;?></span>   


                              </p>
                              
                            </div>
                            
                          </div>
                 
                        </div>
                      <?php endforeach;?>
                    </div>
                  </div>

                 
              </form>
          </div>



















         
          <!-- change passwod modal -->
          <div style="margin-top: 50px; " class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordLable" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="forgotPasswordLable">Change password </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?=base_url('changeUserPassword')?>" method="post">
                    <input type="hidden" name="error" id="error" value="<?=form_error('oldPassword').form_error('newPassword').form_error('conPassword')?>">
                    <div class="row form-group">
                      <div class="col-12">
                        <label for="oldPass">Current password</label>
                        <input type="password" class="form-control" id="oldPass" name="oldPassword" placeholder="Enter current password" value="<?=set_value('oldPassword')?>">
                        <span class="text-danger" style="font-size: 12px;"><?=form_error('oldPassword')?></span>
                      </div>
                    </div>
                    <div class="row form-group">
                    <div class="col-md-6">
                        <label for="newPass">New Password</label>
                        <input type="password" class="form-control" id="newPass" name="newPassword" placeholder="Enter New password" value="<?=set_value('newPassword')?>">
                         <span class="text-danger" style="font-size: 12px;"><?=form_error('newPassword')?></span>
                      </div>
                      <div class="col-md-6">
                        <label for="conPass">Confirm Password</label>
                        <input type="text" class="form-control" id="conPass" name="conPassword" placeholder="Confirm password" value="<?=set_value('conPassword')?>">
                         <span class="text-danger" style="font-size: 12px;"><?=form_error('conPassword')?></span>
                      </div>
                    </div>
                   <!--  <div class="row form-group">
                      <div class="col-12">
                        <label for="otp">Enter OTP</label>
                        <?php $sent = $email; if(isset($contact) && $contact != '') $sent = $contact; ?>
                        <input type="text" class="form-control" id="otp" name="otp" placeholder="OTP sent to - <?=$sent?>">
                        <input type="hidden" name="" id="errOtp" value="<?=form_error('otp')?>">
                      </div>
                    </div> -->

                    <div style="margin-top:20px; margin-left: 60%; " class="col-12"> 
                       <button type="button" class="btn btn-default" id="btnclose" data-dismiss="modal">Cancle</button>
                      <button id="btnChange" type="submit" name="btnSubmit" class="btn btn-primary">Change</button><br>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- modal end -->

        </div>
      </div>
    <!-- </div> -->

     <?php $this->load->view('includes/footer'); ?>
     <script src="https://kit.fontawesome.com/919bc432f5.js" crossorigin="anonymous"></script>
      <script>
        $(document).ready(function(){
          // $('#changePassword').modal('show');
          // $('#editAddress').hide();
          //$('#newAddress').hide();
          var ad = $('#show').val();

          $('#coupanDiv').hide();
          $('#addressDiv').hide();
          $('#update').hide();

          $('#edit').click(function(){
            $('#addressDiv').hide();
            $('#coupanDiv').hide();
            $('#pro').show();
            $("#pro").css("z-index","1");
          });
            
            $('#editName').click(function(){
              $('#update').show();
              $("#fname").attr("readonly", false);
            });
            $('#editDOB').click(function(){
               $('#update').show();
               $("#dob").attr("readonly", false);
            });
            $('#editPhone').click(function(){
               $('#update').show();
              $("#phone").attr("readonly", false);
            });
            $('#editGender').click(function(){
               $('#update').show();
               $("#gender").attr("disabled", false);
            });


            // $('#editPassword').click(function(){
            //   $.ajax({
            //     url : "<?php echo site_url('sendOTP');?>",
            //     success: function(result){
            //       console.log('otp sent successfully');
            //     }
            //   });
            // });
            // $("#email").attr("readonly", false);
     
          if(ad == 'address'){
             $('#pro').hide();
             $('#coupanDiv').hide();
            $('#addressDiv').show();
            $("#addressDiv").css("z-index","1");
          }

          $('#manageAddress').click(function(){
            $('#pro').hide();
            $('#coupanDiv').hide();
            $('#addressDiv').show();
            $("#addressDiv").css("z-index","1");
          });


          $('#myCoupan').click(function(){
              $('#pro').hide();
              $('#addressDiv').hide();
              $('#coupanDiv').show();
              $("#coupanDiv").css("z-index","1");
          });


          var err = $("#error").val();
          if (err != '') {
            $('#changePassword').modal('show');
          }
          
          // $('#otp').keypress(function(){
          //   var otp = $('#otp').val();
          //   $.ajax({
          //     url: "<?php echo site_url('verify_otp/');?>"+otp,
          //     success: function(result){
          //       // if (result == '1'){
          //       //   // $('#btnSubmit').removeAttr('disabled');
          //       //   // console.log('otp match');
          //       // }
          //       alert(result);
          //     }
          //   });
          // });


          // $('#bntAddNew').click(function(){
          //   $('#newAddress').show();
          // });
          //  $('#cancle').click(function(){
          //   $('#newAddress').hide();
          // });

        });
      </script>
  </body>

</html>
 