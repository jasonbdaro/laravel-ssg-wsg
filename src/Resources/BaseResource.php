<?php

namespace Jasonbdaro\Ssgwsg\Resources;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Jasonbdaro\Ssgwsg\Exceptions\UndefinedConstantException;

class BaseResource
{
    const OPEN_BASE_URL = 'https://public-api.ssg-wsg.sg';
    const TEST_OPEN_BASE_URL = 'https://mock-public-api.ssg-wsg.sg';
    const CERTIFICATE_BASE_URL = 'https://api.ssg-wsg.sg';
    const TEST_CERTIFICATE_BASE_URL = 'https://mock-api.ssg-wsg.sg';

    protected $apiUrl;
    protected $method;
    protected $options;
    protected $data;
    protected $prefix = 'open';
    protected $type;

    public function __call($name, $arguments)
    {
        $prefix = $this->isLive() ? '' : 'TEST_';
        if (Str::startsWith($name, $this->prefix)) {
            $this->setOpenAttributes($name, $prefix, $arguments);
        } else {
            $this->setCertificateAttributes($name, $prefix, $arguments);
        }

        if (count($arguments)) {
            $this->data = $arguments[count($arguments) - 1];
            unset($arguments[count($arguments) - 1]);
        }

        return $this->request();
    }

    protected function request()
    {
        $client = new Client();
        if ($this->isLive()) {
            if ('open' === $this->type) {
                $client = new Client(['headers' => ['Authorization' => "Bearer {$this->getAccessToken()}"]]);
            }
            if ('certificate' === $this->type) {
                $passphrase = config('ssgwsg.cert_password');
                $client = new Client([
                    'cert' => [config('ssgwsg.cert_public_path'), $passphrase],
                    'ssl_key' => [config('ssgwsg.cert_secret_path'), $passphrase],
                ]);
            }
        }
        try {
            $response = $client->request($this->getMethod($this->method), $this->apiUrl, $this->getOptions());
            return $this->parseToArray((string) $response->getBody());
        } catch (ClientException $e) {
            $response = $e->getResponse()->getBody()->getContents();
            return response($response);
        }
    }

    private function getAccessToken()
    {
        $client = new Client([
            'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
            'auth' => [config('ssgwsg.public_key'), config('ssgwsg.secret_key')],
            'json' => ['grant_type' => 'client_credentials'],
        ]);
        try {
            $response = $client->request('POST', self::OPEN_BASE_URL."/dp-oauth/oauth/token");
            return $this->parseToArray((string) $response->getBody())['access_token'];
        } catch (ClientException $e) {
            return '';
        }
    }

    protected function getMethod($method)
    {
        if (in_array($method, ['get', 'post', 'put', 'patch', 'delete'])) {
            return strtoupper($method);
        } else {
            throw new \Exception('Undefined method exception');
        }
    }

    protected function getOptions()
    {
        if ('get' === $this->method) {
            $this->options = [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-type' => 'application/json',
                ],
            ];
        }
        if ('create' === $this->method) {
            $this->options = [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-type' => 'application/json',
                ],
                'json' => $this->data,
            ];
        }
        return $this->options;
    }

    protected function setApiUrl($url, $arguments)
    {
        preg_match_all('/{(.+?)}/', $url, $matches);

        $matchCount = count($matches[0]);

        if (! $matchCount) {
            return $url;
        }

        $argumentCount = count($arguments);

        if ($argumentCount < $matchCount) {
            return preg_replace('/{.*?}/', 0, $url);
        }

        $newUrl = str_replace($matches[0][0], $arguments[$argumentCount - $matchCount], $url);

        return $this->setApiUrl($newUrl, $arguments);
    }

    protected function parseToArray($json)
    {
        return json_decode($json, true);
    }

    protected function setMethod($method)
    {
        return strtolower(Arr::first(Str::ucsplit($method)));
    }

    protected function setSnakeCase($str)
    {
        return strtoupper(Str::snake($str));
    }

    protected function getConstValue($const, $modifier = "static")
    {
        if (defined($modifier."::".$const)) {
            return constant($modifier."::".$const);
        } else {
            throw new UndefinedConstantException();
        }
    }

    private function setOpenAttributes($name, $prefix, $arguments)
    {
        $removedPrefix = substr($name, strlen($this->prefix));
        $snakeCase = $this->setSnakeCase($removedPrefix);
        $this->method = $this->setMethod($removedPrefix);
        $url = $this->getConstValue("{$prefix}OPEN_BASE_URL", "self");
        $url .= $this->getConstValue($snakeCase);
        $this->apiUrl = $this->setApiUrl($url, $arguments);
        $this->type = 'open';
    }

    private function setCertificateAttributes($name, $prefix, $arguments)
    {
        $snakeCase = $this->setSnakeCase($name);
        $url = $this->getConstValue("{$prefix}CERTIFICATE_BASE_URL", "self");
        $url .= $this->getConstValue($snakeCase);
        $this->apiUrl = $this->setApiUrl($url, $arguments);
        $this->method = $this->setMethod($name);
        $this->type = 'certificate';
    }

    private function isLive()
    {
        return config('ssgwsg.livemode');
    }
}
