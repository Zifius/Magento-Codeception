# Magento Codeception Tests

## Implemented Tests

* One Page Checkout

## Contributors (Thanks!)

[Max Uroda](https://github.com/u-maxx)

[Yaroslav Rogoza](https://github.com/rogyar)

## Prerequisites

* Granted [HomeBrew](http://homebrew.sh) and [homebrew-php](https://github.com/Homebrew/homebrew-php#installation) are installed, execute:
    `brew install codeception`
* Selenium:
    `brew install selenium-server-standalone` and optionally `brew install chromedriver` if you want to test with Google Chrome
* PhantomJS:
    `brew install phantomjs`
    
## Configuration

* PhantomJS driver is a headless browser which means it's not suitable for browser environments like `chrome` or `firefox`
* Website URL to tests against is defined in acceptance.suite.yml

## Running tests

* Execute `selenium-server -p 4444` or `phantomjs --webdriver=4444 --ignore-ssl-errors=true` in a separate terminal tab
* Then execute `codecept run acceptance --steps`

See [Running Tests](http://codeception.com/docs/02-GettingStarted#Running-Tests) for detailed info

