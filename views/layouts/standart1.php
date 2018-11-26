<?php
/**
* Stored Variables
* @var $blog_attrs
*/
$default_attrs = WPBTPLS_Layout::default_attrs();
$attrs = array_merge( $default_attrs, (array)$blog_attrs );
?>
<div class="wpbtpls-item <?php echo $attrs['item_class']; ?>">
	<div class="wpbtpls-item-featured">
		<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( $attrs['image_size'] );
			} 
		?>
	</div>
	<div class="wpbtpls-item-content">
		<h4 class="title">
			<a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a>
		</h4>
		<div class="excerpt">
			<?php wpbtpls_excerpt( $attrs['excerpt_length'] ) ?>
		</div>
		<?php if( $attrs['show_date'] == '1' ) : ?>
		<div class="excerpt">
			<?php wpbtpls_excerpt( $attrs['excerpt_length'] ) ?>
		</div>
		<?php endif; ?>
		<?php wpbtpls_readmore( $attrs['readmore_text'] ) ?>
	</div>
</div>	