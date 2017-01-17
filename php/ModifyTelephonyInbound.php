<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('CRMDefaults.php');
require_once('goCRMAPISettings.php');

// check required fields
$reason = "Unable to Modify Inbound";

$validated = 0;

$groupid = NULL;
if (isset($_POST["modify_groupid"])) {
	$groupid = $_POST["modify_groupid"];
}

$ivr = NULL;
if (isset($_POST["modify_ivr"])) {
	$ivr = $_POST["modify_ivr"];
}

$did = NULL;
if (isset($_POST["modify_did"])) {
	$did = $_POST["modify_did"];
}


// INGROUPS
if ($groupid != NULL) {
	// collect new user data.	
	$modify_groupid = $_POST["modify_groupid"];
	
	$desc = NULL; if (isset($_POST["desc"])) { 
		$desc = $_POST["desc"]; 
		$desc = stripslashes($desc);
	}
	
    $color = NULL; if (isset($_POST["color"])) { 
		$color = $_POST["color"];
        $color = str_replace("#", '', $color);
		$color = stripslashes($color);
	}

    $status = NULL; if (isset($_POST["status"])) { 
		$status = $_POST["status"]; 
		$status = stripslashes($status);
	}
	
    $webform = NULL; if (isset($_POST["webform"])) { 
		$webform = $_POST["webform"]; 
		$webform = stripslashes($webform);
	}
	
    $nextagent = NULL; if (isset($_POST["nextagent"])) { 
		$nextagent = $_POST["nextagent"]; 
		$nextagent = stripslashes($nextagent);
	}
    
    $prio = NULL; if (isset($_POST["priority"])) { 
		$prio = $_POST["priority"]; 
		$prio = stripslashes($prio);
	}
    
    $display = NULL; if (isset($_POST["display"])) { 
		$display = $_POST["display"]; 
		$display = stripslashes($display);
	}
    
    $script = NULL; if (isset($_POST["script"])) { 
		$script = $_POST["script"]; 
		$script = stripslashes($script);
	}

// -------

	$drop_call_seconds = NULL; if (isset($_POST["drop_call_seconds"])) { 
		$drop_call_seconds = $_POST["drop_call_seconds"]; 
		$drop_call_seconds = stripslashes($drop_call_seconds);
	}
	$drop_action = NULL; if (isset($_POST["drop_action"])) { 
		$drop_action = $_POST["drop_action"]; 
		$drop_action = stripslashes($drop_action);
	}
	$drop_exten = NULL; if (isset($_POST["drop_exten"])) { 
		$drop_exten = $_POST["drop_exten"]; 
		$drop_exten = stripslashes($drop_exten);
	}
	$voicemail_ext = NULL; if (isset($_POST["voicemail_ext"])) { 
		$voicemail_ext = $_POST["voicemail_ext"]; 
		$voicemail_ext = stripslashes($voicemail_ext);
	}
	$drop_inbound_group = NULL; if (isset($_POST["drop_inbound_group"])) { 
		$drop_inbound_group = $_POST["drop_inbound_group"]; 
		$drop_inbound_group = stripslashes($drop_inbound_group);
	}
	$drop_callmenu = NULL; if (isset($_POST["drop_callmenu"])) { 
		$drop_callmenu = $_POST["drop_callmenu"]; 
		$drop_callmenu = stripslashes($drop_callmenu);
	}
	$after_hours_action = NULL; if (isset($_POST["after_hours_action"])) { 
		$after_hours_action = $_POST["after_hours_action"]; 
		$after_hours_action = stripslashes($after_hours_action);
	}
	$after_hours_voicemail = NULL; if (isset($_POST["after_hours_voicemail"])) { 
		$after_hours_voicemail = $_POST["after_hours_voicemail"]; 
		$after_hours_voicemail = stripslashes($after_hours_voicemail);
	}
	$after_hours_exten = NULL; if (isset($_POST["after_hours_exten"])) { 
		$after_hours_exten = $_POST["after_hours_exten"]; 
		$after_hours_exten = stripslashes($after_hours_exten);
	}
	/*$afterhours_xfer_group = NULL; if (isset($_POST["afterhours_xfer_group"])) { 
		$afterhours_xfer_group = $_POST["afterhours_xfer_group"]; 
		$afterhours_xfer_group = stripslashes($afterhours_xfer_group);
	}*/
	$get_call_launch = NULL; if (isset($_POST["call_launch"])) { 
		$get_call_launch = $_POST["call_launch"]; 
		$get_call_launch = stripslashes($get_call_launch);
	}
	$no_agent_no_queue = NULL; if (isset($_POST["no_agent_no_queue"])) { 
		$no_agent_no_queue = $_POST["no_agent_no_queue"]; 
		$no_agent_no_queue = stripslashes($no_agent_no_queue);
	}
	$no_agent_action = NULL; if (isset($_POST["no_agent_action"])) { 
		$no_agent_action = $_POST["no_agent_action"]; 
		$no_agent_action = stripslashes($no_agent_action);
	}
	$no_agents_exten = NULL; if (isset($_POST["no_agents_exten"])) { 
		$no_agents_exten = $_POST["no_agents_exten"]; 
		$no_agents_exten = stripslashes($no_agents_exten);
	}
	$no_agents_voicemail = NULL; if (isset($_POST["no_agents_voicemail"])) { 
		$no_agents_voicemail = $_POST["no_agents_voicemail"]; 
		$no_agents_voicemail = stripslashes($no_agents_voicemail);
	}
	$no_agents_ingroup = NULL; if (isset($_POST["no_agents_ingroup"])) { 
		$no_agents_ingroup = $_POST["no_agents_ingroup"]; 
		$no_agents_ingroup = stripslashes($no_agents_ingroup);
	}
	$no_agents_callmenu = NULL; if (isset($_POST["no_agents_callmenu"])) { 
		$no_agents_callmenu = $_POST["no_agents_callmenu"]; 
		$no_agents_callmenu = stripslashes($no_agents_callmenu);
	}
	$welcome_message_filename = NULL; if (isset($_POST["welcome_message_filename"])) { 
		$welcome_message_filename = $_POST["welcome_message_filename"]; 
		$welcome_message_filename = stripslashes($welcome_message_filename);
	}
	$play_welcome_message = NULL; if (isset($_POST["play_welcome_message"])) { 
		$play_welcome_message = $_POST["play_welcome_message"]; 
		$play_welcome_message = stripslashes($play_welcome_message);
	}
	$moh_context = NULL; if (isset($_POST["moh_context"])) { 
		$moh_context = $_POST["moh_context"]; 
		$moh_context = stripslashes($moh_context);
	}
	$onhold_prompt_filename = NULL; if (isset($_POST["onhold_prompt_filename"])) { 
		$onhold_prompt_filename = $_POST["onhold_prompt_filename"]; 
		$onhold_prompt_filename = stripslashes($onhold_prompt_filename);
	}

    
	$url = gourl."/goInbound/goAPI.php"; #URL to GoAutoDial API. (required)
    $postfields["goUser"] = goUser; #Username goes here. (required)
    $postfields["goPass"] = goPass; #Password goes here. (required)
    $postfields["goAction"] = "goEditInbound"; #action performed by the [[API:Functions]]
    $postfields["responsetype"] = responsetype; #json (required)
    
    $postfields["group_id"] = $modify_groupid; 
	$postfields["group_name"] = $desc; 
	$postfields["group_color"] = $color; 
	$postfields["web_form_address"] = $webform; 
	$postfields["active"] = $status; 
    $postfields["next_agent_call"] = $nextagent; 
	$postfields["fronter_display"] = $display; 
    $postfields["ingroup_script"] = $script; 
    $postfields["queue_priority"] = $prio; 

    $postfields["drop_call_seconds"] = $drop_call_seconds; 
    $postfields["drop_action"] = $drop_action; 
    $postfields["drop_exten"] = $drop_exten; 
    $postfields["voicemail_ext"] = $voicemail_ext; 
    $postfields["drop_inbound_group"] = $drop_inbound_group; 
    $postfields["drop_callmenu"] = $drop_callmenu; 
    $postfields["after_hours_action"] = $after_hours_action; 
    $postfields["after_hours_voicemail"] = $after_hours_voicemail; 
    $postfields["after_hours_exten"] = $after_hours_exten; 
    //$postfields["afterhours_xfer_group"] = $afterhours_xfer_group; 
    $postfields["get_call_launch"] = $get_call_launch; 
    $postfields["no_agent_no_queue"] = $no_agent_no_queue; 
    $postfields["no_agent_action"] = $no_agent_action; 
    $postfields["no_agents_exten"] = $no_agents_exten; 
    $postfields["no_agents_voicemail"] = $no_agents_voicemail; 
    $postfields["no_agents_ingroup"] = $no_agents_ingroup; 
    $postfields["no_agents_callmenu"] = $no_agents_callmenu; 
    $postfields["welcome_message_filename"] = $welcome_message_filename; 
    $postfields["play_welcome_message"] = $play_welcome_message; 
    $postfields["moh_context"] = $moh_context; 
    $postfields["onhold_prompt_filename"] = $onhold_prompt_filename; 

    $postfields["hostname"] = $_SERVER['REMOTE_ADDR']; #Default value
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
    $data = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($data);
	
    if ($output->result=="success") {
    # Result was OK!
        ob_clean();
		print (CRM_DEFAULT_SUCCESS_RESPONSE);
    } else {
    # An error occured
        ob_clean();
		print $output->result;
        //$lh->translateText("unable_modify_list");
    }
    
}

