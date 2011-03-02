<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Juerg Langhard <langhard@greenbanana.ch>, GreenBanana GmbH - www.greenbanana.ch
*  	
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 3 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Controller for the Gallery object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_GrbMobilegallery_Controller_GalleryController extends Tx_Extbase_MVC_Controller_ActionController {
	
	
	/**
	 * contentRepository
	 * 
	 * @var Tx_GrbMobilegallery_Domain_Repository_ContentRepository
	 */
	protected $contentRepository;
	
	
	/**
	 * contentRepository
	 * 
	 * @var Tx_GrbMobilegallery_Domain_Repository_VideoRepository
	 */
	protected $videoRepository;	
	
	
	/**
	 * storagePid
	 * 
	 * @var Int
	 */
	protected $storagePid = NULL;	
	
	
	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	protected function initializeAction() {
		$this->contentRepository 	= t3lib_div::makeInstance('Tx_GrbMobilegallery_Domain_Repository_ContentRepository');
		$this->videoRepository		= t3lib_div::makeInstance('Tx_GrbMobilegallery_Domain_Repository_VideoRepository');
		
		// Get pid, if the gallery is on a tt_news-based page-type
		$tx_ttnews = t3lib_div::_GP('tx_ttnews');
		if(isset($tx_ttnews['tt_news'])){
			$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('pid', 'tt_news', 'uid='.intval($tx_ttnews['tt_news']),'', '');
			while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
				$this->storagePid = $row['pid'];
			}
		}
		
		// Get pid, if the gallery is on a normal typo3-page-type
		if($this->storagePid == NULL){
			$this->storagePid = $GLOBALS["TSFE"]->id;
		}	
	}
	
		
	/**
	 * Displays Image-Gallery
	 *
	 * @return string The rendered list view
	 * @param int $position position of gallery-view
	 * @param int $pid pid of storage-page
	 */
	public function showImageGalleryAction($position=0, $pid=NULL) {
		
		if($pid==NULL){
			$pid = $this->storagePid;
		}

		$contentElementsWithImages = $this->contentRepository->findAllContentElementsWithImagesByPid($pid);
		$sysLanguageUid = $GLOBALS['TSFE']->sys_language_uid;
		
		$i = 0;
		$images = array();
		$captions = array();
		
		foreach ($contentElementsWithImages as $element){
			$elementCaptions = $element->getImagecaption();

			$j=0;
			foreach ($element->getImages() as $image){
				if($element->getDontDisplayInGallery()==0){
					$images[$i] = $image;
					$captions[$i] = $elementCaptions[$j];
					$i++;
					$j++;
				}
			}			
		}
		
		$imageCaption = t3lib_div::trimExplode('|', $captions[$position]);
							
		$this->view->assign('caption', 			$imageCaption[$sysLanguageUid]);
		$this->view->assign('image', 			$images[$position]);
		$this->view->assign('next', 			$position+1);
		$this->view->assign('preview', 			$position-1);
		$this->view->assign('position', 		$position+1);
		$this->view->assign('count', 			count($images));
		$this->view->assign('pid', 				$pid);
		$this->view->assign('sysLanguageUid', 	$GLOBALS['TSFE']->sys_language_uid);
	}
	
	
	/**
	 * Displays Video-Gallery
	 * @return string The rendered list view
	 */
	public function showVideoGalleryAction() {
				
		$uids 	= array();
		$videos = array();
		
		$queryParts['SELECT'] = 'v.video_uid';
		$queryParts['FROM']   = 'tx_html5videoplayer_video_content v, tt_content c';
		$queryParts['WHERE'] ="	v.content_uid	=	c.uid
								AND v.pid 		= 	".$this->storagePid." 
								AND c.hidden 	= 	'0' 
								AND c.deleted 	= 	'0' 
								AND c.tx_grbmobilegallery_dont_display_in_gallery 	= 	'0'";
		
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery( $queryParts['SELECT'], $queryParts['FROM'], $queryParts['WHERE'], '', $sorting, $order, $startAt, $resultlimit); 
		echo $GLOBALS['TYPO3_DB']->sql_error();

		while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res))
			$uids[] = $row['video_uid'];
			
		$i=0;
		foreach ($uids as $uid){
			$videos[$i] = $this->videoRepository->findByUid(intval($uid));
			$i++;	
		}

		$this->view->assign('videos',$videos);
	}

}
?>