<?php get_header(); ?>

<main id="content">
	<?php
	$bg_img = get_field('background_image');
	$bg_url = $bg_img['sizes']['background-fullscreen'];
	$primary_color = get_field('primary_color', 'option');
	?>
	<div class="welcome-gate" id="top">
		<div class="container">
			<img class="hero" src="<?php echo $bg_url ?>" alt="heading background">
			<div class="img-filter" style="background-color:<?php echo $primary_color ?>"></div>
			<h1><?php the_field('statement'); ?></h1>
			<p><?php the_field('main_blurb'); ?></p>
		</div>
	</div>
	<?php
	if(have_rows('panels')):
		while(have_rows('panels')) : the_row();
		$panel_type = get_sub_field('panel_type');
	?>
				<?php
				if ($panel_type == 'intro') { ?>
					<div class="panel <?php the_sub_field('panel_type'); ?>" id="<?php the_sub_field('panel_id'); ?>">
						<div class="container">
							<div class="row">
								<div class="columns-5">
									<h2 class="blurb"><?php the_sub_field('main_blurb'); ?></h2>
									<div class="cta button">
										<a href="<?php the_field('cta_link'); ?>"><?php the_sub_field('cta_title'); ?></a>
									</div>
								</div>
								<div class="columns-6 offset-by-1">
									<p><?php the_sub_field('intro_text'); ?></p>
								</div>
							</div>
						</div>
					</div>
				<?php
			} elseif($panel_type == 'cards'){
				$panel_bg = get_sub_field('panel_background_image');
				$panel_bg_url = $panel_bg['sizes']['background-fullscreen'];
				// echo '<pre>';
				// var_dump($panel_bg);
				// echo '</pre>';
				// if(!empty($panel_bg)){
				// 	$panel_bg_url = $panel_bg['sizes']['background_fullscreen'];
				// }
				?>
				<div class="panel <?php the_sub_field('panel_type'); ?>" id="<?php the_sub_field('panel_id'); ?>" style="background-image:url('<?php echo $panel_bg_url ?>');">
					<div class="container">
						<div class="row">
							<?php
							$cards = get_sub_field('cards');
							$card_num = count($cards);
							$width_class = '';
							if ($card_num == 1) {
								$width_class = 'columns-12';
							} elseif ($card_num == 2) {
								$width_class = 'columns-6';
							} elseif ($card_num == 3) {
								$width_class = 'columns-4';
							} elseif ($card_num == 4) {
								$width_class = 'columns-3';
							}
							if(have_rows('cards')): while(have_rows('cards')): the_row();
							?>
							<a href="<?php the_sub_field('card_link'); ?>">
								<div class="card <?php echo $width_class ?>">
									<?php
									$card_img = get_sub_field('card_image');
									// echo '<pre>';
									// var_dump($card_img);
									// echo '</pre>';
									$card_img_url = $card_img['sizes']['medium_large'];
									?>
									<img src="<?php echo $card_img_url ?>" alt="">
									<h3><?php the_sub_field('card_title'); ?></h3>
									<p><?php the_sub_field('card_blurb'); ?></p>
								</div>
							</a>
							<?php endwhile; endif; ?>
						</div>
					</div>
				</div>
			<?php	} elseif ($panel_type == 'wysiwyg') { ?>
				<div class="panel wysiwyg" id="<?php the_sub_field('panel_id'); ?>">
					<div class="container">
						<div class="row">
							<?php
							$columns = get_sub_field('text_panel');
							$col_count = count($columns);
							$col_class = '';
							if($col_count == 1){
								$col_class = 'columns-12';
							} elseif($col_count == 2){
								$col_class = 'columns-6';
							};
							if(have_rows('text_panel')): while(have_rows('text_panel')) : the_row();
								// $id = get_sub_field('panel_id');
								// echo '<pre>';
								// var_dump($id);
								// echo '</pre>';
								?>
								<div class="<?php echo $col_class ?>">
									<?php the_sub_field('content_column'); ?>
								</div>
							<?php endwhile; endif; ?>
						</div>
					</div>
				</div>
			<?php }; ?>
	<?php endwhile; endif; ?>

</main><!-- End of Content -->

<?php get_footer(); ?>
