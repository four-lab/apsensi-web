// Merge default and provided settings
var isSidebar = document.getElementsByClassName("customizer");
if (isSidebar.length > 0) {
    //****************************
    // Handle Click
    //****************************

    document.addEventListener("DOMContentLoaded", function () {
        //****************************
        // Theme Direction RTL LTR click
        //****************************
        function handleDirection() {
            document
                .getElementById("rtl-layout")
                .addEventListener("click", function () {
                    document.documentElement.setAttribute("dir", "rtl");
                    var offcanvasEnd = document.querySelector(
                        ".customizer.offcanvas-end",
                    );
                    if (offcanvasEnd) {
                        offcanvasEnd.classList.toggle("offcanvas-start");
                        offcanvasEnd.classList.remove("offcanvas-end");
                    }
                });

            document
                .getElementById("ltr-layout")
                .addEventListener("click", function () {
                    document.documentElement.setAttribute("dir", "ltr");
                    var offcanvasStart = document.querySelector(
                        ".customizer.offcanvas-start",
                    );
                    if (offcanvasStart) {
                        offcanvasStart.classList.toggle("offcanvas-end");
                        offcanvasStart.classList.remove("offcanvas-start");
                    }
                });
        }

        handleDirection();

        //****************************
        // Theme Layout Box or Full
        //****************************
        function handleBoxedLayout() {
            const boxedLayout = document.getElementById("boxed-layout");
            const fullLayout = document.getElementById("full-layout");
            const containerFluid =
                document.querySelectorAll(".container-fluid");

            boxedLayout.addEventListener("click", function () {
                containerFluid.forEach(function (element) {
                    element.classList.remove("mw-100");
                });
                this.checked;
                document.documentElement.setAttribute(
                    "data-boxed-layout",
                    "boxed",
                );
            });

            fullLayout.addEventListener("click", function () {
                containerFluid.forEach(function (element) {
                    element.classList.add("mw-100");
                });
                document.documentElement.setAttribute(
                    "data-boxed-layout",
                    "full",
                );
                this.checked;
            });
        }
        handleBoxedLayout();

        //****************************
        // Theme Layout Vertical or horizontal
        //****************************
        function handleLayout() {
            const verticalLayout = document.getElementById("vertical-layout");
            const horizontalLayout =
                document.getElementById("horizontal-layout");

            verticalLayout.addEventListener("click", function () {
                document.documentElement.setAttribute(
                    "data-layout",
                    "vertical",
                );
                this.checked;
            });

            horizontalLayout.addEventListener("click", function () {
                document.documentElement.setAttribute(
                    "data-layout",
                    "horizontal",
                );
                this.checked;
            });
        }
        handleLayout();

        //****************************
        // Theme mode dark or light
        //****************************

        function handleTheme() {
            function setThemeAttributes(
                theme,
                darkDisplay,
                lightDisplay,
                sunDisplay,
                moonDisplay,
            ) {
                document.documentElement.setAttribute("data-bs-theme", theme);
                document.getElementById(`${theme}-layout`).checked = true;

                document
                    .querySelectorAll(`.${darkDisplay}`)
                    .forEach((el) => (el.style.display = "none"));
                document
                    .querySelectorAll(`.${lightDisplay}`)
                    .forEach((el) => (el.style.display = "flex"));
                document
                    .querySelectorAll(`.${sunDisplay}`)
                    .forEach((el) => (el.style.display = "none"));
                document
                    .querySelectorAll(`.${moonDisplay}`)
                    .forEach((el) => (el.style.display = "flex"));
            }

            document.querySelectorAll(".dark-layout").forEach((element) => {
                element.addEventListener("click", () =>
                    setThemeAttributes(
                        "dark",
                        "dark-logo",
                        "light-logo",
                        "moon",
                        "sun",
                    ),
                );
            });

            document.querySelectorAll(".light-layout").forEach((element) => {
                element.addEventListener("click", () =>
                    setThemeAttributes(
                        "light",
                        "light-logo",
                        "dark-logo",
                        "sun",
                        "moon",
                    ),
                );
            });
        }
        handleTheme();
        //****************************
        // Theme card with border or shadow
        //****************************
        function handleCardLayout() {
            function setCardAttribute(cardType) {
                document.documentElement.setAttribute("data-card", cardType);
            }

            document
                .getElementById("card-with-border")
                .addEventListener("click", () => setCardAttribute("border"));
            document
                .getElementById("card-without-border")
                .addEventListener("click", () => setCardAttribute("shadow"));
        }
        handleCardLayout();

        //****************************
        // Theme sidebar
        //****************************
        function handleSidebarToggle() {
            function setSidebarType(sidebarType) {
                document.body.setAttribute("data-sidebartype", sidebarType);
            }

            document
                .getElementById("full-sidebar")
                .addEventListener("click", () => setSidebarType("full"));
            document
                .getElementById("mini-sidebar")
                .addEventListener("click", () =>
                    setSidebarType("mini-sidebar"),
                );
        }
        handleSidebarToggle();
        //****************************
        // Toggle sidebar
        //****************************
        function handleSidebar() {
            document
                .querySelectorAll(".sidebartoggler")
                .forEach(function (element) {
                    element.addEventListener("click", function () {
                        document
                            .querySelectorAll(".sidebartoggler")
                            .forEach(function (el) {
                                el.checked = true;
                            });
                        document
                            .getElementById("main-wrapper")
                            .classList.toggle("show-sidebar");
                        document
                            .querySelectorAll(".sidebarmenu")
                            .forEach(function (el) {
                                el.classList.toggle("close");
                            });
                        var dataTheme =
                            document.body.getAttribute("data-sidebartype");
                        if (dataTheme === "full") {
                            document.body.setAttribute(
                                "data-sidebartype",
                                "mini-sidebar",
                            );
                        } else {
                            document.body.setAttribute(
                                "data-sidebartype",
                                "full",
                            );
                        }
                    });
                });
        }

        //****************************
        // Theme Onload Toast
        //****************************
        window.addEventListener("load", () => {
            let myAlert = document.querySelectorAll(".toast")[0];
            if (myAlert) {
                let bsAlert = new bootstrap.Toast(myAlert);
                bsAlert.show();
            }
        });

        handleSidebar();
    });
}
