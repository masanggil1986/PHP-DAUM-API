# PHP DAUM API

Daum Restful API helper written in PHP.

This project has just been created. This project will be able to be used by composer in the future.

## How To

Please make sure your `client_id` and `redirect_uri`.

```php
$settings = array(
    'client_id' => 'Your Client ID is here',
    'redirect_uri' => 'Your Redirect Uri is here'
);
$phpDaumApi = $phpDaumApi ?? new PhpDaumApi\UserManagement($settings);
```

