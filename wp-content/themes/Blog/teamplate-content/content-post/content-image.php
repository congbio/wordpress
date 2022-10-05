<div class="image-format">
<article id="post-<?php the_ID();?>" <?php post_class(); ?> >
	<div class="entry-thumbnail">
		<?php congbio_thumbnail('large'); ?>
	</div>
	<div class="entry-header">
		<?php congbio_entry_header(); ?>
		<?php
			$attachment = get_children( array( 'post_parent' => $post->ID ) );
			$attachment_number = count( $attachment );
			printf( __('This image post contains %1$s photos', 'congbio'), $attachment_number );
		?>
	</div>
	<div class="entry-content">
		<?php congbio_entry_content(); ?>
		<?php ( is_single() ? congbio_entry_tag() : '' ); ?>
	</div>
</article>
</div>