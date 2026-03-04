/**
 * Dynamic Table Component
 * Handles add, delete, and reindex operations for table rows
 */
document.addEventListener("DOMContentLoaded", () => {
    function reindexRows(table) {
        table.querySelectorAll(".cloneRow").forEach((row, i) => {
            row.querySelectorAll("[name]").forEach((el) => {
                el.name = el.name.replace(/\[\d+\]/g, `[${i}]`);
            });
            const counter = row.querySelector(".counter");
            if (counter) {
                counter.textContent = i + 1;
            }
        });
    }

    document.addEventListener("click", (e) => {
        /* ADD ROW */
        const addBtn = e.target.closest(".addRow");
        if (addBtn) {
            e.preventDefault();

            const table = addBtn.closest(".dynamicTable");
            const firstRow = table.querySelector(".cloneRow");
            const index = table.querySelector(".counter");
            const container = table.querySelector(".appendClone");
            if (!firstRow || !container) return;

            const clone = firstRow.cloneNode(true);

            /* reset inputs */
            clone.querySelectorAll("input, textarea").forEach((el) => {
                if (el.type === "checkbox" || el.type === "radio") {
                    el.checked = false;
                } else {
                    el.value = "";
                }
            });

            clone.querySelectorAll("select").forEach((el) => {
                el.selectedIndex = 0;
            });

            clone.querySelectorAll("[id]").forEach((el) => {
                el.removeAttribute("id");
            });

            clone.style.opacity = "0";
            clone.style.transition = "all .5s ease";
            clone.style.transform = "translateY(-10px)";

            container.prepend(clone);
            //container.appendChild(clone);

            requestAnimationFrame(() => {
                clone.style.opacity = "1";
                clone.style.transform = "translateY(0)";
            });
            reindexRows(table);
        }

        /* DELETE ROW */
        const delBtn = e.target.closest(".deleteRow");
        if (delBtn) {
            e.preventDefault();

            const table = delBtn.closest(".dynamicTable");
            const rows = table.querySelectorAll(".cloneRow");

            if (rows.length <= 1) {
                alert("At least one row must remain.");
                return;
            }

            const row = delBtn.closest(".cloneRow");

            /* delete animation */
            row.style.transition = "all .5s ease";
            row.style.transform = "translateY(-10px)";
            row.style.opacity = "0";

            setTimeout(() => {
                row.remove();
                reindexRows(table);
            }, 200);
        }
    });
});

/**
 * Initialize all accordions on page
 * @param {string} selector - CSS selector for accordion container
 */

function initAccordions(selector = ".sgd-accordion") {
    document.querySelectorAll(selector).forEach((group) => {
        const color = group.dataset.color ? group.dataset.color : "#d1d5db";

        const items = group.querySelectorAll(".sgd-accordion-item");
        const buttons = group.querySelectorAll(".sgd-accordion-btn");

        // Apply accordion item borders
        items.forEach((item) => {
            item.style.setProperty("border-color", color, "important");
        });

        buttons.forEach((btn) => {
            const item = btn.parentElement;

            // Default open
            if (btn.dataset.default === "true") {
                item.classList.add("open");
            }

            // Apply button background, border, and text color
            btn.style.setProperty("background-color", color, "important");
            btn.style.setProperty("border-color", color, "important");
            btn.style.setProperty(
                "color",
                getContrastColor(color),
                "important",
            );

            // Click toggle: single-open per group
            btn.addEventListener("click", () => {
                items.forEach((i) => {
                    if (i !== item) i.classList.remove("open");
                });
                item.classList.toggle("open");
            });
        });
    });
}

/**
 * Returns either black or white for best contrast
 * Accepts any valid CSS color (named, hex, rgb, hsl)
 * @param {string} color
 * @returns {string} "#000" or "#fff"
 */
