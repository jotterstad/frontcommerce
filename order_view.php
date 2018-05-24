<section class="content-header">
    <h1>
        Orders
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Orders</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
        <div class="box-header">
            <h3 class="box-title">All Orders</h3>
            <div class="box-tools">
                <div class="input-group">
                    <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                    <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <?php if(empty($get_all_orders)): ?>
            	<div class="no-order-display-message"></div>
            <?php else: ?>
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th>Full Name</th>
                    <th>Order Number</th>
                    <th>Order Date</th>
                </tr>
                <?php foreach($get_all_orders as $orders): ?>
                <tr>
                    <td class="product-list-title"><a href="<?= base_url(); ?>admin/orders/detail/<?= $orders->order_number; ?>"><?= $orders->order_customer_first_name; ?> <?= $orders->order_customer_last_name; ?></a></td>
                    <td><?= $orders->order_number; ?></td>
                    <td><?= $orders->order_date; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            <?php endif; ?>
        </div><!-- /.box-body -->
    </div>
</section>