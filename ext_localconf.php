<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'Gallery' => 'showImageGallery',
	),
	array(
		'Gallery' => 'showImageGallery',
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi2',
	array(
		'Gallery' => 'showVideoGallery',
	),
	array(
		'Gallery' => 'showVideoGallery',
	)
);

?>