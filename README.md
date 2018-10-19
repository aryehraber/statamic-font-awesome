# Font Awesome

**Typeahead search for FontAwesome icons.**

*Note: currently only supports FontAwesome v4.7.0*

## Installation

Simply copy the `FontAwesome` folder into `site/addons/`. That's it!

## Usage

**Example Fieldset**
```yaml
fields:
  my_awesome_list:
    type: grid
    fields:
      text:
        type: text
      icon:
        type: font_awesome
```

**View in CP**
![FontAwesome Fieldtype](https://user-images.githubusercontent.com/5065331/27541164-311fbc54-5a83-11e7-9919-ff96de9aa3c4.gif)


---

**Filtering**

When adding a FontAwesome field to a fieldset you can apply filters so that only certain icons are available - the possible categories are listed on the [FontAwesome website](https://fontawesome.com/v4.7.0/icons/). Select a filter under the field 'extras' in the control panel, filters add a `category_filter` option to the data:
```yaml
fields:
  icon:
    type: font_awesome
    category_filter:
      - 'Chart Icons'
      - 'Currency Icons'
```

**Example Template**
```html
<ul class="my-awesome-list">
    {{ my_awesome_list }}
        <li>
            {{ font_awesome:icon }}
            {{ text }}
        </li>
    {{ /my_awesome_list }}
</ul>
```

**Rendered HTML**

```html
<ul class="my-awesome-list">
    <li>
        <i class="fa fa-file-excel-o" aria-hidden="true"></i>
        Excel Files
    </li>
    <li>
        <i class="fa fa-search" aria-hidden="true"></i>
        Search
    </li>
    <li>
        <i class="fa fa-bolt" aria-hidden="true"></i>
        Speed
    </li>
</ul>
```
