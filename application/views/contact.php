<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('includes/header'); ?>
  <body>

  <?php $this->load->view('includes/nav'); ?>

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?= base_url('assets/')?>images/serveathome.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <h1>Contact Us</h1>
                <p class="mb-0">Contact us for any inquery or information related to serveathome.in</p>
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>  


    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-7 mb-5"  data-aos="fade">

            <?php
                
                $msgSend = $this->session->flashdata('contactSend');
                // if($msg != ''){
                //   $msgSend = $msg;
                // }
              ?>

            <form action="<?=base_url('inquirySend/')?>" class="p-5 bg-white" method="post">
             


              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">First Name</label>
                  <input type="text" id="fname" class="form-control" name="firstName" value="<?= set_value('firstName') ?>">
                  <?php echo form_error('firstName','<span class="ui-state-error-text">','</span>'); ?>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Last Name</label>
                  <input type="text" id="lname" class="form-control" name="lastName" value="<?= set_value('lastName') ?>">
                  <?php echo form_error('lastName','<span class="ui-state-error-text">','</span>'); ?>
                </div>
              </div>
              
              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" class="form-control" name="email" value="<?= set_value('email') ?>">
                  <input type="hidden" id="msgSendMessage" value="<?=$msgSend?>">
                  <?php echo form_error('email','<span class="ui-state-error-text">','</span>'); ?>
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="subject">Subject</label> 
                  <input type="subject" id="subject" class="form-control" name="subject" value="<?= set_value('subject') ?>">
                  <?php echo form_error('subject','<span class="ui-state-error-text">','</span>'); ?>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Message</label> 
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here... 500 charecters only....."><?= set_value('name') ?></textarea>
                  <?php echo form_error('message','<span class="ui-state-error-text">','</span>'); ?>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send Message" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>

  
            </form>
          </div>
          <div class="col-md-5"  data-aos="fade" data-aos-delay="100">
            
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">202, 2nd-floor, Raghuveer Business Empire, Parvat Patiya, Surat, Gujrat.</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4">+919638288636</p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0">sth4131@gmail.com</p>

            </div>
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>For any kind of inquiry related to website or any issue please contact us on given phone number or provided email address or you can also send us your query by filling provided form on this page.</p>
              <!-- <p><a href="#" class="btn btn-primary px-4 py-2 text-white">Learn More</a></p> -->
            </div>

          </div>
        </div>
      </div>
    </div>

  <!--   <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Frequently Ask Question</h2>
            <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
          </div>
        </div>


        <div class="row justify-content-center">
          <div class="col-8">
            <div class="border p-3 rounded mb-2">
              <a data-toggle="collapse" href="#collapse-1" role="button" aria-expanded="false" aria-controls="collapse-1" class="accordion-item h5 d-block mb-0">How to list my item?</a>

              <div class="collapse" id="collapse-1">
                <div class="pt-2">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                </div>
              </div>
            </div>

            <div class="border p-3 rounded mb-2">
              <a data-toggle="collapse" href="#collapse-4" role="button" aria-expanded="false" aria-controls="collapse-4" class="accordion-item h5 d-block mb-0">Is this available in my country?</a>

              <div class="collapse" id="collapse-4">
                <div class="pt-2">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                </div>
              </div>
            </div>

            <div class="border p-3 rounded mb-2">
              <a data-toggle="collapse" href="#collapse-2" role="button" aria-expanded="false" aria-controls="collapse-2" class="accordion-item h5 d-block mb-0">Is it free?</a>

              <div class="collapse" id="collapse-2">
                <div class="pt-2">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                </div>
              </div>
            </div>

            <div class="border p-3 rounded mb-2">
              <a data-toggle="collapse" href="#collapse-3" role="button" aria-expanded="false" aria-controls="collapse-3" class="accordion-item h5 d-block mb-0">How the system works?</a>

              <div class="collapse" id="collapse-3">
                <div class="pt-2">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
 -->
<!-- 
    <div class="newsletter bg-primary py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h2>Newsletter</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
          <div class="col-md-6">
            
            <form class="d-flex">
              <input type="text" class="form-control" placeholder="Email">
              <input type="submit" value="Subscribe" class="btn btn-white"> 
            </form>
          </div>
        </div>
      </div>
    </div> -->

  	<?php $this->load->view('includes/footer'); ?>

    <script>
        var msg = $("#msgSendMessage").val();
          if (msg != '') {
            alert(msg);
          }
    </script>

  </body>
</html>