// IVR
if ($ivr != NULL) {
	// collect new user data.		
	$menu_name = NULL; if (isset($_POST["menu_name"])) { 
		$menu_name = $_POST["menu_name"]; 
		$menu_name = stripslashes($menu_name);
	}
	
    $menu_prompt = NULL; if (isset($_POST["menu_prompt"])) {
		$menu_prompt = $_POST["menu_prompt"]; 
		$menu_prompt = stripslashes($menu_prompt);
	}
	
    $menu_timeout = NULL; if (isset($_POST["menu_timeout"])) {
		$menu_timeout = $_POST["menu_timeout"]; 
		$menu_timeout = stripslashes($menu_timeout);
	}

	$menu_timeout_prompt = NULL; if (isset($_POST["menu_timeout_prompt"])) {
		$menu_timeout_prompt = $_POST["menu_timeout_prompt"]; 
		$menu_timeout_prompt = stripslashes($menu_timeout_prompt);
	}
	
	$menu_invalid_prompt = NULL; if (isset($_POST["menu_invalid_prompt"])) { 
		$menu_invalid_prompt = $_POST["menu_invalid_prompt"]; 
		$menu_invalid_prompt = stripslashes($menu_invalid_prompt);
	}	

	$menu_repeat = NULL; if (isset($_POST["menu_repeat"])) { 
		$menu_repeat = $_POST["menu_repeat"]; 
		$menu_repeat = stripslashes($menu_repeat);
	}

	$menu_time_check = NULL; if (isset($_POST["menu_time_check"])) { 
		$menu_time_check = $_POST["menu_time_check"]; 
		$menu_time_check = stripslashes($menu_time_check);
	}

	$call_time_id = NULL; if (isset($_POST["call_time_id"])) { 
		$call_time_id = $_POST["call_time_id"]; 
		$call_time_id = stripslashes($call_time_id);
	}

	$track_in_vdac = NULL; if (isset($_POST["track_in_vdac"])) { 
		$track_in_vdac = $_POST["track_in_vdac"]; 
		$track_in_vdac = stripslashes($track_in_vdac);
	}

	$tracking_group = NULL; if (isset($_POST["tracking_group"])) { 
		$tracking_group = $_POST["tracking_group"]; 
		$tracking_group = stripslashes($tracking_group);
	}

	$user_group = NULL; if (isset($_POST["user_group"])) { 
		$user_group = $_POST["user_group"]; 
		$user_group = stripslashes($user_group);
	}	
    
	$url = gourl."/goInbound/goAPI.php"; #URL to GoAutoDial API. (required)
    $postfields["goUser"] = goUser; #Username goes here. (required)
    $postfields["goPass"] = goPass; #Password goes here. (required)
    $postfields["goAction"] = "goEditIVR"; #action performed by the [[API:Functions]]
    $postfields["responsetype"] = responsetype; #json (required)
    $postfields["menu_id"] = $ivr; 
	$postfields["menu_name"] = $menu_name; 
	$postfields["menu_prompt"] = $menu_prompt; 
	$postfields["menu_timeout"] = $menu_timeout; 
	$postfields["menu_timeout_prompt"] = $menu_timeout_prompt; 
	$postfields["menu_invalid_prompt"] = $menu_invalid_prompt; 
	$postfields["menu_repeat"] = $menu_repeat; 
	$postfields["menu_time_check"] = $menu_time_check; 
	$postfields["call_time_id"] = $call_time_id; 
	$postfields["track_in_vdac"] = $track_in_vdac; 
	$postfields["tracking_group"] = $tracking_group; 
	$postfields["user_group"] = $user_group;
	
	// options
	$route_option = $_POST['option'];
	$route_menu = $_POST['route_menu'];
	$route_desc = $_POST['route_desc'];
	
	$option_callmenu_value = $_POST['option_callmenu_value'];
	$option_ingroup_value = $_POST['option_ingroup_value'];
	$option_did_value = $_POST['option_did_value'];
	$option_hangup_value = $_POST['option_hangup_value'];
	$option_extension_value = $_POST['option_extension_value'];
	$option_phone_value = $_POST['option_phone_value'];
	$option_voicemail_value = $_POST['option_voicemail_value'];
	$option_agi_value = $_POST['option_agi_value'];
	
	$option_route_context = $_POST['option_route_value_context'];
	
	$route_value = "";
	for($i=0; $i < 14; $i++){
		if($route_menu[$i] == "CALLMENU"){
			$route_value .= $option_callmenu_value[$i];
		}
		if($route_menu[$i] == "INGROUP"){
			$route_value .= $option_ingroup_value[$i];
		}
		if($route_menu[$i] == "DID"){
			$route_value .= $option_did_value[$i];
		}
		if($route_menu[$i] == "HANGUP"){
			$route_value .= $option_hangup_value[$i];
		}
		if($route_menu[$i] == "EXTENSION"){
			$route_value .= $option_extension_value[$i];
		}
		if($route_menu[$i] == "PHONE"){
			$route_value .= $option_phone_value[$i];
		}
		if($route_menu[$i] == "VOICEMAIL"){
			$route_value .= $option_voicemail_value[$i];
		}
		if($route_menu[$i] == "AGI"){
			$route_value .= $option_agi_value[$i];
		}
		$route_value .= "+";
	}
	//echo $route_value;
	$option_route_value = explode("+", $route_value);
	
	$ingroup_context = "";
	for($i=0; $i < 14; $i++){
		if($route_menu[$i] == "INGROUP"){
			$ingroup_context .= $_POST['handle_method_'.$i].",";
			$ingroup_context .= $_POST['search_method_'.$i].",";
			$ingroup_context .= $_POST['list_id_'.$i].",";
			$ingroup_context .= $_POST['campaign_id_'.$i].",";
			$ingroup_context .= $_POST['phone_code'.$i].",";
			$ingroup_context .= $_POST['enter_filename_'.$i].",";
			$ingroup_context .= $_POST['id_number_filename_'.$i].",";
			$ingroup_context .= $_POST['confirm_filename_'.$i].",";
			$ingroup_context .= $_POST['vid_digits_'.$i];
			
			$option_route_context[$i] = $ingroup_context;
			$ingroup_context = "";
		}
	}
	
	$items = "";
	for($i=0;$i < count($route_option);$i++){
		if($route_option[$i] == "A") $route_option[$i] = '#';
		if($route_option[$i] == "B") $route_option[$i] = '*';
		if($route_option[$i] == "C") $route_option[$i] = 'TIMECHECK';
		if($route_option[$i] == "D") $route_option[$i] = 'TIMEOUT';
		if($route_option[$i] == "E") $route_option[$i] = 'INVALID';
		$items .= $route_option[$i]."+".$route_desc[$i]."+".$route_menu[$i]."+".$option_route_value[$i]."+".$option_route_context[$i];
		$items .= "|";
	}
	//$items_array = explode("|", $items);
	$postfields['items'] = $items;
	//echo "<pre>";
	//var_dump($items_array);
	//echo "</pre>";
	
    $postfields["hostname"] = $_SERVER['REMOTE_ADDR']; #Default value
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
    $data = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($data);
	
    if ($output->result=="success") {
    # Result was OK!
        ob_clean();
		print (CRM_DEFAULT_SUCCESS_RESPONSE);
    } else {
    # An error occured
        ob_clean();
		print $output->result;
        //$lh->translateText("unable_modify_list");
    }
    
}

