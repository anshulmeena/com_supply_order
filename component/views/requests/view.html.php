<?php 

/**
 * Supply Order Component for Joomla! 1.5
 * This view is responsible for handling all of the forms accessible to every user. Handles
 * placing requests, viewing saved orders, updating an order and viewing requested orders.
 * @version 1.5.0
 * @author Danny Bouman
 * @package com_supply_order
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 **/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );



jimport('joomla.application.component.view');
/**
 * HTML View class for the com_supply_order component
 * @package Com_supply_order
 */
class SupplyOrderViewRequests extends JView
{
	function display( $tpl = null)
	{
		global $mainframe;
		$document =& JFactory::getDocument();
		
		// Get the page/component configuration
		$params = &$mainframe->getParams();
		$menus = &JSite::getMenu();
		$menu = $menus->getActive();
		// because the application sets a default page title, we need to get it
		// right from the menu item itself
		if (is_object( $menu )) {
			$menu_params = new JParameter( $menu->params );
			if (!$menu_params->get( 'page_title')) {
				$params->set('page_title', JText::_( 'COM_SUPPLY_ORDER' ));
			}
		} else {
			$params->set('page_title', JText::_( 'COM_SUPPLY_ORDER' ));
		}
		$document->setTitle( $params->get( 'page_title' ) );
		
		// Load the form validation behavior
		JHTML::_('behavior.formvalidation');

		$user =& JFactory::getUser();
		$this->assignRef('user', $user);
		$this->assignRef('params',		$params);
		
		parent::display($tpl);
	}
}
?>