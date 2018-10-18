<?php

$categories = get_terms( 'category', array(
	'hide_empty' => false,
) );

$post_tags = get_terms( 'post_tag', array(
	'hide_empty' => false,
) );

?>
<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e( 'Add New Blog Template', 'wpbtpls' );?></h1>
	<hr class="wp-header-end">
	<form method="POST" action="<?php echo admin_url( 'admin.php?page=wpbtpls-new' );?>" id="wpbtpls-form">
		<?php wp_nonce_field( 'wpbtpls-new-post' );?>
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
				<div id="post-body-content">
					<div id="titlediv">
						<div id="titlewrap">
								<input type="text" name="title" size="30" placeholder="<?php _e( 'Enter template title', 'wpbtpls' );?>" id="title" autocomplete="off">
						</div>
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
									?>
										<div class="wpbtpls-item-layout">
											<input type="radio" name="layout" value="<?php echo $layoutkey; ?>" id="wpbtpls-layout-<?php echo $layoutkey; ?>">
											<label for="wpbtpls-layout-<?php echo $layoutkey; ?>">
												<img src="<?php echo $layout['thumbnail']; ?>" >
											</label>
											<div class="title">
												<h4><?php echo $layout['title']; ?></h4>
											</div>
										</div>
									<?php
									}
								?>
								</td>
							</tr>
						</table>
					</div>
					<div id="tabs-3">
					<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
					<p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
					</div>
					</div>
				</div>
				<div id="postbox-container-1" class="postbox-container">
					<div id="submitdiv" class="postbox">
						<h2><span><?php _e( 'Action', 'wpbtpls' ); ?></span></h2>
						<div class="submitbox">
							<div id="major-publishing-actions">
								<div id="delete-action">
									<a class="submitdelete" href=""><?php _e( 'Delete', 'wpbtpls' );?></a>
								</div>
								<div id="publishing-action">
									<span class="spinner"></span>
									<input name="save" type="submit" class="button button-primary button-large" id="publish" value="Save">
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