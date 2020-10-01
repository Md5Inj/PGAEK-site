<?php
	if (   ! is_active_sidebar( 'sidebar'  )	)
	return;
?>
<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>

	<?php dynamic_sidebar( 'sidebar' ); ?>

<?php endif; ?>