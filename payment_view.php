<section class="content-header">
    <h1>
        Payment
        <small>Gateways</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Settings</li>
        <li class="active">Payment Gateways</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
        <div class="box-header">
            <h3 class="box-title">Gateway Options</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
        	
        	<?php if(empty($get_site_gateway)): ?>
	        	<?php echo form_open('admin/payment'); ?>
		        	<div class="form-group">
		                <label>Payment Gateway</label>
		                <select name="gateway_name">
						  <option value="stripe">Stripe</option>
						</select>
		            </div>
		            <div class="form-group">
		                <label>Payment Gateway Public API</label>
						<input type="text" name="gateway_public_api" class="form-control" />
		            </div>
		            <div class="form-group">
						<input type="submit" class="btn btn-success" value="Submit"/>
		            </div>
	            </form>
            <?php endif; ?>
        	
        	
            <?php foreach($get_site_gateway as $gateway): ?>
	            <?php echo form_open('admin/payment'); ?>
	             <div class="form-group">
	                <label>Payment Gateway Name</label>
	                <select name="gateway_name">
						<option value="stripe">Stripe</option>
					</select>
	            </div>	
				<div class="form-group">
		            <label>Payment Gateway Public API</label>
					<input type="text" name="gateway_public_api" class="form-control" value="<?= $gateway->gateway_public_api; ?>" />
	        	</div>
	            <div class="form-group">
	            	<input type="hidden" name="crud_status" value="update" />
					<input type="submit" class="btn btn-success" value="Update"/>
	            </div>
	            </form>
			<?php endforeach; ?>
        </div><!-- /.box-body -->
    </div>
</section>



