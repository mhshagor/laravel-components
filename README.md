# MHShagor Laravel Components

A comprehensive Laravel component library that provides reusable Blade UI components including forms, modals, tables, toggles, file picker, and shared CSS/JS assets with demo templates.

This package is designed to be published into your application's `resources/` folder, allowing you to **customize Blade views, JavaScript, and CSS** according to your specific needs.

## Features

- **Modern UI Components**: Pre-built form inputs, modals, tables, and interactive elements
- **Date & Time Pickers**: Integrated Flatpickr-based date/time selection components
- **File Picker**: Advanced file upload component with preview capabilities
- **Modal System**: Ready-to-use modal dialogs for add, edit, and delete operations
- **Dynamic Tables**: Tables with add/remove row functionality
- **Responsive Design**: Mobile-friendly components with Tailwind CSS
- **Fully Customizable**: All assets are publishable and modifiable
- **Performance Optimized**: Minimal JavaScript with efficient event handling

## Requirements

- **PHP**: `^8.0`
- **Laravel**: Compatible with modern Laravel versions (8.x, 9.x, 10.x, 11.x)
- **Node.js**: Required for asset compilation (if using Vite/Laravel Mix)

## Installation

Install the package via Composer:

```bash
composer require mhshagor/laravel-components
```

Laravel's package auto-discovery will register the service provider automatically.

## Quick Start

### 1. Publish Assets

Publish all components and assets in one command:

```bash
php artisan mhshagor:publish-all
```

Or publish specific components:

```bash
# Publish only components
php artisan vendor:publish --tag=components

# Publish only file picker
php artisan vendor:publish --tag=file-picker
```

### 2. Include Assets

Add the CSS and JavaScript to your application:

```javascript
// resources/js/app.js
import "./vendor/components/components.js";
import "./vendor/components/date-time-picker.js";
```

```css
/* resources/css/app.css */
@import "./vendor/components/components.css";
@import "./vendor/components/date-time-picker.css";
```

### 3. Compile Assets

```bash
npm run build
# or
npm run dev
```

## Component Catalog

### Form Components

#### Basic Form Wrapper

```blade
<x-sgd.form url="/submit" method="post">
    <!-- Form content here -->
</x-sgd.form>
```

#### Input Fields

```blade
<!-- Text Input -->
<x-sgd.form.input name="username" placeholder="Enter username" />

<!-- Textarea -->
<x-sgd.form.textarea name="description" placeholder="Description" />

<!-- Select Dropdown -->
<x-sgd.form.select name="country" :options="['US' => 'United States', 'CA' => 'Canada']" />
```

#### Labeled Input Components

```blade
<!-- Input with Label -->
<x-sgd.form.label-input name="email" label="Email Address" />

<!-- Date Picker -->
<x-sgd.form.label-datepicker name="birthdate" label="Birth Date" />

<!-- Date Range -->
<x-sgd.form.label-daterange name="period" label="Select Period" />

<!-- DateTime Picker -->
<x-sgd.form.label-datetimepicker name="event_date" label="Event Date & Time" />

<!-- Time Picker -->
<x-sgd.form.label-timepicker name="start_time" label="Start Time" />

<!-- Time Range -->
<x-sgd.form.label-timerange name="work_hours" label="Work Hours" />
```

#### Buttons

```blade
<x-sgd.form.button type="submit">Submit Form</x-sgd.form.button>
<x-sgd.form.action-button type="button" onclick="handleAction()">Action</x-sgd.form.action-button>
```

### Modal Components

#### Base Modal

```blade
<x-sgd.modal modalId="example-modal">
    <div class="p-6">
        <h3 class="text-lg font-medium">Modal Title</h3>
        <p class="mt-2">Modal content goes here.</p>
        <div class="mt-4">
            <button onclick="closeModal('example-modal')" class="btn btn-secondary">Close</button>
        </div>
    </div>
</x-sgd.modal>
```

#### Specialized Modals

```blade
<!-- Add Modal -->
<x-sgd.modal-add modalId="add-item">
    <!-- Add form content -->
</x-sgd.modal-add>

<!-- Edit Modal -->
<x-sgd.modal-edit modalId="edit-item">
    <!-- Edit form content -->
</x-sgd.modal-edit>

<!-- Delete Modal -->
<x-sgd.modal-delete modalId="delete-item">
    <!-- Delete confirmation content -->
</x-sgd.modal-delete>
```

### Table Components

#### Dynamic Table

```blade
<x-sgd.table id="dynamic-table" :headers="['Name', 'Email', 'Actions']">
    <div class="appendClone">
        <div class="cloneRow">
            <x-sgd.table.tr>
                <x-sgd.table.td>
                    <x-sgd.form.input name="rows[0][name]" />
                </x-sgd.table.td>
                <x-sgd.table.td>
                    <x-sgd.form.input name="rows[0][email]" type="email" />
                </x-sgd.table.td>
                <x-sgd.table.td>
                    <button class="deleteRow text-red-500">Remove</button>
                </x-sgd.table.td>
            </x-sgd.table.tr>
        </div>
    </div>
    <button class="addRow bg-blue-500 text-white px-4 py-2 rounded">Add Row</button>
</x-sgd.table>
```

### Style Components

#### Card Component

```blade
<x-sgd.style.card class="p-6">
    <h3 class="text-xl font-bold mb-4">Card Title</h3>
    <p>Card content goes here.</p>
</x-sgd.style.card>
```

#### Accordion Component

