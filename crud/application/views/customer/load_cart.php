<?php foreach($this->cart->contents() as $items): ?>
<form action="<?=base_url()?>customer/updateitemcart" method="post" ?>

<tr>
    <td><img class="img-circle" src="<?=base_url().'uploads_thumb/'.$items['image']?>" width="50" /> </td>
    <td><?=$items['id']?></td>
    <td><?=$items['name']?></td>
    <td><?=$items['price']?></td>
    <td><?= form_input(array(
        'id' => $items['name'].$items['id'],
        'value' => $items['qty'], 
        'maxlength' => '3', 
        'size' => '5')); ?> </td>
    <td><?=$this->cart->format_number($items['subtotal'])?></td>
    <td>
    <button class="remove_cart btn btn-danger" id="<?=$items['rowid']?>" role="button">
    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
    <button class="update_cart btn btn-warning" data-itemid="<?=$items['name'].$items['id'];?>" data-rowid="<?=$items['rowid'];?>"  role="button">
    <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
    
    </button>
    
    </td>
</tr>
</form>
<?php endforeach; ?>
<tr><td colspan="5"><h3><span class="label label-default">TOTAL</span></h3></td>
<td colspan="2"><h3><span class="label label-default"><?=$this->cart->format_number($this->cart->total())?></span></h3></td></tr>