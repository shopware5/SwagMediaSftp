<?php
/**
 * (c) shopware AG <info@shopware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SwagMediaSftp\Subscriber;

use Enlight\Event\SubscriberInterface;
use Enlight_Event_EventArgs;
use League\Flysystem\AdapterInterface;
use League\Flysystem\Sftp\SftpAdapter;

class AdapterCollectionSubscriber implements SubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Shopware_Collect_MediaAdapter_sftp' => 'createSftpAdapter',
        ];
    }

    /**
     * Creates adapter instance
     *
     * @param Enlight_Event_EventArgs $args
     *
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
            'timeout' => 10,
        ];

        $config = array_merge($defaultConfig, $args->get('config'));

        return new SftpAdapter($config);
    }
}
