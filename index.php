<?php
function is_user_from_us() {
  // This will detect User IP
    $ip = $_SERVER['REMOTE_ADDR'];
  // API that detect the User Country
    $response = file_get_contents("http://ip-api.com/json/$ip");
    if ($response !== false) {
        $data = json_decode($response, true);
      // Return True if User from USA
        return $data['countryCode'] === 'US';
    } else {
        error_log('IP geolocation API request failed');
        return false;
    }
}
if (is_user_from_us()) {
  // This will Redirect User to  https://example.com/
    header("Location: https://example.com/");
    exit();
} else {}
?>
