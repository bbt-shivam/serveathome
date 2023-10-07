<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('includes/header'); ?>
  <body class="bg-light">

    <?php $this->load->view('includes/nav'); ?>
     <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?= base_url('assets/')?>images/serveathome.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center">
              <div class="col-md-8 text-center">
                <h1> My orders </h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
  
   
    <div class="site-section">
      <div class="container col-md-11">
        <div class="row">
              <?php $conCodeErr='0';

                if($this->session->flashdata('conCodeErr')){
                  $conCodeErr = $this->session->flashdata('conCodeErr');
                }?>


              <input type="hidden" id="conCodeErr" value="<?=$conCodeErr?>">

              <div class="col-md-12 container" style=" border-top: 1px solid red;">
                <div class="row" style="margin: 10px;">
                  <div class="col-md-3">
                    
                  </div>
                  <div class="col-md-2 col-4"><a href="<?=base_url('orders')?>"><button class="btn btn-info btn-sm"  style="margin-top: -50px;">Current Orders</button></a>
                   </div>
                    <div class="col-md-2 col-4"> <a href="<?=base_url('orders/2')?>"><button class="btn btn-sm btn-success" style="margin-top: -50px;">Previous Orders</button></a></div>
                    <div class="col-md-2 col-4"> <a href="<?=base_url('orders/-1')?>"><button class="btn btn-warning btn-sm" style="margin-top: -50px;">Cancelled Orders</button></a></div>

                  </div>
                  <?php if(empty($orders) == true ){
                      echo '<center><h3>Sorry no orders found..</h3></center>';
                    } ?>
              </div>


              
              <?php foreach($orders as $o): 
                 $result['odtls'] = $this->User_model->get_order_dtls($o['oid']); 
                 //print_r($result['odtls']); ?>
                <div class="col-lg-8 container">
                  <div class="d-block d-md-flex listing" style="margin: 5px;">
                    <div class="lh-content">

                      <div class="row form-group">
                        <div class="col-md-4 col-5">
                          <b class="text-warning" style="font-size: 12px;"><?='Ordered On: '.$o['order_date'];?></b>
                        </div>
                         <div class="col-md-4 col-6">
                           <a href="<?=base_url('providers/').$o['pid']?>"span class="category" style="margin-bottom: 0; color: red;"><?='Provider: '.$o['shop_name']?></span></a>
                        </div>
                         <div class="col-md-3 col-12">
                          <i class="fas fa-star"></i>
                          <?php $checkRate = $this->Common_model->check_order_rating($o['oid']); 
                            if(count($checkRate)>0){?>
                               <a href="#" data-toggle="modal" data-target="#r<?=$o['oid'].'1'?>" class="editLabel"><span class="fas fa-star"></span> View </a>
                          <?php } else { ?>
                           <a href="#" data-toggle="modal" data-target="#r<?=$o['oid']?>" class="editLabel"><span class="fas fa-star"></span> RATE </a>
                          <?php } ?>
                        </div>
                      </div>

