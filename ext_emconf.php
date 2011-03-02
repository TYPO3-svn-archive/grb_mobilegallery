<?php

########################################################################
# Extension Manager/Repository config file for ext "grb_mobilegallery".
#
# Auto generated 28-02-2011 08:35
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Mobile Gallery',
	'description' => '',
	'category' => 'plugin',
	'author' => 'Juerg Langhard',
	'author_email' => 'langhard@greenbanana.ch',
	'author_company' => 'GreenBanana GmbH - www.greenbanana.ch',
	'shy' => '',
	'dependencies' => 'cms,extbase,fluid,html5videoplayer',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => 'tt_content',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '0.1.1',
	'constraints' => array(
		'depends' => array(
			'cms' => '',
			'extbase' => '',
			'fluid' => '',
			'html5videoplayer' => '0.1.11-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'suggests' => array(
	),
	'_md5_values_when_last_written' => 'a:32:{s:12:"ext_icon.gif";s:4:"e922";s:17:"ext_localconf.php";s:4:"6ff4";s:14:"ext_tables.php";s:4:"723c";s:14:"ext_tables.sql";s:4:"849c";s:16:"kickstarter.json";s:4:"cab4";s:16:"locallang_db.xml";s:4:"8979";s:12:"t3jquery.txt";s:4:"304a";s:40:"Classes/Controller/GalleryController.php";s:4:"918d";s:32:"Classes/Domain/Model/Content.php";s:4:"8e2d";s:30:"Classes/Domain/Model/Video.php";s:4:"8c7b";s:47:"Classes/Domain/Repository/ContentRepository.php";s:4:"4d6b";s:45:"Classes/Domain/Repository/VideoRepository.php";s:4:"3f23";s:39:"Configuration/Kickstarter/settings.yaml";s:4:"5d06";s:38:"Configuration/TypoScript/constants.txt";s:4:"66ae";s:34:"Configuration/TypoScript/setup.txt";s:4:"b134";s:40:"Resources/Private/Language/locallang.xml";s:4:"410c";s:85:"Resources/Private/Language/locallang_csh_tx_grbmobilegallery_domain_model_content.xml";s:4:"e353";s:85:"Resources/Private/Language/locallang_csh_tx_grbmobilegallery_domain_model_gallery.xml";s:4:"a4d0";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"f0dd";s:38:"Resources/Private/Layouts/default.html";s:4:"3562";s:42:"Resources/Private/Partials/formErrors.html";s:4:"f5bc";s:50:"Resources/Private/Partials/Content/formFields.html";s:4:"f516";s:50:"Resources/Private/Partials/Content/properties.html";s:4:"7110";s:49:"Resources/Private/Partials/Videoplayer/Entry.html";s:4:"dd38";s:57:"Resources/Private/Templates/Gallery/ShowImageGallery.html";s:4:"fc20";s:57:"Resources/Private/Templates/Gallery/ShowVideoGallery.html";s:4:"ffff";s:42:"Resources/Public/CSS/grb_mobilegallery.css";s:4:"d941";s:60:"Resources/Public/Images/tx_grbmobilegallery_ajax_loading.gif";s:4:"3624";s:49:"Resources/Public/Javascripts/grb_mobilegallery.js";s:4:"ad1e";s:42:"Resources/Public/Javascripts/jquery.min.js";s:4:"bb38";s:34:"Tests/Domain/Model/ContentTest.php";s:4:"d959";s:34:"Tests/Domain/Model/GalleryTest.php";s:4:"1461";}',
);

?>