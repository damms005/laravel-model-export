# laravel-model-export
Easily export Eloquent models in Laravel, GUI ready

Spoiler alert: a little ranting :)

This Laravel package is born out of my love and everyday use of [Voyager](https://github.com/the-control-group/voyager), and there are situation when I need to move/copy some of my Voyager-managed Eloquent data for use in some other place - this is not possible as at the time of writing this package. Hence, this package may become obsolete the very day we can filter and download eloquent models directly from Voyager.

Notwithstanding the above rant and perhaps needless to say, **this package is not Voyager-dependent nor is it tightly coupled with Voyager: it simply provides the ability to export Eloquent models based on selected range**

Todo:
- Write units and feature test
- add support for other export options (CSV, HTML, PDF, etc...)