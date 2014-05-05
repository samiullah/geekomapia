<script src='../scripts/jquery-1.7.1.js'></script>
<script type="text/javascript">
function show(){
$("#data").load("actions.php");
}
window.fbAsyncInit = function() {
    FB.init({
    appId      : '1444118979163499', // replace your app id here
    //channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', 
    status     : true, 
    cookie     : true, 
    xfbml      : true  
    });
};
(function(d){
    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement('script'); js.id = id; js.async = true;
    js.src = "//connect.facebook.net/en_US/all.js";
    ref.parentNode.insertBefore(js, ref);
}(document));
 
function FBLogin(){
    FB.login(function(response){
        if(response.authResponse){
           show();  
        }
    });
}

</script>
<style>
body{
    font-family:Arial;
    color:#333;
    font-size:14px;
}
</style>
</head>
 
<body>
<h1>Fconnect</h1>
<img src="fconnect.png" alt="Fb Connect" title="Login with facebook" onclick="FBLogin();"/>
<textarea id='data'>
</textarea>
</body>
</html>

