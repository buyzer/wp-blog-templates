<?php
/**
* Stored Variables
* @var $table_list
*/
?>
<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e( 'Blog Templates', 'wpbtpls' ); ?></h1>
	<a href="<?php echo admin_url( 'admin.php?page=wpbtpls-new' );?>" class="page-title-action"><?php _e( 'Add New', 'wpbtpls' ); ?></a>
	<hr class="wp-header-end" />
	<?php do_action( 'wpbtpls_messages' ); ?>
	<form id="posts-filter" method="get">
		<input type="hidden" name="page" value="<?php echo esc_attr( $_REQUEST['page'] ); ?>">
		<?php
		$table_list->prepare_items();
		$table_list->search_box( __( 'Search', 'wpbtpls' ), 'post' );
		$table_list->display();
		?>
	</form>
</div>