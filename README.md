# Larasetting
## _Larasetting Package for Laravel 9+_

Larasetting is a simple and efficient package for managing settings in Laravel applications. It provides a convenient way to store and retrieve settings using key-value pairs, ensuring data persistence and organization through a dedicated database table.

## Features

- asy-to-use functions: Larasetting simplifies setting management with two main functions: get_setting() and set_setting().
- Flexible handling of settings: Retrieve all settings or a specific setting by key. Filter settings based on their active status for specific retrieval.
- Database-backed persistence: Settings are securely stored in a dedicated database table, ensuring data integrity and persistence across application restarts.

## Installation
Install the package : Use Composer to install the package:

```sh
composer require amirsahra/larasetting
```

Add the following class to the providers array in config/app.php
```sh
Amirsahra\Larasetting\LarasettingServiceProvider::class,
```
And aliases
```sh
'Larasetting' => Amirsahra\Larasetting\Facades\Larasetting::class
```

Publish configuration: Publish the configuration file to customize settings:
```sh
php artisan vendor:publish --provider="Amirsahra\Larasetting\LarasettingServiceProvider"
```

Customize configuration: Edit the `config/larasetting.php` file to adjust table name and default status for settings.
## Usage
This package has a facade and a helper and you can use any one you want. In the following, we will explain both methods

Larasetting provides two primary functions for managing settings:
```php
// facade
getSetting('key','vlue','is_active');
setSetting('key','vlue','is_active');

// helper
get_setting('key','vlue','is_active');
set_setting('key','vlue','is_active');
```

### Using helpers functions
#### Get setting
Below are examples of how to use auxiliary methods to receive settings
```php
/*   Get all setting  */
get_setting(); // Get all values that are active or inactive
get_setting(null, null, true); // Get all values that are active 
get_setting(null, null, false); // Get all values that are inactive

/*   Get by setting key  */
// Get the value of the `key_name` key that is enabled or disabled
get_setting('key_name'); 

// Get the value of the `key_name` key if it is active
get_setting('key_name', null, true); 

// Get the value of the `key_name` key if it is inactive
get_setting('key_name', null, false);

// Gets the value of the key_name key that is active or inactive,
// If it doesn't exist, sets it to these values.
// It is inactive by default
get_setting('key_name', 'default', null); 
```
#### Set setting
Below are examples of how to use auxiliary methods to save settings
```php
set_setting(); // If the method is used without parameters, it will give an error

// At least two parameters, key and value, are required to create a setting,
// and its value is_active by default, which is equal to false
set_setting('key_name', 'vlue'); 

// If the key_name value already exists, it acts as an update and the value value is updated.
// It means that our setting will be updated
get_setting('key_name', 'new_value', true); 
```


### Using Facade
#### Get setting
Below are examples of how to use auxiliary methods to receive settings
```php
/*   Get all setting  */
Larasetting::getSetting(); // Get all values that are active or inactive
Larasetting::getSetting(null, null, true); // Get all values that are active 
Larasetting::getSetting(null, null, false); // Get all values that are inactive

/*   Get by setting key  */
// Get the value of the `key_name` key that is enabled or disabled
Larasetting::getSetting('key_name'); 

// Get the value of the `key_name` key if it is active
Larasetting::getSetting('key_name', null, true); 

// Get the value of the `key_name` key if it is inactive
Larasetting::getSetting('key_name', null, false);

// Gets the value of the key_name key that is active or inactive,
// If it doesn't exist, sets it to these values.
// It is inactive by default
Larasetting::getSetting('key_name', 'default', null); 
```
#### Set setting
Below are examples of how to use auxiliary methods to save settings
```php
Larasetting::getSetting(); // If the method is used without parameters, it will give an error

// At least two parameters, key and value, are required to create a setting,
// and its value is_active by default, which is equal to false
Larasetting::getSetting('key_name', 'vlue'); 

// If the key_name value already exists, it acts as an update and the value value is updated.
// It means that our setting will be updated
Larasetting::getSetting('key_name', 'new_value', true); 
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
