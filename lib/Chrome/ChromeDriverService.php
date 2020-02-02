<?php

namespace Facebook\WebDriver\Chrome;

use Facebook\WebDriver\Remote\Service\DriverService;
use function array_merge;

class ChromeDriverService extends DriverService
{
    /**
     * The environment variable storing the path to the chrome driver executable.
     * @deprecated Use ChromeDriverService::CHROME_DRIVER_EXECUTABLE
     */
    const CHROME_DRIVER_EXE_PROPERTY = 'webdriver.chrome.driver';
    // The environment variable storing the path to the chrome driver executable
    const CHROME_DRIVER_EXECUTABLE = 'WEBDRIVER_CHROME_DRIVER';

    /**
     * @return static
     */
    public static function createDefaultService($exe = null, $port = null, $args =array() )
    {


        $exe = ( $exe != null) ? $exe : getenv(self::CHROME_DRIVER_EXE_PROPERTY);
        $port =  ($port != null) ? $port : 9515; // TODO: Get another port if the default port is used.
        if(is_array($args) && count($args) >0 ) {
            $args = $args; }
        elseif ($args != null ) {
            $args = [$args];
        }

        $arguments = $args + ['--port=' . $port];


        return new static($exe, $port, $args);
    }
}
