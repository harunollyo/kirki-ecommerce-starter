const fs = require('fs');
const path = require('path');
const { ZipArchive } = require('archiver');
const { execSync } = require('child_process');

const themeSlug = 'kirki-ecommerce-starter';

// Get theme version from style.css
let themeVersion = '1.0.0';
try {
  const styleCssPath = path.join(__dirname, 'style.css');
  const styleCssContent = fs.readFileSync(styleCssPath, 'utf8');
  const versionMatch = styleCssContent.match(/Version:\s*(.+)/i);
  if (versionMatch) {
    themeVersion = versionMatch[1].trim();
  }
} catch (e) {
  console.warn('Could not read version from style.css, defaulting to 1.0.0');
}

const zipName = `${themeSlug}-v${themeVersion}.zip`;
const outputZipPath = path.join(__dirname, zipName);

// Delete existing zip file if any
if (fs.existsSync(outputZipPath)) {
  fs.unlinkSync(outputZipPath);
}

// Ensure composer dependencies are optimized for production
console.log('Optimizing Composer autoloader...');
try {
  execSync('composer dump-autoload -o --no-dev', { stdio: 'inherit' });
} catch (e) {
  console.warn('Composer dump-autoload failed, proceeding anyway...');
}

// Create a file to stream archive data to.
const output = fs.createWriteStream(outputZipPath);
const archive = new ZipArchive({
  zlib: { level: 9 } // Sets the compression level.
});

output.on('close', function () {
  console.log(`\nSuccessfully created build archive: ${zipName}`);
  console.log(`Total size: ${(archive.pointer() / 1024 / 1024).toFixed(2)} MB`);
});

archive.on('error', function (err) {
  throw err;
});

// pipe archive data to the file
archive.pipe(output);

// Files and folders to exclude (relative to theme root)
const exclusions = [
  '.git',
  '.github',
  '.gitignore',
  '.gitattributes',
  'node_modules',
  'package.json',
  'package-lock.json',
  'composer.json',
  'composer.lock',
  'build.js',
  'phpcs.xml.dist',
  'assets/scss',
  'readme.md',
  zipName,
];

/**
 * Recursively add directory contents to archive, respecting exclusions.
 * 
 * @param {string} dirPath 
 * @param {string} archivePath 
 */
function addDirectoryToArchive(dirPath, archivePath) {
  const items = fs.readdirSync(dirPath);
  for (const item of items) {
    const fullPath = path.join(dirPath, item);
    const relativePath = path.join(archivePath, item);

    // Extract part of the path relative to the theme root slug
    const relativeToRoot = relativePath.substring(themeSlug.length + 1).replace(/\\/g, '/');

    // Check if item matches exclusions or starts with an excluded directory
    const isExcluded = exclusions.some(exclusion => {
      return relativeToRoot === exclusion || relativeToRoot.startsWith(exclusion + '/');
    });

    if (isExcluded) {
      continue;
    }

    const stats = fs.statSync(fullPath);
    if (stats.isDirectory()) {
      addDirectoryToArchive(fullPath, relativePath);
    } else {
      archive.file(fullPath, { name: relativePath });
    }
  }
}

// Start archiving from root
addDirectoryToArchive(__dirname, themeSlug);

// finalize the archive
archive.finalize();
