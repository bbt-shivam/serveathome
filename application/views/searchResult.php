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
                <h1>Search Result</h1>
                <p class="mb-0">Search For: </p>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>



     <?php $this->load->view('includes/footer'); ?>

  </body>
</html>
