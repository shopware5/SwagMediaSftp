# SFTP Adapter for Shopware

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

The SFTP adapter allows you to manage your media files in shopware on a SFTP environment.

## Building a package

Just run `./build.sh`.

## Install

Download the plugin from the release page and enable it in shopware.

## Usage

Update your `config.php` in your root directory and fill in your own values

```php
'cdn' => [
    'backend' => 'sftp',
    'adapters' => [
        'sftp' => [
            'type' => 'sftp',
            'mediaUrl' => 'YOUR_REMOTE_MEDIA_URL',
            'host' => 'YOUR_REMOTE_HOST',
            'port' => 22,
            'username' => 'YOUR_REMOTE_USERNAME',
            'password' => 'YOUR_REMOTE_PASSWORD',
            'privateKey' => 'PATH_TO_PRIVATE_KEY_FILE',
            'root' => 'YOUR_PATH_ON_REMOTE_HOST',
            'timeout' => 10
        ]
    ]
]
```

## Value explanation


| Name | Required | Description |
|------|----------|-------------|
| type | Yes | Adapter type. Do not change. |
| mediaUrl | Yes | Base url where the media folders is available |
| host | Yes | Host of your remote |
| port | No | Defaults to `22` |
| username | Yes | Username for your remote |
| password | No | Password for your remote |
| privateKey | No | Local path to your private key |
| root | No | Path on your remote |
| timeout | No | Timeout for contacting the server. Defaults to `10` |

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
