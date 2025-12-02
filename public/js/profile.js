function toggleProfileMenu() {
    document.getElementById("profileDropdown").classList.toggle("show");
}

document.addEventListener("click", function(e) {
    const dropdown = document.getElementById("profileDropdown");
    const wrapper = document.querySelector(".profile-menu-wrapper");

    if (!wrapper.contains(e.target)) {
        dropdown.classList.remove("show");
    }
});
