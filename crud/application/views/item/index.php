
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
            Item Management
            <table class="table table-striped">
                <tr><th>Image</th><th>ID</th><th>Name</th><th>Price</th><th>Action</th></tr>
                <?php foreach($items as $item): ?>
                <tr>
                    <td><img class="img-circle" src="<?=base_url().'uploads_thumb/'.$item->image?>" width="50" /> </td>
                    <td><?=$item->id?></td>
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
                <tr><td colspan=4><?=$links?></td></tr>
            </table>
            
            <a class="btn btn-success" href="<?=base_url()?>item/add" role="button">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    ADD ITEM</a>
            </div>
            
        </div>
        
    </div>
