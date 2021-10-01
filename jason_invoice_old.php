<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php do_action( 'wpo_wcpdf_before_document', $this->type, $this->order ); ?>


<?php
add_shortcode('billing-address', function(){ ?>
<!-- <h3><?php _e( 'Billing Address:', 'woocommerce-pdf-invoices-packing-slips' ); ?></h3> -->
			<?php do_action( 'wpo_wcpdf_before_billing_address', $this->type, $this->order ); ?>
			<?php $this->billing_address(); ?>
			<?php do_action( 'wpo_wcpdf_after_billing_address', $this->type, $this->order ); ?>
			<?php if ( isset($this->settings['display_email']) ) { ?>
			<div class="billing-email"><?php $this->billing_email(); ?></div>
			<?php } ?>
			<?php if ( isset($this->settings['display_phone']) ) { ?>
			<div class="billing-phone"><?php $this->billing_phone(); ?></div>
			<?php } ?>
<?php });
?>

<?php echo do_shortcode('[elementor-template id="7929"]') ?>

<table class="head container">
	<tr>
		<td class="shop-info">
		</td>
		<td class="header" style="text-align: right;">
		<?php
		if( $this->has_header_logo() ) {
			$this->header_logo();
		} else {
			echo $this->get_title();
		}
		?>
		</td>
	</tr>
</table>

<h1 class="document-type-label" style="font-size: 45px;">
<?php // if( $this->has_header_logo() ) echo $this->get_title(); ?>
<img src="https://hellotime.co.uk/wp-content/uploads/2020/02/Hello-Im-Here.jpg" height="45px">
</h1>

<?php do_action( 'wpo_wcpdf_after_document_label', $this->type, $this->order ); ?>

