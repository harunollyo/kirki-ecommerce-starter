# Kirki Ecommerce Starter Theme

A lightweight WordPress starter theme designed for seamless integration with the **Kirki Ecommerce** plugin. It features a modern directory layout, PSR-4 class autoloading, and an automated Sass compilation and distribution packaging system.

---

## Prerequisites

Before setting up the theme, ensure your development environment has the following installed:

*   **WordPress**: 5.8 or higher
*   **PHP**: 7.4 or higher
*   **Composer**: For managing PHP autoloading and dependencies
*   **Node.js** (v16+) & **NPM**: For compiling assets and packaging the theme

---

## Installation & Setup

Follow these steps to set up the theme locally in your WordPress environment:

### 1. Place the Theme Folder
Clone or copy this folder into the WordPress themes directory:
```bash
wp-content/themes/kirki-ecommerce-starter
```

### 2. Install PHP Dependencies (Autoloader)
Navigate to the theme's root directory in your terminal and install Composer dependencies to generate the PSR-4 autoloader:
```bash
composer install
```
This registers the namespace `Kirki\Ecommerce\Theme\Starter\` pointing to the `src/` directory.

### 3. Install Node.js Dependencies
Install the required development tools (Sass compiler and packaging utility):
```bash
npm install
```

### 4. Compile Assets
Compile the stylesheet for the first time:
```bash
npm run build
```

### 5. Activate the Theme
1. Log in to your WordPress Admin dashboard.
2. Go to **Appearance > Themes**.
3. Locate **Kirki Ecommerce Starter** and click **Activate**.

---

## Development Workflow

### Compile and Watch Stylesheet Changes
For active style development, run the watch script:
```bash
npm run dev
```
This automatically compiles `assets/scss/style.scss` into `assets/css/style.css` whenever any file in the Sass tree is modified.

---

## Production Build & Packaging

To generate a distribution-ready theme package:
```bash
npm run build
```
This script will:
1. Compile and compress the SCSS into `assets/css/style.css` (`--style compressed`).
2. Optimize the Composer autoloader using `--no-dev` and `-o`.
3. Package all production files into a zip archive named `kirki-ecommerce-starter.zip` in the theme root, while excluding development files such as `.git`, `node_modules`, `composer.json`, and raw SCSS assets.

---

## Directory Structure

*   `assets/` — Stylesheets and raw SCSS styles.
    *   `css/` — Target folder for compiled stylesheets.
    *   `scss/` — SCSS source files.
*   `src/` — Theme-specific PHP classes structured via PSR-4 (autoloaded).
    *   `Theme.php` — Singleton theme bootstrap class.
    *   `Setup.php` — WordPress theme setup hook declarations (`after_setup_theme`).
    *   `Scripts.php` — Handles enqueuing theme stylesheets and scripts.
*   `build.js` — Custom Node.js bundler script that generates `kirki-ecommerce-starter.zip`.
*   `style.css` — Standard WordPress theme header file containing metadata.
*   `functions.php` — Loads Composer's autoloader and bootstraps `src/Theme.php`.
