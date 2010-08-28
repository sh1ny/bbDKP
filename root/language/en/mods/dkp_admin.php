<?php
/**
 * bbdkp admin language file [English]
 * @author Sajaki@betenoire
 * @package bbDkp
 * @copyright 2009 bbdkp <http://code.google.com/p/bbdkp/>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version $Id$
 * 
 */

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* DO NOT CHANGE
*/
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

// DKP
$lang = array_merge($lang, array(
'BBDKPDISABLED' => 'bbDKP is currently disabled.', 

//addnews
'ADD_NEWS' => 'Add News',
'ADDNEWS_TITLE' => 'Add a News Entry',
'DELETE_NEWS' => 'Delete News',
'HEADLINE' => 'Headline',
'MESSAGE_BODY' => 'Message Body',
'UPDATE_NEWS' => 'Update News',
'UPDATE_DATE_TO' => 'Update date to<br />%s?',

//JAVASCRIPT
'B_HELP' => 'Bold text: [b]text[/b]',
'I_HELP' => 'Italic text: [i]text[/i]',
'U_HELP' => 'Underlined text: [u]text[/u]',
'Q_HELP' => 'Quote text: [quote]text[/quote]',
'C_HELP' => 'Center text: [center]text[/center]',
'P_HELP' => 'Insert image: [img]http://image_url[/img]',
'W_HELP' => 'Insert URL: [url]http://url[/url] or [url=http://url]URL text[/url]',
'ITEM_HELP' => 'Wowhead : [item]text[/item]',

// Form Validation Errors
'FV_FORMVALIDATION' => 'Form validation Error',
'FV_ALPHA_ATTENDEES' => 'Characters\' names in EverQuest contain only alphabetic characters.',
'FV_DIFFERENCE_TRANSFER' => 'A history transfer must be made between two different people.',
'FV_NUMBER' => 'Must be a number.',
'FV_NUMBER_ADJUSTMENT' => 'The adjustment value field must be a number.',
'FV_NUMBER_ALIMIT' => 'The adjustments limit field must be a number.',
'FV_NUMBER_ILIMIT' => 'The items limit field must be a number.',
'FV_NUMBER_INACTIVEPD' => 'The inactive period must be a number.',
'FV_NUMBER_PILIMIT' => 'The purchased items limit must be a number.',
'FV_NUMBER_RLIMIT' => 'The raids limit must be a number.',
'FV_NUMBER_VALUE' => 'The value field must be a number.',
'FV_NUMBER_VOTE' => 'The vote field must be a number.',
'FV_RANGE_DAY' => 'The day field must be an integer between 1 and 31.',
'FV_RANGE_HOUR' => 'The hour field must be an integer between 0 and 23.',
'FV_RANGE_MINUTE' => 'The minute field must be an integer between 0 and 59.',
'FV_RANGE_MONTH' => 'The month field must be an integer between 1 and 12.',
'FV_RANGE_SECOND' => 'The second field must be an integer between 0 and 59.',
'FV_RANGE_YEAR' => 'The year field must be an integer with a value of at least 1998.',
'FV_REQUIRED' => 'Required Field',
'FV_REQUIRED_ACRO' => 'The guild acronym field is required.',
'FV_REQUIRED_ADJUSTMENT' => 'The adjustment value field is required.',
'FV_REQUIRED_ATTENDEES' => 'There must be at least one attendee on this raid.',
'FV_REQUIRED_BUYER' => 'A buyer must be selected.',
'FV_REQUIRED_BUYERS' => 'At least one buyer must be selected.',
'FV_REQUIRED_EVENT_NAME' => 'An event must be selected.',
'FV_REQUIRED_GUILDTAG' => 'The guildtag field is required.',
'FV_REQUIRED_INACTIVEPD' => 'If the hide inactive members field is set to Yes, a value for the inactive period must also be set.',
'FV_REQUIRED_ITEM_NAME' => 'The item name field must be filled out or an existing item must be selected.',
'FV_REQUIRED_MEMBER' => 'A member must be selected.',
'FV_REQUIRED_MEMBERS' => 'At least one member must be selected.',
'FV_REQUIRED_DKPSYS_NAME' => 'The Dkp Pool field is required.',
'FV_REQUIRED_NAME' => 'The name field is required.',
'FV_REQUIRED_PASSWORD' => 'The password field is required.',
'FV_REQUIRED_RAIDID' => 'A raid must be selected.',
'FV_REQUIRED_USER' => 'The username field is required.',
'FV_REQUIRED_VALUE' => 'The value field is required.',
'FV_REQUIRED_STATUS' => 'The status field is required.',
'FV_REQUIRED_MESSAGE' => 'The message field is required.',
'FV_REQUIRED_NAME' => 'The name field is required.',
'FV_REQUIRED_STATUS' => 'The status field is required.',
'FV_REQUIRED_HEADLINE' => 'The headline field is required.',
'FV_DKPSTATUSYN' => 'Dkpsystem status must either be Y (Active) or N (Inactive)', 
'FV_RAIDEXIST' => 'Cannot delete DKP Pool, there are still existing raids on this pool', 
'FV_EVENTEXIST' => 'Cannot delete DKP Pool, there are still existing events', 

// Portal config
'NEWSBLOCKSETTING' => 'News Block Settings', 
'NEWSFORUM' => 'News forum :', 
'NEWSNUMBER' => 'Number of recent posts to retrieve :',
'RECBLOCK' => 'Recruitment Block Settings', 
'SHOWRECBLOCK' => 'Show Recruitment block:', 
'RECFORUM' => 'Recruitment forum (for redirectlink):', 
'RECSTATUS' => 'Recruitment Status :',   
'TANK'	=>    'Tank',
'DPS'	=>    'Damage',
'HEAL'	=>    'Healer',
'LOOTBLOCKSETTING' => 'Loot block Settings', 
'SHOWLOOTBLOCK' => 'Show loot block:', 
'NUMBITEMS' => 'Number of items :', 
'BOSSBLOCKSETTING' => 'Bossprogress block Settings',
'SHOWBOSSBLOCK' => 'Show Bossprogress block',
'SHOWBOSSBLOCKNOTE' => 'For block settings, see Bossprogress Config.',
'LINKBLOCKSETTING' => 'Link block Settings',
'SHOWLINKBLOCK' => 'Show Link block',
'MENUBLOCKSETTING' => 'Menu block Settings',
'SHOWMENUBLOCK' => 'Show Menu block',


'RANK_INSERTED' => 'Rank inserted : %s. ', 
'TOTAL_RANKS_INSERTED' => 'Total ranks inserted : %s. ', 
'MEMBER_INSERTED' => 'Member Inserted : %s. ' ,
'TOTAL_MEMBERS_INSERTED' => 'Total Members Inserted : %s. ',
'MEMBERDKP_INSERTED' => 'Dkp record inserted for %s : %.2f Earned, %.2f Spent, %.2f adjustment', 
'TOTAL_DKP_INSERTED' => 'Total Dkp records inserted : %s. ', 
'ADJUSTMENTS_INSERTED' => 'Dkp adjustment inserted for %s, : %.2f ', 
'TOTAL_ADJUSTMENTS_INSERTED' => 'Total Dkp adjustments inserted : %s. ' , 
'EVENT_INSERTED' => 'Event inserted : %s for %.2f value' , 
'TOTAL_EVENTS_INSERTED' => 'Total Events inserted : %s. ', 
'ITEMS_INSERTED' => 'Item inserted : %s, bought by %s. ' ,
'TOTAL_ITEMS_INSERTED' => 'Total Items inserted : %s. ' ,
'RAIDS_INSERTED' => 'Raid inserted : %s, (raid note : %s. ) ' ,
'TOTAL_RAIDS_INSERTED' => 'Total Raids inserted : %s. ' ,
'TOTAL_RAIDATTENDEES_INSERTED' => 'Total raid attendees inserted : %s.', 

// installer
'IMPORT_EQDKP132' => 'Import EQDKP 1.3.2 data Into bbdkp 1.1.1', 
'IMPORT_EQDKP132_CONFIRM' => 'Are you ready to import ? Your EQDKP tables need to begin with \'EQDKP\', and only dynamic data will be imported, not static data like class definitions etc. ', 
'IMPORT_EQDKP140' => 'Import EQDKP 1.4.0 data Into bbdkp 1.1.1', 
'IMPORT_EQDKP140_CONFIRM' => 'Are you ready to import ? Your EQDKP tables need to begin with \'EQDKP\', and only dynamic data will be imported, not static data like class definitions etc. ', 
'IMPORT_EQDKPPLUS' => 'Import EQDKP-PLUS data Into bbdkp 1.1.1', 
'IMPORT_EQDKPPLUS_CONFIRM' => 'Are you ready to import ? Your EQDKP-PLUS tables need to begin with \'EQDKP\', and only dynamic data will be imported, not static data like class definitions etc. ', 
'UMIL_INSERT_COMMON_ROW' => 'Insert common bbdkp data for index/ranks/Bprogress', 
'UMIL_REMOVE_COMMON_ROW' => 'Remove common bbdkp data for index/ranks/Bprogress',
'UMIL_INSERT_GAME_ROW' => 'Insert game data',
'UMIL_INSERT_DAOCDATA' => 'Inserted Dark Age of Camelot Data', 
'UMIL_INSERT_EQDATA' => 'Inserted EverQuest Data', 
'UMIL_INSERT_EQ2DATA' => 'Inserted EverQuest II Data', 
'UMIL_INSERT_LOTRODATA' => 'Inserted Lord of the Rings Data', 
'UMIL_INSERT_FFXIDATA' => 'Inserted Final Fantasy XI Data', 
'UMIL_INSERT_VANGUARDDATA' => 'Inserted Vanguard Data', 
'UMIL_INSERT_WOWDATA' => 'Inserted Warcraft Data',
'UMIL_INSERT_WARDATA' => 'Inserted Warhammer Data',
'UMIL_INSERT_AIONDATA' => 'Inserted Aion Data',
'UMIL_ITEMSTATS' => 'Added Popup Module,  config', 
'UMIL_ITEMSTATS_HIDDEN' => 'Added Hidden Popup Module & config', 
'UMIL_ITEMSTATS_REMOVED' => 'Removed Popup Module', 
'UMIL_REMOVE_GAME_ROW' => 'Remove game data',
'UMIL_UPGRADE_WOWDATA' => 'Removed Warcraft Data',
'UMIL_LOGCLEANED' => 'Cleaned { and } from Log table', 
'UMIL_CHOOSE' => 'Choose Game',
'UMIL_GUILD'	=> 'Guildtag / Alliance Name',
'UMIL_INSERT_DKPLINK' => 'Dkplink inserted', 
'UMIL_REMOVE_DKPLINK' => 'Dkplink removed', 
'UMIL_CACHECLEARED' => 'Caches Cleared', 
'UMIL_RANKCHANGED' => 'Added guild_id and index to ranks table', 
'UMIL_CLASSCHANGED' => 'WOW Class ids updated', 
'UMIL_OLD_RESTORE_SUCCESS' => 'bbdkp (%s) dkpsystem, events, raids, raid_attendees, items, member_ranks, memberlist, temp_memberdkp tables restored successfully.', 
'UMIL_OLD_RESTORE_NOT' => 'No bbdkp (%s) installation found to restore.', 
'UMIL_OLD_UNINSTALL_SUCCESS' => 'bbdkp (%s) uninstalled. ',
'UMIL_109_ILLEGALVERSION' => '1.0.9 beta found, you need to upgrade to 1.0.9rc1 and from there you can upgrade to 1.1', 

// ACP titles
'BBDKP_WELCOME' => 'Welcome to bbDKP',
'ACP_DKP_MAINPAGE' => 'Adminpanel Index',
'ACP_DKP_BBSTATS' => 'Adminpanel',
'ACP_ADDEVENT' => 'Add Event', 
'ACP_LISTEVENTS' => 'List Events', 
'ACP_ADDDKPSYS' => 'Add DKP Pool', 
'ACP_LISTDKPSYS' => 'List DKP Pools', 
'ACP_ADDADJ' => 'Add Group Adjustments', 
'ACP_ADDIADJ'=> 'Add Individual Adjustments', 
'ACP_LISTADJ' => 'List Group Adjustments', 
'ACP_LISTIADJ' => 'List Individual Adjustments', 
'ACP_ADDITEM' => 'Add Item',
'ACP_LISTITEMS' => 'List Items',
'ACP_ADDRAID' => 'Add Raid',
'ACP_LISTRAIDS' => 'List Raids', 
'ACP_MM_ADDMEMBER' => 'Add Member',
'ACP_MM_LISTMEMBERS' => 'List Members',
'ACP_MM_ADDGUILD' => 'Add Guild',
'ACP_MM_LISTGUILDS' => 'List Guilds',
'ACP_MM_RANKS' => 'Ranks',
'ACP_MM_TRANSFER' => 'Transfer',
'ACP_DKP_LOGS' => 'View Logs',
'ACP_SEARCH_ITEM' => 'Item Search',
'ACP_VIEW_ITEM' => 'Item View (hide me)',
'ACP_DKP_ARMORY' => 'Armory Config',
'ACP_DKP_CONFIG' => 'bbDkp Config',
'RETURN_DKPINDEX' => 'Return to DKP Index',
'RETURN_LOG'  => 'Return to Log listing. ',
'ACP_DKP' => 'bbDKP Adminpanel',
'ACP_ITEMSTATS' => 'Popup Configuration',
'ACP_INDEXPAGE' => 'Portal Configuration', 

// Explains
'ACP_DKP_MAINPAGE_EXPLAIN' => 'Adminpanel Index',
'ACP_ADDDKPSYS_EXPLAIN' => 'Here you can add or change the name/status of a DKP Pool. Before setting up Events you need to make a DKP Pool.', 
'ACP_LISTDKPSYS_EXPLAIN' => 'List DKP Pools; a DKP pool combines a series of Events, Raids and Items. This way you can manage multiple DKP Tiers separately. ', 
'ACP_ADDEVENT_EXPLAIN' => 'Here you can add / change event information. DKP Pools must be set up first.', 
'ACP_LISTEVENTS_EXPLAIN' => 'List of Events. The preset values will be used as standard dkp value for any raid on that event.', 
'ACP_ADDADJ_EXPLAIN' => 'Here you can add / change group adjustments. ', 
'ACP_ADDIADJ_EXPLAIN'=> 'Here you can add / change individual adjustments. ', 
'ACP_LISTADJ_EXPLAIN' => 'List Group Adjustments', 
'ACP_LISTIADJ_EXPLAIN' => 'List Individual Adjustments', 
'ACP_ADDITEM_EXPLAIN' => 'Here you can add / change item information.',
'ACP_LISTITEMS_EXPLAIN' => 'List of Purchased Items. you can filter by Dkp pool and raid. ',
'ACP_ADDRAID_EXPLAIN' => 'Here you can add / change raid information.',
'ACP_LISTRAIDS_EXPLAIN' => 'Here is a list of Raids per DKP pool. Clicking on the raidname brings you in Edit/delete-mode', 
'ACP_DKP_LOGS_EXPLAIN' => 'This lists all the actions in bbDkp. You can sort by username, date, IP or action.',
'ACP_MM_RANKS_EXPLAIN' => 'Here you can edit raid ranks and name prefix/suffix. (Put new rank on last line and press edit. to delete rank, clear the name of that rank). Rank 99 (the \'out\' rank) is not visible. These custom ranks can be overwritten by the in-game ranks through the armorylink plugin. ',
'ACP_MM_LISTMEMBERS_EXPLAIN' => 'Guild member list. Here you remove guild members. Attention this will also remove all the member\'s raid history in all Dkp pools! ',
'ACP_MM_LISTGUILDS_EXPLAIN' => 'List of guilds. before you add members, you have to add a guild.', 
'ACP_MM_ADDGUILD_EXPLAIN' => 'Here you can add, edit or delete a guild. ', 
'ACP_MM_LISTMEMBERDKP_EXPLAIN' => 'Here you can view / change Member DKP. ',
'ACP_MM_ADDMEMBER_EXPLAIN' => 'Here you can add / change guild members information. ',
'ACP_MM_EDITMEMBERDKP_EXPLAIN' => 'Here you can edit / delete guild members dkp. ',
'ACP_DKP_CONFIG_EXPLAIN' => 'Here you can change Global bbDkp settings.',
'ACP_DKP_ARMORY_EXPLAIN' => 'Here you can download data from Armory and hide ranks in roster.',
'ACP_ITEMSTATS_EXPLAIN' => 'Here you can change the Item, Itemicon Popup settings',
'ACP_INDEXPAGE_EXPLAIN' => 'bbDkp Portal Settings, Block on/off switches, Block configuration can be changed here',
'TRANSFER_MEMBER_HISTORY_DESCRIPTION' => 'This transfers all of a member\'s history (raids, items, adjustments) to another member.',


// Permission Messages
'NOAUTH_A_EVENT_ADD' => 'You do not have permission to add events.',
'NOAUTH_A_EVENT_UPD' => 'You do not have permission to update events.',
'NOAUTH_A_EVENT_DEL' => 'You do not have permission to delete events.',
'NOAUTH_A_INDIVADJ_ADD' => 'You do not have permission to add individual adjustments.',
'NOAUTH_A_INDIVADJ_UPD' => 'You do not have permission to update individual adjustments.',
'NOAUTH_A_INDIVADJ_DEL' => 'You do not have permission to delete individual adjustments.',
'NOAUTH_A_ITEM_ADD' => 'You do not have permission to add items.',
'NOAUTH_A_ITEM_UPD' => 'You do not have permission to update items.',
'NOAUTH_A_ITEM_DEL' => 'You do not have permission to delete items.',
'NOAUTH_A_NEWS_ADD' => 'You do not have permission to add news entries.',
'NOAUTH_A_NEWS_UPD' => 'You do not have permission to update news entries.',
'NOAUTH_A_NEWS_DEL' => 'You do not have permission to delete news entries.',
'NOAUTH_A_RAID_ADD' => 'You do not have permission to add raids.',
'NOAUTH_A_RAID_UPD' => 'You do not have permission to update raids.',
'NOAUTH_A_RAID_DEL' => 'You do not have permission to delete raids.',
'NOAUTH_A_CONFIG_MAN' => 'You do not have permission to manage bbDkp configuration settings.',
'NOAUTH_A_MEMBERS_MAN' => 'You do not have permission to manage guild members.',
'NOAUTH_A_PLUGINS_MAN' => 'You do not have permission to manage bbDkp plugins.',
'NOAUTH_A_LOGS_VIEW' => 'You do not have permission to view bbDkp logs.',

// Manage Members Menu (yes, MMM)
'ADD_MEMBER' 	=> 'Add New Member',
'LIST_EDIT_DEL_MEMBER' => 'List, Edit or Delete Members',
'EDIT_RANKS' 		=> 'Edit Membership Ranks',
'ADD_RANKS' 		=> 'Add Membership Ranks',
'TRANSFER_HISTORY' => 'Transfer Member History',


// Delete Confirmation Texts
'CONFIRM_DELETE_EVENT' => 'Are you sure you want to delete this event?',
'CONFIRM_DELETE_GUILD' => 'Are you sure you want to delete this Guild?',
'CONFIRM_DELETE_DKPSYS' => 'Are you sure you want to delete this Dkp system ???  ',
'CONFIRM_DELETE_IADJ' => 'Are you sure you want to delete this individual adjustment?',
'CONFIRM_DELETE_ITEM' => 'Are you sure you want to delete the item "%s" from player(s) %s ?',
'CONFIRM_DELETE_MEMBERS' => 'Are you sure you want to delete the following members?',
'CONFIRM_DELETE_MEMBERDKP' => 'Are you sure you want to delete the following member dkp records? ',
'CONFIRM_DELETE_NEWS' => 'Are you sure you want to delete this news entry?',
'CONFIRM_DELETE_RAID' => 'Are you sure you want to delete this raid?',
'CONFIRM_DELETE_BBDKPLOG' => 'Are you sure you want to delete these bbDKP log entries?',

// Log Actions
'ACTION_DEFAULT_DKP_CHANGED' => 'Default DKP Pool changed', 
'ACTION_DKPSYS_ADDED' => 'dkpsys Added',
'ACTION_DKPSYS_DELETED' => 'dkpsys Deleted',
'ACTION_DKPSYS_UPDATED' => 'dkpsys Updated',
'ACTION_EVENT_ADDED' => 'Event Added',
'ACTION_EVENT_DELETED' => 'Event Deleted',
'ACTION_EVENT_UPDATED' => 'Event Updated',
'ACTION_GUILD_ADDED' => 'Guild Added',
'ACTION_HISTORY_TRANSFER' => 'Member History Transfer',
'ACTION_INDIVADJ_ADDED' => 'Individual Adjustment Added',
'ACTION_INDIVADJ_DELETED' => 'Individual Adjustment Deleted',
'ACTION_INDIVADJ_UPDATED' => 'Individual Adjustment Updated',
'ACTION_ITEM_ADDED' => 'Item Added',
'ACTION_ITEM_DELETED' => 'Item Deleted',
'ACTION_ITEM_UPDATED' => 'Item Updated',
'ACTION_LOG_DELETED' => 'Log %s Deleted',
'ACTION_MEMBER_ADDED' => 'Member Added',
'ACTION_MEMBER_DELETED' => 'Member Deleted',
'ACTION_MEMBER_UPDATED' => 'Member Updated',
'ACTION_MEMBERDKP_DELETED' => 'Member Dkp Deleted',
'ACTION_MEMBERDKP_UPDATED' => 'Member Dkp Updated',
'ACTION_NEWS_ADDED' => 'News Entry Added',
'ACTION_NEWS_DELETED' => 'News Entry Deleted',
'ACTION_NEWS_UPDATED' => 'News Entry Updated',
'ACTION_RANK_ADDED' => 'Rank Added',
'ACTION_RANK_DELETED' => 'Rank Deleted',
'ACTION_RANK_UPDATED' => 'Rank Updated',
'ACTION_RAID_ADDED' => 'Raid Added',
'ACTION_RAID_DELETED' => 'Raid Deleted',
'ACTION_RAID_UPDATED' => 'Raid Updated',
'ACTION_RT_CONFIG_UPDATED' => 'Raidtracker Config Updated', 

// Verbose log entry lines
'NEW_ACTIONS' => 'Newest Admin Actions',
'VLOG_DKPSYS_ADDED' => '%s added the dkp pool %s.',
'VLOG_DKPSYS_UPDATED' => '%s updated the dkp pool %s.',
'VLOG_DKPSYS_DELETED' => '%s deleted the dkp pool %s.',
'VLOG_EVENT_ADDED' => '%s added the event %s worth %.2f points.',
'VLOG_EVENT_UPDATED' => '%s updated the event %s.',
'VLOG_EVENT_DELETED' => '%s deleted the event %s.',
'VLOG_HISTORY_TRANSFER' => '%s transferred %s\'s history to %s.',
'VLOG_INDIVADJ_ADDED' => '%s added an individual adjustment of %.2f to %d member(s).',
'VLOG_INDIVADJ_UPDATED' => '%s updated an individual adjustment of %.2f to %s.',
'VLOG_INDIVADJ_DELETED' => '%s deleted an individual adjustment of %.2f to %s.',
'VLOG_ITEM_ADDED' => '%s added the item %s charged to %d member(s) for %.2f points.',
'VLOG_ITEM_UPDATED' => '%s updated the item %s charged to %d member(s).',
'VLOG_ITEM_DELETED' => '%s deleted the item %s charged to %d member(s).',
'VLOG_MEMBER_ADDED' => '%s added the member %s.',
'VLOG_MEMBER_UPDATED' => '%s updated the member %s.',
'VLOG_MEMBER_DELETED' => '%s deleted the member %s.',
'VLOG_RANK_ADDED' => '%s added the rank %s',
'VLOG_RANK_DELETED' => '%s deleted the rank %s',
'VLOG_RANK_UPDATED' => '%s Updated Rank %s to %s',
'VLOG_NEWS_ADDED' => '%s added the news entry %s.',
'VLOG_NEWS_UPDATED' => '%s updated the news entry %s.',
'VLOG_NEWS_DELETED' => '%s deleted the news entry %s.',
'VLOG_RAID_ADDED' => '%s added a raid on %s.',
'VLOG_RAID_UPDATED' => '%s updated a raid on %s.',
'VLOG_RAID_DELETED' => '%s deleted a raid on %s.',
'VLOG_RT_CONFIG_UPDATED'  => '%s updated Raidtracker settings',
'VLOG_LOG_DELETED' => '%s deleted logid %s.',
'VLOG_DEFAULT_DKP_CHANGED' => '%S changed Default DKP Pool',

// Before/After
'ADJUSTMENT_AFTER' => 'Adjustment After',
'ADJUSTMENT_BEFORE' => 'Adjustment Before',
'ATTENDEES_AFTER' => 'Attendees After',
'ATTENDEES_BEFORE' => 'Attendees Before',
'DKPSYSNAME_BEFORE' => 'DKP Poolname before', 
'DKPSYSNAME_AFTER' => 'DKP Poolname after',
'DKPSYSPOOL_BEFORE' => 'DKP status before', 
'DKPSYSPOOL_AFTER' => 'DKP status after', 
'BUYERS_AFTER' => 'Buyer After',
'BUYERS_BEFORE' => 'Buyer Before',
'CLASS_AFTER' => 'Class After',
'CLASS_BEFORE' => 'Class Before',
'EARNED_AFTER' => 'Earned After',
'EARNED_BEFORE' => 'Earned Before',
'EVENT_AFTER' => 'Event After',
'EVENT_BEFORE' => 'Event Before',
'HEADLINE_AFTER' => 'Headline After',
'HEADLINE_BEFORE' => 'Headline Before',
'LEVEL_AFTER' => 'Level After',
'LEVEL_BEFORE' => 'Level Before',
'MEMBERS_AFTER' => 'Members After',
'MEMBERS_BEFORE' => 'Members Before',
'MESSAGE_AFTER' => 'Message After',
'MESSAGE_BEFORE' => 'Message Before',
'NAME_AFTER' => 'Name After',
'NAME_BEFORE' => 'Name Before',
'NOTE_AFTER' => 'Note After',
'NOTE_BEFORE' => 'Note Before',
'RACE_AFTER' => 'Race After',
'RACE_BEFORE' => 'Race Before',
'RAID_ID_AFTER' => 'Raid ID After',
'RAID_ID_BEFORE' => 'Raid ID Before',
'REASON_AFTER' => 'Reason After',
'REASON_BEFORE' => 'Reason Before',
'SPENT_AFTER' => 'Spent After',
'SPENT_BEFORE' => 'Spent Before',
'VALUE_AFTER' => 'Value After',
'VALUE_BEFORE' => 'Value Before',


//log
'SUCCESS' => 'Success',
'FAILED' => 'Failed',

// Errors
'ERROR' => 'Error',
'ERROR_INVALID_ITEM_PROVIDED' => 'A valid item id was not provided.',
'ERROR_INVALID_NAME_PROVIDED' => 'A valid member name was not provided.',
'ERROR_INVALID_RAID_PROVIDED' => 'A valid raid id was not provided.',
'ERROR_INVALID_EVENT_PROVIDED' => 'Could not obtain event information',
'ERROR_EMPTY_EVENTNAME' 		=> 'Event name is empty.',
'ERROR_RESERVED_EVENTNAME' 		=> 'Event name already taken!', 
'ERROR_INVALID_GUILD_PROVIDED' => 'A valid guild id was not provided.',
'ERROR_INVALID_DKPSYSTEM_PROVIDED' => 'A valid dkp id was not provided.',
'ERROR_INVALID_RAID' 		=>  'Could not obtain Raid information.',
'ERROR_INVALID_ADJUSTMENT' 	=>  'A valid adjustment was not provided.',
'ERROR_INVALID_NEWS' 		=>  'A valid news was not provided.',
'ERROR_RANK_EXISTS'			=>  'Error: rank %s already exists in guild %s', 
'ERROR_RANK_NAME_EMPTY'		=>  'Error: rank name is empty', 
'ERROR_NODKP'				=>  'Error: No dkp pools defined',
'ERROR_TRFSAME'				=>  'Cannot transfer to same member', 
'ERROR_INVALID_GUILDID'		=>  'Error: guild id cannot be 0', 
'ERROR_FROMTO'				=>  'Please choose a FROM and a TO member', 
'ERROR_MEMBERNOTFOUND' 		=> 	'Could not obtain member information',
'ERROR_GUILDEMPTY' 			=> 	'Guild name or realm empty!',
'ERROR_GUILDNOTFOUND' 		=> 	'Could not obtain Guild information', 
'ERROR_GUILDTAKEN' 			=>	'Guildname already taken!', 
'ERROR_GUILDIDRESERVED'		=>  'Cannot delete Guild. id 0-1 are reserved.', 
'ERROR_GUILDHASMEMBERS'		=>	'Cannot delete Guild. There are members in this guild.',  
'ERROR_MEMBEREXIST'			=>	'This member already exists in the Database.', 
'ERROR_INCORRECTRANK'		=>	'Rank does not match Guild. Please select correct Rank.', 
'RANK_EXISTS'				=>  'Error: rank %s already exists in guild %s', 
'WARNING_NOATTENDEES'		=>  'Warning, deleted Raid had no attendees', 
'ERROR_NOITEMS'				=>  'There are no items in the database.',
'FORM_ERROR'				=>  'Form validation Error : Check input <br />',  
'ERROR_RAID_NOATTENDEES'    =>  'Error : old raid has no attendees. Cannot remove value of old raid attendees. STOP ', 

// Submission Success Messages
'ADMIN_ADD_ADJ_SUCCESS' => 'A %s adjustment of %.2f has been added to the database for your guild.',
'ADMIN_ADD_ADMIN_SUCCESS' => 'An e-mail has been sent to %s with their administrative information.',
'ADMIN_ADD_DKPSYS_SUCCESS' => 'A new dkp system %s has been added to the database for your guild.',
'ADMIN_ADD_EVENT_SUCCESS' => 'A value preset of %s for a raid on %s has been added to the database for your guild.',
'ADMIN_ADD_IADJ_SUCCESS' => 'An individual %s adjustment of %.2f for %s has been added to the database for your guild.',
'ADMIN_ADD_ITEM_SUCCESS' => 'An item purchase entry for %s, purchased by %s for %.2f has been added to the database for your guild.',
'ADMIN_ADD_MEMBER_SUCCESS' => '%s has been added as a member of your guild.',
'ADMIN_ADD_MEMBER_FAIL' => 'Failed to add %s; member exists as ID %d',
'ADMIN_ADD_GUILD_SUCCESS' => '%s has been added as a guild to your database.',
'ADMIN_ADD_NEWS_SUCCESS' => 'The news entry has been added to the database for your guild.',
'ADMIN_ADD_RAID_SUCCESS' => 'The %s raid on %s has been added to the database for your guild.',
'ADMIN_ADD_STYLE_SUCCESS' => 'The new style has been added successfully.',
'ADMIN_DELETE_ADJ_SUCCESS' => 'The %s adjustment of %.2f has been deleted from the database for your guild.',
'ADMIN_DELETE_DKPSYS_SUCCESS' => 'the dkp system %s has been deleted from the database for your guild !!! ',
'ADMIN_DELETE_EVENT_SUCCESS' => 'The value preset of %s for a raid on %s has been deleted from the database for your guild.',
'ADMIN_DELETE_GUILD_SUCCESS' => 'The guild with id %s has been deleted from the database for your guild.',
'ADMIN_DELETE_IADJ_SUCCESS' => 'The individual %s adjustment of %.2f for %s has been deleted from the database for your guild.',
'ADMIN_DELETE_ITEM_SUCCESS' => 'The item purchase entry for %s, purchased by %s for %.2f has been deleted from the database for your guild.',
'ADMIN_DELETE_MEMBERS_SUCCESS' => '%s, including all of his/her history, has been deleted from the database for your guild.',
'ADMIN_DELETE_MEMBERDKP_SUCCESS' => 'Dkp for %s in Dkp pool %s has been deleted. (The member still exists in the member list)',
'ADMIN_DELETE_MEMBERDKP_FAILED' => 'Dkp for %s in Dkp pool %s could not be deleted.',
'ADMIN_DELETE_MEMBERS_FAILED' => 'ERROR : %s, including all of his/her history, could not be deleted.',
'ADMIN_DELETE_NEWS_SUCCESS' => 'The news entry has been deleted from the database for your guild.',
'ADMIN_DELETE_RAID_SUCCESS' => 'The raid and any items associated with it have been deleted from the database for your guild.',
'ADMIN_TRANSFER_HISTORY_SUCCESS' => 'All of %s\'s history has been transferred to %s and %s has been deleted from the database for your guild.',
'ADMIN_UPDATE_ADJ_SUCCESS' => 'The %s adjustment of %.2f has been updated in the database for your guild.',
'ADMIN_UPDATE_DKPSYS_SUCCESS' => 'The name,status of DKP pool %s was changed to : %s, %s',
'ADMIN_UPDATE_GUILD_SUCCESS' => 'the guild with id %d has been updated in your database.',
'ADMIN_UPDATE_EVENT_SUCCESS' => 'The value preset of %s for a event on %s has been updated in the database for your guild.',
'ADMIN_UPDATE_IADJ_SUCCESS' => 'The individual %s adjustment of %.2f for %s has been updated in the database for your guild.',
'ADMIN_UPDATE_ITEM_SUCCESS' => 'The item purchase entry for %s, purchased by %s for %.2f has been updated in the database for your guild.',
'ADMIN_UPDATE_MEMBER_SUCCESS' => 'membership settings for %s have been updated.',
'ADMIN_UPDATE_MEMBER_FAIL' => 'This membername %s already exists for another member in the database, cannot update.', 
'ADMIN_UPDATE_MEMBERDKP_SUCCESS' => 'Dkp for %s has been updated.',
'ADMIN_UPDATE_NEWS_SUCCESS' => 'The news entry has been updated in the database for your guild.',
'ADMIN_UPDATE_RAID_SUCCESS' => 'The %d/%d/%d raid on %s has been updated in the database for your guild.',
'ADMIN_RANKS_UPDATE_SUCCESS' => 'The ranks have been updated successfully.',
'ADMIN_RANKS_ADDED_SUCCESS' => 'A rank has been added successfully.',
'ADMIN_RAID_SUCCESS_HIDEINACTIVE' => 'Updating active/inactive player status...',
'ADMIN_ADD_GUILD_FAIL' => 'the %s guild cannot be added to your database.',
'ADMIN_PORTAL_SETTINGS_SAVED' => 'bbdkp Portal settings .',
'ADMIN_LOG_DELETE_SUCCESS' => 'The log enties %s were deleted successfully.',
'ADMIN_LOG_DELETE_FAIL' => 'The log enties %s were not deleted.',
'ADMIN_DEFAULTPOOL_SUCCESS' => 'Default Dkp Pool changed to %s successfully. ', 

 // Configuration
'ACTIVE_POINT_ADJ' => 'Active Point Adjustment',
'ACTIVE_POINT_ADJ_NOTE' => 'Point Adjustment to make on a member when they become active.',
'ADJUSTMENTS_PER_PAGE' => 'Adjustments per Page',
'ADMIN' => 'Admin',
'DEFAULT_GAME' => 'Default Game',
'DEFAULT_PAGE' => 'Default Index Page',
'DEFAULT_REGION'   => 'Default Region',
'DEFAULT_REALM'    => 'Default Realm',
'DEFAULT_PERMISSIONS' => 'Default Permissions',
'DOWNLOAD'		   => 'Download',
'DEFAULT_GAME' => 'Installed game',
'EVENTS_PER_PAGE' => 'Events per Page',
'GENERAL_SETTINGS' => 'General Settings',
'GUILDTAG' => 'Guildtag / Alliance Name',
'GUILDTAG_NOTE' => 'Used in the title of nearly every page',
'GUILD_MEMBERS' => 'Guild Member(s)',
'GUILD_NAME'	=> 'Guild name',
'REALM_NAME'	=> 'Realm name',
'HIDE_INACTIVE' => 'Hide Inactive Members',
'HIDE_INACTIVE_NOTE' => 'Hide members that haven\'t attended a raid in [inactive period] days?',
'INACTIVE_PERIOD' => 'Inactive Period',
'INACTIVE_PERIOD_NOTE' => 'Number of days a member can miss a raid and still be considered active',
'INACTIVE_POINT_ADJ' => 'Inactive Point Adjustment',
'INACTIVE_POINT_ADJ_NOTE' => 'Point adjustment to make on a member when they become inactive.',
'ITEMS_PER_PAGE' => 'Items per Page',
'LATESTVERSION'	   => 'Latest bbDKP version : ', 
'VERSION_UPDATE' => 'Version Update',
'VERSION_NOTONLINE' => 'bbDKP callback failed, cannot look up latest version.',
'WHO_ONLINE' => 'Who\'s Online',
'LISTMEMBERS_PER_PAGE' => 'Dkp Guildmembers per Page',

'MENU_RAIDS' => 'Raids',
'MENU_EVENTS' => 'Events',
'MENU_ITEMHIST' => 'Item History',
'MENU_NEWS' => 'News',
'MENU_ADJUSTMENTS' => 'Adjustment settings', 
'MENU_GENERAL' => 'General Settings',
'MENU_STANDINGS' => 'Standings',
'MENU_ROSTER'	=> 'Roster',

'NONE' => 'None',
'PARSETAGS' => 'Guildtags to Parse',
'PARSETAGS_NOTE' => 'Those listed will be available as options when parsing raid logs.',
'PLUGINS' => 'Plugins',
'POINT_NAME' => 'Point Name',
'POINT_NAME_NOTE' => 'Ex: DKP, RP, etc.',
'RAIDS_PER_PAGE' => 'Raids per Page',
'REGION'	=> 'Region',
'REGIONEU'	=> 'European region', 
'REGIONUS'	=> 'US region',
'SITE_NAME' => 'Site Name',
'SITE_DESCRIPTION' => 'Site Description',
'YOURVERSION'	   => 'Your bbDKP Version :', 

// roster
'ARM_LAYOUT' => 'Roster Layout',
'ARM_LAYOUTDO' => 'Choose the style of Roster',
'ARM_SHOWACH' => 'Show Achievement points ?', 
'ARM_STAND' => 'Standard', 
'ARM_CLASS' => 'Class',

'SHOWONROSTER'	=> 'Show on Roster',  


'ADD_ITEM_RAIDID_NOTE' => 'Only raids less than two weeks old are shown / %sshow all</a>',
'ADD_ITEM_RAIDID_SHOWALL_NOTE' => 'All raids are shown / %s show some</a>',
'ADD_RAID_VALUE_NOTE' => 'for a one-time bonus; preset value for the event selected is used if left blank',
'ADD_ITEMS_FROM_RAID' => 'Add Items from this Raid',
'ADDADJ_TITLE' => 'Add a Group Adjustment',
'ADD_EVENT_TITLE' => 'Add an Event',
'ADD_DKPSYS_TITLE' => 'Add a DKP system',
'ADD_GUILD_TITLE' => 'Add a new Guild',
'ADD_IADJ_TITLE' => 'Add an Individual Adjustment',
'ADD_ITEM_TITLE' => 'Add an Item Purchase',
'ADD_MEMBER_TITLE' => 'Add a Guild Member',
'ADD_MEMBER_TITLE' => 'Manage Guild Member Dkp',
'ADD_RAID_TITLE' => 'Add a Raid',
'ADMIN_INDEX_TITLE' => 'bbDkp Administration',
'MANAGE_MEMBERS_TITLE' => 'Manage Guild Members',
'PARSELOG_TITLE' => 'Parse a Log File',
'PLUGINS_TITLE' => 'Manage Plugins',
'VIEWLOGS_TITLE' => 'Log Viewer',
'EDITMEMBER_DKP_TITLE' => 'Edit Guildmember DKP', 

// Page Foot Counts
'LISTMEMBERS_FOOTCOUNT' => '... found %d members',
'LISTUSERS_FOOTCOUNT' => '... found %d user(s) / %d per page',
'LISTEVENTS_FOOTCOUNT' => '... found %d events / %d per page',
'LISTRAIDS_FOOTCOUNT' => '... found %d raid(s) / %d per page',
'MANAGE_MEMBERS_FOOTCOUNT' => '... found %d member(s)',
'ONLINE_FOOTCOUNT' => '... %d users are online',
'VIEWLOGS_FOOTCOUNT' => '... found %d log(s) / %d per page',
'GUILD_FOOTCOUNT' => '... found %d guild(s)', 
'NEWS_FOOTCOUNT' => '... found %d newsitem(s)',
'LISTADJ_FOOTCOUNT' => '... found %d adjustment(s) / %d per page',
'LISTDKPSYS_FOOTCOUNT' => '... found %d dkp systems / %d per page',

// Submit Buttons
'ADD_ADJUSTMENT' => 'Add Adjustment',
'ADD_ACCOUNT' => 'Add Account',
'ADD_EVENT' => 'Add Event',
'ADD_DKPSYS' => 'Add DKP system',
'ADD_ITEM' => 'Add Item',
'ADD_MEMBER' => 'Add Member',
'ADD_GUILD' => 'Add Guild',
'ADD_RAID' => 'Add Raid',
'DELETE_ADJUSTMENT' => 'Delete Adjustment',
'DELETE_EVENT' => 'Delete Event',
'DELETE_DKPSYS' => 'Delete DKP system',
'DELETE_GUILD' => 'Delete Guild',
'DELETE_ITEM' => 'Delete Item',
'DELETE_MEMBER' => 'Delete Member',
'DELETE_MEMBER_DKP' => 'Delete Member dkp',
'DELETE_RAID' => 'Delete Raid',
'DELETE_SELECTED_MEMBERS' => 'Delete Selected Member(s)',
'DELETE_SELECTED_GUILDS' => 'Delete Selected Guild(s)', 
'EDIT_GUILD' => 'Edit Guild',
'SEARCH_EXISTING' => 'Search Existing',
'SELECT' => 'Select',
'TRANSFER_HISTORY' => 'Transfer History',
'UPDATE_ADJUSTMENT' => 'Update Adjustment',
'UPDATE_EVENT' => 'Update Event',
'UPDATE_GUILD' => 'Update Guild',
'UPDATE_DKPSYS' => 'Update DKP system',
'UPDATE_ITEM' => 'Update Item',
'UPDATE_MEMBER' => 'Update Member',
'UPDATE_MEMBER_DKP' => 'Update Member Dkp',
'UPDATE_RAID' => 'Update Raid',

// Misc
'ADJUSTMENT_VALUE' => 'Adjustment Value',
'ADJUSTMENT_VALUE_NOTE' => 'May be negative',
'CODE' => 'Code',
'CONTACT' => 'Contact',
'CREATE' => 'Create',
'DATE_FORMAT' => 'Date Format in lists', 
'DONE' => 'Done',
'HOLD_CTRL_NOTE' => 'Hold CTRL(PC) or CMD(Mac) to select multiple<br />',
'DKP_STATUS' => 'DKP pool status (Y or N)',
'EVENT_NAME' => 'Event name', 
'EVENT_VALUE' => 'Event Value',
'FOUND_MEMBERS' => 'Parsed %d lines, found %d members',
'STATUS' => 'Status', 
'HIDE' => 'Hide?',
'ID' => 'Id', 
'INSTALL' => 'Install',
'ITEM_SEARCH' => 'Item Search',
'LIST_PREFIX' => 'List Prefix',
'LIST_SUFFIX' => 'List Suffix',
'LOGS' => 'Logs',
'LOG_FIND_ALL' => 'Find all (including anonymous)',
'MANAGE_MEMBERS' => 'Manage Members',
'MANAGE_PLUGINS' => 'Manage Plugins',
'MANAGE_USERS' => 'Manage Users',
'MEMBERS' => 'Members',
'MEMBER_RANK' => 'Member Rank',
'POOL' => 'Dkp Pool',
'POOLID' => 'Dkp id',
'RANKID' => 'Rank Id', 
'RAIDDESCRIPTION' => 'Overview of Raid %s in %s on %s ', 
'NEWRAIDDESCRIPTION' => 'Adding a new raid ', 
'LOOTADD' => 'Add items to %s Raid on %s',
'LOOTUPD' => 'Updating items to %s Raid on %s',
'RESULTS' => '%d Results (%s)',
'SEARCH' => 'Search',
'SEARCH_MEMBERS' => 'Search Members',
'SHOULD_BE' => 'Should be',
'STYLES' => 'Styles',
'TITLE' => 'Title',
'UNINSTALL' => 'Uninstall',
'VERSION' => 'Version',
'X_MEMBERS_S' => '%d member',
'X_MEMBERS_P' => '%d members',
'SELECT_1OFX_MEMBERS' => 'Select 1 of %d members...',



// Admin Index
'ANONYMOUS' => 'Anonymous',
'BBDKP_STARTED' => 'bbDkp Started',
'IP_ADDRESS' => 'IP Address',
'ITEMS_PER_DAY' => 'Items per Day',
'LAST_UPDATE' => 'Last Update',
'LOCATION' => 'Location',

'NUMBER_OF_ITEMS' => 'Number of Items',
'NUMBER_OF_LOGS' => 'Number of Log Entries',
'NUMBER_OF_MEMBERS' => 'Number of Members (Active / Inactive)',
'NUMBER_OF_RAIDS' => 'Number of Raids',
'NUMBER_OF_ITEMS' => 'Number of Items',
'NUMBER_OF_MEMBERDKP' => 'Number of DKP Members', 
'NUMBER_OF_DKPSYS' => 'Number of DKP Systems', 
'NUMBER_OF_GUILDS' => 'Number of Guilds', 
'NUMBER_OF_ADJUSTMENTS' => 'Number of Adjustments', 
'NUMBER_OF_EVENTS' => 'Number of Events',
'RAIDS_PER_DAY' => 'Raids per Day',
'ATTENDANCEDAYS' => 'Attendance days (for Standings)',
'STATISTICS' => 'Statistics',
'TOTALS' => 'Totals',



// Location messages
'ADDING_GROUPADJ' => 'Adding a Group Adjustment',
'ADDING_INDIVADJ' => 'Adding an Individual Adjustment',
'ADDING_ITEM' => 'Adding an Item',

'ADDING_RAID' => 'Adding a Raid',
'EDITING_INDIVADJ' => 'Editing Individual Adjustment',
'EDITING_ITEM' => 'Editing Item',
'EDITING_NEWS' => 'Editing News Entry',
'EDITING_RAID' => 'Editing Raid',
'LISTING_EVENTS' => 'Listing Events',
'LISTING_GROUPADJ' => 'Listing Group Adjustments',
'LISTING_INDIVADJ' => 'Listing Individual Adjustments',
'LISTING_ITEMHIST' => 'Listing Item History',
'LISTING_ITEMVALS' => 'Listing Item Values',
'LISTING_MEMBERS' => 'Listing Members',
'LISTING_RAIDS' => 'Listing Raids',
'VIEWING_LOGS' => 'Viewing Logs',
'VIEWING_MEMBER' => 'Viewing Member',

//js alerts
'ALERT_AJAX' => 'There was a problem while using XMLHTTP', 
'ALERT_OLDBROWSER' => 'Browser does not support HTTP Request', 


//Boss progress
'GENERAL' => 'General settings',

'HEADERTYPE' => 'How to display the progress in the header image?',
'OLDPHOTO' => 'old photo overlay',
'BLUE' => 'Blue overlay',
'NONE' => 'No progressbar',

'BPSTYLE' => 'Style: ',
'BP_STYLE_BP'   => 'RaidProgress default',
'BP_STYLE_BPS'  => 'RaidProgress simple',
'BP_STYLE_RP2R' => 'Raidprogress 2/row',
'BP_STYLE_RP3R' => 'Raidprogress 3/row',

'SHOWZONEPROGRESS' => 'Show a zone progression bar?',
'HIDENEWZONE' => 'Hide zones with no boss kills?',
'HIDENEWBOSS' => 'Hide never killed bosses?',

'SHOWZONE' => 'Show: ',

'SHOWZONES' => 'Show Zones',
'RP_ZONE' => 'Zone configuration',
'RP_ZONE_EXPLAIN' => 'Here you can configure the Zones header photo, Boss progress style, whether a zone has a progressbar, 
or that zones without kills will be shown (overrides the "shown" column), hide bosses that were never killed.<br />In the list, you can edit the Zone name, shortname, 
Imagename (filename without extension), if the zone is completed and the completiondate. <br />To delete a Zone, this will also delete any bosses in that zone. <br />To add a Zone, click the Add button.  ' , 
'RP_ZONE_ADD_EXPLAIN' => 'Here you can add a Zone', 
'RP_ZONEDEL' => 'Zone deleted',

'ZONE_NAME' => 'Zone name', 
'ZONE_NAME_EXPLAIN' => 'Choose the zone name to which this boss belongs. ',
'ZONE_NAME_SHORT' => 'Short name',
'ZONE_NAME_SHORT_EXPLAIN' => 'The short name of the Zone',
'ZONE_IMAGENAME' => 'Imagename',
'ZONE_IMAGENAME_EXPLAIN' => 'the colour imagename, without file extension. the file has to exist in /images/bossprogress/%s/zones/normal' ,
'ZONE_WEBID' => 'Web id',
'ZONE_WEBID_EXPLAIN' => 'The wowhead or allakhazam or other id to create the url',
'ZONE_SEQUENCE' => 'Zone sequence', 
'ZONE_SEQUENCE_EXPLAIN' => 'Choose the zone name after which this zone will be placed ',
'ZONE_COMPLETED' => 'Completed',
'ZONE_COMPLETED_EXPLAIN' => 'Check if you completed this zone',
'ZONE_COMPLETEDATE' => 'Completiondate',
'ZONE_COMPLETEDATE_EXPLAIN' => 'Set the date on which this zone was completed',
'SHOW_ZONE' => 'Show',
'SHOW_ZONE_EXPLAIN' => 'Check if you want to see this zone on the progress page.',
'SHOW_ZONE_PORTAL' => 'Show on Portal',
'SHOW_ZONE_PORTAL_EXPLAIN' => 'Check if you want to see this zone on the bossprogress block on the portal.',
'RP_ZONEDELETCONFIRM' => 'Please confirm deletion of zone %s. This will also delete any bosses attached to this zone.',   
'RP_ZONEADDED' => 'Zone %s was added successfully',  
'RP_ZONEUPDATED' => 'Zone %s was updated successfully',  

'RP_BOSS' => 'Boss configuration',
'RP_BOSS_EXPLAIN' => 'Here you can configure the boss photo, select to hide bosses that
 were never killed.<br />In the list, you can edit the boss name, shortname, 
 Imagename (this must be unique), whether the boss was killed and the completiondate. ', 
'RP_BOSS_ADD_EXPLAIN' => 'Here you can add or edit a Boss.', 
'RP_BOSSDEL' => 'Boss deleted',

'BOSS_NAME' => 'Boss name', 
'BOSS_NAME_EXPLAIN' => 'The full name of the Boss', 
'BOSS_NAME_SHORT' => 'Short name',
'BOSS_NAME_SHORT_EXPLAIN' => 'The short name of the Boss',
'BOSS_IMAGENAME' => 'Imagename',
'BOSS_IMAGENAME_EXPLAIN' => 'the colour imagename, without file extension. the file has to exist in /images/bossprogress/%s/bosses',
'BOSS_TYPE' => 'The url type',
'BOSS_TYPE_EXPLAIN' => 'type the parameter value (npc, object, boss, ...) to construct the boss url',
'BOSS_WEBID' => 'Web id',
'BOSS_WEBID_EXPLAIN' => 'The wowhead or allakhazam or other id to create the url',
'BOSS_COMPLETED' => 'Killed',
'BOSS_COMPLETED_EXPLAIN' => 'Check if you killed this boss',
'BOSS_COMPLETEDATE' => 'killdate',
'BOSS_COMPLETEDATE_EXPLAIN' => 'Set the date on which this boss was killed',
'BOSS_SHOW' => 'Show',
'BOSS_SHOW_EXPLAIN' => 'Check if you want to see this boss on the Boss progress page.',
'RP_BOSSDELETCONFIRM' => 'Please confirm deletion of boss %s.',   
'RP_BOSSADDED' => 'boss %s was added successfully to zone %s.',   
'BP_BOSSEDITED' => 'Boss %s changes were saved. ', 
'BP_BPSAVED' => 'Bossprogress changes were saved. ',

'AION_BASEURL' => 'http://db.aion.ign.com/npc/', 
'EQ_BASEURL' => 'http://eqbeastiary.allakhazam.com/search.shtml?zone=', 
'EQ2_BASEURL' => 'http://eq2.wikia.com/wiki/index.php/',
'DAOC_BASEURL' => 'http://camelot.allakhazam.com/db/search.html?cmob=',
'LOTRO_BASEURL' => 'http://lotro.allakhazam.com/db/bestiary.html?lotrmob=',
'VANGUARD_BASEURL' => 'http://vg.mmodb.com/bestiary/', 
'FFXI_BASEURL' => 'http://ffxi.allakhazam.com/db/bestiary.html?fmob=', 
'WARHAMMER_BASEURL' => 'http://www.wardb.com/npc.aspx?id=',
'WOW_BASEURL' => 'http://www.wowhead.com/?npc=',

));

?>
