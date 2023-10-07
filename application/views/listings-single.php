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
                <h1><?= $provider[0]['shop_name']?></h1>
                <p class="mb-0"><?php echo $provider[0]['address'].', '.$provider[0]['locality'].', '.$provider[0]['landmark'].', '.$provider[0]['city_name'];?></p>

              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8" >
           <!--  <div class="mb-4" style="padding-top: 20px;">
              <div class="slide-one-item home-slider owl-carousel">
                <div class="col-md-12 col-12">
                  <img src="<?= base_url('assets/provider/img/profile/')?><?= $provider[0]['image'];?>" alt="Image" class="img-fluid rounded img-responsive" style="max-width: 100%; max-height: 100%; display: block;">
                   <h3 class="h3 mb-4 text-black"><?= $provider[0]['shop_name']?></h3>
                </div>
              </div>
            </div> -->
            <div class="row">
              <div class="col-md-3">
                <h3 class="h3 mb-4 text-primary"><u>Services</u>  </h3></div>
              <div class="col-md-3">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Category
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php foreach($cid as $cat): ?>
                    <a class="dropdown-item" href="#c<?=$cat['cid']?>"><?=$cat['cname']?></a>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
            <?php if(count($cid)>0){ ?>
            <?php $checkCart=0; foreach($cid as $cat): ?>
            <h6 class="serviceHeandig" id="c<?=$cat['cid']?>"> <?=$cat['cname']?> </h6>
            <?php foreach($services as $s):
                if($cat['cname']==$s['cname']){
                  ?>
            <div class="col-lg-12 ml-auto">
              <div class="d-block d-md-flex listing" style="margin: 10px;">
                 <a href="#" class="img d-block col-sm-2" style="background-image: url('<?= base_url('assets/images/services/')?><?=$s['simage']?>'); width: all; height: all;"></a>
                <div class="lh-content" style="padding-bottom: 5px;">
                 <?php $cc=0; $checkQty = $this->cart->contents();
                      foreach($checkQty as $c){
                        if($c['id']==$s['sid']){
                          $cc += $c['qty'];
                          $checkCart=1;
                        }
                      } if($cc > 0){?>
                  <!-- <span class="showQty text-black" style=""><?=$cc?></span>
                  <span class="removeQty btn btn-primary text-black fa fa-minus"></span>   
                  <button id="add" class="cart btn btn-primary text-black" data-sid="<?php echo $s['sid'];?>" style="border-radius: 0; width: 30px;">
                   <i class="fa fa-plus text-black"></i>
                  </button> -->
                    <button id="remove" class="removeQty btn btn-primary text-black" data-sid="<?php echo $s['sid'];?>" style="border-radius: 0; width: 80px;">
                       <i class="fa fa-minus text-black"></i>
                       <span>Remove</span>
                      </button>
                  <?php } else {?>
                       <button id="add" class="cart addCart btn btn-primary text-black" data-sid="<?php echo $s['sid'];?>" style="border-radius: 0; width: 60px;">
                       <i class="fa fa-plus text-black"></i>
                       <span>ADD</span>
                      </button>

                  <?php } ?>
                  <h3 style="margin-top: -10px;"><a href="#"><?=$s['sname']?></a></h3>
                  <address class="col-sm-10" style="padding: 0; margin:0; font-size: 12px;"><?=$s['sdescription']?> </address>
                  <b style="padding-top: 8px; float:left; font-size: 15px;">₹ <?=$s['price']?></b> &nbsp;<span style="float: right; font-size: 12px; padding-right: 10px; padding-top: 10px;"> <?=$s['time'].' min'?></span>

                </div>
              </div>
              </div>
              <?php } endforeach; ?>

              <?php endforeach; ?>
            <?php } else {?>
              <h3>This Provoder Has not any Active Service..... </h3> <?php } ?>
          </div>

          <div class="col-lg-4 ml-auto">
            <!-- <div class="mb-5"> -->
            <div class="mb-4" style="padding-top: 20px;">
              <div class="slide-one-item home-slider owl-carousel">
                <!-- <div class="col-md-12 col-12"> -->
                  <img src="<?= base_url('assets/provider/img/profile/')?><?= $provider[0]['image'];?>" alt="Image" class="img-fluid rounded img-responsive" style="max-width: 100%; max-height: 100%; display: block;">
                <!-- </div> -->
              </div>
            <!-- </div> -->


            <h3 class="h3 mb-4 text-primary" style="margin-top: 20px;"><?= $provider[0]['shop_name']?></h3>
            <address style="margin-top: -10px;"><?php echo $provider[0]['address'].', '.$provider[0]['locality'].', '.$provider[0]['landmark'].', '.$provider[0]['city_name'].' - <b>'.$provider[0]['pincode'];?></address>
               <address style="margin-top: -10px;">Mo: <b><?=$provider[0]['contact']?></b></address>
              <h3 class="h5 text-black mb-3" style="margin-top: 30px;">Reviews</h3>
              <div class="mb-5">
                 <p class="mb-0">  
                       <?php $review=$this->Common_model->get_avg_review($provider[0]['pid']);
                       if(count($review)>0){
                        for($i=0; $i<5; $i++) { 
                          if($i < $review[0]['ratings']){ ?>
                            <span class="icon-star text-warning"></span>
                          <?php } else { ?>
                            <span class="icon-star text-secondary"></span>
                          <?php } }?>
                      <span class="review">(<?=$review[0]['count(pid)']?> Reviews)</span>
                    <?php } else { ?>
                      <span class="icon-star text-secondary"></span>
                        <span class="icon-star text-secondary"></span>
                        <span class="icon-star text-secondary"></span>
                        <span class="icon-star text-secondary"></span>
                        <span class="icon-star text-secondary"></span>
                        <span class="review">(No Reviews)</span>
                      <?php } ?>
                    </p>

              </div>
              <div class="mb-5">
              <?php $allreviews=$this->Common_model->get_review($provider[0]['pid']);
              if(count($allreviews)>0){ ?>
              <ul class="comment-list">

                <?php foreach ($allreviews as $r): ?>
                <li class="comment">
                    <span class="fa fa-3x fa-user-circle" style="color: grey;"></span>
                  <div class="comment-body">
                    <h6><b><?=$r['name']?></b></h6>
                    <div class="meta"><?=$r['date']?></div>
                    <?php for($i=0; $i<5; $i++) { 
                          if($i < $r['ratings']){ ?>
                            <span class="icon-star text-warning"></span>
                          <?php } else { ?>
                            <span class="icon-star text-secondary"></span>
                          <?php } }?> 
                          <span style="padding-left: 10px; font-weight: bold; color: #f5c542;"> <?=round($r['ratings'])?> </span>
                    <p><?=$r['description']?></p>
                  </div>
                </li>
                <?php endforeach; ?>
              </ul>
            <?php } ?>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
      <!-- modals -->
        <div class="modal fade bd-example-modal-sm"  id="loginFirst" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 80px;">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login first</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">You have to login first..</div>
                    <div class="modal-footer">
                      <a href="<?php echo base_url('signup') ?>" class="btn btn-primary">goto Login</a>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
          
     <?php if($checkCart > 0 ) { 
      $items=0;
      $cart =  $this->cart->contents();
      $total = $this->cart->total();
        foreach ($cart as $c) {
          $items += $c['qty'];
        } ?>
        <div class="cart-footer" id="oldCart" style="padding-right: 80px;"> 
        <a href="<?=base_url('confirmOrderPage')?>" class="btn-md square_btn">
          <span class="btn-xs count" type="button" id="items"><?=$items?></span>
          <span class="col-sm-4" id="total">₹ <?=$total?></span>
          <span class="col-sm-4" style="padding-left: 50px;">continue</span>
          <span class="fa fa-arrow-right"></span>
        </a> 
      </div>
     <?php }else{ ?>
      <div class="cart-footer" id="newCart" style="padding-right: 80px;"> 
        <a href="<?=base_url('confirmOrderPage')?>" class="btn-md square_btn">
          <span class="btn-xs count" type="button" id="items"></span>
          <span class="col-sm-4" id="total"> </span>
          <span class="col-sm-4" style="padding-left: 50px;">continue</span>
          <span class="fa fa-arrow-right"></span>
        </a> 
      </div>
     <?php } ?>
      

	  <?php $this->load->view('includes/footer'); ?>
    <script>
      
        $('#newCart').hide();
        $('.addCart').click(function(){
          // $('#newCart').show();
          var sid = $(this).data("sid");
          // alert(sid);
          $.ajax({
             url : "<?php echo site_url('logged_in');?>",
            success: function(result){
              if(result == ''){
                $('#newCart').show();
               $.ajax({
                  url : "<?php echo site_url('cart/');?>"+sid,
                  success: function(result){
                    location.reload();
                    // alert(result);
                    var cart = JSON.parse(result);
                    $('#items').html(cart.items);
                    $('#total').html('₹ '+cart.total);
                  }
                });
              }
              else{
                $('#loginFirst').modal('show');
              }
            }
          });   
        });

        $('.removeQty').click(function(){
          var sid = $(this).data("sid");
           $.ajax({
            url : "<?php echo site_url('removeCart/');?>"+sid,
            success: function(result){
              location.reload();
              //alert(result);
              // var cart = JSON.parse(result);
              // $('#items').html(cart.items);
              // $('#total').html('₹ '+cart.total);
            }
          });
        });

    </script>
    
  </body>
</html>
