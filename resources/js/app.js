import "./bootstrap";

import Alpine from "alpinejs";
import Swal from "sweetalert2";
import Toastify from "toastify-js";
import "toastify-js/src/toastify.css";

window.Alpine = Alpine;
window.Swal = Swal;
window.Toastify = Toastify;

// Helper for Toast
window.toast = (message, type = "success") => {
    let bgColor = "#10b981";
    if (type === "error") bgColor = "#ef4444";
    if (type === "warning") bgColor = "#f59e0b";

    Toastify({
        text: message,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
            background: bgColor,
            borderRadius: "12px",
            boxShadow:
                "0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)",
        },
        onClick: function () {},
    }).showToast();
};

Alpine.start();
