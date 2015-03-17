<?php
/**
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2015 PrestaShop SA
*  @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;

class HelperList_Positions extends Module
{
	public function __construct()
	{
		// Author of the module
		$this->author = 'PrestaEdit';
		// Name of the module ; the same that the directory and the module ClassName
		$this->name = 'helperlist_positions';
		// Tab where it's the module (administration, front_office_features, ...)
		$this->tab = 'others';
		// Current version of the module
		$this->version = '1.0.0';

		//	Min version of PrestaShop wich the module can be install
		$this->ps_versions_compliancy['min'] = '1.6';

		parent::__construct();

		// Name in the modules list
		$this->displayName = $this->l('HelperList_Positions (Example)');
		// A little description of the module
		$this->description = $this->l('HelperList with Positions Example');
	}

	public function install()
	{
		// Install SQL
		$sql = array();
		include(dirname(__FILE__).'/sql/install.php');
		foreach ($sql as $s)
			if (!Db::getInstance()->execute($s))
				return false;

		// Install Module
		return parent::install();
	}

	public function uninstall()
	{
		// Uninstall SQL
		$sql = array();
		include(dirname(__FILE__).'/sql/uninstall.php');
		foreach ($sql as $s)
			if (!Db::getInstance()->execute($s))
				return false;

		// Uninstall Module
		if (!parent::uninstall())
			return false;

		return true;
	}
}