```blade
<x-sgd.style.accordion data-color="#3b82f6">
    <div class="sgd-accordion-item">
        <button class="sgd-accordion-btn" data-default="true">
            Section 1
        </button>
        <div class="sgd-accordion-content">
            <p>Content for section 1...</p>
        </div>
    </div>
    <div class="sgd-accordion-item">
        <button class="sgd-accordion-btn">
            Section 2
        </button>
        <div class="sgd-accordion-content">
            <p>Content for section 2...</p>
        </div>
    </div>
</x-sgd.style.accordion>
```

### Toggle Component

```blade
<x-sgd.toggle label="Enable Notifications" :checked="true" name="notifications" />
```

### File Picker Component

```blade
<x-sgd.form.file-picker
    name="attachments"
    label="Upload Files"
    :multiple="true"
    :max="10"
    accept="image/*,application/pdf"
    preview-type="dropdown"
/>
```

## Published File Structure

After publishing, your resources directory will include:

```
resources/
├── views/
│   ├── components/
│   │   └── sgd/
│   │       ├── form/
│   │       ├── style/
│   │       ├── table/
│   │       ├── modal.blade.php
│   │       ├── modal-add.blade.php
│   │       ├── modal-edit.blade.php
│   │       ├── modal-delete.blade.php
│   │       └── toggle.blade.php
│   └── sgd/
│       ├── accordion.html
│       ├── dynamic-table.html
│       └── file-picker.html
├── js/
│   └── vendor/
│       └── components/
│           ├── components.js
│           └── date-time-picker.js
└── css/
    └── vendor/
        └── components/
            ├── components.css
            └── date-time-picker.css
```

## JavaScript Features

### Dynamic Table Operations

- **Add Rows**: Click elements with `.addRow` class
- **Delete Rows**: Click elements with `.deleteRow` class
- **Auto-reindexing**: Form input names are automatically reindexed when rows are added/removed

### Accordion Functionality

- **Single Open**: Only one accordion item can be open at a time
- **Custom Colors**: Set color using `data-color` attribute
- **Default State**: Use `data-default="true"` to set initial open state

### Date/Time Pickers

The package includes Flatpickr integration for various date/time input types:

- **Date Picker**: `.datePicker`
- **Time Picker**: `.timePicker`
- **DateTime Picker**: `.dateTimePicker`
- **Date Range**: `.dateRange`
- **Time Range**: `.timeRange`

### Modal Management

JavaScript functions for modal control:

```javascript
// Open modal
openModal("modal-id");

// Close modal
closeModal("modal-id");
```

## CSS Classes

### Form Styling

- `.base-input`: Base styling for all input elements
- `.base-button`: Base styling for buttons
- Error states are automatically handled with `.text-red-500`

### Modal Styling

- `.modal-backdrop`: Semi-transparent backdrop
- `.modal-panel`: Modal content container with transitions

### Table Styling

- `.dynamicTable`: Container for dynamic tables
- `.cloneRow`: Row template for cloning
- `.appendClone`: Container for cloned rows
- `.counter`: Row number display

## Customization

### Modifying Components

All published components can be customized:

1. **Blade Views**: Edit files in `resources/views/components/sgd/`
2. **JavaScript**: Modify `resources/js/vendor/components/`
3. **CSS**: Update styles in `resources/css/vendor/components/`

### Adding New Components

1. Create new Blade component in the appropriate folder
2. Add JavaScript functionality to `components.js`
3. Include CSS classes in `components.css`

## Demos

The package includes demo templates accessible after publishing:

- **Accordion Demo**: `resources/views/sgd/accordion.html`
- **Dynamic Table Demo**: `resources/views/sgd/dynamic-table.html`
- **File Picker Demo**: Available via file-picker package

## Troubleshooting

### Common Issues

1. **Date pickers not working**
   - Ensure Flatpickr library is loaded
   - Check browser console for JavaScript errors
   - Verify CSS classes are correctly applied

2. **Modal not opening**
   - Check if modal ID matches the trigger
   - Ensure JavaScript is properly loaded
   - Verify modal elements exist in DOM

3. **Dynamic table issues**
   - Ensure `.addRow` and `.deleteRow` classes are present
   - Check for JavaScript errors in browser console
   - Verify table structure matches expected format

### Browser Compatibility

- **Modern Browsers**: Full support (Chrome, Firefox, Safari, Edge)
- **IE11**: Limited support (some features may not work)
- **Mobile**: Responsive design tested on iOS and Android

## Contributing

We welcome contributions! Please follow these steps:

1. **Fork** the repository
2. **Create** a feature branch (`git checkout -b feature/amazing-feature`)
3. **Commit** your changes (`git commit -m 'Add amazing feature'`)
4. **Push** to the branch (`git push origin feature/amazing-feature`)
5. **Open** a Pull Request

### Development Setup

```bash
# Clone the repository
git clone https://github.com/mhshagor/laravel-components.git

# Install dependencies
composer install
npm install

# Run tests
npm test
```

## Version History

### v1.0.9

- Fixed CSRF protection for all HTTP methods
- Improved language helper with fallback values
- Added Flatpickr availability check
- Fixed CSS comment syntax issues
- Enhanced error handling and logging

### Previous Versions

- See Git commit history for detailed changes

## License

This package is open-sourced software licensed under the **MIT license**.

## Support

For support, please contact:

- **Email**: srq001100@gmail.com
- **GitHub Issues**: [Create an issue](https://github.com/mhshagor/laravel-components/issues)

## Credits

- **Author**: M.H SHAGOR
- **Dependencies**:
  - Flatpickr (Date/Time Picker)
  - Tailwind CSS (Styling)
  - Alpine.js (Interactivity)

---

**Thank you for using MHShagor Laravel Components!**
