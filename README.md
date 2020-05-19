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

You can update ```authsources.php config.php saml20-sp-remote.php```. Only if you want.

set ```IdpVariables``` in ```config```

```
SIMPLESAMLPHP_IDP_SECRET_SALT
SIMPLESAMLPHP_IDP_ADMIN_PASSWORD
SIMPLESAMLPHP_IDP_SESSION_DURATION_SECONDS
SIMPLESAMLPHP_SP_ENTITY_ID
SIMPLESAMLPHP_SP_ASSERTION_CONSUMER_SERVICE
SIMPLESAMLPHP_SP_SINGLE_LOGOUT_SERVICE
```

Generate ```server.crt``` and ```server.pem ``` files

find ```dev/tasks/SamlFileCopyAndReplace``` and Run

