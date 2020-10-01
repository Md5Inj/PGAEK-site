<?php
	if (   ! is_active_sidebar( 'sidebar-page'  )	)
	return;
?>
<?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>

	<?php dynamic_sidebar( 'sidebar-page' ); ?>

<?php endif; ?>