<div class="modal fade" id="r<?=$o['oid']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: -50px;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="text-right cross"> 
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> 
            </div>
            <div class="card-body text-center"> 
              <img src="<?=base_url('assets/images/icons/like.jpg')?>" height="100" width="100">
                <div class="comment-box text-center">
                    <h4>Add a comment</h4>
                    <form action="<?=base_url('giveRating/')?>" method="post">
                      <!-- <div class="rating">  -->
                       <!--  <input type="radio" name="rating" value="5" id="5">
                        <label for="5"> ☆ </label> 
                        <input type="radio" name="rating" value="4" id="4">
                        <label for="4"> ☆ </label> 
                        <input type="radio" name="rating" value="3" id="3">
                        <label for="3"> ☆ </label> 
                        <input type="radio" name="rating" value="2" id="2">
                        <label for="2"> ☆ </label> 
                        <input type="radio" name="rating" value="1" id="1">
                        <label for="1"> ☆ </label>  -->
                        <div class="form-group">
                          <div class="row">
                            <label class="col-md-4">Select Star: </label>
                            <input type="number" name="rating" max="5" min="1" class="form-control col-md-7"><br>
                          </div>
                        </div>
                      <!-- </div> -->
                      <div class="comment-area"> 
                        <textarea name="description" class="form-control" placeholder="what is your view?" rows="4" required></textarea> 
                      </div>
                      <input type="hidden" name="oid" value="<?=$o['oid']?>">
                      <input type="hidden" name="uid" value="<?=$o['uid']?>">
                      <input type="hidden" name="pid" value="<?=$o['pid']?>">
                      <div class="text-center mt-4"> 
                        <button type="Submit" class="btn btn-success send px-5"> Submit <i class="fa fa-long-arrow-right ml-1"></i>
                        </button> 
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $checkRate = $this->Common_model->check_order_rating($o['oid']); 
                            if(count($checkRate)>0){?>

<div class="modal fade" id="r<?=$o['oid'].'1'?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: -50px;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="text-right cross"> 
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> 
            </div>
            <div class="card-body text-center"> 
              <img src="<?=base_url('assets/images/icons/like.jpg')?>" height="100" width="100">
                <div class="comment-box text-center">
                    <h4>Your Review</h4>
                    
                      <div class="" style="margin-top: 15px;">
                      <?php for($i=1; $i<=5; $i++){
                        if($i <= $checkRate[0]['ratings']){  ?>
                          <b class="text-warning fa fa-star"></b>
                        <?php } else { ?>
                        <b class="text-secondary fa fa-star"></b>
                      <?php } } ?>
                      </div>
                      <div class="comment-area" style="margin-top: 20px;"> 
                        <textarea name="description" class="form-control" placeholder="what is your view?" rows="4" readonly><?=$checkRate[0]['description']?></textarea> 
                      </div>
                     
                      <div class="text-center mt-4"> 
                        <a href="<?=base_url('deleteRating/').$checkRate[0]['rid']?>" class="btn btn-danger px-5"><i class="fa fa-trash"></i> Delete Review 
                        </a> 
                      </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<?php } ?>
                      <div class="row form-group" style="margin: 0;">
                        <div class="col-md-2">
                          <b> Order Id: </b> <?=$o['oid']?>
                        </div>
                         <div class="col-md-4">
                        </div>

                            <?php if($o['order_status'] != -1 && $o['order_status'] != 2){   if($o['staffid'] != null){?>

                            <div class="col-md-2 col-4">
                             <button style="padding-right: 20px; padding-left: 17px;" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#d<?=$o['oid']?>">
                               Delivery Man
                             </button>
                            </div>
                            <div class="col-md-2 col-4">
                             <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#o<?=$o['oid']?>">Confirm delivery</button>
                            </div>
                          <?php } else { ?>
                            <div class="col-md-2 col-4">
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                          <?php } ?>

                            <div class="col-md-2 col-4">
                             <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#c<?=$o['oid']?>">Cancle order</button>
                            </div>
                          <?php } else { ?>
                            <!-- <div class="col-md-2 col-4">
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                            <div class="col-md-2 col-4">
                             <button style="padding-right: 30px; padding-left: 27px;" class="btn btn-sm btn-success" data-toggle="modal" data-target="#c<?=$o['oid']?>">Reorder</button>
                            </div> -->
                          <?php } ?>

