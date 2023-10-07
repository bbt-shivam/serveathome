<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view('includes/header'); ?>
  <body>
    <div class="spinner-wrapper">
      <div class="spinner"></div>
    </div>
  	<?php $this->load->view('includes/nav'); ?>

    <div class="site-blocks-cover overlay" style="background-image: url(assets/images/serveathome.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-12">
            <div class="row justify-content-center mb-4">
              <div class="col-md-8 text-center">
                <h1 class="" data-aos="fade-up">Welcome to serveathome</h1>
                <p data-aos="fade-up" data-aos-delay="100">Get instent access to reliable and affordable services </p>
              </div>
            </div>
            <div class="form-search-wrap col-lg-9 container" data-aos="fade-up" data-aos-delay="200">
              <?php $searchResult=$this->session->flashdata('searchResult');?>
              <form method="post" action="<?=base_url('searchRedirect/')?>">
                <div class="row align-items-center">
                  <div class="col-lg-12 mb-4 mb-xl-0 col-xl-9">
                    <input id="suggestion" type="text" name="catName" class="form-control rounded" placeholder="Search for service" value="<?php if(isset($searchResult)) echo $searchResult; ?>">
                  </div>
                  
                  <!-- <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                    <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control rounded" name="city" id="city">
                        <?php $result = $this->Common_model->get_city(); 
                            foreach($result as $c): ?>
                              <option value="<?=$c['cityid']?>"><?=$c['city_name']?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div> -->
                  <div class="col-lg-12 col-xl-3 ml-auto text-right">
                    <input type="submit" class="btn btn-primary btn-block rounded" value="Search">
                  </div>
                   <span class="text-danger px-3"><?=$searchResult?> </span>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

	
    
    <div class="site-section" data-aos="fade">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Popular Categories</h2>
            <p class="color-black-opacity-5">All Popular categories</p>
          </div>
        </div>

        <div class="overlap-category mb-5">
          <div class="row align-items-stretch no-gutters">
            <div class="col-lg-1"></div>
            <?php $category = $this->User_model->popular_category(); 
                  $a = array(
                    'Salon at home'=>'fa-cut',
                    'Massage at home'=>'fa-spa',
                    'Appliances- Service & Repair'=>'fa-wrench',
                    'Cleaning'=>'fa-broom',
                    'Electrician, Plumber, Carpenter'=>'fa-plug',
                    'Fitness & Yoga'=>'fa-running'
                  ); 
            foreach($category as $c):?>
              <!-- <?=base_url('sp/').$c['cid']?> -->
            <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
              <a href="<?=base_url('subcategoryPage/').$c['cid']?>" class="popular-category h-100">
               <span class="icon" style="padding-top: 20px;"><span class="fas <?= $a[$c['cname']]?>"></span></span>
                <span class="caption mb-2 d-block"><?=$c['cname']?></span>
                <!--   <span class="number">1,921</span> -->
              </a>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="row mt-5 justify-content-center tex-center">
            <div class="col-md-4"><a href="<?=base_url('categoryPage/')?>"><button class="btn btn-block btn-outline-primary btn-md px-5">View All Categories</button></a>
            </div>
          </div>
        </div>
      </div>       
    </div>
    <div class="site-section bg-white">
      <div class="container" style="margin-top: -130px;">

        <div class="row">
          <div class="col-12">
            <h2 class="h5 mb-4 text-black" style="font-weight: bold;">Recomended Services</h2>
          </div>
        </div>

        <div class="row">
          
          <div class="col-12 block-13">
            <div class="owl-carousel nonloop-block-13 bg-white">
              <?php $recomended=$this->User_model->get_recomended_services();
                // echo '<pre>';
                // print_r($recomended);
                foreach($recomended as $cat):
                  foreach($cat as $r):?>
                  <div class="listing vertical" style="box-shadow: none;">
                    <a href="<?=base_url('sp/').$r['cid']?>" class="img d-block" style="background-image: url('<?=base_url('assets/admin/')?>img/category/<?=$r['cimg']?>'"></a>
                    <a class="text-black" href="<?=base_url('checkPerent/').$r['cid']?>" style="padding: 5px; font-size: 13px;"><?=$r['cname'] ?></a>
                  </div>
                <?php endforeach; endforeach; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
     <div class="site-section bg-white">
      <div class="container" style="margin-top: -100px;">
        <div class="row">
          <div class="col-12">
            <h2 class="h5 mb-4 text-black" style="font-weight: bold;">Health and Wellness</h2>
          </div>
           <div class="col-12 block-13">
            <div class="owl-carousel nonloop-block-13 bg-white">
              <?php $result=$this->User_model->get_helth_wellness();
                foreach($result as $r):?>
                  <div class="listing vertical" style="box-shadow: none;">
                    <a href="<?=base_url('sp/').$r['cid']?>" class="img d-block" style="background-image: url('<?=base_url('assets/admin/')?>img/category/<?=$r['cimg']?>'"></a>
                    <a class="text-black" href="<?=base_url('checkPerent/').$r['cid']?>" style="padding: 5px; font-size: 13px;"><?=$r['cname'] ?></a>
                  </div>
                <?php endforeach; ?>

            </div>
          </div>
        </div>
      </div>
    </div>

    <section id="statistics"  class="statistics">
      <div class="container">
        <div class="statistics-counter"> 
          <div class="row">
          <div class="col-md-3 container">
            <?php $cs = $this->User_model->customer_served(); ?>
            <div class="single-ststistics-box">
              <div class="statistics-content">
                <div class="counter"><?=$cs?> </div> <!-- <span>K+</span> -->
              </div><!--/.statistics-content-->
              <h5 class="text-white">Customers served</h5>
              
            </div><!--/.single-ststistics-box-->
          </div><!--/.col-->
          <div class="col-md-3 container">
             <?php $sp = $this->User_model->service_provider(); ?>
            <div class="single-ststistics-box">
              <div class="statistics-content">
                <div class="counter"><?=$sp?></div> <!-- <span>k+</span> -->
              </div><!--/.statistics-content-->
              <h5 class="text-white">Servies Providers</h5>
            </div><!--/.single-ststistics-box-->
          </div><!--/.col-->
          <div class="col-md-3 container">
             <?php $sc = $this->User_model->services_categories(); ?>
            <div class="single-ststistics-box">
              <div class="statistics-content">
                <div class="counter"><?=$sc?></div>
              </div><!--/.statistics-content-->
              <h5 class="text-white">Services Categories</h5>
            </div><!--/.single-ststistics-box-->
          </div><!--/.col-->
        </div>
        
        </div><!--/.statistics-counter--> 

      </div><!--/.container-->

    </section><!--/.counter-->  
   


   <?php $this->load->view('includes/footer'); ?>
    <script src="https://kit.fontawesome.com/919bc432f5.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/')?>js/autocomplete-0.3.0.js"></script> 
    <script>

      $(function() {
        // var city = $('#city').val();
        $("#suggestion").autoComplete({
          minChars:1,
          source:function(term, suggest) {
            $.ajax({
              url:'<?=base_url('autocomplete')?>',
              dataType:'json',
              type:'post',
              data:{key:term},
              success:function(result) {
                if(result.response=='True') {
                  suggest(result.suggest);
                }              
              }

            });
          }
        });
      });



    </script>
     
  </body>
</html>
