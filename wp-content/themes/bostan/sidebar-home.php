<?php
	if (   ! is_active_sidebar( 'sidebar-home'  )	)
	return;
?>
	<?php if ( is_active_sidebar( 'sidebar-home' ) ) : ?>

		<?php dynamic_sidebar( 'sidebar-home' ); ?>

	<?php endif; ?>