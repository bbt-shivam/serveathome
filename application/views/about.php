<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view('includes/header'); ?>
  <body>

  	<?php $this->load->view('includes/nav'); ?>

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(assets/images/serveathome.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <h1>About Us</h1>
                <p class="mb-0">Know about serveathome.in</p>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>


    <div class="site-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <img src="<?= base_url('assets/')?>images/img_2.jpg" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-5 ml-auto">
            <h2 class="text-primary mb-3">Why serveathome</h2>
            <p>serveathome.in website trusted website from where the users can book
              instant and affordable services from home.
              Book services from specific service provider from which user want.</p>
            <p class="mb-4">Also the users can start business with serveathome.in and serve their services easily. This can help them to grow their business.</p>

            <ul class="ul-check list-unstyled primary">
              <li>Instant home services.</li>
              <li>Safe and Secure.</li>
              <li>Get services in affordable price.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

      <div class="container" data-aos="fade">

        <div class="row mb-5 mt-5">
          <div class="col-md-4 text-left border-primary">
            <h2 class="font-weight-light text-primary pb-3">Our Team</h2>
          </div>
        </div>
        <div class="row">
         
           <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <img width="93%" src="<?= base_url('assets/')?>images/owner/boy.jpg" alt="Image" class="img-fluid mb-3">
            <h3 class="h4">Shivam Tiwari</h3>
            <p>An Executive whose primary responsibility is to manage and adress technical issues that a company faces, including research and development (R&D). Also called Chief Technical Officer.</p>
          </div>
           <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <img width="100%" src="<?= base_url('assets/')?>images/owner/him.jpg" alt="Image" class="img-fluid mb-3">
            <h3 class="h4"> Himani Vaghasiya </h3><!-- 
            <p class="caption mb-3 text-primary">Founder</p> -->
            <p>She is the leader of the firm, serves as the main link between the board of directers (the board) and the firm's various parts of levels, and she is solely for the form's success or failure. </p>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <img width="86%" src="<?= base_url('assets/')?>images/owner/Jin2.jpg" alt="Image" class="img-fluid mb-3">
            <h3 class="h4">Jinal Sheladiya</h3><!-- 
            <p class="caption mb-3 text-primary">Project Manager</p> -->
            <p>Senior-most executive for the finencial control and planning of a firm or project. She is in charge of all accounting functions.</p>
          </div>
         
        </div>

      </div>
      <div class="site-section">
      </div>

      <?php $this->load->view('includes/footer'); ?>
  </body>
</html>
