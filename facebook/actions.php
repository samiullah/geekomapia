<?
include 'src/facebook.php';
    $appid      = "1444118979163499";
    $appsecret  = "63bdae9ba469411748c31e82a613a6ab";
    $facebook   = new Facebook(array(
        'appId' => $appid,
        'secret' => $appsecret,
        'cookie' => TRUE,
    ));
    $fbuser = $facebook->getUser();
    if ($fbuser) {
        try {
            $user_profile = $facebook->api('/me');
        }
        catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
        $user_fbid  = $fbuser;
        $user_email = $user_profile["email"];
        $user_fnmae = $user_profile["first_name"];
        $user_image = "https://graph.facebook.com/".$user_fbid."/picture?type=large";
        /* Save the user details in your db here */
         print_r($user_profile);
        }
    ?>