<?php
	if (   ! is_active_sidebar( 'sidebar-cat'  )	)
	return;
?>
	<?php if ( is_active_sidebar( 'sidebar-cat' ) ) : ?>

		<?php dynamic_sidebar( 'sidebar-cat' ); ?>

	<?php endif; ?>