// import './bootstrap';


        // Toggle sidebar for small screens
        const menuButton = document.getElementById("menuButton");
        const sidebar = document.getElementById("sidebar");
        const content = document.getElementById("content");

        menuButton.addEventListener("click", () => {
            sidebar.classList.toggle("-translate-x-full");
            content.classList.toggle("ml-0");
        });

        // Toggle the "More Options" dropdown and icon rotation
        // const moreOptionsToggle = document.getElementById("moreOptionsToggle");
        const moreOptions = document.getElementById("moreOptions");
        const dropdownIcon = document.getElementById("dropdownIcon");

        // moreOptionsToggle.addEventListener("click", () => {
        //     moreOptions.classList.toggle("hidden");
        //     dropdownIcon.classList.toggle("rotate-180");
        // });

        // Show the profile popup when clicked
        const userProfile = document.getElementById("userProfile");
        const profilePopup = document.getElementById("profilePopup");

        userProfile.addEventListener("click", (event) => {
            event.stopPropagation(); // Prevents the event from propagating to document
            profilePopup.classList.toggle("hidden");
            profilePopup.classList.toggle("bottom-20"); // Bring the profile popup on top of the content area
        });

        // Close profile popup when clicking anywhere outside of it
        document.addEventListener('click', (event) => {
            // Check if the click is outside the profile section and profile popup
            if (!userProfile.contains(event.target) && !profilePopup.contains(event.target)) {
                profilePopup.classList.add("hidden");
                profilePopup.classList.remove("bottom-20"); // Reset its position
            }
        });

        // Close sidebar when clicking outside of it
        document.addEventListener('click', (event) => {
            // Check if the click is outside of the sidebar and the menu button
            if (!sidebar.contains(event.target) && !menuButton.contains(event.target)) {
                sidebar.classList.add("-translate-x-full");
                content.classList.remove("ml-0");
            }
        });


        //model Task

        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById("modal");
            const openBtn = document.getElementById("openModal");
            const closeBtns = document.querySelectorAll(".closeModal");
            const overlay = document.getElementById("overlay");

            // Function to open modal
            function openModal() {
                overlay.classList.remove("opacity-0", "hidden");
                overlay.classList.add("opacity-100");

                modal.classList.remove("translate-x-full", "opacity-0");
                modal.classList.add("translate-x-0", "opacity-100");

                // Store modal state in localStorage
                localStorage.setItem("modalOpen", "true");
            }

            // Function to close modal
            function closeModal() {
                overlay.classList.remove("opacity-100");
                overlay.classList.add("opacity-0");

                modal.classList.remove("translate-x-0", "opacity-100");
                modal.classList.add("translate-x-full", "opacity-0");

                setTimeout(() => overlay.classList.add("hidden"), 300); // Delay matches transition

                // Remove modal state from localStorage
                localStorage.setItem("modalOpen", "false");
            }

            // Check modal state on page load
            if (localStorage.getItem("modalOpen") === "true") {
                openModal();
            }

            // Event listeners
            openBtn.addEventListener("click", openModal);
            closeBtns.forEach(btn => btn.addEventListener("click", closeModal));
            overlay.addEventListener("click", closeModal);
        });


