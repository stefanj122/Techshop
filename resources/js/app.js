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
    function loadFiles(e) {
        for (const [index, image] of Object.entries(e.target.files)) {
            const imageTag = document.createElement("img");
            const div = document.createElement("div");
            const input = document.createElement("input");
            div.className = "col-lg-4 product-images";
            imageTag.src = URL.createObjectURL(image);
            // imageTag.width = 400;
            imageTag.className = "m-2 img-thumbnail w-100 create-img";
            input.classList.add("isdefault-btn");
            input.type = "radio";
            input.id = "default";
            new bootstrap.Tooltip(input, {
                placement: "top",
                title: "Set default image",
            });
            input.addEventListener("click", (e) => {
                const allInputs =
                    document.getElementsByClassName("isdefault-btn");
                for (const radio of allInputs) {
                    radio.checked = false;
                }
                e.target.checked = true;
                document.getElementById("isDefault").value = `{"id": ${index}}`;
            });
            div.appendChild(imageTag);
            div.appendChild(input);
            uploadContainer.appendChild(div);
        }
    }
    if (imageUpload) {
        imageUpload.addEventListener("change", loadFiles);
    }
    const isDefaultInput = document.getElementsByClassName("isdefault-btn");
    if (isDefaultInput) {
        for (const input of isDefaultInput) {
            input.addEventListener("click", (e) => {
                const allInputs =
                    document.getElementsByClassName("isdefault-btn");
                for (const radio of allInputs) {
                    radio.checked = false;
                }
                e.target.checked = true;
                document.getElementById("isDefault").value = e.target.value;
            });
        }
    }

    /* const myCarousel = document.getElementById("myCarousel");
    if (myCarousel) {
        myCarousel.carousel({
            interval: 4000,
            wrap: true,
            keyboard: true,
        });
    } */

    const inputCategory = document.getElementById("input-category");
    const listCategory = document.getElementById("list-category");
    async function fetchCategories(value) {
        if (value.length > 1) {
            const response = await axios.get(
                "http://localhost:8001/api/admin/product-category/search?search=" +
                    value,
                {
                    headers: {
                        "Content-Type": "application/json",
                    },
                }
            );
            response.data.forEach((category) => {
                let listItem = document.createElement("li");
                listItem.classList.add("list-group-item");
                listItem.style.cursor = "pointer";
                listItem.addEventListener("mouseenter", function (e) {
                    this.classList.add("active");
                });
                listItem.addEventListener("mouseleave", function () {
                    this.classList.remove("active");
                });
                listItem.addEventListener("click", function () {
                    displayNames(category);
                });
                let word =
                    "<b>" +
                    category.name.substr(0, inputCategory.value.length) +
                    "</b>";
                word += category.name.substr(inputCategory.value.length);
                //display the value in array
                listItem.innerHTML = word;
                listCategory.appendChild(listItem);
                if (value.toLowerCase() === category.name.toLowerCase()) {
                    document.getElementById("input-category-hiden").value =
                        category.id;
                }
            });
        }
    }
    function displayNames(value) {
        inputCategory.value = value.name;
        document.getElementById("input-category-hiden").value = value.id;
        removeElements();
    }
    function removeElements() {
        let items = document.querySelectorAll(".list-group-item");
        items.forEach((item) => {
            item.remove();
        });
    }
    if (inputCategory) {
        let timer;
        inputCategory.addEventListener("keyup", function () {
            clearTimeout(timer);
            timer = setTimeout(() => {
                removeElements();
                fetchCategories(this.value);
            }, 500);
        });
    }

    const deleteCheckbox = document.querySelectorAll(".checkbox-img");
    const formDelete = document.querySelector("#form-deleted");
    if (deleteCheckbox) {
        deleteCheckbox.forEach((item) => {
            item.addEventListener("click", function () {
                const deletedImages = document.createElement("input");
                deletedImages.type = "hidden";
                deletedImages.name = `deletedImages[${item.id}]`;
                deletedImages.value = item.checked;
                formDelete.appendChild(deletedImages);
            });
        });
    }

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
