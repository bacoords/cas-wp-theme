<?php
/**
 * The AuthorizeNet PHP SDK. Include this file in your project.
 *
 * @package AuthorizeNet
 */
require TEMPLATEPATH . '/lib/authorizealt/shared/AuthorizeNetRequest.php';
require TEMPLATEPATH . '/lib/authorizealt/shared/AuthorizeNetTypes.php';
require TEMPLATEPATH . '/lib/authorizealt/shared/AuthorizeNetXMLResponse.php';
require TEMPLATEPATH . '/lib/authorizealt/shared/AuthorizeNetResponse.php';
require TEMPLATEPATH . '/lib/authorizealt/AuthorizeNetAIM.php';
require TEMPLATEPATH . '/lib/authorizealt/AuthorizeNetARB.php';
require TEMPLATEPATH . '/lib/authorizealt/AuthorizeNetCIM.php';
require TEMPLATEPATH . '/lib/authorizealt/AuthorizeNetSIM.php';
require TEMPLATEPATH . '/lib/authorizealt/AuthorizeNetDPM.php';
require TEMPLATEPATH . '/lib/authorizealt/AuthorizeNetTD.php';
require TEMPLATEPATH . '/lib/authorizealt/AuthorizeNetCP.php';

if (class_exists("SoapClient")) {
    require TEMPLATEPATH . '/lib/authorizealt/AuthorizeNetSOAP.php';
}
/**
 * Exception class for AuthorizeNet PHP SDK.
 *
 * @package AuthorizeNet
 */
class AuthorizeNetException extends Exception
{
}