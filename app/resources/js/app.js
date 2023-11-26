import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'
import { copyCode } from './modules/main'

window.Alpine = Alpine

Alpine.plugin(persist)

Alpine.data('copyCode', copyCode)
Alpine.start()

