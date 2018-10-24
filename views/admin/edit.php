<?php
/**
* Stored Variables
* @var $categories
* @var $post_tags
* @var $blog_template
* @var $blog_template_attrs
*/
$default_attrs = WPBTPLS_Layout::default_attrs();
$attr = array_merge($default_attrs, (array)$blog_template_attrs);
?>
<div class="wrap">
	<?php do_action('wpbtpls_messages'); ?>
	<h1 class="wp-heading-inline"><?php _e( 'Edit Blog Template', 'wpbtpls' );?></h1>
	<a href="<?php echo admin_url( 'admin-post.php?page=wpbtpls-new' );?>" class="page-title-action"><?php _e( 'Add New', 'wpbtpls' ); ?></a>
	<hr class="wp-header-end">
	<form method="POST" action="<?php echo admin_url( 'admin.php?page=wpbtpls' );?>" id="wpbtpls-form">
		<?php wp_nonce_field( 'wpbtpls-edit-template-'.$blog_template->ID );?>
		<input type="hidden" name="post_id" value="<?php echo $blog_template->ID; ?>">
		<input type="hidden" name="action" value="edit_template">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
				<div id="post-body-content">
					<div id="titlediv">
						<div id="titlewrap">
								<input type="text" name="title" size="30" placeholder="<?php _e( 'Enter template title', 'wpbtpls' );?>" id="title" autocomplete="off" required value="<?php echo $blog_template->post_title; ?>">
						</div>
						<p>
							<i><?php _e( 'Copy & Paste this shortcode to your Page / Post', 'wpbtpls' ); ?></i>
							<code>[wpbtpls id="<?php echo $blog_template->ID; ?>"]</code>
						</p>
					</div>
					<div id="wpbtpls-tabs" class="wpbtpls-tabs">
						<ul>
							<li><a href="#tabs-1"><?php _e( 'Build Query', 'wpbtpls' ); ?></a></li>
							<li><a href="#tabs-2"><?php _e( 'Build Template', 'wpbtpls' ); ?></a></li>
							<li><a href="#tabs-3"><?php _e( 'Advanced', 'wpbtpls' ); ?></a></li>
						</ul>
						<div id="tabs-1">
							<table class="form-table">
								<tr>
									<th><?php _e( 'Specific Post Category', 'wpbtpls' ); ?></th>
									<td>
										<select name="category">
											<option value="0"><?php _e( 'None', 'wpbtpls' ); ?></option>
											<?php
											foreach ( $categories as $category ) {
												$selected = $attr['category'] == $category->term_id ? 'selected' : '';
												echo '<option value="'. $category->term_id .'" '. $selected .'>'. $category->name .'</option>';	
											}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<th><?php _e( 'Specific Post Tag', 'wpbtpls' ); ?></th>
									<td>
										<select name="post_tag">
											<option value="0"><?php _e( 'None', 'wpbtpls' ); ?></option>
											<?php
											foreach ( $post_tags as $tag ) {
												$selected = $attr['post_tag'] == $tag->term_id ? 'selected' : '';
												echo '<option value="'. $tag->term_id .'" '. $selected .'>'. $tag->name .'</option>';	
											}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<th><?php _e( 'Posts per Page', 'wpbtpls' ); ?></th>
									<td>
										<input type="number" name="posts_per_page" value="<?php echo $attr['posts_per_page']; ?>" class="small-text">
									</td>
								</tr
