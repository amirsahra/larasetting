# Larasetting
## _Larasetting Package for Laravel 9+_

Larasetting is a simple and efficient package for managing settings in Laravel applications. It provides a convenient way to store and retrieve settings using key-value pairs, ensuring data persistence and organization through a dedicated database table.

## Features

- asy-to-use functions: Larasetting simplifies setting management with two main functions: get_setting() and set_setting().
- Flexible handling of settings: Retrieve all settings or a specific setting by key. Filter settings based on their active status for specific retrieval.
- Database-backed persistence: Settings are securely stored in a dedicated database table, ensuring data integrity and persistence across application restarts.

## Installation
Install the package: Use Composer to install the package:

```sh
composer require amirsahra/larasetting
```

Publish configuration: Publish the configuration file to customize settings:

```sh
php artisan vendor:publish --provider="Amirsahra\Larasetting\LarasettingServiceProvider"
```
Customize configuration: Edit the `config/larasetting.php` file to adjust table name and default status for settings.
## Usage

Larasetting provides two primary functions for managing settings:

#### Retrieve a setting

```php
$settingValue = get_setting('site_name');
```
Assign the specified value (MySite) to the setting with the key (site_name). If the setting doesn't exist, create it with the provided value.

#### Examples
Here are examples of how to use Larasetting for setting management:

#### Retrieve all settings
```php
$settings = get_setting();
```
Retrieve all settings from the database, including their values and active statuses.

Filter settings by active status
```php
$activeSettings = get_setting(null, null, true);
```
Retrieve all settings that have the active flag set to true.

#### Create a new setting
```php
set_setting('sms_key', '1234567890');
```
Create a new setting with the key (sms_key) and value (1234567890).

#### Update an existing setting
```php
set_setting('site_name', 'NewSiteName');
```
Update the value of the setting with the key (site_name) to NewSiteName. If the setting doesn't exist, create it with the provided value.

Exceptions
Larasetting throws a SettingRecordNotFoundException exception if a setting is not found and no default value is provided.
## License

MIT