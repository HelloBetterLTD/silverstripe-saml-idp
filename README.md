# silverstripe-saml-idp

## Introduction
This module can use as a idp in a silverstripe project

## How to use
use this module in project composer.json file 
```$xslt
{
            "type": "vcs",
            "url": "https://github.com/SilverStripers/silverstripe-saml-idp.git"
}
```

run ```composer update```

go to the path ```code/config/simplesamlphp``` 

run ```openssl req -newkey rsa:3072 -new -x509 -days 3652 -nodes -out server.crt -keyout server.pem```

You can update ```authsources.php``` ``` config.php``` ```saml20-sp-remote.php```. 

Only if you want. Then run the task again.

To update ```saml20-sp-remote.php``` you want to copy meta dara from ```http://your-silverstripe.site/Security/metadata```

And then put it at "XML to SimpleSAMLphp metadata converter"

can find your idp website ```http://your-idp-website/simplesaml/module.php/core/frontpage_federation.php```


find ```dev/tasks/SamlFileCopyAndReplace``` and Run

When doing a test run in your sp site try to login, before login make idp in saml admin ( check silverstripe-saml-sp setup )