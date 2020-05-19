<?php

class SamlFileCopyAndReplace extends BuildTask {

    protected $description = 'Before use silverstripe-saml-idp module you want to run this task, and after update env values want to run';

    public function run($request) {

        $url = 'https://github.com/simplesamlphp/simplesamlphp/releases/download/v1.18.7/simplesamlphp-1.18.7.tar.gz';

        if (!file_exists('../tmp/')) {
            if (!mkdir('../tmp/', 0777, true)) {
                die('Failed to create folders...');
            }
        }
        file_put_contents("../tmp/simplesamlphp.tar.gz", fopen($url, 'r'));


            // decompress from gz
            $p = new PharData('../tmp/simplesamlphp.tar.gz');
            $p->decompress(); // creates /path/to/my.tar

            // unarchive from the tar
            $phar = new PharData('../tmp/simplesamlphp.tar');
            $phar->extractTo('../tmp/simplesamlphp');

        exec ("find ../tmp/simplesamlphp -type d -exec chmod 0777 {} +");
        exec ("find ../tmp/simplesamlphp -type f -exec chmod 0777 {} +");
        rename("../tmp/simplesamlphp/simplesamlphp-1.18.7", "../simplesamlphp");

        if (touch('../simplesamlphp/modules/exampleauth/enable')) {
            echo 'enable' . ' modification time has been changed to present time';
        } else {
            echo 'Sorry, could not change modification time of ';
        }

        $moduleCodePath = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR;
        $rootPath = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;


        if (!copy($moduleCodePath.'config/simplesamlphp/config.php', $rootPath.'simplesamlphp/config/config.php')) {
            echo "failed to copy config.php ...\n";
        }

        if (!copy($moduleCodePath.'config/simplesamlphp/authsources.php', $rootPath.'simplesamlphp/config/authsources.php')) {
            echo "failed to copy authsources.php ...\n";
        }

        if (!copy($moduleCodePath.'config/simplesamlphp/saml20-sp-remote.php', $rootPath.'simplesamlphp/metadata/saml20-sp-remote.php')) {
            echo "failed to copy saml20-sp-remote.php ...\n";
        }


        if (!is_dir($rootPath.'simplesamlphp/cert')) {
            if (!mkdir($rootPath.'simplesamlphp/cert', 0777, true)) {
                die('Failed to create cert folders...');
            } else{
                $fp = fopen($rootPath.'simplesamlphp/cert/server.crt',"wb");
                $fp2 = fopen($rootPath.'simplesamlphp/cert/server.pem',"wb");
                fwrite($fp,'');
                fwrite($fp2,'');
                fclose($fp);
                fclose($fp2);
            }
        }


        if (!copy($moduleCodePath.'config/simplesamlphp/server.crt', $rootPath.'simplesamlphp/cert/server.crt')) {
            echo "failed to copy server.crt ...\n";
        }

        if (!copy($moduleCodePath.'config/simplesamlphp/server.pem', $rootPath.'simplesamlphp/cert/server.pem')) {
            echo "failed to copy server.pem ...\n";
        }

        echo '...done....';


    }
}