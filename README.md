# laravel-model-export

Easily export Eloquent models in Laravel, GUI ready!

Spoiler alert: a little ranting :)

This Laravel package is born out of my love for, and everyday use of [Voyager](https://github.com/the-control-group/voyager). There are times that I need to move/copy some of my Voyager-managed Eloquent data for use on some other third-party platform/share with client. Sometimes too I give client access to download their data in Excel. Hence the need for a cross-platform or a more ubiquitous format of my data (this makes existing tools like [iseed](https://github.com/orangehill/iseed) to not be very useful in this case, since these tools is focused on sql-sql porting). Therefore, this package may become obsolete the very day we can filter and download eloquent models directly from Voyager.

Needless to say, **this package is not Voyager-dependent nor is it tightly coupled with Voyager**. It simply a Laravel package that provides the ability to export Eloquent models based on selected range.

# Installation
`composer require damms005/laravel-model-export`

# Usage
After installation, the `laravel-model-export` url is registered to your routes. So visit: `http://yourwebsite.com/laravel-model-export`

# Todo:

- Write unit and feature tests
- Allow for filtering of columns to include in download
- Improve UI such that html controls will be rendered based on Model type (mysql_date=>html_datepicker_tag, mysql_int=>html_number_tag, etc...)
- Add support for other export options (CSV, HTML, PDF, etc...)
