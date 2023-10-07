<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('includes/header'); ?>
  <body>

    <?php $this->load->view('includes/nav'); ?>
     <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?= base_url('assets/')?>images/serveathome.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center">
              <div class="col-md-8 text-center">
                <h1> Confirm Order </h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
	<!-- <div class="site-section"  style="background-color: #f2f2f2;"> -->
  	<!-- <h2 class="container text-black"> Profile </h1> -->

   <main id="main" role="main" class="bg-white">
    
        <section id="checkout-container ">
          <form class="needs-validation" action="<?=base_url('payment')?>" method="post" novalidate>
            <div class="container-fluid" style="padding: 50px;">
                <div class="row py-5">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted"><b class="text-success">Your cart</b></span>
                            <span class="badge badge-success badge-pill"><?php echo count($crt); ?></span>
                        </h4>
                        <?php if(count($crt)>0){ ?>
                        <ul class="list-group mb-3">
                            <?php $totalamt=0; foreach ($crt as $service): 
                                $s = $this->Common_model->get_service_by_sid($service['id']);?>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0 text-primary"><?= $s[0]['sname'] ?></h6>
                                    <small class="text-secondary"><?= $s[0]['sdescription'] ?></small>
                                </div>
                                <span class="text-right col-sm-4" style="font-size: 13px; font-weight: bold;">
                                    <?php echo'&#8377; '. $service['price']; 
                                        $totalamt+=$service['price']; $dis=0;?> <br>
                                        <span>+ gst(18%)</span><br>
                                        <span class="removeLable text-danger" id="remove" data-sid="<?php echo $s[0]['sid'];?>">- remove</span>
                                </span>


                            </li>
                            <input type="hidden" name="sid[]" value="<?=$service['id']?>">
                         
                            <?php endforeach; ?>
                             <li class="list-group-item d-flex justify-content-between bg-light">
                                <div class="text-success">
                                    <h6 class="my-0">Coupan</h6>
                                    <?php if($this->session->userdata('coupan')){ 
                                         $coupan = $this->session->userdata('coupan');?>
                                        <small id="coupanCode"> Coupan applied: <?=$coupan['cpn_code']?> </small>
                                    <?php } else { ?>
                                        <small id="coupanCode"> no coupan applied </small>
                                    <?php } ?>
                                </div>

                                <?php if($this->session->userdata('coupan')){ 
                                    $coupan = $this->session->userdata('coupan');
                                        $totalForDis = $totalamt;
                                        if($coupan['cpn_type']==0){
                                            $dis = ($totalForDis*$coupan['discount'])/100;
                                        }
                                        else{
                                            $dis = $coupan['discount'];
                                        } ?>

                                        <b><small class="removeLable text-danger" id="removeCoupan" style="float: right;">Remove Coupan</small></b>

                                 <?php } ?>
                                <span class="text-success"><?php echo'-&#8377; '. $dis;?></span>
                               
                                <input type="hidden" name="dis" value="<?=$dis?>">

                            </li>
                             <li class="list-group-item d-flex justify-content-between">
                                <span>Total GST (&#8377;)</span>
                                <strong>
                                    <?php echo '&#8377; '; 
                                    $gst = ($totalamt*18)/100;
                                    $final =  $totalamt+$gst; echo $gst;          
                                    ?>
                                </strong>
                            </li>
                           
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total Payble</span>
                                <strong><?php echo '&#8377; '; $final =  round($final-$dis); echo $final; ?></strong>
                                <input type="hidden" name="total" value="<?=$totalamt?>">
                                <input type="hidden" name="finalPrice" value="<?=$final?>">
                            </li>
                        </ul>
                       <!--  <form class="card p-2"> -->
                            <div class="input-group">
                               <!--  <input type="text" class="form-control" placeholder="Coupan code"> -->
                               <select class="form-control" id="cpn">
                                <?php $coupan=$this->User_model->get_coupan($this->session->userdata('user')['uid']); 
                                    if(count($coupan)>0){ ?>
                                        <option value="0">--Select coupan--</option>
                                    <?php } else { ?>
                                          <option value="0">No Coupan found</option>

                                   <?php } foreach($coupan as $cpn):?>
                                        <option value="<?=$cpn['cpnid']?>"><?=$cpn['cpn_code']?></option>
                                    <?php endforeach; ?>
                               </select>
                                <div class="input-group-append">
                                    <button id="apply" type="button" class="btn btn-success">Apply</button>
                                </div>
                            </div>
                       <!--  </form> -->
                        <?php } else { ?>
                            <h4 class="list-group-item text-center text-danger">Cart is empty...</h4>
                         <!--    <button class=" justify-content-between btn-warning form-control">Add services</button> -->
                        <?php } ?>
                      
                    </div>
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Confirm details</h4>
                        
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="firstName">Name</label>
                                    <input type="text" name="custname" class="form-control" id="firstName" placeholder="" value="<?=$this->session->userdata('user')['name']?>" required/>
                                     
                                    <span class="text-danger">
                                       <?=form_error('custname')?>
                                    </span>

                                </div>

                        
                                 <div class="col-md-6 mb-3">
                                    <label for="phone">Phone
                                       <!--  <span class="text-muted">(Optional)</span> -->
                                    </label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="+91" value="<?=$this->session->userdata('user')['contact']?>">
                                    <div class="text-danger">
                                        <?=form_error('phone')?>
                                    </div>
                                </div>
                         
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email
                                       <!--  <span class="text-muted">(Optional)</span> -->
                                    </label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" value="<?=$this->session->userdata('user')['email']?>">
                                    <div class="text-danger">
                                       <?=form_error('email')?>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="address">Address</label>
                                    <?php $result=$this->User_model->get_useraddress($this->session->userdata('user')['uid']);?>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="" value="<?php if(isset($result[0]['address'])) echo $result[0]['address']; ?>" required>
                                    <div class="text-danger">
                                        <?=form_error('address')?>
                                    </div>  
                                </div>

                            </div>
                            <div class="row">
                                 <div class="col-md-6 mb-3">
                                    <label for="address">locality</label>
                                    <?php $result=$this->User_model->get_useraddress($this->session->userdata('user')['uid']);?>
                                    <input type="text" name="locality" class="form-control" id="locality" placeholder="" value="<?php if(isset($result[0]['locality'])) echo $result[0]['locality']; ?>" required> 
                                    <div class="text-danger">
                                        <?=form_error('locality')?>
                                    </div>  
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="address">Landmark</label>
                                    <?php $result=$this->User_model->get_useraddress($this->session->userdata('user')['uid']);?>
                                    <input type="text" name="landmark" class="form-control" id="landmark" placeholder="" value="<?php if(isset($result[0]['landmark'])) echo $result[0]['landmark']; ?>" required>
                                    <div class="text-danger">
                                        <?=form_error('landmark')?>
                                    </div>  
                                </div>
                            </div>

                            <div class="row">
                               <!--  <div class="col-md-4 mb-3">
                                    <label for="country">State</label> -->
                                     <input type="hidden" name="state_name" class="form-control" id="state" placeholder="" value="<?php if(isset($result[0]['state_name'])) echo $result[0]['state_name']; ?>" required readonly> 
                                   <!--  <select class="custom-select d-block w-100" id="state" required>
                                        <?php $states=$this->Common_model->get_state(); ?>
                                        <option value="">--Select State--</option>
                                        <?php foreach ($states as $state): ?>
                                                <option value="<?=$state['stateid']?>"><?=$state['state_name']?></option>
                                        <?php endforeach; ?>
                                    </select> -->
                                    <!-- <div class="invalid-feedback">
                                        Please select a valid State.
                                    </div> -->
                                <!-- </div> -->
                                <div class="col-md-6 mb-3">
                                    <label for="state">City</label>
                                    <!-- <input type="text" name="city_name" class="form-control" id="city" placeholder="" value="<?php if(isset($result[0]['city_name'])) echo $result[0]['city_name']; ?>" required readonly> --> 
                                   <!--  <select class="custom-select d-block w-100" id="city" required>
                                        <option value="">--Select city--</option>
                                    </select> -->
                                    <select class="form-control" name="city">
                                           <?php $city=$this->Common_model->get_city(1);
                                            foreach($city as $ct):
                                              if($ct['cityid'] == $result[0]['cityid']){ ?>
                                                <option value="<?=$ct['cityid']?>" selected><?=$ct['city_name']?></option> 
                                              <?php } else { ?>
                                                <option value="<?=$ct['cityid']?>"><?=$ct['city_name']?></option>

                                            <?php } endforeach; ?>
                                        </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid City.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="zip">Zip</label>
                                    <input type="text" class="form-control" name="pincode" id="zip" value="<?php if(isset($result[0]['pincode'])) echo $result[0]['pincode']; ?>" placeholder="" required>
                                    <div class="text-danger">
                                         <?=form_error('pincode')?>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <h4 class="mb-3">Payment Method</h4>

                                <div class="d-block my-3">
                                  <div class="custom-control custom-radio">
                                    <input id="credit" name="paymentMethod" type="radio" value="P" class="custom-control-input" checked required>
                                    <label class="custom-control-label" for="credit">Online Card Payment.</label>
                                  </div>
                                  <div class="custom-control custom-radio">
                                    <input id="debit" name="paymentMethod" type="radio" value="W" class="custom-control-input" required>
                                    <label class="custom-control-label" for="debit">Pay from Wallet</label>
                                  </div>
                                 <!--  <div class="custom-control custom-radio">
                                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                  </div> -->
                                </div>


                            <hr class="mb-4">
                            <?php $ct=$this->cart->contents();
                            if(count($ct)<1){ ?>
                                 <a class="btn btn-warning btn-lg btn-block text-white" href="<?=base_url('')?>">
                                <i class="fa fa-arrow-circle-o-left text-white"></i> Back to home...</a>
                            <?php } else {?>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">
                                <i class="fa fa-credit-card"></i> Continue to checkout</button>
                            <?php } ?>


                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php $wb = 0; if($this->session->flashdata('walletBalance')){
            $wb=$this->session->flashdata('walletBalance');
        }?>
        <input type="hidden" name="" id="walletAlert" value="<?=$wb?>">
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  
                  <h4 class="modal-title text-left">Wallet alert</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <p>Insufficient Balance in wallet.. Try another payment option..</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
       <!--  <section class="py-3" id="suggested-items">
            <div class="container">
                <div class="p-3 mb-2 bg-dark text-white">You May Also Like</div>
                <div class="row">
                    <div class="col col-md-3 d-flex mb-2">
                        <div class="card">
                            <img class="card-img-top img-fluid border-bottom" src="img/item-1.jpeg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Ladies Sandal</h5>
                                <p class="card-text">Exhibit a great fashion sense wearing these heels from the house of O.T. Collection.
                                </p>
                                <a href="#" class="btn btn-success">$23.99</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3 d-flex mb-2">
                        <div class="card">
                            <img class="card-img-top img-fluid border-bottom" src="img/item-2.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Gents Shoes</h5>
                                <p class="card-text">Make the rest look at you in admiration as you make your way by wearing these van sneakers
                                    from ASB.</p>
                                <a href="#" class="btn btn-success">$45.50</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3 d-flex mb-2">
                        <div class="card">
                            <img class="card-img-top img-fluid border-bottom" src="img/item-3.jpeg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Ladies Sandal</h5>
                                <p class="card-text">Exhibit a great fashion sense wearing these heels from the house of O.T. Collection.
                                </p>
                                <a href="#" class="btn btn-success">$53.99</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3 d-flex mb-2">
                        <div class="card">
                            <img class="card-img-top img-fluid border-bottom" src="img/item-4.jpeg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Gents Shoes</h5>
                                <p class="card-text">Make the rest look at you in admiration as you make your way by wearing these van sneakers
                                    from ASB.</p>
                                <a href="#" class="btn btn-success">$95.50</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <a href="#" class="btn btn-primary scrollUp">
            <i class="fa fa-arrow-circle-o-up"></i>
        </a>
    </main>
    <?php $this->load->view('includes/footer'); ?>
    <script>
        var wb = $('#walletAlert').val();
        if(wb != '0')
        {
            $('#myModal').modal('show'); 
        }

        $('.removeLable').click(function(){
            var sid = $(this).data("sid");
            $.ajax({
            url : "<?php echo site_url('removeCart/');?>"+sid,
            success: function(result){
              location.reload();
              //alert(result);
            }
          });
        });

        $('#apply').click(function(){
            var cpn = $('#cpn').val();
            if(cpn == '0'){
                // alert('hello');
            }
            else{
                $.ajax({
                    url: "<?=base_url('applyCoupan/')?>"+cpn,
                    success: function(result){
                        //alert(result);
                        $('#removeCoupan').show();
                        $('#coupanCode').html(result);
                        location.reload();
                    }
                });
            }
        });

         $('#removeCoupan').click(function(){
            $.ajax({
                url: "<?=base_url('removeCoupan/')?>",
                success: function(result){
                    $('#removeCoupan').hide();
                    location.reload();
                }
            });

        });
    </script>
  </body>
</html>
