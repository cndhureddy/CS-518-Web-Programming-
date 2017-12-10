<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/1/2017
 * Time: 1:01 AM
 */

session_start();
session_unset();
session_destroy();
$_SESSION = array();
echo '<script type=\"javascript\">
  FB.logout(function(response) {
  // user is now logged out
});
</script>';

NSHTTPCookie *cookie;
    NSHTTPCookieStorage *storage = [NSHTTPCookieStorage sharedHTTPCookieStorage];
    for (cookie in [storage cookies])
    {
     NSString* domainName = [cookie domain];
     NSRange domainRange = [domainName rangeOfString:@"facebook"];
     if(domainRange.length > 0)
      {
        [storage deleteCookie:cookie];
      }
    }


header('location: ../index.php');
