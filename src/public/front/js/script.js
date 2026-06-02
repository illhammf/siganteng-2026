const hamburger = document.getElementById("hamburger");
const navMenu = document.getElementById("navMenu");

if (hamburger && navMenu) {
    hamburger.addEventListener("click", () => {
        navMenu.classList.toggle("active");
        hamburger.textContent = navMenu.classList.contains("active") ? "×" : "☰";
    });

    document.querySelectorAll(".nav-menu a").forEach((link) => {
        link.addEventListener("click", () => {
            navMenu.classList.remove("active");
            hamburger.textContent = "☰";
        });
    });
}

window.addEventListener("scroll", () => {
    const navbar = document.querySelector(".navbar");

    if (navbar) {
        navbar.classList.toggle("scrolled", window.scrollY > 40);
    }
});

const revealItems = document.querySelectorAll(
    ".section-title, .category-card, .menu-card, .order-card, .payment-card, .step-card, .testimonial-card, .review-wrapper, .contact-wrapper, .stat-card"
);

const revealObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
            }
        });
    },
    {
        threshold: 0.15,
    }
);

revealItems.forEach((item) => {
    item.classList.add("reveal");
    revealObserver.observe(item);
});

document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (event) {
        const targetId = this.getAttribute("href");

        if (targetId.length > 1) {
            const target = document.querySelector(targetId);

            if (target) {
                event.preventDefault();

                target.scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                });
            }
        }
    });
});

const flashMessage = document.querySelector(".flash-message");

if (flashMessage) {
    setTimeout(() => {
        flashMessage.style.opacity = "0";
        flashMessage.style.transform = "translateY(-12px)";

        setTimeout(() => {
            flashMessage.remove();
        }, 400);
    }, 3500);
}

document.querySelectorAll(".review-form, .contact-form").forEach((form) => {
    form.addEventListener("submit", () => {
        const button = form.querySelector("button[type='submit']");

        if (button) {
            button.disabled = true;
            button.textContent = "Mengirim...";
            button.classList.add("loading");
        }
    });
});

const counters = document.querySelectorAll(".stat-card h2");

const counterObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;

            const el = entry.target;
            const originalText = el.textContent.trim();
            const number = parseFloat(originalText.replace(/[^\d.]/g, ""));

            if (isNaN(number)) return;

            let current = 0;
            const duration = 900;
            const stepTime = 16;
            const increment = number / (duration / stepTime);

            const counter = setInterval(() => {
                current += increment;

                if (current >= number) {
                    el.textContent = originalText;
                    clearInterval(counter);
                    return;
                }

                if (originalText.includes(".")) {
                    el.textContent = current.toFixed(1);
                } else {
                    el.textContent = Math.floor(current) + (originalText.includes("+") ? "+" : "");
                }
            }, stepTime);

            counterObserver.unobserve(el);
        });
    },
    {
        threshold: 0.6,
    }
);

counters.forEach((counter) => counterObserver.observe(counter));