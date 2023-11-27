import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'
import hljs from 'highlight.js/lib/core'
import php from 'highlight.js/lib/languages/php'
import json from 'highlight.js/lib/languages/json'
import bash from 'highlight.js/lib/languages/bash'
import { copyCode } from './modules/main'

window.Alpine = Alpine

Alpine.plugin(persist)

Alpine.store('navigationOpen', false)
Alpine.data('copyCode', copyCode)
Alpine.start()

hljs.registerLanguage('php', php)
hljs.registerLanguage('json', json)
hljs.registerLanguage('bash', bash)
hljs.highlightAll()
