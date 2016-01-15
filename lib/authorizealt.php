<?php
/**
 * The AuthorizeNet PHP SDK. Include this file in your project.
 *
 * @package AuthorizeNet
 */
require dirname(__FILE__) . '/authorizealt/shared/AuthorizeNetRequest.php';
require dirname(__FILE__) . '/authorizealt/shared/AuthorizeNetTypes.php';
require dirname(__FILE__) . '/authorizealt/shared/AuthorizeNetXMLResponse.php';
require dirname(__FILE__) . '/authorizealt/shared/AuthorizeNetResponse.php';
require dirname(__FILE__) . '/authorizealt/AuthorizeNetAIM.php';
require dirname(__FILE__) . '/authorizealt/AuthorizeNetARB.php';
require dirname(__FILE__) . '/authorizealt/AuthorizeNetCIM.php';
require dirname(__FILE__) . '/authorizealt/AuthorizeNetSIM.php';
require dirname(__FILE__) . '/authorizealt/AuthorizeNetDPM.php';
require dirname(__FILE__) . '/authorizealt/AuthorizeNetTD.php';
require dirname(__FILE__) . '/authorizealt/AuthorizeNetCP.php';

if (class_exists("SoapClient")) {
    require dirname(__FILE__) . '/authorizealt/AuthorizeNetSOAP.php';
}
/**
 * Exception class for AuthorizeNet PHP SDK.
 *
 * @package AuthorizeNet
 */
class AuthorizeNetException extends Exception
{
}