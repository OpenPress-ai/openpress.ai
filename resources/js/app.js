import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Import and initialize ProseMirror
import { initWithDelay as initializeProseMirror } from './prosemirror';
document.addEventListener('DOMContentLoaded', initializeProseMirror);