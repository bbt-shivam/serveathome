
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
                <h1> Reset Password </h1>
                
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>  

   <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
         
          <div class="col-md-6 mb-5">
            <form action="<?=base_url('setNewPassword/'); ?>" method="post" class="p-5 bg-white" style="margin-top: -150px;">

              <div class="row form-group">
                <div class="col-md-12">
                <h2> Create a strong Password </h2>
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" name="email"  class="form-control" value="<?=$this->session->flashdata('emaildt')?>">
                  <span class="focus-input100" data-symbol="&#xf190;"><?php echo  $this->session->flashdata('emailErr')?></span>
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="confirmSalt">Enter Salt</label> 
                  <input type="text" id="confirmSalt" name="confirmSalt" class="form-control" value="<?=$this->session->flashdata('saltdt')?>">
                  <span class="focus-input100" data-symbol="&#xf190;"><?php echo  $this->session->flashdata('saltErr')?></span>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="password">New Password</label>
                  <input type="text" id="password" name="password"  class="form-control">
                 <span class="focus-input100" data-symbol="&#xf190;"><?php echo  $this->session->flashdata('passErr')?></span>
                </div>
                
              </div>
              
              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="cpassword">confirm Password</label> 
                  <input type="password" id="cpassword" name="cpassword" class="form-control">
                  <span class="focus-input100" data-symbol="&#xf190;"><?php echo  $this->session->flashdata('passValErr')?></span>
                </div>
              </div>
              

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" id="btnsubmit" name="btnsubmit" value="Change Password" class="btn btn-primary btn-md text-white">
                  
                </div>
              </div>

  
            </form>

            



          </div>

      </div>
    </div>

<div style="margin-top: 100px; " class="modal fade" id="btnsubmit" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordLable" aria-hidden="true">
                          
</div> 

    <?php $this->load->view('includes/footer'); ?>

  </body>
</html>
