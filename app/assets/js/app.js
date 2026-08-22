import '../css/app.css';
import Alpine from 'alpinejs';

/**
 * Color mode. The <html> class is set by an inline script in the <head>
 * (see partials/head.phtml) so there is no flash before Alpine boots.
 */
Alpine.data('theme', () => ({
    dark: document.documentElement.classList.contains('dark'),

    toggle() {
        this.dark = !this.dark;
        document.documentElement.classList.toggle('dark', this.dark);
        try {
            localStorage.setItem('pop-theme', this.dark ? 'dark' : 'light');
        } catch (e) {
            /* private mode - session-only theme is fine */
        }
    },
}));

/**
 * Mobile nav drawer.
 */
Alpine.data('nav', () => ({
    open: false,

    toggle() {
        this.open = !this.open;
    },

    close() {
        this.open = false;
    },
}));

/**
 * Component band filter on /components. 'all' shows every band.
 */
Alpine.data('componentFilter', () => ({
    band: 'all',

    select(band) {
        this.band = band;
    },

    shows(band) {
        return this.band === 'all' || this.band === band;
    },

    isActive(band) {
        return this.band === band;
    },
}));

/**
 * Write to the clipboard, falling back to execCommand where the async
 * clipboard API is unavailable or blocked (http, older Safari).
 */
async function writeClipboard(text) {
    try {
        await navigator.clipboard.writeText(text);
    } catch (e) {
        const field = document.createElement('textarea');
        field.value = text;
        document.body.appendChild(field);
        field.select();
        document.execCommand('copy');
        document.body.removeChild(field);
    }
}

/**
 * Copy-to-clipboard for install commands.
 */
Alpine.data('copyable', (text) => ({
    text: text,
    copied: false,

    async copy() {
        await writeClipboard(this.text);
        this.copied = true;
        setTimeout(() => { this.copied = false; }, 1800);
    },
}));

/**
 * Copy-to-clipboard for a code window. Copies the window's own <pre> text so
 * the sample is never duplicated into an attribute; shell transcripts set a
 * data-copy override so the prompt and output are left behind.
 */
Alpine.data('copyCode', () => ({
    copied: false,

    async copy() {
        const window = this.$el.closest('.code-window');
        const pre    = window.querySelector('pre');

        await writeClipboard(window.dataset.copy ?? (pre ? pre.textContent : ''));
        this.copied = true;
        setTimeout(() => { this.copied = false; }, 1800);
    },
}));

window.Alpine = Alpine;
Alpine.start();
