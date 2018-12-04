<?php
/**
* Stored Variables
* @var $blog_attrs
*/
$default_attrs = WPBTPLS_Layout::default_attrs();
$attrs = array_merge( $default_attrs, (array)$blog_attrs );
?>
<div class="wpbtpls-item <?php echo $attrs['item_class']; ?>">
	<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
		<div class="wpbtpls-item-featured">
			<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( $attrs['image_size'] );
				} 
			?>
			<?php if( $attrs['show_date'] == '1' ) : ?>
			<div class="date">
				<em><?php the_date( $attrs['date_format'] ) ?></em>
			</div>
			<?php endif; ?>
		</div>
		<div class="wpbtpls-item-content">
			<h4 class="title">
				<?php the_title() ?>
			</h4>
			<?php if( $attrs['show_excerpt'] == '1' ) : ?>
			<div class="excerpt">
				<?php wpbtpls_excerpt( $attrs['excerpt_length'] ) ?>
			</div>
			<?php endif; ?>
		</div>
	</a>
</div>	