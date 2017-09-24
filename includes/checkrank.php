<?php
  /**
   * @author maxwell
   */

	echo "[ RANK ]\n";
	echo "\t\t\tLet's check rank of delegate...\n";

	ini_set("allow_url_fopen", 1);
	$json = file_get_contents('https://wallet.rise.vision/api/delegates/get?username='.$delegateName);
	$obj = json_decode($json);
	$rank = intval($obj->delegate->rank);
	
	if ($rank > $minRank){
        	// Echo something to our log file
        	echo "\t\t\tDelegate has too low rank!!\n";		

        	if($telegramEnable === true){
                	$Tmsg = "Delegate ".gethostname()." has reached low rank of ".$rank;
                	passthru("curl -s -d 'chat_id=$telegramId&text=$Tmsg' $telegramSendMessage >/dev/null");
        	}
	}
