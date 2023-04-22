import "./bootstrap";
/**
 * Template Name: NiceAdmin
 * Updated: Mar 09 2023 with Bootstrap v5.2.3
 * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */
(function () {
    "use strict";

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim();
        if (all) {
            return [...document.querySelectorAll(el)];
        } else {
            return document.querySelector(el);
        }
    };

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        if (all) {
            select(el, all).forEach((e) => e.addEventListener(type, listener));
        } else {
            select(el, all).addEventListener(type, listener);
        }
    };

    /**
     * Easy on scroll event listener
     */
    const onscroll = (el, listener) => {
        el.addEventListener("scroll", listener);
    };

    /**
     * Sidebar toggle
     */
    if (select(".toggle-right-btn")) {
        on("click", ".toggle-right-btn", function (e) {
            select(".main-content").classList.toggle("col-left");
            select(".side-content").classList.toggle("col-hiden");
            select(".toggle-right-btn").classList.toggle("move-right-btn");
            select(".toggle-right-btn").classList.toggle("bi-caret-left-fill");
            select(".toggle-right-btn").classList.toggle("bi-caret-right-fill");
        });
    }
})();
