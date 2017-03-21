<?php
/**
 * Object-orientated cURL class for PHP
 *
 * @copyright 2016 David Zurborg
 * @author    David Zurborg <zurborg@cpan.org>
 * @link      https://github.com/zurborg/libcurl-objcurl-php
 * @license   https://opensource.org/licenses/MIT The MIT License
 */
namespace Curl\ObjCurl;

use \Pirate\Hooray\Arr;
use \Sabre\Uri;

/**
 * ObjCurl respsonse class
 */
class Response
{
    /** @internal */
    const EOL = "\r\n";

    /** @internal */
    const SP  = ' ';

    /** @internal */
    const COL = ':';

    use HelperTrait;

    protected $objcurl;
    protected $getinfo = [];
    protected $headers = [];
    protected $payload;
    protected $mime_type = [];
    protected $ID;

    /** @internal */
    public function __construct(\Curl\ObjCurl $objcurl, array $getinfo, array $headers, string $payload = null)
    {
        $this->ID = $objcurl->id();
        $this->objcurl = $objcurl;
        $this->getinfo = $getinfo;
        $this->headers = $headers;
        $this->payload = $payload;
        $type = strtolower(trim($this->header('Content-Type')));
        if (preg_match(
            '/^
                (?<type>
                    [^\/]+
                )
                \/
                (?<subtype>
                    (?:
                        (?<tree> [^\.]+ )
                        \.
                    )?
                    [^\+]+
                )
                (?:
                    \+
                    (?<suffix> [^;]+)
                )?
                (;
                    \s*
                    (?<params> .*)
                )?
            $/xsi',
            $type,
            $match
        )) {
            $this->mime_type = [
                'type'    => Arr::get($match, 'type'),
                'tree'    => Arr::get($match, 'tree'),
                'subtype' => Arr::get($match, 'subtype'),
                'suffix'  => Arr::get($match, 'suffix'),
                'params'  => Arr::get($match, 'params'),
            ];
        }
    }

    /**
     * Unique ID of request
     *
     * @return string UUID
     */
    public function id()
    {
        return $this->ID;
    }

    /**
     * HTTP status code
     *
     * ```php
     * $response->status(1) === 2; // status code is 2xx
     * ```
     *
     * @param  int $digits Number of digits to return
     * @return int
     */
    public function status(int $digits = 3)
    {
        return intval(substr($this->info('http_code'), 0, $digits));
    }

    /**
     * cURL getinfo
     *
     * @param  string $key
     * @param  mixed  $default
     * @return mixed
     */
    public function info(string $key, $default = null)
    {
        return Arr::get($this->getinfo, $key, $default);
    }

    /**
     * cURL getinfo
     *
     * @return array
     */
    public function infos()
    {
        return $this->getinfo;
    }

    /**
     * Return request URI
     *
     * @param string $part `scheme` or `host` or `path` or `port` or `user` or `query` or `fragment`
     * @return mixed array or scalar
     */
    public function url(string $part = null)
    {
        $uri = Uri\parse(Arr::get($this->getinfo, 'url'));
        if (is_null($part)) {
            return $uri;
        } else {
            return Arr::get($uri, $part);
        }
    }

    /**
     * HTTP response header
     *
     * @param  string $key Name of header field
     * @return string
     */
    public function header(string $key)
    {
        $key = strtolower($key);
        return Arr::get($this->headers, $key, null);
    }

    /**
     * Raw response body
     *
     * @return string
     */
    public function payload()
    {
        return $this->payload;
    }

    /**
     * Top-level MIME type
     *
     * @param  string $default
     * @return string
     */
    public function mimeType(string $default = null)
    {
        return Arr::get($this->mime_type, 'type', $default);
    }

    /**
     * MIME subtype
     *
     * @param  string $default
     * @return string
     */
    public function mimeSubType(string $default = null)
    {
        return Arr::get($this->mime_type, 'subtype', $default);
    }

    /**
     * MIME subtree tree
     *
     * @param  string $default
     * @return string
     */
    public function mimeTree(string $default = null)
    {
        return Arr::get($this->mime_type, 'tree', $default);
    }

    /**
     * MIME suffix
     *
     * @param  string $default
     * @return string
     */
    public function mimeSuffix(string $default = null)
    {
        return Arr::get($this->mime_type, 'suffix', $default);
    }

    /**
     * MIME parameters
     *
     * @param  string $default
     * @return string
     */
    public function mimeParams(string $default = null)
    {
        return Arr::get($this->mime_type, 'params', $default);
    }

    /**
     * Condensed MIME content type
     *
     * @param  string $type    Assert or return false
     * @param  string $subtype Assert or return false
     * @return string
     */
    public function contentType(string $type = null, string $subtype = null)
    {
        if (!is_null($type) and $this->mimeType() !== $type) {
            return false;
        }

        if (!is_null($subtype) and $this->mimeSubType() !== $subtype) {
            return false;
        }

        return $this->mimeType() . '/' . $this->mimeSubType();
    }

    /**
     * Decode JSON payload
     *
     * @param  bool $assoc convert objects to associative arrays
     * @return mixed
     */
    public function decodeJSON(bool $assoc = false)
    {
        $json = $this->payload;

        $data = \json_decode($json, $assoc);

        if (\json_last_error() !== JSON_ERROR_NONE) {
            $this->objcurl->_log('warning', \json_last_error_msg(), [ 'curl_payload' => $json ]);
            throw new \RuntimeException(\json_last_error_msg(), \json_last_error());
        }

        return $data;
    }

    /**
     * Decode payload (generic method with auto-detection)
     *
     * Currently only JSON is supported.
     *
     * @param  string $default_type
     * @return mixed
     */
    public function decode(string $default_type = null)
    {
        $type = $this->contentType() or $default_type;
        if (!$type) {
            throw new \RuntimeException("No content type in response header found");
        }

        switch (true) {
            case ($type === 'application/json'):
                return $this->decodeJSON();
        }

        throw new \RuntimeException("Unknown content type in response header: $type");
    }

    /**
     * Returns HTTP response message
     *
     * @return string
     */
    public function __toString()
    {
        $msg = '';
        foreach ($this->headers as $key => $val) {
            $msg .= $key . self::COL . self::SP . $val . self::EOL;
        }
        $msg .= self::EOL;
        return $msg.$this->payload;
    }
}
