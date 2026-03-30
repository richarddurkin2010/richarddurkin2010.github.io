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
<article id="post-<?php the_ID(); ?>" <?php post_class('portfoliox-list-item'); ?>>
	<div class="portfoliox-item portfoliox-text-list shadow-sm mb-5 <?php if (has_post_thumbnail()): ?>has-thumbnail<?php endif; ?>">
		<div class="row">
			<?php if (has_post_thumbnail()): ?>
				<div class="col-lg-6">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('medium_large'); ?>
					</a>
				</div>
				<div class="col-lg-6">
				<?php else: ?>
					<div class="col-lg-12 pb-3 pt-3">
					<?php endif; ?>
					<div class="portfoliox-text text-center p-3">
						<div class="portfoliox-text-inner">
							<div class="grid-head">
								<span class="ghead-meta list-meta">
									<?php if ('post' === get_post_type() && !empty($portfoliox_category)) : ?>
										<a href="<?php echo esc_url(get_category_link($portfoliox_category)); ?>"><?php echo esc_html($portfoliox_category->name . ' / '); ?></a>
									<?php endif; ?>
									<?php echo esc_html(get_the_date()); ?>
								</span>
								<?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
								<?php if ('post' === get_post_type()) :
								?>
									<div class="list-meta list-author">
										<?php portfoliox_posted_by(); ?>
									</div><!-- .entry-meta -->
								<?php endif; ?>
							</div>
							<?php
							// Get read more button customization options
							$readmore_text = get_theme_mod('portfoliox_readmore_text', 'Read More');
							$readmore_style = get_theme_mod('portfoliox_readmore_style', 'style1');
							$readmore_color = get_theme_mod('portfoliox_readmore_color', '#ff014f');

							// Set button class and icon based on style
							$button_class = 'portfoliox-readmore';
							$icon = '<i class="fas fa-long-arrow-alt-right"></i>';

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
					</div>
				</div>

		</div>
</article><!-- #post-<?php the_ID(); ?> -->