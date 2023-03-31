<?php

namespace Jasonbdaro\Ssgwsg;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Jasonbdaro\Ssgwsg\Exceptions\UndefinedConstantException;

class Ssgwsg
{
    const OPEN_BASE_URL = 'https://public-api.ssg-wsg.sg';
    const TEST_OPEN_BASE_URL = 'https://mock-public-api.ssg-wsg.sg';
    const CERTIFICATE_BASE_URL = 'https://api.ssg-wsg.sg';
    const TEST_CERTIFICATE_BASE_URL = 'https://mock-api.ssg-wsg.sg';

    const GET_COURSE_CATEGORIES = '/courses/categories';
    const GET_COURSE_TAGS = '/courses/tags';
    const GET_COURSE_SUBCATEGORIES = '/courses/categories/{categoryId}/subCategories';
    const GET_COURSE_DETAILS = '/courses/directory/{courseReferenceNumber}';
    const GET_COURSE_RELATED = '/courses/directory/{courseReferenceNumber}/related';
    const GET_COURSES = '/courses/directory';
    const GET_COURSE_AUTOCOMPLETE = '/courses/directory/autocomplete';
    const GET_COURSE_POPULAR = '/courses/directory/popular';
    const GET_COURSE_FEATURED = '/courses/directory/featured';
    const GET_COURSE_BROCHURES = '/courses/brochures';
    const GET_COURSE_ENQUIRIES = '/courses/enquiries';

    protected $client;
    protected $apiUrl;
    protected $method;
    protected $options;
    protected $data;
    protected $prefix = 'open';
    protected $type;

    public function __call($name, $arguments)
    {
        $prefix = config('config.livemode') ? '' : 'TEST_';
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
        try {
            $response = $client->request($this->getMethod($this->method), $this->apiUrl, $this->getOptions());

            $array = $this->parseToArray((string) $response->getBody());

            return $array;
        } catch (ClientException $e) {
            $response = $e->getResponse()->getBody()->getContents();
        }
    }

    protected function getMethod($method)
    {
        switch ($method) {
            case 'get':
                return 'GET';
            case 'create':
                return 'POST';
            case 'update':
                return 'PUT';
            case 'patch':
                return 'PATCH';
            case 'delete':
                return 'DELETE';
            default:
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

    public function getConstValue($const)
    {
        if (defined("self::".$const)) {
            return constant("self::".$const);
        } else {
            throw new UndefinedConstantException();
        }
    }

    private function setOpenAttributes($name, $prefix, $arguments)
    {
        $removedPrefix = substr($name, strlen($this->prefix));
        $snakeCase = $this->setSnakeCase($removedPrefix);
        $this->method = $this->setMethod($removedPrefix);
        $url = $this->getConstValue("{$prefix}OPEN_BASE_URL");
        $url .= $this->getConstValue($snakeCase);
        $this->apiUrl = $this->setApiUrl($url, $arguments);
        $this->type = 'open';
    }

    private function setCertificateAttributes($name, $prefix, $arguments)
    {
        $snakeCase = $this->setSnakeCase($name);
        $url = $this->getConstValue("{$prefix}CERTIFICATE_BASE_URL");
        $url .= $this->getConstValue($snakeCase);
        $this->apiUrl = $this->setApiUrl($url, $arguments);
        $this->method = $this->setMethod($name);
        $this->type = 'certificate';
    }
}
