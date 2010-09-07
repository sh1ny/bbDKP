<?php
/**
* This class manages Game, Race and Class 
* 
* Powered by bbdkp © 2010 The bbDkp Project Team
* If you use this software and find it to be useful, we ask that you
* retain the copyright notice below.  While not required for free use,
* it will help build interest in the bbDkp project.
*
* @package bbDkp.acp
* @version $Id$
* @copyright (c) 2009 bbdkp http://code.google.com/p/bbdkp/
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* 
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}
if (! defined('EMED_BBDKP')) 
{
	$user->add_lang ( array ('mods/dkp_admin' ));
	trigger_error ( $user->lang['BBDKPDISABLED'] , E_USER_WARNING );
}
class acp_dkp_game extends bbDkp_Admin
{
    var $u_action;
    
   	/** 
	* validationfunction for event : requiredvalues
	* @access public 
	*/ 
    function error_check()
    {
        global $user;
        $this->fv->is_number(request_var('event_value',0.00), $user->lang['FV_NUMBER_VALUE']);
       
        $this->fv->is_filled(array(
           request_var('event_dkpsys_name',' ')  => $user->lang['FV_REQUIRED_DKPSYS_NAME'],
           request_var('event_name',' ')  => $user->lang['FV_REQUIRED_NAME'],
           request_var('event_value', 0.00)    => $user->lang['FV_REQUIRED_VALUE'])
        );
        return $this->fv->is_error();
    }
    
	/** 
	* main ACP dkp event function
	* @param int $id the id of the node who parent has to be returned by function 
	* @param int $mode id of the submenu
	* @access public 
	*/
    function main($id, $mode)
    {
        global $db, $user, $template, $cache;
        global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;
        $user->add_lang(array('mods/dkp_admin'));   
        $user->add_lang(array('mods/dkp_common'));   
        $link = '<br /><a href="'.append_sid("index.$phpEx", "i=dkp_event&amp;mode=listevents") . '"><h3>'. $user->lang['RETURN_DKPINDEX'] . '</h3></a>';

         /***  DKPSYS drop-down ***/
        $dkpsys_id = 1;
        $sql = 'SELECT dkpsys_id, dkpsys_name, dkpsys_default 
                FROM ' . DKPSYS_TABLE . '
                ORDER BY dkpsys_name';
        $resultdkpsys = $db->sql_query($sql);
       
        switch ($mode)
        {
            case 'addgame':
                /* select data */
                    $update = false;

                    if  (isset($_GET[URI_EVENT]) )
                    {
                        $this->url_id = request_var(URI_EVENT, '');
                    }
                   
                    if ( $this->url_id )   
                      {
                        // we have a GET
                        $update = true;
                       
                        $sql = 'SELECT b.dkpsys_name, a.event_name, a.event_value, a.event_id
                                FROM ' . EVENTS_TABLE . ' a, ' . DKPSYS_TABLE . " b 
                                WHERE a.event_id = '" . $this->url_id . "'
                                AND b.dkpsys_id = a.event_dkpid  ";
                        $result = $db->sql_query($sql);
                        $row = $db->sql_fetchrow($result); 
                        $db->sql_freeresult($result);
                        if (!$row)
                        {
                            trigger_error($user->lang['ERROR_INVALID_EVENT_PROVIDED']);
                        }
                        else 
                        {
                            $this->event = array(
                                'event_dkpsys_name'  => $row['dkpsys_name'],
                                'event_name'  	     => $row['event_name'],
                                'event_value' 	     => $row['event_value'],
                                'event_id' 		     => $row['event_id']
                            );
                        }

                        while ( $row2 = $db->sql_fetchrow($resultdkpsys) )
                        {
                            $template->assign_block_vars('event_dkpid_row', array(
                            'VALUE' => $row2['dkpsys_id'],
                            'SELECTED' => ( $row2['dkpsys_name'] == $row['dkpsys_name']  ) ? ' selected="selected"' : '',
                            'OPTION'   => ( !empty($row2['dkpsys_name']) ) ? $row2['dkpsys_name'] : '(None)')
                            );
                        }
                       
                    }
                    else
                    {
                        // we dont have a GET so put default values
                        while ($row2 = $db->sql_fetchrow($resultdkpsys) )
                        {
                            //dkpsys_default
                            $template->assign_block_vars('event_dkpid_row', array(
	                            'VALUE' => $row2['dkpsys_id'],
	                            'SELECTED' => ( $row2['dkpsys_default'] == 'Y' ) ? ' selected="selected"' : '',
	                            'OPTION'   => ( !empty($row2['dkpsys_name']) ) ? $row2['dkpsys_name'] : '(None)')
                            );
                        }
                    }
                   
                    $add     = (isset($_POST['add'])) ? true : false;
                    $submit     = (isset($_POST['update'])) ? true : false;
                    $delete     = (isset($_POST['delete'])) ? true : false;   
   
                    if ($add)
                        {
                           $this_dkp_id = request_var('event_dkpid',0);
                           $clean_event_name = utf8_normalize_nfc(request_var('event_name','', true));
                           $event_value= request_var('event_value', 0.0);
                           if ($clean_event_name == null)
                           {
                                trigger_error($user->lang['ERROR_INVALID_EVENT_PROVIDED'] . $link, E_USER_WARNING);
                           }   
                           else
                           {
                               
                               // check existing
                                $eventexistsrow = $db->sql_query("SELECT count(*) as evcount from " . EVENTS_TABLE . 
                                " WHERE UPPER(event_name) = '" . strtoupper($db->sql_escape(utf8_normalize_nfc(request_var('event_name',' ', true))))  .  "' ;");
                                $eventexistsrow = $db->sql_fetchrow($eventexistsrow);
                                if($eventexistsrow['evcount'] !=0 )
                                {
                                     trigger_error($user->lang['ERROR_RESERVED_EVENTNAME']   . $link, E_USER_WARNING);
                                }
                                $this_event_id = $db->sql_query("SELECT MAX(event_id) as id FROM " . EVENTS_TABLE . ";");
                                $this_event_id = $db->sql_fetchrow($this_event_id);
                                $this_event_id = $this_event_id['id'] + 1;
                                $query = $db->sql_build_array('INSERT', array(   
                                        'event_dkpid'    => $this_dkp_id,   
                                        'event_id'       => $this_event_id,   
                                        'event_name'     => $clean_event_name,   
                                        'event_value'    => $event_value,  
                                        'event_added_by' => $user->data['username'])   
                                    );       
                                           
                                $db->sql_query('INSERT INTO ' . EVENTS_TABLE . $query);
                                   
                                $log_action = array(
                                        'header'       => 'L_ACTION_EVENT_ADDED',
                                        'id'           => $this_event_id,
                                        'L_NAME'     => ($clean_event_name),
                                        'L_VALUE'    => $event_value,
                                        'L_ADDED_BY' => $user->data['username']);
                                    
                                $this->log_insert(array(
                                        'log_type'   => $log_action['header'],
                                        'log_action' => $log_action)
                                    );
                                    $success_message = sprintf($user->lang['ADMIN_ADD_EVENT_SUCCESS'], request_var('event_value', 0.0), $clean_event_name);
                                    trigger_error($success_message . $link);
                           }
                            
                        }
                       
                    if ($submit)
                    {
                        $this->url_id = request_var('hidden_id',0);

                        // get old event name, value from db
                        $sql = 'SELECT event_name, event_value
                                FROM ' . EVENTS_TABLE . "
                                WHERE event_id='" . (int) $this->url_id . "'";
                       
                        $result = $db->sql_query($sql);
                        
                        // loop through object until sql_fetchrow returns false
                        while ( $row = $db->sql_fetchrow($result) )
                        {
                            $this->old_event = array(
                                'event_name'  => $row['event_name'],
                                'event_value' => $row['event_value']
                            );
                        }
                        $db->sql_freeresult($result);           
                                   
                        $new_event_name = utf8_normalize_nfc(request_var('event_name', ' ', true));
                       
                        //
                        // Update any raids with the old name
                        //
                        if ( $this->old_event['event_name'] != $new_event_name )
                        {
                            $sql = 'UPDATE ' . RAIDS_TABLE . "
                                    SET raid_name='" . $db->sql_escape($new_event_name) . "'
                                    WHERE raid_name='" . $db->sql_escape($this->old_event['event_name']) . "'";
                            $db->sql_query($sql);
                        }
                       
                        //
                        // Update the event
                        //
                        $query = $db->sql_build_array('UPDATE', array(
                            'event_name'  => $new_event_name,
                            'event_value' => request_var('event_value', 0.0))
                        );
                        
                        $sql = 'UPDATE ' . EVENTS_TABLE . ' SET ' . $query . " WHERE event_id='" . (int) $this->url_id . "'";
                        $db->sql_query($sql);
               
                        //
                        // Logging
                        //
                        $log_action = array(
                            'header'           => 'L_ACTION_EVENT_UPDATED',
                            'id'			     => request_var(URI_EVENT,0),
                            'L_NAME_BEFORE'  => $this->old_event['event_name'],
                            'L_VALUE_BEFORE' => $this->old_event['event_value'],
                            'L_NAME_AFTER'   => $new_event_name, 
                            'L_VALUE_AFTER'  => request_var('event_value', 0.0),
                            'L_UPDATED_BY'   => $user->data['username']);
                        
                        $this->log_insert(array(
                            'log_type'   => $log_action['header'],
                            'log_action' => $log_action)
                        );
                       
                        $success_message = sprintf($user->lang['ADMIN_UPDATE_EVENT_SUCCESS'], request_var('event_value', 0.0), $new_event_name);
                        trigger_error($success_message . $link);
                       
                    }   
                           

                        if ($delete)
                        {   
   
                            if  (isset($_GET[URI_EVENT]))
                            {
                                
                                // give a warning that raids cant be without event
                                if (confirm_box(true))
                                {
                                   
                                    $sql = 'DELETE FROM ' . EVENTS_TABLE . '
                                            WHERE event_id = ' . request_var(URI_EVENT,0) ;
                                    $db->sql_query($sql);   
   
                                    $clean_event_name = str_replace("'","", $this->event['event_name']);
                           
                                    $log_action = array(
                                        'header'    => 'L_ACTION_EVENT_DELETED',
                                        'id'        => request_var(URI_EVENT,0),
                                        'L_NAME'  => $clean_event_name,
                                        'L_VALUE' =>  $this->event['event_value']);
                                    
                                    $this->log_insert(array(
                                        'log_type'   => $log_action['header'],
                                        'log_action' => $log_action)
                                        );
       
       
       
                                    $success_message = sprintf($user->lang['ADMIN_DELETE_EVENT_SUCCESS'], $this->event['event_value'], $this->event['event_name']);
                                    trigger_error($success_message . adm_back_link($this->u_action));
                                }
                                else
                                {
                                    $s_hidden_fields = build_hidden_fields(array(
                                        'delete'    => true,
                                        'event_id'    => request_var(URI_EVENT,0) ,
                                        )
                                    );
       
                                    $template->assign_vars(array(
                                        'S_HIDDEN_FIELDS'    => $s_hidden_fields)
                                    );
   
                                    confirm_box(false, $user->lang['CONFIRM_DELETE_EVENT'], $s_hidden_fields);
                                }
                            }
                        }   
       
                $template->assign_vars(array(
                        'EVENT_ID'  => $this->url_id,
                        'L_TITLE'   => $user->lang['ACP_ADDEVENT'],
                        'L_EXPLAIN' => $user->lang['ACP_ADDEVENT_EXPLAIN'],
                        // Form vars

                        'EVENT_ID'    => $this->url_id,
                       
                        // Form values
                        'EVENT_DKPPOOLNAME'   =>isset($this->event['event_dkpsys_name']) ? $this->event['event_dkpsys_name']: '',
                        'EVENT_NAME'          =>isset($this->event['event_name']) ? $this->event['event_name']: '' ,
                        'EVENT_VALUE'         =>isset($this->event['event_value']) ? $this->event['event_value']: '' ,
                       
                        // Language
                        'L_DKP_VALUE'       => sprintf($user->lang['DKP_VALUE'], $config['bbdkp_dkp_name']),
                       
                        // Form validation
                        'FV_NAME'  => $this->fv->generate_error('event_name'),
                        'FV_VALUE' => $this->fv->generate_error('event_value'),
                       
                        // Javascript messages
                        'MSG_NAME_EMPTY'  => $user->lang['FV_REQUIRED_NAME'],
                        'MSG_VALUE_EMPTY' => $user->lang['FV_REQUIRED_VALUE'],
                       
                        // Buttons
                        'S_ADD' => ( !$this->url_id ) ? true : false
                        )
                    );
                   
                $this->page_title = 'ACP_ADDEVENT';
                $this->tpl_name = 'dkp/acp_'. $mode;
               
            break;

            case 'addrace':
                /* select data */
                    $update = false;

                    if  (isset($_GET[URI_EVENT]) )
                    {
                        $this->url_id = request_var(URI_EVENT, '');
                    }
                   
                    if ( $this->url_id )   
                      {
                        // we have a GET
                        $update = true;
                       
                        $sql = 'SELECT b.dkpsys_name, a.event_name, a.event_value, a.event_id
                                FROM ' . EVENTS_TABLE . ' a, ' . DKPSYS_TABLE . " b 
                                WHERE a.event_id = '" . $this->url_id . "'
                                AND b.dkpsys_id = a.event_dkpid  ";
                        $result = $db->sql_query($sql);
                        $row = $db->sql_fetchrow($result); 
                        $db->sql_freeresult($result);
                        if (!$row)
                        {
                            trigger_error($user->lang['ERROR_INVALID_EVENT_PROVIDED']);
                        }
                        else 
                        {
                            $this->event = array(
                                'event_dkpsys_name'  => $row['dkpsys_name'],
                                'event_name'  	     => $row['event_name'],
                                'event_value' 	     => $row['event_value'],
                                'event_id' 		     => $row['event_id']
                            );
                        }

                        while ( $row2 = $db->sql_fetchrow($resultdkpsys) )
                        {
                            $template->assign_block_vars('event_dkpid_row', array(
                            'VALUE' => $row2['dkpsys_id'],
                            'SELECTED' => ( $row2['dkpsys_name'] == $row['dkpsys_name']  ) ? ' selected="selected"' : '',
                            'OPTION'   => ( !empty($row2['dkpsys_name']) ) ? $row2['dkpsys_name'] : '(None)')
                            );
                        }
                       
                    }
                    else
                    {
                        // we dont have a GET so put default values
                        while ($row2 = $db->sql_fetchrow($resultdkpsys) )
                        {
                            //dkpsys_default
                            $template->assign_block_vars('event_dkpid_row', array(
	                            'VALUE' => $row2['dkpsys_id'],
	                            'SELECTED' => ( $row2['dkpsys_default'] == 'Y' ) ? ' selected="selected"' : '',
	                            'OPTION'   => ( !empty($row2['dkpsys_name']) ) ? $row2['dkpsys_name'] : '(None)')
                            );
                        }
                    }
                   
                    $add     = (isset($_POST['add'])) ? true : false;
                    $submit     = (isset($_POST['update'])) ? true : false;
                    $delete     = (isset($_POST['delete'])) ? true : false;   
   
                    if ($add)
                        {
                           $this_dkp_id = request_var('event_dkpid',0);
                           $clean_event_name = utf8_normalize_nfc(request_var('event_name','', true));
                           $event_value= request_var('event_value', 0.0);
                           if ($clean_event_name == null)
                           {
                                trigger_error($user->lang['ERROR_INVALID_EVENT_PROVIDED'] . $link, E_USER_WARNING);
                           }   
                           else
                           {
                               
                               // check existing
                                $eventexistsrow = $db->sql_query("SELECT count(*) as evcount from " . EVENTS_TABLE . 
                                " WHERE UPPER(event_name) = '" . strtoupper($db->sql_escape(utf8_normalize_nfc(request_var('event_name',' ', true))))  .  "' ;");
                                $eventexistsrow = $db->sql_fetchrow($eventexistsrow);
                                if($eventexistsrow['evcount'] !=0 )
                                {
                                     trigger_error($user->lang['ERROR_RESERVED_EVENTNAME']   . $link, E_USER_WARNING);
                                }
                                $this_event_id = $db->sql_query("SELECT MAX(event_id) as id FROM " . EVENTS_TABLE . ";");
                                $this_event_id = $db->sql_fetchrow($this_event_id);
                                $this_event_id = $this_event_id['id'] + 1;
                                $query = $db->sql_build_array('INSERT', array(   
                                        'event_dkpid'    => $this_dkp_id,   
                                        'event_id'       => $this_event_id,   
                                        'event_name'     => $clean_event_name,   
                                        'event_value'    => $event_value,  
                                        'event_added_by' => $user->data['username'])   
                                    );       
                                           
                                $db->sql_query('INSERT INTO ' . EVENTS_TABLE . $query);
                                   
                                $log_action = array(
                                        'header'       => 'L_ACTION_EVENT_ADDED',
                                        'id'           => $this_event_id,
                                        'L_NAME'     => ($clean_event_name),
                                        'L_VALUE'    => $event_value,
                                        'L_ADDED_BY' => $user->data['username']);
                                    
                                $this->log_insert(array(
                                        'log_type'   => $log_action['header'],
                                        'log_action' => $log_action)
                                    );
                                    $success_message = sprintf($user->lang['ADMIN_ADD_EVENT_SUCCESS'], request_var('event_value', 0.0), $clean_event_name);
                                    trigger_error($success_message . $link);
                           }
                            
                        }
                       
                    if ($submit)
                    {
                        $this->url_id = request_var('hidden_id',0);

                        // get old event name, value from db
                        $sql = 'SELECT event_name, event_value
                                FROM ' . EVENTS_TABLE . "
                                WHERE event_id='" . (int) $this->url_id . "'";
                       
                        $result = $db->sql_query($sql);
                        
                        // loop through object until sql_fetchrow returns false
                        while ( $row = $db->sql_fetchrow($result) )
                        {
                            $this->old_event = array(
                                'event_name'  => $row['event_name'],
                                'event_value' => $row['event_value']
                            );
                        }
                        $db->sql_freeresult($result);           
                                   
                        $new_event_name = utf8_normalize_nfc(request_var('event_name', ' ', true));
                       
                        //
                        // Update any raids with the old name
                        //
                        if ( $this->old_event['event_name'] != $new_event_name )
                        {
                            $sql = 'UPDATE ' . RAIDS_TABLE . "
                                    SET raid_name='" . $db->sql_escape($new_event_name) . "'
                                    WHERE raid_name='" . $db->sql_escape($this->old_event['event_name']) . "'";
                            $db->sql_query($sql);
                        }
                       
                        //
                        // Update the event
                        //
                        $query = $db->sql_build_array('UPDATE', array(
                            'event_name'  => $new_event_name,
                            'event_value' => request_var('event_value', 0.0))
                        );
                        
                        $sql = 'UPDATE ' . EVENTS_TABLE . ' SET ' . $query . " WHERE event_id='" . (int) $this->url_id . "'";
                        $db->sql_query($sql);
               
                        //
                        // Logging
                        //
                        $log_action = array(
                            'header'           => 'L_ACTION_EVENT_UPDATED',
                            'id'			     => request_var(URI_EVENT,0),
                            'L_NAME_BEFORE'  => $this->old_event['event_name'],
                            'L_VALUE_BEFORE' => $this->old_event['event_value'],
                            'L_NAME_AFTER'   => $new_event_name, 
                            'L_VALUE_AFTER'  => request_var('event_value', 0.0),
                            'L_UPDATED_BY'   => $user->data['username']);
                        
                        $this->log_insert(array(
                            'log_type'   => $log_action['header'],
                            'log_action' => $log_action)
                        );
                       
                        $success_message = sprintf($user->lang['ADMIN_UPDATE_EVENT_SUCCESS'], request_var('event_value', 0.0), $new_event_name);
                        trigger_error($success_message . $link);
                       
                    }   
                           

                        if ($delete)
                        {   
   
                            if  (isset($_GET[URI_EVENT]))
                            {
                                
                                // give a warning that raids cant be without event
                                if (confirm_box(true))
                                {
                                   
                                    $sql = 'DELETE FROM ' . EVENTS_TABLE . '
                                            WHERE event_id = ' . request_var(URI_EVENT,0) ;
                                    $db->sql_query($sql);   
   
                                    $clean_event_name = str_replace("'","", $this->event['event_name']);
                           
                                    $log_action = array(
                                        'header'    => 'L_ACTION_EVENT_DELETED',
                                        'id'        => request_var(URI_EVENT,0),
                                        'L_NAME'  => $clean_event_name,
                                        'L_VALUE' =>  $this->event['event_value']);
                                    
                                    $this->log_insert(array(
                                        'log_type'   => $log_action['header'],
                                        'log_action' => $log_action)
                                        );
       
       
       
                                    $success_message = sprintf($user->lang['ADMIN_DELETE_EVENT_SUCCESS'], $this->event['event_value'], $this->event['event_name']);
                                    trigger_error($success_message . adm_back_link($this->u_action));
                                }
                                else
                                {
                                    $s_hidden_fields = build_hidden_fields(array(
                                        'delete'    => true,
                                        'event_id'    => request_var(URI_EVENT,0) ,
                                        )
                                    );
       
                                    $template->assign_vars(array(
                                        'S_HIDDEN_FIELDS'    => $s_hidden_fields)
                                    );
   
                                    confirm_box(false, $user->lang['CONFIRM_DELETE_EVENT'], $s_hidden_fields);
                                }
                            }
                        }   
       
                $template->assign_vars(array(
                        'EVENT_ID'  => $this->url_id,
                        'L_TITLE'   => $user->lang['ACP_ADDEVENT'],
                        'L_EXPLAIN' => $user->lang['ACP_ADDEVENT_EXPLAIN'],
                        // Form vars

                        'EVENT_ID'    => $this->url_id,
                       
                        // Form values
                        'EVENT_DKPPOOLNAME'   =>isset($this->event['event_dkpsys_name']) ? $this->event['event_dkpsys_name']: '',
                        'EVENT_NAME'          =>isset($this->event['event_name']) ? $this->event['event_name']: '' ,
                        'EVENT_VALUE'         =>isset($this->event['event_value']) ? $this->event['event_value']: '' ,
                       
                        // Language
                        'L_DKP_VALUE'       => sprintf($user->lang['DKP_VALUE'], $config['bbdkp_dkp_name']),
                       
                        // Form validation
                        'FV_NAME'  => $this->fv->generate_error('event_name'),
                        'FV_VALUE' => $this->fv->generate_error('event_value'),
                       
                        // Javascript messages
                        'MSG_NAME_EMPTY'  => $user->lang['FV_REQUIRED_NAME'],
                        'MSG_VALUE_EMPTY' => $user->lang['FV_REQUIRED_VALUE'],
                       
                        // Buttons
                        'S_ADD' => ( !$this->url_id ) ? true : false
                        )
                    );
                   
                $this->page_title = 'ACP_ADDEVENT';
                $this->tpl_name = 'dkp/acp_'. $mode;
               
            break;
                        
            case 'addclass':
                /* select data */
                    $update = false;

                    if  (isset($_GET[URI_EVENT]) )
                    {
                        $this->url_id = request_var(URI_EVENT, '');
                    }
                   
                    if ( $this->url_id )   
                      {
                        // we have a GET
                        $update = true;
                       
                        $sql = 'SELECT b.dkpsys_name, a.event_name, a.event_value, a.event_id
                                FROM ' . EVENTS_TABLE . ' a, ' . DKPSYS_TABLE . " b 
                                WHERE a.event_id = '" . $this->url_id . "'
                                AND b.dkpsys_id = a.event_dkpid  ";
                        $result = $db->sql_query($sql);
                        $row = $db->sql_fetchrow($result); 
                        $db->sql_freeresult($result);
                        if (!$row)
                        {
                            trigger_error($user->lang['ERROR_INVALID_EVENT_PROVIDED']);
                        }
                        else 
                        {
                            $this->event = array(
                                'event_dkpsys_name'  => $row['dkpsys_name'],
                                'event_name'  	     => $row['event_name'],
                                'event_value' 	     => $row['event_value'],
                                'event_id' 		     => $row['event_id']
                            );
                        }

                        while ( $row2 = $db->sql_fetchrow($resultdkpsys) )
                        {
                            $template->assign_block_vars('event_dkpid_row', array(
                            'VALUE' => $row2['dkpsys_id'],
                            'SELECTED' => ( $row2['dkpsys_name'] == $row['dkpsys_name']  ) ? ' selected="selected"' : '',
                            'OPTION'   => ( !empty($row2['dkpsys_name']) ) ? $row2['dkpsys_name'] : '(None)')
                            );
                        }
                       
                    }
                    else
                    {
                        // we dont have a GET so put default values
                        while ($row2 = $db->sql_fetchrow($resultdkpsys) )
                        {
                            //dkpsys_default
                            $template->assign_block_vars('event_dkpid_row', array(
	                            'VALUE' => $row2['dkpsys_id'],
	                            'SELECTED' => ( $row2['dkpsys_default'] == 'Y' ) ? ' selected="selected"' : '',
	                            'OPTION'   => ( !empty($row2['dkpsys_name']) ) ? $row2['dkpsys_name'] : '(None)')
                            );
                        }
                    }
                   
                    $add     = (isset($_POST['add'])) ? true : false;
                    $submit     = (isset($_POST['update'])) ? true : false;
                    $delete     = (isset($_POST['delete'])) ? true : false;   
   
                    if ($add)
                        {
                           $this_dkp_id = request_var('event_dkpid',0);
                           $clean_event_name = utf8_normalize_nfc(request_var('event_name','', true));
                           $event_value= request_var('event_value', 0.0);
                           if ($clean_event_name == null)
                           {
                                trigger_error($user->lang['ERROR_INVALID_EVENT_PROVIDED'] . $link, E_USER_WARNING);
                           }   
                           else
                           {
                               
                               // check existing
                                $eventexistsrow = $db->sql_query("SELECT count(*) as evcount from " . EVENTS_TABLE . 
                                " WHERE UPPER(event_name) = '" . strtoupper($db->sql_escape(utf8_normalize_nfc(request_var('event_name',' ', true))))  .  "' ;");
                                $eventexistsrow = $db->sql_fetchrow($eventexistsrow);
                                if($eventexistsrow['evcount'] !=0 )
                                {
                                     trigger_error($user->lang['ERROR_RESERVED_EVENTNAME']   . $link, E_USER_WARNING);
                                }
                                $this_event_id = $db->sql_query("SELECT MAX(event_id) as id FROM " . EVENTS_TABLE . ";");
                                $this_event_id = $db->sql_fetchrow($this_event_id);
                                $this_event_id = $this_event_id['id'] + 1;
                                $query = $db->sql_build_array('INSERT', array(   
                                        'event_dkpid'    => $this_dkp_id,   
                                        'event_id'       => $this_event_id,   
                                        'event_name'     => $clean_event_name,   
                                        'event_value'    => $event_value,  
                                        'event_added_by' => $user->data['username'])   
                                    );       
                                           
                                $db->sql_query('INSERT INTO ' . EVENTS_TABLE . $query);
                                   
                                $log_action = array(
                                        'header'       => 'L_ACTION_EVENT_ADDED',
                                        'id'           => $this_event_id,
                                        'L_NAME'     => ($clean_event_name),
                                        'L_VALUE'    => $event_value,
                                        'L_ADDED_BY' => $user->data['username']);
                                    
                                $this->log_insert(array(
                                        'log_type'   => $log_action['header'],
                                        'log_action' => $log_action)
                                    );
                                    $success_message = sprintf($user->lang['ADMIN_ADD_EVENT_SUCCESS'], request_var('event_value', 0.0), $clean_event_name);
                                    trigger_error($success_message . $link);
                           }
                            
                        }
                       
                    if ($submit)
                    {
                        $this->url_id = request_var('hidden_id',0);

                        // get old event name, value from db
                        $sql = 'SELECT event_name, event_value
                                FROM ' . EVENTS_TABLE . "
                                WHERE event_id='" . (int) $this->url_id . "'";
                       
                        $result = $db->sql_query($sql);
                        
                        // loop through object until sql_fetchrow returns false
                        while ( $row = $db->sql_fetchrow($result) )
                        {
                            $this->old_event = array(
                                'event_name'  => $row['event_name'],
                                'event_value' => $row['event_value']
                            );
                        }
                        $db->sql_freeresult($result);           
                                   
                        $new_event_name = utf8_normalize_nfc(request_var('event_name', ' ', true));
                       
                        //
                        // Update any raids with the old name
                        //
                        if ( $this->old_event['event_name'] != $new_event_name )
                        {
                            $sql = 'UPDATE ' . RAIDS_TABLE . "
                                    SET raid_name='" . $db->sql_escape($new_event_name) . "'
                                    WHERE raid_name='" . $db->sql_escape($this->old_event['event_name']) . "'";
                            $db->sql_query($sql);
                        }
                       
                        //
                        // Update the event
                        //
                        $query = $db->sql_build_array('UPDATE', array(
                            'event_name'  => $new_event_name,
                            'event_value' => request_var('event_value', 0.0))
                        );
                        
                        $sql = 'UPDATE ' . EVENTS_TABLE . ' SET ' . $query . " WHERE event_id='" . (int) $this->url_id . "'";
                        $db->sql_query($sql);
               
                        //
                        // Logging
                        //
                        $log_action = array(
                            'header'           => 'L_ACTION_EVENT_UPDATED',
                            'id'			     => request_var(URI_EVENT,0),
                            'L_NAME_BEFORE'  => $this->old_event['event_name'],
                            'L_VALUE_BEFORE' => $this->old_event['event_value'],
                            'L_NAME_AFTER'   => $new_event_name, 
                            'L_VALUE_AFTER'  => request_var('event_value', 0.0),
                            'L_UPDATED_BY'   => $user->data['username']);
                        
                        $this->log_insert(array(
                            'log_type'   => $log_action['header'],
                            'log_action' => $log_action)
                        );
                       
                        $success_message = sprintf($user->lang['ADMIN_UPDATE_EVENT_SUCCESS'], request_var('event_value', 0.0), $new_event_name);
                        trigger_error($success_message . $link);
                       
                    }   
                           

                        if ($delete)
                        {   
   
                            if  (isset($_GET[URI_EVENT]))
                            {
                                
                                // give a warning that raids cant be without event
                                if (confirm_box(true))
                                {
                                   
                                    $sql = 'DELETE FROM ' . EVENTS_TABLE . '
                                            WHERE event_id = ' . request_var(URI_EVENT,0) ;
                                    $db->sql_query($sql);   
   
                                    $clean_event_name = str_replace("'","", $this->event['event_name']);
                           
                                    $log_action = array(
                                        'header'    => 'L_ACTION_EVENT_DELETED',
                                        'id'        => request_var(URI_EVENT,0),
                                        'L_NAME'  => $clean_event_name,
                                        'L_VALUE' =>  $this->event['event_value']);
                                    
                                    $this->log_insert(array(
                                        'log_type'   => $log_action['header'],
                                        'log_action' => $log_action)
                                        );
       
       
       
                                    $success_message = sprintf($user->lang['ADMIN_DELETE_EVENT_SUCCESS'], $this->event['event_value'], $this->event['event_name']);
                                    trigger_error($success_message . adm_back_link($this->u_action));
                                }
                                else
                                {
                                    $s_hidden_fields = build_hidden_fields(array(
                                        'delete'    => true,
                                        'event_id'    => request_var(URI_EVENT,0) ,
                                        )
                                    );
       
                                    $template->assign_vars(array(
                                        'S_HIDDEN_FIELDS'    => $s_hidden_fields)
                                    );
   
                                    confirm_box(false, $user->lang['CONFIRM_DELETE_EVENT'], $s_hidden_fields);
                                }
                            }
                        }   
       
                $template->assign_vars(array(
                        'EVENT_ID'  => $this->url_id,
                        'L_TITLE'   => $user->lang['ACP_ADDEVENT'],
                        'L_EXPLAIN' => $user->lang['ACP_ADDEVENT_EXPLAIN'],
                        // Form vars

                        'EVENT_ID'    => $this->url_id,
                       
                        // Form values
                        'EVENT_DKPPOOLNAME'   =>isset($this->event['event_dkpsys_name']) ? $this->event['event_dkpsys_name']: '',
                        'EVENT_NAME'          =>isset($this->event['event_name']) ? $this->event['event_name']: '' ,
                        'EVENT_VALUE'         =>isset($this->event['event_value']) ? $this->event['event_value']: '' ,
                       
                        // Language
                        'L_DKP_VALUE'       => sprintf($user->lang['DKP_VALUE'], $config['bbdkp_dkp_name']),
                       
                        // Form validation
                        'FV_NAME'  => $this->fv->generate_error('event_name'),
                        'FV_VALUE' => $this->fv->generate_error('event_value'),
                       
                        // Javascript messages
                        'MSG_NAME_EMPTY'  => $user->lang['FV_REQUIRED_NAME'],
                        'MSG_VALUE_EMPTY' => $user->lang['FV_REQUIRED_VALUE'],
                       
                        // Buttons
                        'S_ADD' => ( !$this->url_id ) ? true : false
                        )
                    );
                   
                $this->page_title = 'ACP_ADDEVENT';
                $this->tpl_name = 'dkp/acp_'. $mode;
               
            break;
                        
            case 'listgames':

            	$showadd = (isset($_POST['eventadd'])) ? true : false;
            	
            	if($showadd)
            	{
					redirect(append_sid("index.$phpEx", "i=dkp_event&amp;mode=addevent"));            		
            		break;
            	}
            	
            	
                $sort_order = array(
                    0 => array('dkpsys_name', 'dkpsys_name desc'),
                    1 => array('event_name', 'dkpsys_name, event_name desc'),
                    2 => array('event_value desc', 'dkpsys_name, event_value desc')
                );
                 
                $current_order = switch_order($sort_order);
               
                $sql1 = 'SELECT * FROM ' . EVENTS_TABLE;
                $result1 = $db->sql_query($sql1);   
                $rows1 = $db->sql_fetchrowset($result1);
                $db->sql_freeresult($result1);
                $total_events = count($rows1);
               
                $start = request_var('start',0);
               
                $sql = 'SELECT b.dkpsys_name, a.event_name, a.event_value, a.event_id 
                        FROM ' . EVENTS_TABLE . ' a, ' . DKPSYS_TABLE . ' b 
                        WHERE  b.dkpsys_id = a.event_dkpid 
                        ORDER BY '. $current_order['sql']; 
               
                if ( !($events_result = $db->sql_query_limit($sql,  $config['bbdkp_user_elimit'], $start)    ) )
                {
                    trigger_error('Could not obtain event information');
                }
               
                while ( $event = $db->sql_fetchrow($events_result) )
                {
                    $template->assign_block_vars('events_row', array(
                        'U_VIEW_EVENT' =>  append_sid("index.$phpEx", "i=dkp_event&amp;mode=addevent&amp;" . URI_EVENT ."={$event['event_id']}"),
                        'DKPSYS_EVENT' => $event['dkpsys_name'],
                        'NAME' => $event['event_name'],
                        'VALUE' => $event['event_value'])
                    );
                }
                $db->sql_freeresult($events_result);
               
                $template->assign_vars(array(
                    'L_TITLE'        => $user->lang['ACP_LISTEVENTS'],
                    'L_EXPLAIN'        => $user->lang['ACP_LISTEVENTS_EXPLAIN'],
                    'O_DKPSYS' => $current_order['uri'][0],
                    'O_NAME' => $current_order['uri'][1],
                    'O_VALUE' => $current_order['uri'][2],   
                    'U_LIST_EVENTS' => append_sid("index.$phpEx", "i=dkp_event&amp;mode=listevents&amp;"),       
                    'START' => $start,
                
                    'LISTEVENTS_FOOTCOUNT' => sprintf($user->lang['LISTEVENTS_FOOTCOUNT'], $total_events, $config['bbdkp_user_elimit']),
                    'EVENT_PAGINATION' => generate_pagination(append_sid("index.$phpEx", "i=dkp_event&amp;mode=listevents&amp;" . URI_ORDER . '='.$current_order['uri']['current']), $total_events, $config['bbdkp_user_elimit'],$start))

                );

                $this->page_title = 'ACP_LISTEVENTS';
                $this->tpl_name = 'dkp/acp_'. $mode;
               
            break;

       
        }
    }
}

?>