# Orchid Platform and CRUD Repository Knowledge

Based on reading the official GitHub repositories (orchidsoftware/platform and orchidsoftware/crud), here's everything I've learned:

## Orchid Platform (https://github.com/orchidsoftware/platform)

### Overview
- Laravel package for rapid application development of back-office applications, admin/user panels, and dashboards
- Focus on PHP development - avoid spending time on HTML, CSS, or JavaScript
- Build application logic, not admin panels

### Key Features
- **Form Builder** - Prevent reinventing the wheel; Orchid supports many form elements "out of the box" and allows building all kinds of forms quickly
- **Fast Loading Times** - SPA like performance! Transitions can be made without reloading a page (thanks to Hotwire project)
- **Access Permissions & Roles** - Based on user's identity and corresponding role membership
- **Filtering & Sorting** - Eloquent based filtering/sorting approach for quick user filtering/sorting
- **Fast Full-Text Search** - Integrated Laravel Scout based full-text search
- **Multiple Notification Types** - Various types of notifications to keep users informed
- **Community Driven** - Actively includes community feedback in development

### Commands
- `php artisan orchid:` - List all Orchid-related commands
- `php artisan orchid:resource` - Create CRUD Resource for models
- `php artisan orchid:screen` - Create screen

### Quick Start
- Focus on PHP development
- Try the quick start guide to kick-start application development
- Forms can be built quickly using the Form Builder

### Licensing
- MIT license

## Orchid CRUD (https://github.com/orchidsoftware/crud)

### Overview
- Package aimed at developers who want to quickly create a user interface for Eloquent models
- Provides CRUD functionality (Create, Read, Update, Delete)
- Can describe the entire process using one file
- When more options are needed, it's easy to switch to using the platform
- All fields, filters, and traits are compatible with the platform

### Key Features
- **Single-file description** - Entire CRUD process can be described in one file
- **Seamless platform switch** - Easy to switch from CRUD to platform when more options are needed
- **Full compatibility** - All fields, filters, and traits are compatible with Orchid platform
- **SoftDeletes support** - Can display and restore deleted models with SoftDeletes
- **Multiple model actions** - Ability to perform actions for multiple models
- **Nested relations support** (in progress) - Support for nested relations when viewing

### Roadmap
- Add setting for displaying and restoring deleted models with Illuminate\Database\Eloquent\SoftDeletes ✓
- Add the ability to perform actions for multiple models ✓
- Support of nested relations when viewing (in progress)

### Usage
- Describe entire CRUD process using one file
- Compatible with Orchid platform - can switch between them easily
- Works with Eloquent models

### Communication
- Discussions: https://github.com/orchidsoftware/platform/discussions/new
- Issues: https://github.com/orchidsoftware/crud/issues/new

### Licensing
- Please see License File for more information

## Combined Workflow

### Creating CRUD Resources
1. Use `php artisan orchid:resource` to create a CRUD Resource for models
2. The command generates the form based on the model's fields in the database
3. Can switch to using the platform for more complex needs
4. Add Orchid required traits to the model right after the Orchid CRUD resource is created

### Creating Screens
1. Use `php artisan orchid:screen` to create a screen
2. Screens can display model data with filtering, sorting, and search
3. Can integrate with CRUD functionality

### Best Practices
- Start with CRUD for simple interfaces
- Switch to Platform when more customization is needed
- Both use the same field definitions, filters, and traits
- Forms generated from models can be used in both CRUD and Platform

---
*Knowledge gathered from reading orchidsoftware/platform and orchidsoftware/crud GitHub repositories.*