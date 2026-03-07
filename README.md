# MHShagor Laravel Components

A Laravel component library that ships with reusable Blade UI components (forms, modals, tables, toggles), a File Picker component, shared CSS/JS assets, and demo templates.

This repository is designed to be published into your application’s `resources/` folder so you can **customize the Blade views, JavaScript, and CSS** as you need.

---

## Requirements

- **PHP**: `^8.0`
- **Laravel**: Works with modern Laravel versions (the package uses standard Blade components + vendor publishing).

---

## Installation

```bash
composer require mhshagor/laravel-components
```

Laravel package auto-discovery will register the service provider automatically.

---

## Publishing (Assets & Views)

This package publishes multiple sets of files using `vendor:publish` tags.

- **Publish everything**

```bash
php artisan mhshagor:publish-all
```

- **Publish only the File Picker package**

```bash
php artisan vendor:publish --tag=file-picker
```

- **Publish only the shared Blade components + common assets**

```bash
php artisan vendor:publish --tag=components
```

### Published paths (current package behavior)

When you publish, files will be copied into the following locations:

- **Blade components**

```
resources/views/components/
└── sgd/
    ├── form/
    ├── style/
    ├── table/
    ├── modal.blade.php
    ├── modal-add.blade.php
    ├── modal-edit.blade.php
    ├── modal-delete.blade.php
    └── toggle.blade.php
```

- **JavaScript assets**

```
resources/js/sgd/
├── components.js
└── file-picker.js
└── date-time-picker.js
```

- **CSS assets**

```
resources/css/sgd/
├── components.css
└── file-picker.css
└── date-time-picker.css
```

- **Demo templates**

```
resources/views/sgd/
├── accordion.html
├── dynamic-table.html
└── file-picker.html
```

`file-picker.html` is also published explicitly by the **`file-picker`** publish tag.

Notes:
- Publishing will **copy** files into your app. If a destination already exists, Laravel may overwrite based on publish behavior and filesystem state.
- This package organizes assets under the `sgd` folder to reduce collisions.

---

## Using the Components

All Blade components are available under the `sgd` namespace.

Example:

```blade
<x-sgd.toggle label="Enable notifications" :checked="true" />
```

---

## Component Catalog

Below is a list of what this repository currently ships (based on the folder structure).

### Form Components (`resources/views/components/sgd/form`)

- **`<x-sgd.form />`**
  - Wrapper form component supporting method spoofing (`PUT`, `PATCH`, `DELETE`) and CSRF.
- **Inputs**
  - `<x-sgd.form.input />`
  - `<x-sgd.form.textarea />`
  - `<x-sgd.form.select />`
- **Label + Input composites**
  - `<x-sgd.form.label />`
  - `<x-sgd.form.label-input />`
  - `<x-sgd.form.label-select />`
  - `<x-sgd.form.label-textarea />`
- **Date & time pickers (UI hooks via CSS classes)**
  - `<x-sgd.form.label-datepicker />` (`datePicker`)
  - `<x-sgd.form.label-daterange />` (`dateRange`)
  - `<x-sgd.form.label-datetimepicker />` (`dateTimePicker`)
  - `<x-sgd.form.label-timepicker />` (`timePicker`)
  - `<x-sgd.form.label-timerange />` (`timeRange`)
- **Buttons & icons**
  - `<x-sgd.form.button />`
  - `<x-sgd.form.action-button />`
  - `<x-sgd.form.icon />`
- **File Picker (Blade wrapper)**
  - `<x-sgd.form.file-picker />`

### Modal Components (`resources/views/components/sgd`)

- **`<x-sgd.modal />`** base modal layout
- **`<x-sgd.modal-add />`**
- **`<x-sgd.modal-edit />`**
- **`<x-sgd.modal-delete />`**

### Table Components (`resources/views/components/sgd/table`)

- `<x-sgd.table.index />`
- `<x-sgd.table.thead />`
- `<x-sgd.table.tbody />`
- `<x-sgd.table.tr />`
- `<x-sgd.table.td />`

### Style Components (`resources/views/components/sgd/style`)

- `<x-sgd.style.card />`
- `<x-sgd.style.accordion />`
- `<x-sgd.style.dynamic-table />`

### Misc

- `<x-sgd.toggle />`

---

## File Picker Package

This repository includes a dedicated File Picker module in `file-picker/`:

- **Blade component**: `file-picker/components/file-picker.blade.php`
- **JS**: `file-picker/js/file-picker.js`
- **CSS**: `file-picker/css/file-picker.css`
- **Demo**: `demo/file-picker.html`

Usage example:

```blade
<x-sgd.form.file-picker
    name="attachments"
    label="Attachments"
    :multiple="true"
    :max="10"
    type="file"
    preview-type="dropdown"
/>
```

---

## Frontend Setup

After publishing, import the JS/CSS in your app.

### JavaScript (Vite / Laravel Mix)

```js
// resources/js/app.js
import "./sgd/components.js";
import "./sgd/file-picker.js";
import "./sgd/date-time-picker.js";
```

### CSS

```css
/* resources/css/app.css */
@import "./sgd/components.css";
@import "./sgd/file-picker.css";
@import "./sgd/date-time-picker.css";
```

---

## Demos

This repository includes demo HTML templates in `demo/`:

- `demo/accordion.html`
- `demo/dynamic-table.html`
- `demo/file-picker.html`

These are published into `resources/views/sgd/` so you can open/copy them into your application pages.

---

## Customization

Once published, you can freely edit:

- **Blade views**: `resources/views/components/sgd/`
- **JavaScript**: `resources/js/sgd/`
- **CSS**: `resources/css/sgd/`

---

## Contributing

- Fork the repository
- Create a feature branch
- Commit your changes
- Open a Pull Request

---

## License

MIT

---

## Support

Email: `srq001100@gmail.com`