<table class="order-data-addresses">
	<tr>
		<td class="address billing-address" style="font-size: 14px; line-height: 12px;">
			<!-- <h3><?php _e( 'Billing Address:', 'woocommerce-pdf-invoices-packing-slips' ); ?></h3> -->
			<?php do_action( 'wpo_wcpdf_before_billing_address', $this->type, $this->order ); ?>
			<?php $this->billing_address(); ?>
			<?php do_action( 'wpo_wcpdf_after_billing_address', $this->type, $this->order ); ?>
			<?php if ( isset($this->settings['display_email']) ) { ?>
			<div class="billing-email"><?php $this->billing_email(); ?></div>
			<?php } ?>
			<?php if ( isset($this->settings['display_phone']) ) { ?>
			<div class="billing-phone"><?php $this->billing_phone(); ?></div>
			<?php } ?>
		</td>
	</tr>
	<tr>
		<td style="text-align: center !important;" class="td-center">
			<br>
			<div style="width: 150px; display: inline-block !important; margin: auto !important;" class="small-header"><?php if( $this->has_header_logo() ) { $this->header_logo(); } else { echo $this->get_title(); } ?></div>
			<br><br><br>
		</td>
	</tr>
	<tr>
		<td>
			<h1 class="document-type-label thank-you" style="font-size: 23px; font-family: 'Campton Book';">
				<!--THANK YOU FOR YOUR ORDER-->

				<img style="height: 15px;" src="https://hellotime.co.uk/wp-content/uploads/2021/09/Thank-you.png">
			</h1>

			<table class="order-data-addresses" style="width: 300px; font-size: 16px; line-height: 16px;">
				<tr>
					<td class="address shipping-address">
						<?php if ( !empty($this->settings['display_shipping_address']) && ( $this->ships_to_different_address() || $this->settings['display_shipping_address'] == 'always' ) ) { ?>
						<h3><?php _e( 'Ship To:', 'woocommerce-pdf-invoices-packing-slips' ); ?></h3>
						<?php do_action( 'wpo_wcpdf_before_shipping_address', $this->type, $this->order ); ?>
						<?php $this->shipping_address(); ?>
						<?php do_action( 'wpo_wcpdf_after_shipping_address', $this->type, $this->order ); ?>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="order-data">
						<table>
							<?php do_action( 'wpo_wcpdf_before_order_data', $this->type, $this->order ); ?>
							<?php if ( isset($this->settings['display_number']) ) { ?>
							<tr class="invoice-number">
								<th><strong>Invoice:<?php //echo $this->get_number_title(); ?></strong></th>
								<td><?php $this->invoice_number(); ?></td>
							</tr>
							<?php } ?>
							<?php if ( isset($this->settings['display_date']) ) { ?>
							<tr class="invoice-date">
								<th><strong>Date:<?php //echo $this->get_date_title(); ?></strong></th>
								<td><?php $this->invoice_date(); ?></td>
							</tr>
							<?php } ?>
							<tr class="order-number">
								<th>Order:<strong><?php //_e( 'Order Number:', 'woocommerce-pdf-invoices-packing-slips' ); ?></strong></th>
								<td><?php $this->order_number(); ?></td>
							</tr>
							<tr class="order-date">
								<th><strong>Date:<?php //_e( 'Order Date:', 'woocommerce-pdf-invoices-packing-slips' ); ?></strong></th>
								<td><?php $this->order_date(); ?></td>
							</tr>
							<?php do_action( 'wpo_wcpdf_after_order_data', $this->type, $this->order ); ?>
						</table>			
					</td>
				</tr>
			</table>
		</td>
		
	</tr>
</table>
<br>
<?php do_action( 'wpo_wcpdf_before_order_details', $this->type, $this->order ); ?>

<table class="order-details">
	<thead>
		<tr>
			<th class="product"><?php _e('Product', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
			<th class="quantity"><?php _e('Quantity', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
			<th class="price"><?php _e('Price', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $items = $this->get_order_items(); if( sizeof( $items ) > 0 ) : foreach( $items as $item_id => $item ) : ?>
		<tr class="<?php echo apply_filters( 'wpo_wcpdf_item_row_class', 'item-'.$item_id, $this->type, $this->order, $item_id ); ?>">
			<td class="product">
				<?php $description_label = __( 'Description', 'woocommerce-pdf-invoices-packing-slips' ); // registering alternate label translation ?>
				<span class="item-name"><?php echo $item['name']; ?></span>
				<?php do_action( 'wpo_wcpdf_before_item_meta', $this->type, $item, $this->order  ); ?>
				<span class="item-meta"><?php echo $item['meta']; ?></span>
				<dl class="meta">
					<?php $description_label = __( 'SKU', 'woocommerce-pdf-invoices-packing-slips' ); // registering alternate label translation ?>
					<?php if( !empty( $item['sku'] ) ) : ?><dt class="sku"><?php _e( 'SKU:', 'woocommerce-pdf-invoices-packing-slips' ); ?></dt><dd class="sku"><?php echo $item['sku']; ?></dd><?php endif; ?>
					<?php if( !empty( $item['weight'] ) ) : ?><dt class="weight"><?php _e( 'Weight:', 'woocommerce-pdf-invoices-packing-slips' ); ?></dt><dd class="weight"><?php echo $item['weight']; ?><?php echo get_option('woocommerce_weight_unit'); ?></dd><?php endif; ?>
				</dl>
				<?php do_action( 'wpo_wcpdf_after_item_meta', $this->type, $item, $this->order  ); ?>
			</td>
			<td class="quantity"><?php echo $item['quantity']; ?></td>
			<td class="price"><?php echo $item['order_price']; ?></td>
		</tr>
		<?php endforeach; endif; ?>
	</tbody>
	<tfoot>
		<tr class="no-borders">
			<td class="no-borders">
				<div class="document-notes">
					<?php do_action( 'wpo_wcpdf_before_document_notes', $this->type, $this->order ); ?>
					<?php if ( $this->get_document_notes() ) : ?>
						<h3><?php _e( 'Notes', 'woocommerce-pdf-invoices-packing-slips' ); ?></h3>
						<?php $this->document_notes(); ?>
					<?php endif; ?>
					<?php do_action( 'wpo_wcpdf_after_document_notes', $this->type, $this->order ); ?>
				</div>
				<div class="customer-notes">
					<?php do_action( 'wpo_wcpdf_before_customer_notes', $this->type, $this->order ); ?>
					<?php if ( $this->get_shipping_notes() ) : ?>
						<h3><?php _e( 'Customer Notes', 'woocommerce-pdf-invoices-packing-slips' ); ?></h3>
						<?php $this->shipping_notes(); ?>
					<?php endif; ?>
					<?php do_action( 'wpo_wcpdf_after_customer_notes', $this->type, $this->order ); ?>
				</div>				
			</td>
			<td class="no-borders" colspan="2">
				<table class="totals">
					<tfoot>
						<?php foreach( $this->get_woocommerce_totals() as $key => $total ) : ?>
						<tr class="<?php echo $key; ?>">
							<th class="description"><?php echo $total['label']; ?></th>
							<td class="price" style="font-family: Open Sans !important"><span class="totals-price" style="font-family: Open Sans !important"><?php echo $total['value']; ?></span></td>
						</tr>
						<?php endforeach; ?>
					</tfoot>
				</table>
			</td>
		</tr>
	</tfoot>
</table>

<div class="bottom-spacer"></div>

<?php do_action( 'wpo_wcpdf_after_order_details', $this->type, $this->order ); ?>

<?php if ( $this->get_footer() ): ?>
<div id="footer">
	<!-- hook available: wpo_wcpdf_before_footer -->
	<?php $this->footer(); ?>
	<!-- hook available: wpo_wcpdf_after_footer -->
</div><!-- #letter-footer -->
<?php endif; ?>
<?php do_action( 'wpo_wcpdf_after_document', $this->type, $this->order ); ?>
