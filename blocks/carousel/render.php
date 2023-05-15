<?php
/**
 * Carousel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 *
 * @package wpdev
 */

global $post;
$posts = get_field( 'posts' );
?>
<section <?php echo $is_preview ? 'class="is-carousel"' : get_block_wrapper_attributes( array( 'class' => 'is-carousel' ) ); ?>>
	<?php if ( $posts ) : ?>
		<?php foreach ( $posts as $post ) : ?>
			<?php setup_postdata( $post ); ?>
			<div class="wp-block-acf-carousel--item">
				<?php the_post_thumbnail( 'full' ); ?>
				<h2><?php echo wp_kses_post( get_the_title() ); ?></h2>
			</div>
		<?php endforeach; ?>
	<?php else : ?>
		<p>No posts selected.</p>
	<?php endif; ?>
</section>
