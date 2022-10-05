<div class="audio_format">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>"><img src="https://img.freepik.com/free-icon/black-music-icon_318-9277.jpg" alt="arvate icon music"></a>
		</div>
		<div class="entry-header">
			<?php congbio_entry_header(); ?>
			<?php
			$attachment = get_children(array('post_parent' => $post->ID));
			$attachment_number = count($attachment);
			printf(__('This image post contains %1$s photos', 'congbio'), $attachment_number);
			?>
		</div>
		<div class="entry-content">
			<?php congbio_entry_content(); ?>
			<?php (is_single() ? congbio_entry_tag() : ''); ?>
		</div>
	</article>
</div>