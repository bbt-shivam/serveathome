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
                <h1><?php if($flag==0) echo 'All Providers'; else echo $providers[0]['cname'];?></h1>
                <p class="mb-0">All service providers listed below</p>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
         <h3 style="margin-top: -30px; margin-bottom: 30px;">Service Providers</h3>
        <div class="row">

          <div class="col-lg-12">

            <div class="row">
            <?php foreach($providers as $s): ?>
            <div class="col-lg-6">
            
            <div class="d-block d-md-flex listing">
              <a href="<?= base_url('providers/').$s['pid']; ?>" class="img d-block" style="background-image: url('<?= base_url('assets/provider/img/profile/')?><?= $s['image'] ?>')"></a>
              <div class="lh-content">
              <span class="category"><?= $s['cname'] ?></span>
                <!-- <a href="#" class="bookmark"><span class="icon-heart"></span></a> -->
                <h3><a href="<?= base_url('providers/').$s['pid']; ?>"><?= $s['shop_name'] ?></a></h3>
                <address><?= $s['address'].', '.$s['locality'].', '.$s['landmark'].',<b> '.$s['pincode'].'</b>' ?></address>
                <address style="margin-top: -10px;">Mo: <b><?=$s['shop_contact']?></b></address>
                <?php $review=$this->Common_model->get_avg_review($s['pid']); 
                  ?>
                 <p class="mb-0">  
                       <?php
                       if(count($review)>0){
                        for($i=0; $i<5; $i++) { 
                          if($i < $review[0]['ratings']){ ?>
                            <span class="icon-star text-warning"></span>
                          <?php } else { ?>
                            <span class="icon-star text-secondary"></span>
                          <?php } }?>

                      <span class="review">(<?=$review[0]['count(pid)']?> Reviews)</span> <!-- <span style="float: right; font-weight: bold;">  &#8377; <?=$s['price']?> </span> -->
                    <!--  <p style="float: right; font-size: 12px;"> 20 min</p> -->
                    <?php } 
                      else {?>
                        <span class="icon-star text-secondary"></span>
                        <span class="icon-star text-secondary"></span>
                        <span class="icon-star text-secondary"></span>
                        <span class="icon-star text-secondary"></span>
                        <span class="icon-star text-secondary"></span>
                        <span class="review">(No Reviews)</span>
                    <?php } ?>

                    </p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

      </div>

      <div class="col-12 mt-5 text-center">
        <div class="custom-pagination">
          <!-- <span>1</span> -->
          <?php echo "<p>".$links."</p>" ?>
          <!-- <a href="#">2</a>
          <a href="#">3</a> -->
          <!-- <span class="more-page">...</span>
          <a href="#">10</a> -->
        </div>
      </div>

  </div>
       

      </div>
    </div>
    
  </div>

    <!-- <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-7 text-left border-primary">
            <h2 class="font-weight-light text-primary">Trending Today</h2>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-6">

            <div class="d-block d-md-flex listing">
              <a href="#" class="img d-block" style="background-image: url('<?= base_url('assets/')?>images/img_2.jpg')"></a>
              <div class="lh-content">
                <span class="category">Real Estate</span>
                <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                <h3><a href="#">House with Swimming Pool</a></h3>
                <address>Don St, Brooklyn, New York</address>
                <p class="mb-0">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-secondary"></span>
                  <span class="review">(3 Reviews)</span>
                </p>
              </div>
            </div>
            <div class="d-block d-md-flex listing">
                <a href="#" class="img d-block" style="background-image: url('<?= base_url('assets/')?>images/img_3.jpg')"></a>
                <div class="lh-content">
                  <span class="category">Furniture</span>
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                  <h3><a href="#">Wooden Chair &amp; Table</a></h3>
                  <address>Don St, Brooklyn, New York</address>
                  <p class="mb-0">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-secondary"></span>
                    <span class="review">(3 Reviews)</span>
                  </p>
                </div>
              </div>

              <div class="d-block d-md-flex listing">
                <a href="#" class="img d-block" style="background-image: url('<?= base_url('assets/')?>images/img_4.jpg')"></a>
                <div class="lh-content">
                  <span class="category">Electronics</span>
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                  <h3><a href="#">iPhone X gray</a></h3>
                  <address>Don St, Brooklyn, New York</address>
                  <p class="mb-0">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-secondary"></span>
                    <span class="review">(3 Reviews)</span>
                  </p>
                </div>
              </div>

             

          </div>
          <div class="col-lg-6">

            <div class="d-block d-md-flex listing">
              <a href="#" class="img d-block" style="background-image: url('<?= base_url('assets/')?>images/img_1.jpg')"></a>
              <div class="lh-content">
                <span class="category">Cars &amp; Vehicles</span>
                <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                <h3><a href="#">Red Luxury Car</a></h3>
                <address>Don St, Brooklyn, New York</address>
                <p class="mb-0">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-secondary"></span>
                  <span class="review">(3 Reviews)</span>
                </p>
              </div>
            </div>

            <div class="d-block d-md-flex listing">
              <a href="#" class="img d-block" style="background-image: url('<?= base_url('assets/')?>images/img_2.jpg')"></a>
              <div class="lh-content">
                <span class="category">Real Estate</span>
                <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                <h3><a href="#">House with Swimming Pool</a></h3>
                <address>Don St, Brooklyn, New York</address>
                <p class="mb-0">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-secondary"></span>
                  <span class="review">(3 Reviews)</span>
                </p>
              </div>
            </div>
            <div class="d-block d-md-flex listing">
                <a href="#" class="img d-block" style="background-image: url('<?= base_url('assets/')?>images/img_3.jpg')"></a>
                <div class="lh-content">
                  <span class="category">Furniture</span>
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                  <h3><a href="#">Wooden Chair &amp; Table</a></h3>
                  <address>Don St, Brooklyn, New York</address>
                  <p class="mb-0">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-secondary"></span>
                    <span class="review">(3 Reviews)</span>
                  </p>
                </div>
              </div>

          </div>
        </div>
      </div>
    </div>
    
    <div class="site-section bg-white">
      <div class="container">

        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Testimonials</h2>
          </div>
        </div>

        <div class="slide-one-item home-slider owl-carousel">
          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="<?= base_url('assets/')?>images/person_3.jpg" alt="Image" class="img-fluid mb-3">
                <p>John Smith</p>
              </figure>
              <blockquote>
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
            </div>
          </div>
          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="<?= base_url('assets/')?>images/person_2.jpg" alt="Image" class="img-fluid mb-3">
                <p>Christine Aguilar</p>
              </figure>
              <blockquote>
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
            </div>
          </div>

          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="<?= base_url('assets/')?>images/person_4.jpg" alt="Image" class="img-fluid mb-3">
                <p>Robert Spears</p>
              </figure>
              <blockquote>
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
            </div>
          </div>

          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="<?= base_url('assets/')?>images/person_5.jpg" alt="Image" class="img-fluid mb-3">
                <p>Bruce Rogers</p>
              </figure>
              <blockquote>
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
            </div>
          </div>

        </div>
      </div>
    </div>


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
    $('#category').change(function(){
      cid=$('#category').val();
      $.ajax({
        url:'<?=base_url('subCategory/')?>'+cid,
        success:function(result)
        {
          $('#subcategory').html(result);
        }
      });
    });
  </script>
    
  </body>
</html>
