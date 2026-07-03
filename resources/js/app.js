import "../css/app.css";

import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

import Chart from "chart.js/auto";
window.Chart = Chart;

import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";

window.FullCalendar = {
    Calendar,
    dayGridPlugin,
};

console.log("APP JS BERHASIL DIMUAT");
console.log(window.Chart);
console.log(window.FullCalendar);
