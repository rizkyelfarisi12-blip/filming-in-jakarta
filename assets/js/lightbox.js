(function () {
    const thumbnails = document.querySelectorAll(".thumbnail");
    const modal = document.getElementById("lightbox-modal");
    const modalImage = modal.querySelector("img");
    const closeBtn = modal.querySelector(".close-btn");
    const prevBtn = modal.querySelector(".nav-arrow.prev");
    const nextBtn = modal.querySelector(".nav-arrow.next");
    const counter = modal.querySelector(".image-counter");

    let currentIndex = 0;

    function showModal(index) {
        currentIndex = index;
        const img = thumbnails[currentIndex];
        modalImage.src = img.dataset.full || img.src;
        modalImage.alt = img.alt;
        counter.textContent = `${currentIndex + 1} / ${thumbnails.length}`;
        modal.classList.add("active");
        document.body.style.overflow = "hidden"; // Disable scroll when modal open
    }

    function closeModal() {
        modal.classList.remove("active");
        document.body.style.overflow = ""; // Enable scroll back
    }

    function showNext() {
        currentIndex = (currentIndex + 1) % thumbnails.length;
        showModal(currentIndex);
    }

    function showPrev() {
        currentIndex =
            (currentIndex - 1 + thumbnails.length) % thumbnails.length;
        showModal(currentIndex);
    }

    thumbnails.forEach((thumb, i) => {
        thumb.addEventListener("click", () => showModal(i));
    });

    closeBtn.addEventListener("click", closeModal);

    nextBtn.addEventListener("click", (e) => {
        e.stopPropagation();
        showNext();
    });

    prevBtn.addEventListener("click", (e) => {
        e.stopPropagation();
        showPrev();
    });

    // Close modal if click outside image
    modal.addEventListener("click", (e) => {
        if (e.target === modal) closeModal();
    });

    // Keyboard navigation
    document.addEventListener("keydown", (e) => {
        if (!modal.classList.contains("active")) return;
        if (e.key === "Escape") closeModal();
        else if (e.key === "ArrowRight") showNext();
        else if (e.key === "ArrowLeft") showPrev();
    });
})();