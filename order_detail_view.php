<?php foreach($get_order_detail as $order): ?>
<?php $order_products = json_decode($order->order_details); ?>
<?php
	unset($order_products->total_items);
	unset($order_products->cart_total);
?>	
<section class="content-header">
    <h1>
        Orders
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/orders">Orders</a></li>
        <li class="active">Details</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
        <div class="box-header">
            <h3 class="box-title">Order #<?= $order->order_number; ?></h3>
            <div class="box-tools">
                <div class="input-group">
                    <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                    <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
			<div class="form-group">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="email" class="form-control" value="<?= $order->order_customer_first_name.' '.$order->order_customer_last_name; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="email" class="form-control" value="<?= $order->order_customer_address; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address2</label>
                <input type="email" class="form-control" value="<?= $order->order_customer_address2; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">City</label>
                <input type="email" class="form-control" value="<?= $order->order_customer_city; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">State</label>
                <input type="email" class="form-control" value="<?= $order->order_customer_state; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Zip</label>
                <input type="email" class="form-control" value="<?= $order->order_customer_zip; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="email" class="form-control" value="<?= $order->order_customer_phone; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" value="<?= $order->order_customer_email; ?>">
            </div>
            
            
			<table class="table table-hover">
                <tbody>
                <tr>
                    <th>Product Photo</th>
                    <th>Product Name</th>
                    <th>SKU</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>SubTotal</th>
                </tr>
                <?php foreach($order_products as $item): ?>
                <tr>
                    <td><img src="/images/<?= $item->photo; ?>" width="100" /></td>
                    <td><?= $item->name; ?></td>
                    <td><?= $item->id; ?></td>
                    <td><?= $item->qty; ?></td>
                    <td>$<?= $item->price; ?></td>
                    <td>$<?= $item->subtotal; ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                	<td colspan="5" align="right">Cart Total:</td>
                	<td colspan="1">$ <?= $cart_total; ?></td>
                </tr>
            </tbody>
            </table>
        </div><!-- /.box-body -->
    </div>
</section>
<?php endforeach; ?>
