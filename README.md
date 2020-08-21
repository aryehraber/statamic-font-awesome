# Font Awesome

**Typeahead search for Font Awesome icons.**

This addon adds a new Fieldtype to the CP making it easy to search and select Font Awesome icons. Additionally, a Tag is provided to make outputting icons inside your templates a breeze. See usage section below for full example.

<img src="https://user-images.githubusercontent.com/5065331/78498702-3514d900-774c-11ea-8633-08643f1b03bd.gif" alt="Font Awesome" width="700">

## Installation

Install the addon via composer:

```
composer require aryehraber/statamic-font-awesome
```

Publish the fieldtype assets & config file:

```
php artisan vendor:publish --provider="AryehRaber\FontAwesome\FontAwesomeServiceProvider"
```

Add your Font Awesome Kit URL to the config (or `.env` file) to get started using the addon.

Get started using a Font Awesome Kit here: https://fontawesome.com/start.

**Important note:** this addon currently only supports the Web Font Kit in the CP. If you would like to use the SVG Kit, please create 2 Kits and use the Web Font version in the above config file, then skip the `{{ font_awesome:kit }}` tag and add your SVG Kit Code to your template manually.

## Usage

**Fieldset**
```yaml
fields:
  -
    handle: feature_list
    field:
      type: grid
      fields:
        -
          handle: text
          field:
            type: text
        -
          handle: icon
          field:
            type: font_awesome
```

**Template**
```html
<head>
    {{ font_awesome:kit }}
</head>
<body>
    <ul class="feature-list">
        {{ feature_list }}
            <li>
                {{ font_awesome:icon }}
                {{ text }}
            </li>
        {{ /feature_list }}
    </ul>
</body>
```

**Rendered HTML**

```html
<head>
    <script src="https://kit.fontawesome.com/[YOUR_KIT_ID_HERE].js" crossorigin="anonymous"></script>
</head>
<body>
    <ul class="feature-list">
        <li>
            <i class="fas fa-file-excel" aria-hidden="true"></i>
            Excel Files
        </li>
        <li>
            <i class="fas fa-search" aria-hidden="true"></i>
            Search
        </li>
        <li>
            <i class="fas fa-bolt" aria-hidden="true"></i>
            Speed
        </li>
    </ul>
</body>
```
