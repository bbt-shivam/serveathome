<!DOCTYPE html>
<html>
<?php $this->load->view('includes/header'); ?>

<body>	
    <?php $this->load->view('includes/nav'); ?>
		<table cellpadding="10" cellspacing="1" width="70%" align="center">
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<?php	if($this->cart->total_items()>0){ ?>

		<tr>
			<!-- <th style="text-align:left;">Image</th> -->
			<th style="text-align:center; background-color: #e8e4e4;"width="5%">Image</th>
			<th style="text-align:center; background-color: #e8e4e4;" width="5%">Service Date</th>
			<th style="text-align:center; background-color: #e8e4e4;" width="10%">Name</th>
			<th style="text-align:center; background-color: #e8e4e4" width="5%">Price</th>
			<th style="text-align:center; background-color: #e8e4e4;" width="3	%">Total</th>
			<th style="text-align:center; background-color: #e8e4e4" width="5%">Remove</th>
		</tr>
		<?php
			foreach($crt as $c)
			{
				?>
				<tr>
					<td style="text-align:center;"><img height="100" width="150" src="<?=base_url('assets/images/').$c['url'] ?>"></td>
					<td><!-- <input type="number" id="upcart" class="qtyup" data="<?=$c['rowid']?>" name='qty' value="<?=$c['qty']?>">  --></td>
					<td style="text-align:center;"><?= $c['name'] ?></td>
					<td style="text-align:center;"><?=$c['price']?></td>
					<td  style="text-align:center;"><?=$c['subtotal']?></td>
					<td style="text-align:center;"><a href="<?=base_url('removecart/')?><?=$c['rowid']?>">
						<i class="fa fa-trash">remove</a></td>
				</tr>
		<?php
			}
		?>
					<tr><th colspan="4" style="text-align:left; background-color: #e8e4e4;" style="text-align:center;">Final total</th>
					<th style="text-align:right; background-color: #e8e4e4;" width="5%"><i class="fa fa-rupee"></i> <?=$this->cart->total();?> /-</th><th style="text-align:right; background-color: #e8e4e4;" width="5%"><p class="mt-3"><a href="<?php echo base_url("confirmOrderPage") ?>" class="btn btn-primary">Book</a></p></th></tr>
			<?php 
					}
					else
					{
							?>
							<td colspan="5" align="center" style="text-align:center;"><b>Your cart is empty.....</b></td>
					<?php } ?>
						
					<tr><td><td></tr>
				<tr><td><td></tr>
				<tr><td><td></tr>
				<tr><td><td></tr>
				<tr><td><td></tr>
			</table>
<?php $this->load->view('includes/footer'); ?>
</body>
 
</html>
<script>
	 
	 $('.qtyup').change(function(){ 
			 newqty=$(this).val();
			 rowid=$(this).attr('data');
			 id=$('#id').val();
			if (newqty <= 0) {
				alert('enter only valid qty');
			}
			else{
				$.ajax({
					url: "<?=base_url('updatecart/')?>"+id,
					data: "qty=" + newqty + "& rowid=" + rowid + "& id=" + id,
					success: function(result){
						if(result==1)
						{
							location.reload();
						}
					}
				})
			}
		}); 
	
</script>