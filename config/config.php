<?php
/**
 * Contao Open Source CMS
 * 
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 * @package member_plus
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

/**
 * Add the tl_content table to members module
 */
$GLOBALS['BE_MOD']['accounts']['member']['tables'][] = 'tl_content';

/**
 * Content elements
 */
$GLOBALS['TL_CTE']['includes']['memberlist'] = '\HeimrichHannot\MemberPlus\ContentMemberlist';


/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['user']['memberreader'] = '\HeimrichHannot\MemberPlus\ModuleMemberReader';

/**
 * Hooks
 */

$GLOBALS['TL_HOOKS']['getPageIdFromUrl'][] = array('\HeimrichHannot\MemberPlus\Hooks', 'getPageIdFromUrlHook');
$GLOBALS['TL_HOOKS']['generateBreadcrumb'][] = array('\HeimrichHannot\MemberPlus\Hooks', 'generateBreadcrumbHook');