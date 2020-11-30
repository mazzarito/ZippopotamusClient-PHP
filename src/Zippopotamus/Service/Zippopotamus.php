<?php
/**
 * Zippopotam.us PHP Library
 *
 * @version 1.0.1
 */
namespace Zippopotamus\Service;

use Laminas\Http\Client;
use Laminas\Http\Headers;
use Laminas\Json\Json;

/**
 * Class Zippopotamus
 *
 * @package Zippopotamus\Service
 */
final class Zippopotamus {
  /**
   * @var string $apiUrl
   *   Static base aSPIl
   */
  public static $apiUrl = 'http://api.zippopotam.us/';

  /**
   * @param $countryCode
   * @param $postalCode
   *
   * @return mixed
   */
  static public function code($countryCode, $postalCode) {
    $http = new Client();
    $http->setOptions(array('sslverifypeer' => FALSE));

    $headers = new Headers();
    $headers->addHeaderLine('Content-Type', 'application/json');

    $http->setHeaders($headers);
    $http->setUri(self::$apiUrl . urlencode($countryCode) . '/' . urlencode($postalCode));
    $http->setMethod('GET');

    $response = $http->send();
    $json = Json::decode($response->getBody());

    return $json;
  }

  /**
   * @param $countryCode
   * @param $stateCode
   * @param $city
   *
   * @return mixed
   */
  static public function place($countryCode, $stateCode, $city) {
    $http = new Client();
    $http->setOptions(array('sslverifypeer' => FALSE));

    $headers = new Headers();
    $headers->addHeaderLine('Content-Type', 'application/json');

    $http->setHeaders($headers);
    $http->setUri(self::$apiUrl . urlencode($countryCode) . '/' . urlencode($stateCode) . '/' . urlencode($city));
    $http->setMethod('GET');

    $response = $http->send();
    $json = Json::decode($response->getBody());

    return $json;
  }

  /**
   * @param $countryCode
   * @param $postalCode
   *
   * @return mixed
   */
  static public function nearby($countryCode, $postalCode) {
    $http = new Client();
    $http->setOptions(array('sslverifypeer' => FALSE));

    $headers = new Headers();
    $headers->addHeaderLine('Content-Type', 'application/json');

    $http->setHeaders($headers);
    $http->setUri(self::$apiUrl . 'nearby/' . urlencode($countryCode) . '/' . urlencode($postalCode));
    $http->setMethod('GET');

    $response = $http->send();
    $json = Json::decode($response->getBody());

    return $json;
  }
}
