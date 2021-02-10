# laravel-model-export

[![Total Downloads](https://poser.pugx.org/damms005/laravel-model-export/downloads)](//packagist.org/packages/damms005/laravel-model-export) [![License](https://poser.pugx.org/damms005/laravel-model-export/license)](//packagist.org/packages/damms005/laravel-model-export)

![Art image for laravel-model-export](https://banners.beyondco.de/laravel-model-export.png?theme=light&packageManager=composer+require&packageName=damms005%2Flaravel-model-export&pattern=circuitBoard&style=style_1&description=Easily+filter+and+export+Eloquent+models+in+Laravel%2C+GUI+ready&md=1&showWatermark=1&fontSize=100px&images=tag&widths=350)

Easily export Eloquent models in Laravel, GUI ready!

This Laravel package is born out of my love for, and everyday use of [Voyager](https://github.com/the-control-group/voyager). There are times that I need to move/copy some of my Voyager-managed Eloquent data for use on some other third-party platform/share with client. Sometimes too I give client access to download their data in Excel. Voyager does not provide this export feature currently. Therefore, this package may become obsolete the very day we can filter and download eloquent models directly from Voyager.

Needless to say, **this package is not Voyager-dependent nor is it tightly coupled with Voyager**. It simply a Laravel package that provides the ability to export Eloquent models. You can also filter the data before exporting.

# Installation

`composer require damms005/laravel-model-export`

# Usage

After installation, the `/laravel-model-export` url is registered to your routes. So visit: `http://<yourwebsite.com>/laravel-model-export`

# Todo:

- Write unit and feature tests
- Allow for filtering of columns to include in download
- Improve UI such that html controls will be rendered based on Model type (mysql_date=>html_datepicker_tag, mysql_int=>html_number_tag, etc...)
- Add support for other export options (CSV, HTML, PDF, etc...)
