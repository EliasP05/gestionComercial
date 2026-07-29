import './bootstrap';

import Alpine from 'alpinejs';
import { initVentaEdit } from './ventas-edit';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', initVentaEdit);
