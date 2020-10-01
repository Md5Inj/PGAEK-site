<?php
	if (   ! is_active_sidebar( 'sidebar-single'  )	)
	return;
?>
	<?php if ( is_active_sidebar( 'sidebar-single' ) ) : ?>

		<?php dynamic_sidebar( 'sidebar-single' ); ?>

	<?php endif; ?>