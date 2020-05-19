<?php

if (!Config::inst()->get('IdpVariables', 'SIMPLESAMLPHP_SP_ENTITY_ID')) {
    throw new UnexpectedValueException('SIMPLESAMLPHP_SP_ENTITY_ID is not defined as an environment variable.');
}
if (!Config::inst()->get('IdpVariables', 'SIMPLESAMLPHP_SP_ASSERTION_CONSUMER_SERVICE')) {
    throw new UnexpectedValueException('SIMPLESAMLPHP_SP_ASSERTION_CONSUMER_SERVICE is not defined as an environment variable.');
}

$metadata[Config::inst()->get('IdpVariables', 'SIMPLESAMLPHP_SP_ENTITY_ID')] = array(
    'AssertionConsumerService' => Config::inst()->get('IdpVariables', 'SIMPLESAMLPHP_SP_ASSERTION_CONSUMER_SERVICE'),
    'SingleLogoutService' => Config::inst()->get('IdpVariables', 'SIMPLESAMLPHP_SP_SINGLE_LOGOUT_SERVICE'),
);