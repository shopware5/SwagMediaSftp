<?php

namespace SwagMediaSftp\Subscriber;

use Enlight\Event\SubscriberInterface;
use Enlight_Event_EventArgs;

use League\Flysystem\AdapterInterface;
use League\Flysystem\Sftp\SftpAdapter;

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

class AdapterCollectionSubscriber implements SubscriberInterface
{

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Shopware_Collect_MediaAdapter_sftp' => 'createSftpAdapter'
        ];
    }

    /**
     * Creates adapter instance
     *
     * @param Enlight_Event_EventArgs $args
     * @return AdapterInterface
     */
    public function createSftpAdapter(Enlight_Event_EventArgs $args)
    {
        $defaultConfig = [
            'host' => '',
            'port' => 22,
            'username' => '',
            'password' => '',
            'privateKey' => '',
            'root' => '',
            'timeout' => 10
        ];

        $config = array_merge($defaultConfig, $args->get('config'));

        return new SftpAdapter([
            'host' => $config['host'],
            'port' => $config['port'],
            'username' => $config['username'],
            'password' => $config['password'],
            'privateKey' => $config['privateKey'],
            'root' => $config['root'],
            'timeout' => $config['timeout']
        ]);
    }
}
