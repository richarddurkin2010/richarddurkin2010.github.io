<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PortfolioX
 */
$portfoliox_categories = get_the_category();
if ($portfoliox_categories) {
	$portfoliox_category = $portfoliox_categories[mt_rand(0, count($portfoliox_categories) - 1)];
} else {
	$portfoliox_category = '';
}
?>
<div class="col-lg-4 mb-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class('portfoliox-list-item'); ?>>
		<div class="grid-blog-item p-3">
			<?php if (has_post_thumbnail()): ?>
				<div class="grid-img">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>
			<?php endif; ?>
			<div class="grid-deatls pb-3">
				<div class="row pt-3">
					<?php if ('post' === get_post_type() && !empty($portfoliox_category)) : ?>
						<div class="col-md-6 grid-meta">
							<a class="blog-categrory" href="<?php echo esc_url(get_category_link($portfoliox_category)); ?>"><?php echo esc_html($portfoliox_category->name); ?></a>
						</div>
					<?php endif; ?>
					<div class="col-md-6 me-auto text-end grid-meta">
						<p><?php echo esc_html(get_the_date('M j Y')); ?></p>
					</div>
				</div>

				<?php the_title('<h2 class="entry-title grid-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
				<?php
				// Get read more button customization options
				$readmore_text = get_theme_mod('portfoliox_readmore_text', 'Read More');
				$readmore_style = get_theme_mod('portfoliox_readmore_style', 'style1');
				$readmore_color = get_theme_mod('portfoliox_readmore_color', '#ff014f');

				// Set button class and icon based on style
				$button_class = 'read-more-btn';
				$icon = '<i class="fas fa-arrow-right"></i>';

				if ($readmore_style == 'style2') {
					$button_class .= ' btn-style';
				} elseif ($readmore_style == 'style3') {
					$button_class .= ' underline-style';
				}

				// Output the button with inline style for color
				?>
				<a class="<?php echo esc_attr($button_class); ?>"
					href="<?php the_permalink(); ?>"
					style="color: <?php echo esc_attr($readmore_color); ?>">
					<?php echo esc_html($readmore_text); ?>
					<?php if ($readmore_style != 'style3') echo $icon; ?>
				</a>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>