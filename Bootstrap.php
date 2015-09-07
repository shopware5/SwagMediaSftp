<?php
/*
 * (c) shopware AG <info@shopware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

require(__DIR__ . "/vendor/autoload.php");

use League\Flysystem\AdapterInterface;
use League\Flysystem\Sftp\SftpAdapter;

class Shopware_Plugins_Frontend_SwagMediaSftp_Bootstrap extends Shopware_Components_Plugin_Bootstrap
{
    /**
     * Returns the version of the plugin
     *
     * @return string
     */
    public function getVersion()
    {
        return "1.0.0";
    }

    /**
     * Returns a marketing friendly name of the plugin.
     *
     * @return string
     */
    public function getLabel()
    {
        return "Media Adapter: SFTP";
    }

    /**
     * Returns plugin info
     *
     * @return array
     */
    public function getInfo()
    {
        return array(
            'version' => $this->getVersion(),
            'label' => $this->getLabel(),
            'supplier' => 'shopware AG',
            'description' => 'SFTP-Erweiterung für die Media Adapter',
            'support' => 'Shopware Forum',
            'link' => 'http://www.shopware.com'
        );
    }

    /**
     * Template method which will be called when the plugin will be uninstalled.
     *
     * @return bool
     */
    public function uninstall()
    {
        return true;
    }

    /**
     * Template method which will be called when the plugin will be installed.
     *
     * @return bool
     */
    public function install()
    {
        $this->subscribeEvent('Shopware_Collect_MediaAdapter_sftp', 'createSftpAdapter');

        return true;
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
