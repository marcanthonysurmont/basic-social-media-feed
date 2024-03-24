import './bootstrap';

import Alpine from 'alpinejs';

import { Tooltip, initTWE } from 'tw-elements';
initTWE({ Tooltip });
window.Alpine = Alpine;

Alpine.start();
