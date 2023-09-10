import './bootstrap';

import Alpine from 'alpinejs';
import {
    Datepicker,
    Input,
    initTE
} from "tw-elements";

window.Alpine = Alpine;

Alpine.start();

// Tailwind elements
initTE({
    Datepicker,
    Input
});
