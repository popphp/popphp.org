# popphp.org — v7 front-end handoff

Alpine + Tailwind implementation of the approved design. Drop these files into the
`dev-v7` branch of `popphp/popphp.org`; paths below mirror the repo exactly.

## What lands where

| File | Status | Notes |
|---|---|---|
| `app/config/app.http.php` | **replaces** existing | Adds a `get` route per page; keeps `/api[/]`, the `*` fallback and `http_options_headers` |
| `app/config/components.php` | new | Component catalog for `/components` — the only file to edit when a component is added |
| `app/src/Http/Controller/IndexController.php` | **replaces** existing | Adds `whyPop`, `features`, `components`, `getStarted`; `index`/`error`/`maintenance` keep their existing behavior |
| `app/assets/css/app.css` | **replaces** existing | Tailwind v4 `@theme` tokens + semantic surfaces; keeps `@custom-variant dark` |
| `app/assets/js/app.js` | **replaces** existing | Keeps the Alpine bootstrap, adds four `Alpine.data()` components |
| `app/view/*.phtml` | new | One view per route, plus `error` and `maintenance` |
| `app/view/partials/*.phtml` | new | `head`, `nav`, `footer`, `install-bar`, `icon-github` |

No new Composer or npm dependencies. `npm run build` output paths are unchanged.

## Routing

Option A, as agreed: one route entry and one controller action per page. The route
table is the sitemap. `renderPage()` in the controller is a 4-line helper —
template, title, nav key.

`AbstractController` is untouched; views resolve from its existing `$viewPath`.

## Views

Plain PHP includes, no layout engine:

```php
<?php include __DIR__ . '/partials/head.phtml'; ?>
<?php include __DIR__ . '/partials/nav.phtml'; ?>
...
<?php include __DIR__ . '/partials/footer.phtml'; ?>
```

`head.phtml` opens `<html>`/`<body>`; `footer.phtml` closes them.

View data is assigned on the controller (`$this->view->page = 'features'`) and read
in the template as a **plain local** (`$page`) — not `$this->page`. Included
partials inherit that scope, so `nav.phtml` reads `$page` directly.

Variables in play: `$title` (head), `$page` (nav active state), `$components`
(components page), `$code` (error page).

## Theming

Light is the default. `.dark` on `<html>` flips a set of CSS custom properties
(`--surface-*`, `--syntax-*`) exposed to Tailwind via `@theme inline`, so classes
read `bg-bg`, `text-muted`, `border-line`, `bg-code`, `text-kw`.

An inline script in `head.phtml` applies the stored mode **before first paint** —
no flash. Alpine's `theme` component owns the toggle and persists to
`localStorage['pop-theme']`.

## Alpine components

| Name | Used on | Purpose |
|---|---|---|
| `theme` | nav (desktop + mobile) | Color mode toggle + persistence |
| `nav` | header | Mobile drawer open/close |
| `componentFilter` | `/components` | Band filter; `all` is the default |
| `copyable(text)` | install bars, terminal | Clipboard copy with a `copied` state |

## Responsive

Mobile-first; `lg:` is the desktop breakpoint. The design was drawn at 390px and
1280px — those are the two widths to check first.

## Accessibility

- `:focus-visible` outline in the brand orange on every interactive element
- `prefers-reduced-motion` disables smooth scroll and transitions
- Mobile menu button carries `aria-expanded` / `aria-controls`
- Active nav item carries `aria-current="page"`
- `.no-js` class is removed by the head script, so `[x-cloak]` content is not trapped

## Open items

1. **Discord and X URLs are placeholders** (`discord.gg/popphp`, `x.com/popphp`) —
   in `app/view/partials/footer.phtml` and `index.phtml`.
2. **Docs links** all point at `https://docs.popphp.org` root; deep links once the
   docs site has stable paths.
3. **The homepage "See it for yourself" fluent-routing sample** shows
   `$app->get(...)->post(...)`. Confirm that still matches v7 after the recent
   `popphp` changes.
4. **`/api[/]` still routes to `index`** — unchanged from the current branch, but
   worth deciding whether the marketing site should expose it at all.
