Curl\ObjCurlRest
===============

Sub-class of ObjCurl with RESTful helper methods

Every helper method (create, read, update, delete and patch) accepts an array of URI and query parameters.
This replaces placeholder in the specified path with its value. All leftovers are interpreted as query parameters. For example:

```php
$curl->path('/item/:item_id.json');
$curl->read(['item_id' => 1234, 'sort' => 'name']);
```

This resolves to `GET /item/1234.json?sort=name`.


* Class name: ObjCurlRest
* Namespace: Curl
* Parent class: [Curl\ObjCurl](Curl-ObjCurl.md)



Constants
----------


### USER_AGENT

    const USER_AGENT = 'PHP ObjCurl/1.0 (+https://github.com/zurborg/libcurl-objcurl-php)'





### DEFAULT_TIMEOUT

    const DEFAULT_TIMEOUT = 30





### FEATURES

    const FEATURES = array('ipv6', 'kerberos4', 'ssl', 'libz')





### SECURE_MAP

    const SECURE_MAP = array('ftp' => 'ftps', 'http' => 'https', 'imap' => 'imaps', 'ldap' => 'ldaps', 'pop3' => 'pop3s', 'smb' => 'smbs', 'smtp' => 'smtps')







Methods
-------


### create

    mixed Curl\ObjCurlRest::create(array<mixed,string> $params)

Create a resource

Performs a POST request

* Visibility: **public**


#### Arguments
* $params **array&lt;mixed,string&gt;** - &lt;p&gt;URI and query parameters&lt;/p&gt;



### read

    mixed Curl\ObjCurlRest::read(array<mixed,string> $params)

Read a resource

Performs a GET request

* Visibility: **public**


#### Arguments
* $params **array&lt;mixed,string&gt;** - &lt;p&gt;URI and query parameters&lt;/p&gt;



### update

    mixed Curl\ObjCurlRest::update(array<mixed,string> $params)

Replace a resource

Performs a PUT request

* Visibility: **public**


#### Arguments
* $params **array&lt;mixed,string&gt;** - &lt;p&gt;URI and query parameters&lt;/p&gt;



### delete

    \Curl\ObjCurl\Response Curl\ObjCurl::delete()

Submit request with DELETE method



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)




### patch

    \Curl\ObjCurl\Response Curl\ObjCurl::patch()

Submit request with PATCH method



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)




### __construct

    mixed Curl\ObjCurl::__construct(string $url)

Instanciates a new object



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $url **string** - &lt;p&gt;An URL to connect to&lt;/p&gt;



### sslopt

    \Curl\ObjCurl Curl\ObjCurl::sslopt(string $key, mixed $val)

Set a SSL option



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $key **string** - &lt;p&gt;Name&lt;/p&gt;
* $val **mixed** - &lt;p&gt;Value&lt;/p&gt;



### ciphers

    \Curl\ObjCurl Curl\ObjCurl::ciphers(array<mixed,string> $list)

Set SSL ciphers



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $list **array&lt;mixed,string&gt;** - &lt;p&gt;List of ciphers&lt;/p&gt;



### certificate

    \Curl\ObjCurl Curl\ObjCurl::certificate(string $file, string $type, string $pass)

Set SSL client certificate



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $file **string** - &lt;p&gt;Filename of certificate&lt;/p&gt;
* $type **string** - &lt;p&gt;Type of certifcate (pem, der, ...)&lt;/p&gt;
* $pass **string** - &lt;p&gt;Passphrase if certificate is encrypted&lt;/p&gt;



### privateKey

    \Curl\ObjCurl Curl\ObjCurl::privateKey(string $file, string $type, string $pass)

Set SSL private key



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $file **string** - &lt;p&gt;Filename of private key&lt;/p&gt;
* $type **string** - &lt;p&gt;Type of private key (pem, der, ...)&lt;/p&gt;
* $pass **string** - &lt;p&gt;Passphrase if private key is encrypted&lt;/p&gt;



### url

    \Curl\ObjCurl Curl\ObjCurl::url(string $url)

Set URL



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $url **string** - &lt;p&gt;Uniform Resource Location&lt;/p&gt;



### scheme

    \Curl\ObjCurl Curl\ObjCurl::scheme(string $scheme)

Set URI scheme



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $scheme **string**



### secure

    \Curl\ObjCurl Curl\ObjCurl::secure()

Force secure variant of URI scheme

