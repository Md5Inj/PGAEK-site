<?php
	if (   ! is_active_sidebar( 'sidebar-1'  )
		&& ! is_active_sidebar( 'sidebar-2' )
		&& ! is_active_sidebar( 'sidebar-3'  )
		&& ! is_active_sidebar( 'sidebar-4'  )
	)
	return;
?>
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="first_footer" class="widget_area span3">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
	<div id="second_footer" class="widget_area span3">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
	<div id="third_footer" class="widget_area span3">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</div>
	<?php endif; ?>
	
    <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
	<div id="fourth_footer" class="widget_area span3">
		<?php dynamic_sidebar( 'sidebar-4' ); ?>
	</div>
	<?php endif; ?>