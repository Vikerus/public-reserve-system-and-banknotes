<?php
require_once 'db_connect.php';
require_once 'psl-config.php';
require_once 'pdo_bk_connect.php';

$error_msg = "";
 
if (isset($_POST['username'], $_POST['email'], $_POST['p'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_msg .= '<p class="error">The email address you entered is not valid</p>';
    }
 
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
    $prep_stmt = "SELECT id FROM members WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);

    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows == 1) {
            $error_msg .= '<p class="error">A user with this email address already exists.</p>';
                        $stmt->close();
        }
                $stmt->close();
    } else {
        $error_msg .= '<p class="error">Database error Line 39</p>';
                $stmt->close();
    }

    $prep_stmt = "SELECT id FROM members WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
 
                if ($stmt->num_rows == 1) {
                        $error_msg .= '<p class="error">A user with this username already exists</p>';
                        $stmt->close();
                }
                $stmt->close();
        } else {
                $error_msg .= '<p class="error">Database error line 55</p>';
                $stmt->close();
        }
 
    if (empty($error_msg)) {
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

	$UIDbbit = $_SERVER['HTTP_REFERER'];
	$UIDebit = $_SERVER['HTTP_USER_AGENT'];
	$UIDgbit = $_SERVER['REQUEST_TIME_FLOAT'];
	$Cbitvalue = "$UIDbbit $UIDebit $UIDgbit";
	$CookieToEncrypt = $Cbitvalue;
	$encryptionMethodE = "AES-256-CBC";
	$secretHashE = "25c6c7ff35b9979b151f2136cd13b0ee";
	$iv_sizeE = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
	$ivE = mcrypt_create_iv($iv_sizeE, MCRYPT_RAND);
	$encryptedMessageE = openssl_encrypt($CookieToEncrypt, $encryptionMethodE, $secretHashE, 0, $ivE);
	$UIDsec = $encryptedMessageE;
	$UIDabit = $_SERVER['REMOTE_ADDR'];
	$UIDcbit = $UIDsec;
	$UIDdbit = date(DATE_RFC2822);
	$UIDfbit = $_SERVER['SERVER_PROTOCOL'];
	$UUID = "$UIDabit $UIDcbit $UIDdbit $UIDfbit";
	$CookieToEncrypt5 = $UUID;
	$encryptionMethod5 = "AES-256-CBC";
	$secretHash5 = "25c6c7ff35b9979b151f2136cd13b0ee";
	$iv_size5 = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
	$iv5 = mcrypt_create_iv($iv_size5, MCRYPT_RAND);
	$encryptedMessage5 = openssl_encrypt($CookieToEncrypt5, $encryptionMethod5, $secretHashE, 0, $ivE);
	$expire = $UIDgbit + 3000;
	setcookie("UID",$encryptedMessage5,$expire,"/","archway.io", true);
	$_SESSION['UID'] = $encryptedMessage5;
	$lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ;
	$served = $_SERVER['SERVER_NAME'] ;
	$uid = $encryptedMessage5;
	
        $password = hash('sha512', $password . $random_salt);
		$friendcode = hash('sha256', uniqid(mt_rand(1, mt_getrandmax()), true));
		$hashid = hash('sha256', $encryptedMessage5);
	
	$to = "$email";
	$subject = "Thank you for registering!";
	$body = "Welcome to the network! Here are your details we collected for login verification. 
	IP, Email, Browser, Blog example, Language, Time, last page referrer, and server served. By
	signing up with the network you agree that collection of this data was intended, permitted,
	and understood before submitting registration. Privacy is a real concern and precautions are 
	taken to ensure a level of competent security and privacy. Though with this being true no system
	is 100% secure. Be mindful of the content you submit and audience that may receive it.
	
	There are some basic guidelines to follow. No adult/graphic content is allowed in the public
	groups or comments or bulletins and will result in an IP ban.
	All parties are encouraged to pursue all forms of communication on our network but there are actions that 
	are prohibited. Exploiting the site is not allowed in any form. The network will reserve it's right to pursue legal 
	action of the highest form in the event user data or meta data is targeted or stolen. Harassment of persons or 
	sects of humankind will result in permanent ip ban. Discrimination of any kind is subject to review in the 
	event of abuse or complaint. Distribution of malicious code or software/hardware is prohibited in all forms on the 
	network. 
	
	By signing up with the network you agree to follow the mentioned guidelines. It's in the public 
	interest that we as people are excellent to one another. Thank you.";
	if (mail($to, $subject, $body)) {
    echo("<p>Email successfully sent!</p>");
    } else {
   echo("<p>Email delivery failed…</p>");
    }
	$points = 10;
	$exp = 1;
	$email = hash('sha512', $email);
	$slate = "Welcome to ArchwayME Beta! A new take on community. This is your public blogette!";
	$userhmac = hash('sha256', $_POST['username']);
        if ($insert_stmt = $mysqli->prepare("INSERT INTO members (friendcode, username, password, salt, ip, UID, email, hashid, httpref, timedate, browser, language, server, slate, points, exp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssssssssssssssss', $friendcode, $username, $password, $random_salt, $UIDabit, $uid, $email, $hashid, $UIDbbit, $UIDgbit, $UIDebit, $lang, $served, $slate, $points, $exp);
				$count = $dbhi->exec("INSERT INTO reserves (free,public,signature) VALUES ('1000000','0','$userhmac')");
            if (! $insert_stmt->execute()) {
                header('Location: ./error.php?err=Registration failure: INSERT');
            }
        }
        header('Location: ./register_success.html');
    }
}
