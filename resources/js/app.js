import flatpickr from "flatpickr";
import Alpine from "alpinejs";

window.Alpine = Alpine;

window.initFlatpickr = function (refs) {
    const fields = {
        pickupDate: {
            enableTime: false,
            dateFormat: "Y-m-d",
            minDate: "today",
        },
        dropoffDate: {
            enableTime: false,
            dateFormat: "Y-m-d",
            minDate: "today",
        },
        pickupTime: {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
        },
        dropoffTime: {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
        },
        interPickupDate: {
            enableTime: false,
            dateFormat: "Y-m-d",
            minDate: "today",
        },
        interDropoffDate: {
            enableTime: false,
            dateFormat: "Y-m-d",
            minDate: "today",
        },
        interPickupTime: {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
        },
        interDropoffTime: {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
        },
    };

    Object.keys(fields).forEach((key) => {
        if (refs[key]) {
            flatpickr(refs[key], fields[key]);
        }
    });
};

Alpine.start();
