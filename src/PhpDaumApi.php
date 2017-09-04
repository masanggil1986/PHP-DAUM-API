<?php
namespace PhpDaumApi;

require __DIR__ . '/../vendor/autoload.php';

Class UserManagement {
    private $hosts = array(
        'auth' => 'https://kauth.kakao.com',
        'api' => 'https://kapi.kakao.com'
    );
    private $uris = array(
        'authorize' => '/oauth/authorize',
        'token' => '/oauth/token',
        'logout' => '/v1/user/logout'
    );

    private $clientId = '';
    private $redirectUri = '';
    private $accessToken = '';
    private $refreshToken = '';

    private $curl = null;

    public function __construct($settings = array()) {
        if ($settings['client_id']) $this->clientId = $settings['client_id'];
        if ($settings['redirect_uri']) $this->redirectUri = $settings['redirect_uri'];
        $this->curl = new \Curl\Curl();
    }

    public function authorize() {
        $host = $this->hosts['auth'];
        $uri = $this->uris['authorize'];
        $clientId = $this->clientId;
        $redirectUri = $this->redirectUri;

        $this->curl->get($host . $uri, array(
            'client_id' => $clientId,
            'redirect_uri' => $redirectUri,
            'response_type' => 'code'
        ));

        if ($this->curl->error) {
            echo 'Error: ' . $this->curl->errorCode . ': ' . $this->curl->errorMessage . "\n";
        } else {
            foreach ($this->curl->responseHeaders as $key => $val) {
                header("$key: $val");
            }
        }
    }

    public function token() {
        $host = $this->hosts['auth'];
        $uri = $this->uris['token'];
        $clientId = $this->clientId;
        $redirectUri = $this->redirectUri;
        $authorizeCode = $_GET['code'];

        $this->curl->post($host.$uri, array(
            'grant_type' => 'authorization_code',
            'client_id' => $clientId,
            'redirect_uri' => $redirectUri,
            'code' => $authorizeCode
        ));

        if ($this->curl->error) {
            echo 'Error: ' . $this->curl->errorCode . ': ' . $this->curl->errorMessage . "\n";
            return false;
        } else {
            $this->accessToken = $this->curl->response->access_token;
            $this->refreshToken = $this->curl->response->refresh_token;
            return $this->curl->response;
        }
    }

    public function logout() {
        $host = $this->hosts['api'];
        $uri = $this->uris['logout'];
        $accessToken = $this->accessToken;

        $this->curl->setHeader('Authorization', 'Bearer '.$accessToken);
        $this->curl->post($host.$uri);

        if ($this->curl->error) {
            echo 'Error: ' . $this->curl->errorCode . ': ' . $this->curl->errorMessage . "\n";
            return false;
        } else {
            return $this->curl->response;
        }
    }

    public function setClientId($clientId = '') {
        $this->clientId = $clientId;
    }

    public function setRedirectUri($uri = '') {
        $this->redirectUri = $uri;
    }

    public function setAccessToken($token = '') {
        $this->accessToken = $token;
    }
}