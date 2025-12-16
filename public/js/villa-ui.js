const reveals = document.querySelectorAll(".reveal");

const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add("active");
                }, i * 120);
            }
        });
    },
    { threshold: 0.15 }
);

reveals.forEach((el) => observer.observe(el));