>								<tr>
									<th><?php _e( 'Order By', 'wpbtpls' ); ?></th>
									<td>
										<select name="order_by">
											<option value=""><?php _e( 'None', 'wpbtpls' ); ?></option>
											<option <?php echo $attr['order_by'] == 'date' ? 'selected' : ''; ?> value="date"><?php _e( 'Date', 'wpbtpls' ); ?></option>
											<option <?php echo $attr['order_by'] == 'title' ? 'selected' : ''; ?> value="title"><?php _e( 'Title', 'wpbtpls' ); ?></option>
											<option <?php echo $attr['order_by'] == 'random' ? 'selected' : ''; ?> value="random"><?php _e( 'Random', 'wpbtpls' ); ?></option>
											<option <?php echo $attr['order_by'] == 'menu_order' ? 'selected' : ''; ?> value="menu_order"><?php _e( 'Menu Order', 'wpbtpls' ); ?></option>
										</select>
									</td>
								</tr>
								<tr>
									<th><?php _e( 'Sort Order', 'wpbtpls' ); ?></th>
									<td>
										<select name="sort_order">
											<option value=""><?php _e( 'None', 'wpbtpls' ); ?></option>
											<option <?php echo $attr['sort_order'] == 'desc' ? 'selected' : ''; ?> value="desc"><?php _e( 'Descending', 'wpbtpls' ); ?></option>
											<option <?php echo $attr['sort_order'] == 'asc' ? 'selected' : ''; ?> value="asc"><?php _e( 'Ascending', 'wpbtpls' ); ?></option>
										</select>
									</td>
								</tr>
								<tr>
									<th><?php _e( 'Navigation', 'wpbtpls' ); ?></th>
									<td>
										<select name="navigation">
											<option value="none"><?php _e( 'None', 'wpbtpls' ); ?></option>
											<option <?php echo $attr['navigation'] == 'pagination' ? 'selected' : ''; ?> value="pagination"><?php _e( 'Pagination', 'wpbtpls' ); ?></option>
											<option <?php echo $attr['navigation'] == 'loadmore' ? 'selected' : ''; ?> value="loadmore"><?php _e( 'Load More', 'wpbtpls' ); ?></option>
										</select>
									</td>
								</tr>
								<tr class="items-on-load" style="display: none;">
									<th><?php _e( 'Items on Load', 'wpbtpls' ); ?></th>
									<td>
										<input type="number" name="items_on_load" class="small-text" value="<?php echo $attr['items_on_load']; ?>" >
									</td>
								</tr>
							</table>
						</div>
						<div id="tabs-2">
							<table class="form-table wpbtpls-box-layout">
								<tr>
									<th><?php _e( 'Layout', 'wpbtpls' ); ?></th>
									<td>
									<?php
										foreach ( WPBTPLS_Layout::layouts() as $layoutkey => $layout ) {
										$checked = $layoutkey == $attr['layout'] ? 'checked' : '';
										?>
											<div class="wpbtpls-item-layout">
												<input type="radio" name="layout" value="<?php echo $layoutkey; ?>" id="wpbtpls-layout-<?php echo $layoutkey; ?>" <?php echo $checked; ?> >
												<label for="wpbtpls-layout-<?php echo $layoutkey; ?>" title="<?php echo $layout['title']; ?>">
													<img src="<?php echo $layout['thumbnail']; ?>" >
												</label>
											</div>
										<?php
										}
									?>
									</td>
								</tr>
							</table>
						</div>
						<div id="tabs-3">
							<table class="form-table">
								<tr>
									<th><?php _e( 'Wrapper Class', 'wpbtpls' ); ?></th>
									<td>
										<input type="text" name="wrapper_class" value="<?php echo $attr['wrapper_class']; ?>">
									</td>
								</tr>
								<tr>
									<th><?php _e( 'Wrapper ID', 'wpbtpls' ); ?></th>
									<td>
										<input type="text" name="wrapper_id" value="<?php echo $attr['wrapper_id']; ?>">
									</td>
								</tr>
								<tr>
									<th><?php _e( 'Item Class', 'wpbtpls' ); ?></th>
									<td>
										<input type="text" name="item_class" value="<?php echo $attr['item_class']; ?>">
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div id="postbox-container-1" class="postbox-container">
					<div id="submitdiv" class="postbox">
						<h2><span><?php _e( 'Action', 'wpbtpls' ); ?></span></h2>
						<div class="submitbox">
							<div id="major-publishing-actions">
								<div id="delete-action">
									<a href="<?php echo wp_nonce_url( 'admin.php?page=wpbtpls&post='. $blog_template->ID .'&action=delete_template', 'wpbtpls-delete-template' );?>" class="submitdelete" onclick="return confirm('<?php _e( 'This action will deleting Item permanently.', 'wpbtpls' ); ?>');" ><?php _e( 'Delete', 'wpbtpls' );?></a>
								</div>
								<div id="publishing-action">
									<span class="spinner"></span>
									<input name="submit" type="submit" class="button button-primary button-large" id="wpbtpls-submit" value="<?php _e( 'Update', 'wpbtpls' );?>">
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>