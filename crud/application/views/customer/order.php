
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-6" >
			<h2>PRODUCT</h2>
			<div class="row" >
			<?php foreach ($items as $item) : ?>
				<div class="col-md-4" style="height:360px;" >
					<div class="thumbnail">
                        <div style="height: 200px; text-align: center;line-height: 200px;">    
						    <img style="display: inline-block;vertical-align: middle;" 
                            width="150" src="<?=base_url().'uploads/'.$item->image?>">
                        </div>
						<div class="caption">
							<h4><?=$item->name;?></h4>
							<div class="row">
								<div class="col-md-6">
									<h4><?= number_format($item->price);?></h4>
								</div>
								<div class="col-md-6">
									<input type="number" name="qty" id="<?= $item->id;?>" 
                                    value="1" class="quantity form-control">
								</div>
							</div>
							<button class="add_cart btn btn-success btn-block" 
                            data-itemid="<?=$item->id;?>" data-itemname="<?=$item->name;?>" 
                            data-itemprice="<?=$item->price;?>">Add To Cart</button>
						</div>
					</div>
				</div>
			<?php endforeach;?>
		</div>
		</div>

    <div class="col-md-6">
        <h2>CART</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th>Image</th><th>ID</th><th>Name</th>
                    <th>Price</th><th>Quantity</th><th>Total</th><th>Action</th>
                    </tr>
                </thead>
                <tbody id="detail_cart">
				</tbody>
            </table>
            </div>  
			        </div> <!-- end row -->
        <div class="row">
            <div class="col-md-2"></div>
        </div>
    </div>  
    </div>
    
</div>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.add_cart').click(function(){
			var item_id    = $(this).data("itemid");
			var item_name  = $(this).data("itemname");
			var item_price = $(this).data("itemprice");
			var quantity   	  = $('#' + item_id).val();
			$.ajax({
				url : "<?php echo site_url('customer/additemtocart');?>",
				method : "POST",
				data : {id: item_id, name: item_name, price: item_price, qty: quantity},
				success: function(data){
					$('#detail_cart').html(data);
				}
			});
		});
		$('#detail_cart').load("<?= site_url('customer/load_cart');?>");
        $(document).on('click','.remove_cart',function(){
			var row_id=$(this).attr("id"); 
            //alert(row_id);
			$.ajax({
				url : "<?=site_url('customer/removeitemcart');?>",
				method : "POST",
				data : {id : row_id},
				success :function(data){
					$('#detail_cart').html(data);
				}
			});
		});

        $(document).on('click','.update_cart',function(){
            var item_id =$(this).data("itemid"); 
			var row_id = $(this).data("rowid"); 
            var qty = $('#'+item_id).val();
			$.ajax({
				url : "<?php echo site_url('customer/updateitemcart');?>",
				method : "POST",
				data : {rowid : row_id, qty: qty},
				success :function(data){
					$('#detail_cart').html(data);
				}
			});
		});
	});
</script>