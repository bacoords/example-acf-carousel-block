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
$posts_field = get_field( 'posts' );
?>
<section <?php echo ( ! $is_preview ) ? get_block_wrapper_attributes() : ''; ?>>
	<?php if ( $posts_field ) : ?>
		<div class="is-carousel">
			<?php foreach ( $posts_field as $post ) : ?>
				<?php setup_postdata( $post ); ?>
				<div class="wp-block-acf-carousel--item">
					<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
					<h2><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo wp_kses_post( get_the_title() ); ?></a></h2>
				</div>
			<?php endforeach; ?>
		</div>
		<?php wp_reset_postdata(); ?>
	<?php else : ?>
		<p>No posts selected.</p>
	<?php endif; ?>
</section>
