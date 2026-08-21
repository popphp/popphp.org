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
 * Copy-to-clipboard for install commands.
 */
Alpine.data('copyable', (text) => ({
    text: text,
    copied: false,

    async copy() {
        try {
            await navigator.clipboard.writeText(this.text);
        } catch (e) {
            const field = document.createElement('textarea');
            field.value = this.text;
            document.body.appendChild(field);
            field.select();
            document.execCommand('copy');
            document.body.removeChild(field);
        }
        this.copied = true;
        setTimeout(() => { this.copied = false; }, 1800);
    },
}));

window.Alpine = Alpine;
Alpine.start();
