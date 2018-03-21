<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
/**
 * linkedin-client
 * index.php
 *
 * PHP Version 5.3 or greater
 *
 * @category Production
 * @package  Default
 * @author   Vinil Lakkavatri <vinil.lakkavatri@icloud.com>
 * @date     03/10/18 22:47
 * @version  GIT: 1.0
 * @link     https://github.com/laddu1993/linkedin.git
 */

// add Composer autoloader
include_once $_SERVER['DOCUMENT_ROOT'].'/linkedin/vendor/autoload.php'; // you're local file storage path

// import client class
use LinkedIn\Client;
use LinkedIn\Scope;
use LinkedIn\AccessToken;


// we need a session to keep intermediate results
// you can use your own session persistence management
// client doesn't depend on it
session_start();

// instantiate the Linkedin client
$client = new Client(
    'Client ID',
    'Client Secret'
);


if (isset($_GET['code'])) { // we are returning back from LinkedIn with the code
    if (isset($_GET['state']) &&  // and state parameter in place
        isset($_SESSION['state']) && // and we have have stored state
        $_GET['state'] === $_SESSION['state'] // and it is our request
    ) {
        try {
            // you have to set initially used redirect url to be able
            // to retrieve access token
            $client->setRedirectUrl($_SESSION['redirect_url']);
            // retrieve access token using code provided by LinkedIn
            $accessToken = $client->getAccessToken($_GET['code']);
            echo 'Access token:';
            pp($accessToken->getToken()); // print the access token content
            
            echo 'Profile:';
            // perform api call to get profile information
            $profile = $client->get(
                'people/~:(id,email-address,first-name,last-name)'
            );
            pp($profile); // print profile information

            echo 'Company Share:';
            $company = $client->get(
                'companies',
                ['format' => 'json', 'is-company-admin' => 'true']
            );
            pp($company);

            $companyId = '13678496';

            $cmp_share = $client->post(
                'companies/' . $companyId . '/shares',
                [
                    'comment' => 'I am Vinil Lakkavatri, Proud to be Indian | PHP Software Developer. I have Hands on Experience in PHP, MySQL, JavaScript, CSS, HTML, HTML5, CSS3,BOOTSTRAP, JQUERY, ANGULARJS & AJAX. I am an engineer by profession and internet surfer for new technologies by passion. I Always believe and love the quote ,DESTINY OF HARDWORK IS ALWAYS SUCCESS.',
                    'content' => [
                        'title' => 'How to post on LinkedIn using PHP API',
                        'description' => 'Post on linkedin wall and company page using php',
                        'submitted-url' => 'http://vinillakkavatri.xyz/',
                        'submitted-image-url' => 'http://vinillakkavatri.xyz/images/mypic1.jpg',
                    ],
                    'visibility' => [
                        'code' => 'anyone'
                    ]
                ]
            );
            pp($cmp_share);

            $share = $client->post(
                'people/~/shares',
                [
                    'comment' => 'I am Vinil Lakkavatri, Proud to be Indian | PHP Software Developer. I have Hands on Experience in PHP, MySQL, JavaScript, CSS, HTML, HTML5, CSS3,BOOTSTRAP, JQUERY, ANGULARJS & AJAX. I am an engineer by profession and internet surfer for new technologies by passion. I Always believe and love the quote ,DESTINY OF HARDWORK IS ALWAYS SUCCESS.',
                    'content' => [
                        'title' => 'How to post on LinkedIn using PHP API',
                        'description' => 'Post on linkedin wall and company page using php',
                        'submitted-url' => 'http://vinillakkavatri.xyz/',
                        'submitted-image-url' => 'http://vinillakkavatri.xyz/images/mypic1.jpg',
                    ],
                    'visibility' => [
                        'code' => 'anyone'
                    ]
                ]
            );
            pp($share);
        } catch (\LinkedIn\Exception $exception) {
            // in case of failure, provide with details
            pp($exception);
            pp($_SESSION);
        }
        echo '<a href="/">Start over</a>';
    } else {
        // normally this shouldn't happen unless someone sits in the middle
        // and trying to override your state
        // or you are trying to change saved state during linking
        echo 'Invalid state!';
        pp($_GET);
        pp($_SESSION);
        echo '<a href="/">Start over</a>';
    }

} elseif (isset($_GET['error'])) {
    // if you cancel during linking
    // you will be redirected back with reason
    pp($_GET);
    echo '<a href="/">Start over</a>';
} else {
    // define desired list of scopes
    $scopes = Scope::getValues();
    $loginUrl = $client->getLoginUrl($scopes); // get url on LinkedIn to start linking
    $_SESSION['state'] = $client->getState(); // save state for future validation
    $_SESSION['redirect_url'] = $client->getRedirectUrl(); // save redirect url for future validation
    echo 'LoginUrl: <a href="'.$loginUrl.'">' . $loginUrl. '</a>';
}

/**
 * Pretty print whatever passed in
 *
 * @param mixed $anything
 */
function pp($anything)
{
    echo '<pre>' . print_r($anything, true) . '</pre>';
}