<div style="margin-top: 80px; " class="modal fade Condel" id="o<?=$o['oid']?>" tabindex="0" role="dialog" aria-labelledby="forgotPasswordLable" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Confirm Delivery</h3>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
            <span class="fa fa-times"></span>
          </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('confirmDelivery/')?>" method="post">
                  <div class="row form-group">
                    <div class="col-12">
                        <h3>Order ID:
                        <?=$o['oid']?></h3>
                        <input type="hidden" name="odid" value="<?=$o['oid']?>">
                      </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-12">
                        <label for="note">Note:</label>
                        <b class="text-danger">Before Confirming the delivery be sure that you recived the service. Once you confirm the delivery You will not claim for this order.</b>
                       <!--  <textarea class="form-control" id="reason" name="reason" placeholder="Reasone for cancle order..   Only 300 charecters.." rows="3" required></textarea> -->
                       <br><br><label for="forCode">Confirm Code:</label>
                       <input id="conCode" type="text" name="code" class="form-control" placeholder="Confirm code provided by service delivery boy" required>
                        <span id="errMsgCon"></span>
                      </div>
                  </div>
            
                  <div style="margin-top:20px; margin-left: 50%; " class="col-12"> 
                      <button type="button" class="btn btn-default" id="btclose" data-dismiss="modal">Cancle</button>
                      <button id="btnConfirmDel" type="submit" name="btnSubmit" class="btn btn-primary">Confirm </button><br>
                  </div>
                </form>
            </div>
          </div>
      </div>
  </div>


 <?php if($o['staffid'] != null){

    $stf = $this->Common_model->get_staff_by_staffid($o['staffid']);?>

  <div style="margin-top: 80px; " class="modal fade" id="d<?=$o['oid']?>" tabindex="0" role="dialog" aria-labelledby="forgotPasswordLable" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Delivery Man</h3>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
          <span class="fa fa-times"></span>
        </button>
          </div>
          <div class="modal-body">
                <div class="row form-group">
                  <div class="col-12">
                      <h3>Order ID:
                      <?=$o['oid']?></h3>
                      <input type="hidden" name="odid" value="<?=$o['oid']?>">
                    </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-6">
                    <img src="<?=base_url('assets/provider/img/staff/').$stf[0]['image']?>" class="col-md-12">
                  </div>
                  <div class="col-md-6">
                    <h3 style="margin-top: 10px;"><b>Name: </b><?= $stf[0]['name'] ?></h3>
                    <h3><b>Mo: </b><?= $stf[0]['contact'] ?></h3>
                  </div>
                </div>
          
                <!-- <div style="margin-top:20px; margin-left: 50%; " class="col-12"> 
                    <button type="button" class="btn btn-default" id="btclose" data-dismiss="modal">Cancle</button>
                    <button id="btnChange" type="submit" name="btnSubmit" class="btn btn-primary">Confirm </button><br>
                </div> -->
          </div>
        </div>
    </div>
  </div>
<?php } ?>


  <div style="margin-top: 80px; " class="modal fade" id="c<?=$o['oid']?>" tabindex="0" role="dialog" aria-labelledby="forgotPasswordLable" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Cancle Order</h3>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
          <span class="fa fa-times"></span>
        </button>
          </div>
          <div class="modal-body">
              <form action="<?=base_url('cancleOrder/')?>" method="post">
                <div class="row form-group">
                  <div class="col-12">
                      <h3>Order ID:
                      <?=$o['oid']?></h3>
                      <input type="hidden" name="odid" value="<?=$o['oid']?>">
                    </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12">
                      <label for="reason">Reason</label>
                      <textarea class="form-control" id="reason" name="reason" placeholder="Reasone for cancle order..   Only 300 charecters.." rows="3" required></textarea>
                      
                    </div>
                </div>
          
                <div style="margin-top:20px; margin-left: 50%; " class="col-12"> 
                    <button type="button" class="btn btn-default" id="btclose" data-dismiss="modal">Cancle</button>
                    <button id="btnChange" type="submit" name="btnSubmit" class="btn btn-primary">Confirm </button><br>
                </div>
              </form>
          </div>
        </div>
    </div>
  </div>  
                         
                      </div>
                      <div class="row form-group" style="margin: 0;">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-7" style="margin-top: 5px;">
                          <b class="text-danger">SERVICES</b>
                        </div>
                         <div class="col-md-3">
                          <b class="text-danger">PRICE</b>
                        </div>
                         
                      </div>

                      <a href="<?=base_url('invoice/').$o['oid']?>" class="bookmark "><span class="fa fa-download"></span></a>
                        <?php $cnt = 1; foreach($result['odtls'] as $odtls): ?> 
                        <div class="row form-group" style="margin: 0;">
                          <div class="col-md-1">
                          </div>
                          <div class="col-md-7">
                            <b style="font-size: 13px;"><?= $odtls['sname'] ?></b>
                          </div>
                          <div class="col-md-3">
                            <b style="font-size: 13px;"><?='₹ '.$odtls['price'] ?></b>
                          </div>
                        </div>
                        <?php endforeach ?> 
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade bd-example-modal-sm"  id="ConfirmErr" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 80px;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delivery</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body text-danger">Confirm code is incorrect. Try Again...</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-sm"  id="ConfirmSuccess" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 80px;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delivery</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body text-danger">Delivery Confirmed.</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   
                </div>
            </div>
        </div>
    </div>


     <?php $this->load->view('includes/footer'); ?>
    <script src="https://kit.fontawesome.com/919bc432f5.js" crossorigin="anonymous"></script>

    <script>
      var conerr = $('#conCodeErr').val();
      if(conerr != '0'){
        $('#ConfirmErr').modal('show');
        $('#conCodeErr').val('0');
        $('#errMsgCon').html('<?=$this->session->flashdata('conCodeErr')?>');
      }
      // else{
      //   $('#ConfirmSuccess').modal('show');
      // }
    </script>
    <!-- <script>
      $('#btnConfirmDel').click(function(){
        var codeVal = $('#conCode').val();

        $.ajax({
          url: '<?=base_url('checkConCode/')?>'+codeVal,
          success: function(result){

          }
        });

      });
    </script> -->
  </body>
</html>