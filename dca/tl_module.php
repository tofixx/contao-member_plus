<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 * @package member_plus
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

$dc = &$GLOBALS['TL_DCA']['tl_module'];

/**
 * Palettes
 */

// selector
array_insert($dc['palettes']['__selector__'], 0, array('mlAddCustomDummyImages')); // bug? mustn't be inserted after type selector


$dc['palettes']['memberreader'] = '{title_legend},name,headline,type;{config_legend},mlGroups,mlTemplate,mlLoadContent;{image_legend:hide},imgSize,mlDisableImages,mlDisableDummyImages,mlAddCustomDummyImages;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$dc['palettes']['loginregistration'] = '{title_legend},name,headline,type;{config_legend},autologin,allowedMailDomains,showAllowedDomains;{register_legend},reg_groups,reg_allowLogin,reg_assignDir,reg_activate;{redirect_legend},jumpTo,redirectBack,redirectPermanent;{template_legend:hide},cols;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

/**
 * Subpalettes
 */
$dc['subpalettes']['mlAddCustomDummyImages']  = 'mlDummyImageMale,mlDummyImageFemale';

$arrFields = array
(
	'mlGroups'      => array
	(
		'label'      => &$GLOBALS['TL_LANG']['tl_module']['mlGroups'],
		'exclude'    => true,
		'inputType'  => 'checkboxWizard',
		'foreignKey' => 'tl_member_group.name',
		'eval'       => array('mandatory' => true, 'multiple' => true),
		'sql'        => "blob NULL",
		'relation'   => array('type' => 'hasMany', 'load' => 'lazy')
	),
	'mlTemplate'    => array
	(
		'label'            => &$GLOBALS['TL_LANG']['tl_module']['mlTemplate'],
		'default'          => 'memberlist_full',
		'exclude'          => true,
		'inputType'        => 'select',
		'options_callback' => array('tl_module_member_plus', 'getMemberlistTemplates'),
		'eval'             => array('tl_class' => 'w50'),
		'sql'              => "varchar(64) NOT NULL default ''"
	),
	'mlLoadContent' => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_module']['mlLoadContent'],
		'exclude'   => true,
		'inputType' => 'checkbox',
		'eval'      => array('tl_class' => 'w50 m12'),
		'sql'       => "char(1) NOT NULL default ''"
	),
	'mlDisableImages'   => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_module']['mlDisableImages'],
		'exclude'   => true,
		'inputType' => 'checkbox',
		'eval'      => array('tl_class' => 'w50 m12'),
		'sql'       => "char(1) NOT NULL default ''"
	),
	'mlDisableDummyImages'   => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_module']['mlDisableDummyImages'],
		'exclude'   => true,
		'inputType' => 'checkbox',
		'eval'      => array('tl_class' => 'w50 m12'),
		'sql'       => "char(1) NOT NULL default ''"
	),
	'mlAddCustomDummyImages' => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_module']['mlAddCustomDummyImages'],
		'exclude'   => true,
		'inputType' => 'checkbox',
		'eval'      => array('tl_class' => 'w50 m12', 'submitOnChange' => true),
		'sql'       => "char(1) NOT NULL default ''"
	),
	'mlDummyImageMale' => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_module']['mlDummyImageMale'],
		'exclude'   => true,
		'inputType' => 'fileTree',
		'eval'      => array('filesOnly' => true, 'fieldType' => 'radio', 'tl_class' => 'clr w50'),
		'sql'       => "binary(16) NULL"
	),
	'mlDummyImageFemale' => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_module']['mlDummyImageFemale'],
		'exclude'   => true,
		'inputType' => 'fileTree',
		'eval'      => array('filesOnly' => true, 'fieldType' => 'radio', 'tl_class' => 'w50'),
		'sql'       => "binary(16) NULL"
	),
	'allowedMailDomains' => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_module']['allowedMailDomains'],
		'exclude'   => true,
		'inputType' => 'multiColumnWizard',
		'eval'      => array(
			'columnFields' => array(
				'domain' => array
				(
					'label'     => &$GLOBALS['TL_LANG']['tl_module']['allowedMailDomains']['domain'],
					'exclude'   => true,
					'inputType' => 'text',
					'eval'      => array('style' => 'width: 600px'),
				),
				'hide'   => array
				(
					'label'     => &$GLOBALS['TL_LANG']['tl_module']['allowedMailDomains']['hide'],
					'exclude'   => true,
					'inputType' => 'checkbox',
					'eval'      => array('style' => 'width: 100px;'),
				)
			)
		),
		'sql'       => "blob NULL"
	),
	'showAllowedDomains' => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_module']['showAllowedDomains'],
		'exclude'   => true,
		'default'   => true,
		'inputType' => 'checkbox',
		'eval'      => array('tl_class' => 'long'),
		'sql'       => "char(1) NOT NULL default ''"
	),
	'reg_activate_login' => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_module']['reg_activate_login'],
		'exclude'   => true,
		'default'   => true,
		'inputType' => 'checkbox',
		'eval'      => array('tl_class' => 'long'),
		'sql'       => "char(1) NOT NULL default ''"
	),
	'redirectPermanent'  => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_module']['redirectPermanent'],
		'exclude'   => true,
		'inputType' => 'checkbox',
		'eval'      => array('tl_class' => 'long'),
		'sql'       => "char(1) NOT NULL default ''"
	),
);

$dc['fields'] = array_merge($dc['fields'], $arrFields);

class tl_module_member_plus extends \Backend
{

	/**
	 * Return all news templates as array
	 * @return array
	 */
	public function getMemberlistTemplates()
	{
		return $this->getTemplateGroup('memberlist_');
	}
}