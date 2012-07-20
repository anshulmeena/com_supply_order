<?php 

/**
 * Supply Order Component for Joomla! 1.5
 * Controller
 * @version 1.5.0
 * @author Danny Bouman
 * @package com_supply_order
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 **/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );


jimport( 'joomla.application.component.controller' );

class SupplyOrderController extends JController
{
	/**
	 * Method to show a com_supply_order view
	 */
	function display()
	{
		// Set a default view if none exists
		if ( ! JRequest::getCmd( 'view' ) ) {
			JRequest::setVar('view', 'requests' );
		}
		//update the hit count for the item
		if(JRequest::getCmd('view') == 'item')
		{
			$model =& $this->getModel('item');
			$model->hit();
		}
		parent::display();
	}
}