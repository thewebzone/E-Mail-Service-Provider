# How to add your own language(s)?
It actually is really easy.
1) Copy `en.php`
2) Rename it to: `<country_abbreviation_lowercase>.php`
3) Translate the file.
4) Open `info.php`
5) Add the following line of text to the file:  
```php
$langs["<country_abbreviation_lowercase>"] = "<full_language_name_in_your_language>";
```
_Country abbreviations can be found in ISO 639-1_
___
## Examples (Country abbreviations are according to ISO 639-1)
```php
$langs["de"] = "Deutsch";
$langs["en"] = "English";
$langs["es"] = "Español";
$langs["fr"] = "Français";
$langs["nl"] = "Nederlands";
```
___
