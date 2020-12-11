# Magento2 Developer Extension

This module is used to support the developer Browser extension for Magento 2.
This module is installable via `Composer`.

## Installation

### Add repository

```
"repositories": {
        "BrowserExt": {
            "type": "vcs",
            "url": "git@github.com:IncognitoGeeks/m2-module-igeeks-browser-ext.git"
        }
    }
```

### Install the module

``composer require igeeks/m2-module-igeeks-browser-ext:dev-master --dev``

## Using the module

This module will enable developers to execute magento commands from browser

```
bin/magento module:enable IncognitoGeeks_BrowserExt
bin/magento setup:upgrade
```

## Usage

Use this by installing chrome/Firefox extension [By Clicking here!](https://github.com/IncognitoGeeks/m2-dev-browser-ext)

## Note

This module is meant for developers, do not use this module in higher environment.

## Feedback

[Submit feedback](https://docs.google.com/forms/d/e/1FAIpQLScy4YFGFdNUtaYKDWZIsGWZte_SFZVxXdpDeKhqf8RP_sE2fw/viewform)

