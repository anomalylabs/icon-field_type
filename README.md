# Icon Field Type

*anomaly.field_type.icon*

#### An icon picker field type.

The icon field type provides an icon picker interface for selecting icons from various icon sets.

## Features

- Icon picker with search functionality
- Multiple icon set support (FontAwesome, etc.)
- Visual icon preview
- Searchable icon interface
- Support for custom icon sets
- Configurable display modes
- Database storage optimization

## Configuration

### Basic Configuration

```php
protected $fields = [
    'icon' => [
        'type' => 'anomaly.field_type.icon'
    ]
];
```

### With Specific Icon Set

```php
'menu_icon' => [
    'type'   => 'anomaly.field_type.icon',
    'config' => [
        'icon_sets' => ['fontawesome']
    ]
]
```

### With Search Mode

```php
'icon' => [
    'type'   => 'anomaly.field_type.icon',
    'config' => [
        'mode' => 'search' // or 'dropdown'
    ]
]
```

### With Multiple Icon Sets

```php
'icon' => [
    'type'   => 'anomaly.field_type.icon',
    'config' => [
        'icon_sets' => [
            'fontawesome',
            'custom-icons'
        ]
    ]
]
```

## Usage Examples

### Basic Icon Selection

```php
$stream->create([
    'icon' => 'fa fa-home'
]);
```

### With Validation

```php
protected $fields = [
    'menu_icon' => [
        'type'  => 'anomaly.field_type.icon',
        'rules' => [
            'required'
        ]
    ]
];
```

## Accessing Values

### In Twig Templates

```twig
{# Display icon #}
<i class="{{ entry.icon }}"></i>

{# Display icon with text #}
<span><i class="{{ entry.icon }}"></i> Menu Item</span>

{# Check if icon exists #}
{% if entry.icon %}
    <i class="{{ entry.icon }}"></i>
{% endif %}

{# Display in button #}
<button>
    <i class="{{ entry.icon }}"></i> Click Me
</button>
```

### In PHP

```php
$entry = $model->find(1);

// Get icon class
$iconClass = $entry->icon;

// Use in HTML
echo '<i class="' . $entry->icon . '"></i>';
```

## Setting Values

### In Forms

```php
$form = $builder->make('example.module.test');
$form->on('saving', function(FormBuilder $builder) {
    $entry = $builder->getFormEntry();
    $entry->icon = 'fa fa-star';
});
```

### Direct Assignment

```php
$entry->icon = 'fa fa-cog';
$entry->save();
```

## Database Structure

The icon field type stores icon data as:
- **VARCHAR(255)** - The icon class string (e.g., "fa fa-home")

## Validation

### Required Icon

```php
'icon' => [
    'type'  => 'anomaly.field_type.icon',
    'rules' => [
        'required'
    ]
]
```

## Common Use Cases

### Navigation Menu Icons

```php
'menu_icon' => [
    'type'   => 'anomaly.field_type.icon',
    'config' => [
        'icon_sets' => ['fontawesome'],
        'mode'      => 'search'
    ]
]
```

### Feature Icons

```php
'feature_icon' => [
    'type'   => 'anomaly.field_type.icon',
    'config' => [
        'icon_sets' => ['fontawesome']
    ],
    'rules' => [
        'required'
    ]
]
```

### Category Icons

```php
'category_icon' => [
    'type'   => 'anomaly.field_type.icon',
    'config' => [
        'icon_sets' => ['fontawesome'],
        'mode'      => 'search'
    ]
]
```

### Action Button Icons

```php
'button_icon' => [
    'type'   => 'anomaly.field_type.icon',
    'config' => [
        'icon_sets' => ['fontawesome']
    ]
]
```

## Icon Sets

### FontAwesome (Default)

The field type includes FontAwesome icons by default:

```php
'icon' => [
    'type'   => 'anomaly.field_type.icon',
    'config' => [
        'icon_sets' => ['fontawesome']
    ]
]
```

Common FontAwesome icons:
- `fa fa-home` - Home
- `fa fa-user` - User
- `fa fa-cog` - Settings
- `fa fa-star` - Star
- `fa fa-heart` - Heart
- `fa fa-search` - Search
- `fa fa-check` - Check
- `fa fa-times` - Close

### Custom Icon Sets

You can add custom icon sets by registering them in your theme or addon.

## Best Practices

1. **Use Search Mode**: Enable search mode for better UX with large icon sets
2. **Consistent Icon Set**: Stick to one icon set per project for consistency
3. **Semantic Icons**: Choose icons that represent the content meaningfully
4. **Accessibility**: Include aria-label or sr-only text for screen readers
5. **Size Consistency**: Use consistent icon sizes throughout the UI
6. **Documentation**: Document which icon set is being used
7. **Fallback**: Always have a default icon for empty states

## Requirements

- Streams Platform ^1.10
- PyroCMS 3.10+

## License

The Icon Field Type is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Authors

PyroCMS, Inc. - [https://pyrocms.com](https://pyrocms.com)
Ryan Thompson - [ryan@pyrocms.com](mailto:ryan@pyrocms.com)
