
<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('includes/header'); ?>
  <body>

  <div class="site-wrap">

	  <?php $this->load->view('includes/nav'); ?>

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?= base_url('assets/')?>images/serveathome.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center">
              <div class="col-md-8 text-center">
                <h1> Login / Sign Up </h1>
                
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
         
          <div class="col-md-6 mb-5">
            <form action="<?=base_url('loginCheck'); ?>" method="post" class="p-5 bg-white" style="margin-top: -150px;">

              <div class="row form-group">
                <div class="col-md-12">
                  <h2> Login </h2>
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email2" name="email" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="pass1">Password</label> 
                  <input type="password" id="pass3" name="password" class="form-control">
                </div>
              </div>

				      <div class="row form-group">
    					 <div class="col-md-12">
    						  <span class="ui-state-error-text"><?= $this->session->flashdata('message'); ?></span>
    					 </div>
    				  </div>


						  <div class="row form-group">
                <div class="col-md-12 con">
                  <input type="submit" value="Log In" class="btn btn-success btn-md text-white">  
                  <span style="float: right;"><a href="#" data-toggle="modal" data-target="#forgotPassword"> Forgot Password </a></span>
                </div>
              </div>

           
              <div class="row form-group">
              <div class="col-md-12">
                <p><i> Or Login with</i> </p>
                  <a href="<?=$fb?>">
                    <button type="button" class="btn btn-primary btn-md">
                        <i class="fa fa-facebook"></i> Facebook
                      </button>
                  </a>
                  
                  <span>
                    <a href="#">
                      <button class=" g-signin2 "  data-onsuccess="onSignIn" style=" border: none; background: white;" data-height="48" data-width="160">
                      
                    </button>
                    </a>
                  </span>

                <!--   <span>
                      <div class="row form-group">
                        <div class="col-md-12">
                          <div class="g-signin2" data-onsuccess="onSignIn"></div>
                        </div>
                      </div>
                  </span> -->
                </div>
              </div>
               
            </form>
          </div>
          <div class="col-md-6 mb-5">
            <form method="post" action="<?=base_url('signIn'); ?>" class="p-5 bg-white" style="margin-top: -150px;">
              <div class="row form-group">
                <div class="col-md-12">
                  <h2> Register </h2>
                  <label class="text-black" for="fname">Name</label>
                  <input type="text" id="fname" name="name" value="<?= set_value('name') ?>" class="form-control">
                   <?php echo form_error('name','<span class="ui-state-error-text">','</span>'); ?>
                </div>
              </div>
    
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" name="email" value="<?= set_value('email') ?>" class="form-control">
                   <?php echo form_error('email','<span class="ui-state-error-text">','</span>'); ?>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="pass1">Password</label> 
                  <input type="password" id="pass1" name="password" value="<?= set_value('password') ?>" class="form-control">
                 <?php echo form_error('password','<span class="ui-state-error-text">','</span>'); ?>
                </div>
              </div>
              
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="pass2">Re-type Password</label> 
                  <input type="password" id="pass2" name="cpassword" class="form-control">
                   <?php echo form_error('cpassword','<span class="ui-state-error-text">','</span>'); ?>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Sign Up" class="btn btn-primary btn-md text-white">
                </div>
              </div>

            </form>
              <?php $ud = ''; if(isset($this->session->userdata('user')['uid'])) $ud=$this->session->userdata('user')['uid'];?>
              <input type="hidden" id="sess" name="" value="<?=$ud?>">

              <!-- forgot password model -->
                <div style="margin-top: 150px; " class="modal fade" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordLable" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="forgotPasswordLable">Forget password </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?=base_url('sendLink')?>" method="post">
                          <div class="col-12">
                            <label for="email">email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="enter your email">
                          </div>

                          <div style="margin-top:20px; margin-left: 75%; " class="col-12"> 
                            <button type="submit" name="btnSubmit" class="btn btn-primary">Send Link</button><br>
                           
                          </div>
                        </form>
                      </div>
                    
                    </div>
                  </div>
                </div>
              <!-- model end -->
          </div>
        </div>
      </div>
    </div>
  </div>

	  <?php $this->load->view('includes/footer'); ?>
     <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script>
      //var sl = $('#sess').val();
      //if(sl == ''){
        function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        
        var name = (profile.getName());
        
        var email = (profile.getEmail()); // This is null if the 'email' scope is not present.

        $.ajax({
          url: '<?=base_url('googleLogin/')?>',
          data: {email: email, name: name},
          method: 'POST',
          success: function(result) {
            window.location = '<?=base_url()?>';
          }
        });
      }
    //}
    </script>

  </body>
</html>


<script>

      // function onSignIn(googleUser) {
      //   var profile = googleUser.getBasicProfile();
      //   console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
      //   console.log('Name: ' + profile.getName());
      //   console.log('Image URL: ' + profile.getImageUrl());
      //   console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
      // }



      function onSignIn(googleUser) 
      {
          var profile = googleUser.getBasicProfile();
          var UserName = profile.getName();
          var UserEmail = profile.getEmail();
          


          // alert(profile);
          // console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
          // console.log('Name: ' + profile.getName());
          // console.log('Image URL: ' + profile.getImageUrl());
          // console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.

          $.ajax({

            url:'<?=base_url('googleLogin/')?>',
            data:{"email":UserEmail,"name":UserName},
            method:'POST',
            success:function(result)
            {
              window.location="<?=base_url('')?>";
            }
         });
      }
      
</script>