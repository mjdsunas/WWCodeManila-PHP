<div class="container-fluid" >
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>IMAGE</th>
                <th>NAME</th>
                <th>PRICE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($items as $item): ?>
                <tr>
                    <td><?=$item->id?></td>
                    <td><img class="img-circle" src="<?=base_url().'uploads_thumb/'.$item->image?>" width="50" /> </td>
                    
                    <td><?=$item->name?></td>
                    <td><?=$item->price?></td>
                    <td>
                    <a class="btn btn-primary" href="<?=base_url()?>item/view/<?=$item->id?>" role="button">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    View</a>
                    <a class="btn btn-warning" href="<?=base_url()?>item/edit/<?=$item->id?>" role="button">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    Edit</a>
                    <a class="btn btn-danger" href="<?=base_url()?>item/delete/<?=$item->id?>" role="button">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    Delete</a>
                    
                    </td>
                </tr>
                <?php endforeach; ?>


        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>IMAGE</th>
                <th>NAME</th>
                <th>PRICE</th>
                <th>ACTION</th>
                
            </tr>
        </tfoot>
    </table>
</div>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>">
</script>
<script type="text/javascript" 
src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" 
src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js">
</script>


<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );

</script>