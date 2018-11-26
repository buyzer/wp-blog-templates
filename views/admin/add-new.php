<?php
/**
* Stored Variables
* @var $categories
* @var $post_tags
*/
?>
<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e( 'Add New Blog Template', 'wpbtpls' );?></h1>
	<hr class="wp-header-end">
	<form method="POST" action="<?php echo admin_url( 'admin.php?page=wpbtpls' );?>" id="wpbtpls-form">
		<?php wp_nonce_field( 'wpbtpls-add-template' );?>
		<input type="hidden" name="action" value="add_template">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
				<div id="post-body-content">
					<div id="titlediv">
						<div id="titlewrap">
								<input type="text" name="title" size="30" placeholder="<?php _e( 'Enter template title', 'wpbtpls' );?>" id="title" autocomplete="off" required>
						</div>
					</div>
					<div id="wpbtpls-tabs" class="wpbtpls-tabs">
						<ul>
							<li><a href="#tabs-1"><?php _e( 'Build Query', 'wpbtpls' ); ?></a></li>
							<li><a href="#tabs-2"><?php _e( 'Build Template', 'wpbtpls' ); ?></a></li>
							<li><a href="#tabs-3"><?php _e( 'Content', 'wpbtpls' ); ?></a></li>
							<li><a href="#tabs-4"><?php _e( 'Advanced', 'wpbtpls' ); ?></a></li>
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
												echo '<option value="'. $category->term_id .'">'. $category->name .'</option>';	
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
												echo '<option value="'. $tag->term_id .'">'. $tag->name .'</option>';	
											}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<th><?php _e( 'Posts per Page', 'wpbtpls' ); ?></th>
									<td>
										<input type="number" name="posts_per_page" value="<?php echo get_option( 'posts_per_page' ); ?>" class="small-text">
									</td>
								</tr
>								<tr>
									<th><?php _e( 'Order By', 'wpbtpls' ); ?></th>
									<td>
										<select name="order_by">
											<option value=""><?php _e( 'None', 'wpbtpls' ); ?></option>
											<option value="date"><?php _e( 'Date', 'wpbtpls' ); ?></option>
											<option value="title"><?php _e( 'Title', 'wpbtpls' ); ?></option>
											<option value="random"><?php _e( 'Random', 'wpbtpls' ); ?></option>
											<option value="random"><?php _e( 'Menu Order', 'wpbtpls' ); ?></option>
										</select>
									</td>
								</tr>
								<tr>
									<th><?php _e( 'Sort Order', 'wpbtpls' ); ?></th>
									<td>
										<select name="sort_order">
											<option value=""><?php _e( 'None', 'wpbtpls' ); ?></option>
											<option value="desc"><?php _e( 'Descending', 'wpbtpls' ); ?></option>
											<option value="asc"><?php _e( 'Ascending', 'wpbtpls' ); ?></option>
										</select>
									</td>
								</tr>
								<tr>
									<th><?php _e( 'Navigation', 'wpbtpls' ); ?></th>
									<td>
										<select name="navigation">
											<option value="none"><?php _e( 'None', 'wpbtpls' ); ?></option>
											<option value="pagination"><?php _e( 'Pagination', 'wpbtpls' ); ?></option>
											<option value="loadmore"><?php _e( 'Load More', 'wpbtpls' ); ?></option>
										</select>
									</td>
								</tr>
								<tr class="items-on-load" style="display: none;">
									<th><?php _e( 'Items on Load', 'wpbtpls' ); ?></th>
									<td>
										<input type="number" name="items_on_load" value="<?php echo get_option( 'posts_per_page' ); ?>" class="small-text">
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
										$checked = $layoutkey == 'standart1' ? 'checked' : '';
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
									<th><?php _e( 'Featuted Image Size', 'wpbtpls' ); ?></th>
									<td>
										<input type="text" name="image_size" value="thumbnail">
										<p class="description">
											<?php _e( 'Image size for Featured Image (thumbnail, medium, large, etc)' ); ?>
										</p>
									</td>
								</tr>
								<tr>
									<th><?php _e( 'Show Date ?', 'wpbtpls' ); ?></th>
									<td>
										<input type="checkbox" name="show_date" value="1" checked>
									</td>
								</tr>
								<tr>
									<th><?php _e( 'Show Date ?', 'wpbtpls' ); ?></th>
									<td>
										<input type="text" name="date_format" value="F j, Y">
										<p class="description">
											<?php
												echo sprintf( '%s : <a href="%s" target="_blank">%s</a>', 
													__( 'Date format sample', 'wpbtpls' ),
													'http://php.net/manual/en/function.date.php',
													__( 'Click Me', 'wpbtpls' )
												);
											?>
										</p>
									</td>
								</tr>
								<tr>
									<th><?php _e( 'Show Excerpt ?', 'wpbtpls' ); ?></th>
									<td>
										<input type="checkbox" name="show_excerpt" value="1" checked>
									</td>
								</tr>
								<tr>
									<th><?php _e( 'Excerpt Length', 'wpbtpls' ); ?></th>
									<td>
										<input type="text" name="excerpt_length" value="55">
									</td>
								</tr>
								<tr>
									<th><?php _e( 'Show ReadMore Button ?', 'wpbtpls' ); ?></th>
									<td>
										<input type="checkbox" name="show_readmore" value="1" checked>
									</td>
								</tr>
								<tr>
									<th><?php _e( 'ReadMore Text', 'wpbtpls' ); ?></th>
									<td>
										<input type="text" name="readmore_text" value="Read More...">
									</td>
								</tr>
							</table>
						</div>
						<div id="tabs-4">
							<table class="form-table">
								<tr>
									<th><?php _e( 'Wrapper Class', 'wpbtpls' ); ?></th>
									<td>
										<input type="text" name="wrapper_class">
									</td>
								</tr>
								<tr>
									<th><?php _e( 'Wrapper ID', 'wpbtpls' ); ?></th>
									<td>
										<input type="text" name="wrapper_id">
									</td>
								</tr>
								<tr>
									<th><?php _e( 'Item Class', 'wpbtpls' ); ?></th>
									<td>
										<input type="text" name="item_class">
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
								<div id="publishing-action">
									<span class="spinner"></span>
									<input name="submit" type="submit" class="button button-primary button-large" id="wpbtpls-submit" value="<?php _e( 'Save', 'wpbtpls' );?>">
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