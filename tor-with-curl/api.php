<?php
/**
 * Tor with CURL - PHP Scraper
 *
 * LICENSE: FREE MIT
 *
 * @author     Main Author <@fadidev>
 * @copyright  @2018 @fadidev
 * @version    CVS: 1.0.0
 * @package    Main class of tor-with-curl
 */

class Api
{
	
    private $ch;
    
    public function __construct()
    {
        $torSocks5Proxy = "socks5://127.0.0.1:9050";
        $useragent      = $_SERVER['HTTP_USER_AGENT'];
        $timeout        = 120;
        $dir            = dirname(__FILE__);
        $cookie_file    = $dir . '/cookies/' . md5($_SERVER['REMOTE_ADDR']) . '.txt';
        $this->ch       = curl_init();
        curl_setopt($this->ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
        curl_setopt($this->ch, CURLOPT_PROXY, $torSocks5Proxy);
        curl_setopt($this->ch, CURLOPT_FAILONERROR, true);
        curl_setopt($this->ch, CURLOPT_HEADER, 1);
        curl_setopt($this->ch, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt($this->ch, CURLOPT_COOKIEJAR, $cookie_file);
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($this->ch, CURLOPT_ENCODING, "UTF-8");
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($this->ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($this->ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36");
        curl_setopt($this->ch, CURLOPT_REFERER, 'http://www.google.com/');
    }
    
    public function getApiResponse($url, $postParameter = null)
    {
        if (sizeof($postParameter) > 0)
        curl_setopt($this->ch, CURLOPT_POST, count($postParameter));
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $postParameter);
        curl_setopt($this->ch, CURLOPT_URL, $url);
        $content  = curl_exec($this->ch);
        $document = new simple_html_dom();
        $document->load($content);
        $httpcode = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
        if ($httpcode == 404) {
            return '404';
        } else {
            return $document;
        }
    }
    
    public function __destruct()
    {
        curl_close($this->ch);
    }
}