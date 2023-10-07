<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view('includes/header'); ?>
  <body>
    <div class="spinner-wrapper">
      <div class="spinner"></div>
    </div>
  <?php $this->load->view('includes/nav'); ?>
  
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?= base_url('assets/')?>images/serveathome.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            

            <div class="row justify-content-center mt-5">
              <h1 class="" data-aos="fade-up">Subcategory</h1>
              <div class="col-md-12 justify-content-center">

               
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
         <div class="row">
            <?php $subcategory=$this->User_model->getSubcategory($category); 
              foreach($subcategory as $subcat):?>
              <div class="col-md-6 col-6 mb-4 mb-lg-3 col-lg-4">  
                <a href="<?=base_url('sp/').$subcat['cid']?>">       
                  <div class="listing-item">
                    <div class="listing-image" style="height: 180px;">
                      <img src="<?= base_url('assets/admin/img/category/')?><?=$subcat['cimg']?>" alt="Image" class="img-fluid">
                    </div>
                    <div class="listing-item-content">
                      <span class="px-3 category" href="#"><?=$subcat['cname']?></span>
                    </div>
                  </div>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>


  <?php $this->load->view('includes/footer'); ?>
</body>
</html>