# Instagram-API  ![compatible](https://img.shields.io/badge/PHP%207-Compatible-brightgreen.svg) 

This is a PHP library which emulates Instagram's Private API. This library is just a start with latest version functions. 

With 2FA(need command line)

**Do you like this project? Support it by donating**

**socialAPIS**

- ![btc](https://raw.githubusercontent.com/reek/anti-adblock-killer/gh-pages/images/bitcoin.png) Bitcoin: bc1qkauwj52rr6pelckjfq4htgjl7jvamkq5lklqca

----------
## Installation
You Need! 

1. Use PHP >= 7
2. [Enabled OpenSSL on PHP](https://www.php.net/manual/de/openssl.installation.php).

### Install this library
We use composer to distribute our code effectively and easily. If you do not already have composer installed, you can download and install it here [here](https://getcomposer.org/download/).

Once you have composer installed, you can do the following:
```sh
composer require socialapis/instagram-api
```

```sh
require __DIR__.'/../vendor/autoload.php';

$ig = new \InstagramFollowers\Instagram();
$loginResponse = $ig->login("username", "password");

or you can grab the last login response by

$loginResponse = $instagram->accountRequest->loginResponse;
```

#### _Warning about moving data to a different server_

_Composer checks your system's capabilities and selects libraries based on your **current** machine (where you are running the `composer` command). So if you run Composer on machine `A` to install this library, it will check machine `A`'s capabilities and will install libraries appropriate for that machine (such as installing the PHP 7+ versions of various libraries). If you then move your whole installation to machine `B` instead, it **will not work** unless machine `B` has the **exact** same capabilities (same or higher PHP version and PHP extensions)! Therefore, you should **always** run the Composer-command on your intended target machine instead of your local machine._


## Access last requests

Your requests are never get lost, they are all kept in memory.
Example:
```
$userInfo = $instagram->usersRequest->getInfoByName($user_pk);
```

you can every time access your last response for this function like this
```
$lastGetInfoResposne = $instagram->usersRequest->getInfoByNameResponse;
$userPK = $lastGetInfoResponse->getUser()->getPk();
```


## Examples

All examples can be found [here](https://github.com/socialAPIS/Instagram-API/tree/master/examples).

## Why did I make this API?

After trying of all on the internet instagram-php-private APIS to grow my instagram account, i needed to build something like this.

### What is Instagram?
According to [the company](https://instagram.com/about/faq/):

> "Instagram is a fun and quirky way to share your life with friends through a series of pictures. Snap a photo with your mobile phone, then choose a filter to transform the image into a memory to keep around forever. We're building Instagram to allow you to experience moments in your friends' lives through pictures as they happen. We imagine a world more connected through photos."

# License

- Reciprocal Public License 1.5 (RPL-1.5): https://opensource.org/licenses/RPL-1.5

# Terms and conditions

- You will NOT use this API for marketing purposes (spam, botting, harassment, massive bulk messaging...).
- We do NOT give support to anyone who wants to use this API to send spam or commit other crimes.
- We reserve the right to block any user of this repository that does not meet these conditions.

## Legal

This code is in no way affiliated with, authorized, maintained, sponsored or endorsed by Instagram or any of its affiliates or subsidiaries. This is an independent and unofficial API. Use at your own risk.
