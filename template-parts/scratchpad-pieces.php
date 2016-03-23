<?php
/* Array of stationary pieces */

$stationary = array(
	'little-pencil.svg',
	'pencil.svg',
	'pen.svg',
	'grip-pencil.svg'
);

shuffle( $stationary );
echo '<div class="separator">' . file_get_contents( get_template_directory() . '/images/' . $stationary[0] ) . '</div>';


?>