<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');


Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Mobile Image-Gallery'
);

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi2',
	'Mobile Video-Gallery'
);


t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Mobile Gallery');


$tempColumns = array (
    'tx_grbmobilegallery_dont_display_in_gallery' => array (        
        'exclude' => 0,        
        'label' => 'LLL:EXT:grb_mobilegallery/locallang_db.xml:tt_content.tx_grbmobilegallery_dont_display_in_gallery',        
        'config' => array (
            'type' => 'check',
        )
    ),
);


t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content',$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes('tt_content','tx_grbmobilegallery_dont_display_in_gallery;;;;1-1-1','image,textpic,list');

?>