Replaces 'http' with 'https' and so on

* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)




### user

    \Curl\ObjCurl Curl\ObjCurl::user(string $user)

Set user-part of URI

This the @user part before the hostname of an URI

* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $user **string**



### host

    \Curl\ObjCurl Curl\ObjCurl::host(string $host)

Set host-part of URI



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $host **string**



### port

    \Curl\ObjCurl Curl\ObjCurl::port(integer $port)

Set port of URI



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $port **integer**



### path

    \Curl\ObjCurl Curl\ObjCurl::path(string $path)

Set path of URI



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $path **string**



### fragment

    \Curl\ObjCurl Curl\ObjCurl::fragment(\Curl\string $fragment)

Set path of URI



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $fragment **Curl\string**



### timeout

    \Curl\ObjCurl Curl\ObjCurl::timeout(float $seconds)

Set timeout in seconds

If supported by cURL, fractional seconds are allowed. Otherwise the value will be truncated and interpreted as an integer

* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $seconds **float**



### header

    \Curl\ObjCurl Curl\ObjCurl::header(string $key, string $value)

Set a single header field



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $key **string** - &lt;p&gt;Fancy name of header field&lt;/p&gt;
* $value **string** - &lt;p&gt;Value of header field&lt;/p&gt;



### headers

    \Curl\ObjCurl Curl\ObjCurl::headers(array<mixed,string> $headers)

Set multiple header fields



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $headers **array&lt;mixed,string&gt;**



### accept

    \Curl\ObjCurl Curl\ObjCurl::accept(string $contentType)

Set Accept-header field



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $contentType **string**



### contentType

    \Curl\ObjCurl Curl\ObjCurl::contentType(string $contentType)

Set Content-Type-header field



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $contentType **string**



### query

    \Curl\ObjCurl Curl\ObjCurl::query(string $key, string $value)

Set URL query param field



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $key **string**
* $value **string**



### queries

    \Curl\ObjCurl Curl\ObjCurl::queries(array<mixed,string> $params)

Set URL query param fields at once



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $params **array&lt;mixed,string&gt;**



### basicAuth

    \Curl\ObjCurl Curl\ObjCurl::basicAuth(string $username, string $password)

Set HTTP basic authentication



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $username **string**
* $password **string**



### payload

    \Curl\ObjCurl Curl\ObjCurl::payload(array|object|string $data)

Set raw payload data



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $data **array|object|string** - &lt;p&gt;If not a string, the payload will be transformed by http_build_query()&lt;/p&gt;



### json

    \Curl\ObjCurl Curl\ObjCurl::json(array|object $data, string $contentType)

Encode payload as JSON and set Accept- and Content-Type-headers accordingly



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $data **array|object**
* $contentType **string**



### form

    \Curl\ObjCurl Curl\ObjCurl::form(array<mixed,string> $data)

Encode payload as application/x-www-form-urlencoded



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $data **array&lt;mixed,string&gt;**



### multiform

    \Curl\ObjCurl Curl\ObjCurl::multiform(array<mixed,string> $data)

Encode payload as multipart/form-data



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $data **array&lt;mixed,string&gt;**



### referer

    \Curl\ObjCurl Curl\ObjCurl::referer(string $referer)

Set referer



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $referer **string**



### cookie

    \Curl\ObjCurl Curl\ObjCurl::cookie(string $key, string $value)

Set a single cookie



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $key **string**
* $value **string**



### cookies

    \Curl\ObjCurl Curl\ObjCurl::cookies(array<mixed,string> $cookies)

Set multiple cookies at once



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $cookies **array&lt;mixed,string&gt;**



### head

    \Curl\ObjCurl\Response Curl\ObjCurl::head()

Submit request with HEAD method



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)




### get

    \Curl\ObjCurl\Response Curl\ObjCurl::get()

Submit request with GET method



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)




### post

    \Curl\ObjCurl\Response Curl\ObjCurl::post()

Submit request with POST method



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)




### put

    \Curl\ObjCurl\Response Curl\ObjCurl::put()

Submit request with PUT method



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)




### logger

    \Curl\ObjCurl Curl\ObjCurl::logger(\Psr\Log\AbstractLogger $logger)

Set log engine



* Visibility: **public**
* This method is defined by [Curl\ObjCurl](Curl-ObjCurl.md)


#### Arguments
* $logger **Psr\Log\AbstractLogger**