function getContrastColor(color) {
    const div = document.createElement("div");
    div.style.color = color;
    document.body.appendChild(div);

    const rgb = getComputedStyle(div).color;
    document.body.removeChild(div);

    const match = rgb.match(/\d+/g);
    if (!match) return "#000";

    const r = parseInt(match[0], 10) / 255;
    const g = parseInt(match[1], 10) / 255;
    const b = parseInt(match[2], 10) / 255;

    const a = [r, g, b].map((v) =>
        v <= 0.03928 ? v / 12.92 : Math.pow((v + 0.055) / 1.055, 2.4),
    );
    const luminance = 0.2126 * a[0] + 0.7152 * a[1] + 0.0722 * a[2];

    return luminance > 0.5 ? "#000" : "#fff";
}

// Initialize on DOM ready
document.addEventListener("DOMContentLoaded", () => initAccordions());


// date time picker
document.addEventListener("DOMContentLoaded", () => {
    /* MAIN FUNCTION */
    function initPicker(selector, defaults) {
        document.querySelectorAll(selector).forEach((el) => {
            if (el._flatpickr) return;

            flatpickr(el, {
                ...defaults,
                dateFormat: el.dataset.format ?? defaults.dateFormat,
                altFormat: el.dataset.alt ?? defaults.altFormat,
                minDate: el.min || null,
                maxDate: el.max || null,
                disable: [
                    {
                        from: el.dataset.disableFrom ?? null,
                        to: el.dataset.disableTo ?? null,
                    },
                ],
            });
        });
    }

    /* TIME RANGE */
    function initTimeRanges(selector, defaults) {
        const allPairs = {};

        // Group inputs by data-pair
        document.querySelectorAll(selector).forEach((el) => {
            const pairId = el.dataset.pair;
            if (!pairId) return;

            if (!allPairs[pairId]) allPairs[pairId] = [];
            allPairs[pairId].push(el);
        });

        // Initialize each pair
        Object.values(allPairs).forEach((pair) => {
            const [startEl, endEl] = pair;
            if (!startEl || !endEl) return;
            if (startEl._flatpickr) return;

            flatpickr(startEl, {
                ...defaults,
                dateFormat: startEl.dataset.format ?? defaults.dateFormat,
                altFormat: startEl.dataset.alt ?? defaults.altFormat,
                onChange(selectedDates) {
                    if (endEl?._flatpickr && selectedDates[0]) {
                        endEl._flatpickr.set("minTime", selectedDates[0]);
                    }
                },
            });

            flatpickr(endEl, {
                ...defaults,
                dateFormat: endEl.dataset.format ?? defaults.dateFormat,
                altFormat: endEl.dataset.alt ?? defaults.altFormat,
                onChange(selectedDates) {
                    if (startEl?._flatpickr && selectedDates[0]) {
                        startEl._flatpickr.set("maxTime", selectedDates[0]);
                    }
                },
            });

            // Optional: sync initial values if pre-filled
            if (startEl.value && endEl.value) {
                endEl._flatpickr.set(
                    "minTime",
                    startEl._flatpickr.selectedDates[0] || null,
                );
                startEl._flatpickr.set(
                    "maxTime",
                    endEl._flatpickr.selectedDates[0] || null,
                );
            }
        });
    }

    /* DATE */
    initPicker(".datePicker", {
        dateFormat: "d/m/Y",
        altFormat: "d/m/Y",
    });

    /* TIME */
    initPicker(".timePicker", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "h:i K",
        altFormat: "h:i K",
    });

    /* DATETIME */
    initPicker(".dateTimePicker", {
        enableTime: true,
        dateFormat: "d/m/Y h:i K",
        altFormat: "d/m/Y h:i K",
    });

    /* DATE RANGE */
    initPicker(".dateRange", {
        mode: "range",
        dateFormat: "d/m/Y",
        altFormat: "d/m/Y",
    });

    /* TIME RANGE */
    initTimeRanges(".timeRange", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "h:i K",
        altFormat: "h:i K",
    });
});