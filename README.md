# laravel-model-export

Easily export Eloquent models in Laravel, GUI ready!

Spoiler alert: a little ranting :)

This Laravel package is born out of my love for and everyday use of [Voyager](https://github.com/the-control-group/voyager), and there are situation when I need to move/copy some of my Voyager-managed Eloquent data for use in some other place - this is not possible as at the time of writing this package. Hence, this package may become obsolete the very day we can filter and download eloquent models directly from Voyager.

Notwithstanding the above rant and perhaps needless to say, **this package is not Voyager-dependent nor is it tightly coupled with Voyager: it simply a Laravel package that provides the ability to export Eloquent models based on selected range**


# Installation
`composer require damms005/laravel-model-export`

# Usage
After installation, visit: `http://localhost/yourwebsite/laravel-model-export`

# Todo:

- Write unit and feature tests
- Allow for filtering of columns to include in download
- Improve UI such that html controls will be rendered based on Model type (mysql_date=>html_datepicker_tag, mysql_int=>html_number_tag, etc...)
- Add support for other export options (CSV, HTML, PDF, etc...)
