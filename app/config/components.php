<?php
/**
 * Component catalog for the /components page.
 *
 * Bands render in this order; components render in the order listed.
 * Adding a component here is the only edit needed - counts are derived.
 */

return [
    [
        'key'   => 'core',
        'title' => 'Core & application',
        'items' => [
            ['popphp',        'The framework core &mdash; application, router, controllers, services, events and more.'],
            ['pop-kettle',    'The CLI companion that scaffolds, migrates and manages your app.'],
            ['pop-console',   'Build console applications &mdash; with commands, prompts, colored output and more.'],
            ['pop-utils',     'Shared helpers &mdash; strings, arrays, callables and more.'],
            ['pop-config',    'Configuration objects from a variety of supported formats.'],
            ['pop-code',      'Generate PHP code programmatically, or reflect over existing code.'],
            ['pop-debug',     'A debugger with storage handlers for file, database, HTTP and logs.'],
        ],
    ],
    [
        'key'   => 'http',
        'title' => 'HTTP, API & security',
        'items' => [
            ['pop-http',      'Client and server functionality &mdash; requests, responses, file uploads and promises.'],
            ['pop-session',   'Session management &mdash; includes namespaces plus request-based and time-based controls.'],
            ['pop-auth',      'Authentication and authorization, against a database or an HTTP service.'],
            ['pop-acl',       'Role-based access control &mdash; roles, resources, permissions, assertions and policies.'],
            ['pop-crypt',     'Password hashing and encryption over OpenSSL, Sodium, bcrypt and more.'],
            ['pop-cookie',    'Cookie management with a clean API.'],
            ['pop-mime',      'MIME message parsing and building.'],
        ],
    ],
    [
        'key'   => 'data',
        'title' => 'Data',
        'items' => [
            ['pop-db',        'SQL/schema builders, records and migrations &mdash; using MySQL, PostgreSQL, SQLite or SQL Server.'],
            ['pop-audit',     'Application auditing &mdash; send record data changes to a database or an HTTP service.'],
            ['pop-csv',       'Read and write CSV, to and from PHP data.'],
            ['pop-validator', 'Validate values against a composable set of rules.'],
            ['pop-filter',    'Filter and sanitize input data.'],
            ['pop-paginator', 'Paginate result sets and render the controls.'],
            ['pop-parser',    'Parse free-form names and US/CA street addresses into their parts.'],
        ],
    ],
    [
        'key'   => 'views',
        'title' => 'Views & front-end',
        'items' => [
            ['pop-view',      'View rendering with PHP file templates or logic-capable stream templates.'],
            ['pop-form',      'Build, render and validate HTML forms &mdash; ACL compatibility included.'],
            ['pop-nav',       'Generate navigation trees from a config array, complete with ACL support.'],
            ['pop-dom',       'Generate and manipulate the document object model.'],
            ['pop-css',       'Generate and parse CSS, with color handling built in.'],
            ['pop-color',     'Color values and conversion across RGB, CMYK, HSL, Lab, hex and grayscale.'],
            ['pop-i18n',      'Internationalization and localization, with JSON and XML language files.'],
        ],
    ],
    [
        'key'   => 'infra',
        'title' => 'Infrastructure',
        'items' => [
            ['pop-queue',     'Job queues, workers and scheduled tasks &mdash; files, database, Redis or SQS.'],
            ['pop-cache',     'PSR-6 and PSR-16 caching &mdash; files, Redis, Memcached or APCu.'],
            ['pop-log',       'PSR-3 logging, with file, syslog, database, mail and HTTP writers.'],
            ['pop-storage',   'One file API over local disk, AWS S3 and Azure Blob.'],
            ['pop-mail',      'Send and receive mail &mdash; over SMTP or IMAP, or via vendors like Mailgun, SendGrid and Google.'],
            ['pop-dir',       'Directory traversal and file listing.'],
        ],
    ],
    [
        'key'   => 'media',
        'title' => 'Media & documents',
        'items' => [
            ['pop-pdf',       'Create, import and modify PDFs &mdash; with HTML rendering and text extraction.'],
            ['pop-image',     'Resize, crop, convert and adjust images over GD or Imagick.'],
        ],
    ],
];
