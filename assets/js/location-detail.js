    var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

    


    function initLightbox() {

        const images = document.querySelectorAll(".gallery-img");
        const modal = document.getElementById("lightbox-modal");
        const modalImg = modal.querySelector("img");
        const closeBtn = modal.querySelector(".close-btn");
        const nextBtn = modal.querySelector(".next");
        const prevBtn = modal.querySelector(".prev");
        const counter = modal.querySelector(".image-counter");

        let currentIndex = 0;

        function showImage(index) {
            modalImg.src = images[index].dataset.full;
            counter.textContent = (index + 1) + " / " + images.length;
        }

        images.forEach((img, index) => {
            img.addEventListener("click", () => {
                currentIndex = index;
                modal.style.display = "block";
                showImage(index);
            });
        });

        closeBtn.onclick = () => modal.style.display = "none";

        nextBtn.onclick = () => {
            currentIndex = (currentIndex + 1) % images.length;
            showImage(currentIndex);
        };

        prevBtn.onclick = () => {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            showImage(currentIndex);
        };

        document.addEventListener("keydown", (e) => {
            if (modal.style.display === "block") {
                if (e.key === "Escape") modal.style.display = "none";
                if (e.key === "ArrowRight") nextBtn.click();
                if (e.key === "ArrowLeft") prevBtn.click();
            }
        });
    }

    window.dataLayer = window.dataLayer || [];

     function gtag() {
         dataLayer.push(arguments);
     }
     gtag('js', new Date());

     gtag('config', 'G-V0S9GRM6LS');