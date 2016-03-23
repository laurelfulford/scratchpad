<?php
/* Array of stationary pieces */

$stationary = array(
	'little-pencil.svg',
	'pencil.svg',
	'pen.svg',
	'grip-pencil.svg'
);

shuffle( $stationary );
echo '<div class="separator">';
echo get_template_part( 'images/inline', $stationary[0] );
echo '</div>';


?>