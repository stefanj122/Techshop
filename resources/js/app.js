import "./bootstrap";
import axios from "axios";
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
            if (window.innerWidth < 1200) {
                select("body").classList.remove("toggle-sidebar");
            }
        });
    }
    if (select(".toggle-sidebar-btn")) {
        on("click", ".toggle-sidebar-btn", function (e) {
            if (window.innerWidth < 1200) {
                select(".side-content").classList.add("col-hiden");
                select(".toggle-right-btn").classList.remove(
                    "bi-caret-right-fill"
                );
                select(".toggle-right-btn").classList.add("bi-caret-left-fill");
                select(".toggle-right-btn").classList.add("move-right-btn");
                select(".main-content").classList.remove("col-left");
            }
        });
    }
    if (select(".toggle-right-btn")) {
        on("click", ".toggle-right-btn", function (e) {
            select(".main-content").classList.toggle("col-left");
            select(".side-content").classList.toggle("col-hiden");
            select(".toggle-right-btn").classList.toggle("move-right-btn");
            select(".toggle-right-btn").classList.toggle("bi-caret-left-fill");
            select(".toggle-right-btn").classList.toggle("bi-caret-right-fill");
        });
    }
    const alertNode = select(".alert");
    if (alertNode) {
        on(
            "click",
            ".alert",
            function (e) {
                const alert = bootstrap.Alert.getOrCreateInstance(e.target);
                alert.close();
            },
            true
        );
    }
    const imageInput = document.getElementById("avatar");
    function loadFile(e) {
        const image = document.getElementById("output");
        image.src = URL.createObjectURL(e.target.files[0]);
    }
    if (imageInput) {
        imageInput.addEventListener("change", loadFile);
    }

    const uploadContainer = document.getElementById("uploadContainer");
    const imageUpload = document.getElementById("inputGroupFile02");
    function loadFile(e) {
        for (const image of e.target.files) {
            const imageTag = document.createElement("img");
            imageTag.src = URL.createObjectURL(image);
            imageTag.width = 400;
            imageTag.className = "mx-2 img-thumbnail";
            uploadContainer.appendChild(imageTag);
        }
    }
    if (imageUpload) {
        imageUpload.addEventListener("change", loadFile);
    }

    const myCarousel = document.getElementById("myCarousel");
    myCarousel.carousel({
        interval: 4000,
        wrap: true,
        keyboard: true,
    });
    //    const items = document.getElementsByName("horizontal-scrollable");
    //    const horizontalScroll = (e) => {
    //        if (e.deltaY > 0) {
    //            e.currentTarget.scrollLeft += 100;
    //        } else e.currentTarget.scrollLeft -= 100;
    //    };
    //    if (items[0]) {
    //        items.forEach((item) => {
    //            item.addEventListener("touchmove", horizontalScroll);
    //            item.addEventListener("wheel", horizontalScroll);
    //        });
    //    }
})();