// PHONE NUMBER / DID
if ($did != NULL) {
	// collect new user data.	
	$modify_did = NULL; if (isset($_POST["modify_did"])) { 
		$modify_did = $_POST["modify_did"];
		$modify_did = stripslashes($modify_did);
	}

    $did_pattern = NULL; if (isset($_POST["did_pattern"])) { 
		$did_pattern = $_POST["did_pattern"];
	}
	
	$desc = NULL; if (isset($_POST["desc"])) { 
		$desc = $_POST["desc"]; 
		$desc = stripslashes($desc);
	}

    $route = NULL; if (isset($_POST["route"])) { 
		$route = $_POST["route"]; 
		$route = stripslashes($route);
	}
	
    $status = NULL; if (isset($_POST["status"])) { 
		$status = $_POST["status"]; 
		$status = stripslashes($status);
	}

	$filter_clean_cid_number = NULL; if (isset($_POST["cid_num"])) { 
		$filter_clean_cid_number = $_POST["cid_num"]; 
		$filter_clean_cid_number = stripslashes($filter_clean_cid_number);
	}
	
    
	$url = gourl."/goInbound/goAPI.php"; #URL to GoAutoDial API. (required)
    $postfields["goUser"] = goUser; #Username goes here. (required)
    $postfields["goPass"] = goPass; #Password goes here. (required)
    $postfields["goAction"] = "goEditDID"; #action performed by the [[API:Functions]]
    $postfields["responsetype"] = responsetype; #json (required)
    $postfields["did_id"] = $modify_did; #Desired list id. (required)
    $postfields["did_pattern"] = $did_pattern; #Desired list id. (required)
	$postfields["did_description"] = $desc; #Desired value for user (required)
	$postfields["did_route"] = $route; #Desired value for user (required)
	$postfields["did_active"] = $status; #Desired value for user (required)
	$postfields["filter_clean_cid_number"] = $filter_clean_cid_number;

	if($_POST['route'] == "AGENT"){
	    $postfields["user"]                     = $_POST['route_agentid']; #Desired user (required if did_route is AGENT)
	    $postfields["user_unavailable_action"]  = $_POST['route_unavail']; #Desired user unavailable action (required if did_route is AGENT)
		$postfields["user_route_settings_ingroup"] = $_POST['user_route_settings_ingroup'];
	}

	if($_POST['route'] == "IN_GROUP"){
	    $postfields["group_id"]                 = $_POST['route_ingroupid']; #Desired group ID (required if did_route is IN-GROUP)
	}

	if($_POST['route'] == "PHONE"){
	    $postfields["phone"]                    = $_POST['route_phone_exten']; #Desired phone (required if did_route is PHONE)
	    $postfields["server_ip"]                = $_POST['route_phone_server']; #Desired server ip (required if did_route is PHONE)
	}

	if($_POST['route'] == "CALLMENU"){
	    $postfields["menu_id"]                  = $_POST['route_ivr']; #Desired menu id (required if did_route is IVR)
	}

	if($_POST['route'] == "VOICEMAIL"){
	    $postfields["voicemail_ext"]            = $_POST['route_voicemail']; #Desired voicemail (required if did_route is VOICEMAIL)
	}

	if($_POST['route'] == "EXTEN"){
	    $postfields["extension"]                = $_POST['route_exten']; #Desired extension (required if did_route is CUSTOM EXTENSION)
	    $postfields["exten_context"]            = $_POST['route_exten_context']; #Deisred context (required if did_route is CUSTOM EXTENSION)
	}
	
    $postfields["hostname"] = $_SERVER['REMOTE_ADDR']; #Default value
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
    $data = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($data);

    //print($output);

    if ($output->result == "success") {
    # Result was OK!
         ob_clean();
		print (CRM_DEFAULT_SUCCESS_RESPONSE);
    } else {
    # An error occured
        ob_clean();
		print $output->result;
        //$lh->translateText("unable_modify_list");
    }
    
}
?>