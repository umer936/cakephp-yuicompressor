<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace CakephpAssetCompressYuicompressor\Console;

use Composer\Script\Event;
use Exception;

/**
 * Provides installation hooks for when this application is installed via
 * composer. Customize this class to suit your needs.
 */
class Installer
{

    /**
     * @throws \Exception
     */
    public static function postUpdate(Event $event)
    {
        if (!defined('DS')) {
            define('DS', DIRECTORY_SEPARATOR);
        }

        $thisVendorDir = dirname(dirname(__DIR__));
        $vendorDir = dirname(dirname($thisVendorDir));

        $yuicompressorDir = $vendorDir . DS . 'nervo' . DS . 'yuicompressor';
        $newDir = $vendorDir . DS . 'yuicompressor';

        if (is_dir($newDir)) {
            return true;
        }

        // copy files
        if (self::copyall($yuicompressorDir, $newDir)) {
            $io = $event->getIO();
            $io->write('Yuicompressor files have been successfully copied');
            return true;
        }

        throw new Exception('Can not copy files');
    }

    public static function copyall($src, $dst)
    {
        $dir = opendir($src);
        @mkdir($dst);

        $status = true;
        while (($file = readdir($dir)) !== false) {
            if (($file != '.') && ($file != '..')) {
                if (copy($src . DS . $file, $dst . DS . $file)) {
                } else {
                    $status = false;
                    break;
                }
            }
        }
        closedir($dir);

        return $status;
    }

}
