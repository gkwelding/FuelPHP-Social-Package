<?php

return array(
    // True if objects should be returned by the service classes.
    // False if associative arrays should be returned (default behavior).
    'use_objects' => true,
  
    // The application_name is included in the User-Agent HTTP header.
    'application_name' => '',

    // OAuth2 Settings, you can get these keys at https://code.google.com/apis/console
    'oauth2_client_id' => '',
    'oauth2_client_secret' => '',
    'oauth2_redirect_uri' => '',

    // The developer key, you get this at https://code.google.com/apis/console
    'developer_key' => '',
    // Site name to show in the Google's OAuth 1 authentication screen.
    'site_name' => '',

    // Which Authentication, Storage and HTTP IO classes to use.
    'authClass'    => 'apiOAuth2',

    // Definition of service specific values like scopes, oauth token URLs, etc
    'services' => array(
	#Example: to work with Google Calendar you must specify its scope
        'calendar' => array('scope' => 'https://www.googleapis.com/auth/calendar'),
    ),

);
