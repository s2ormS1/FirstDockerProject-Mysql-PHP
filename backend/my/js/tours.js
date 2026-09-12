document.addEventListener("DOMContentLoaded", function () {

    // =====================
    // 1. СМЕНА КАРТИНОК
    // =====================

    document.querySelectorAll(".tour-image").forEach(function (img) {

        if (!img.dataset.images) return;

        let images;

        try {
            images = JSON.parse(img.dataset.images);
        } catch (e) {
            return;
        }

        if (!Array.isArray(images) || images.length === 0) return;

        let current = Math.floor(Math.random() * images.length);

        img.src = images[current];

        setInterval(function () {

            img.style.opacity = "0";

            setTimeout(function () {

                let next;

                do {
                    next = Math.floor(Math.random() * images.length);
                } while (images.length > 1 && next === current);

                current = next;

                img.src = images[current];

                img.style.opacity = "1";

            }, 400);

        }, 5500);

    });


    // =====================
    // 2. ОКНО ТУРОВ (3 КАРТОЧКИ)
    // =====================

    const track = document.querySelector(".tour-track");
    const prevBtn = document.querySelector(".tour-arrow.left");
    const nextBtn = document.querySelector(".tour-arrow.right");

    if (!track || !prevBtn || !nextBtn) return;

    let allCards = Array.from(document.querySelectorAll(".tour-card"));

    const pageSize = 3;
    let offset = 0;

    function render() {

        track.innerHTML = "";

        for (let i = 0; i < pageSize; i++) {

            const index = (offset + i) % allCards.length;

            track.appendChild(allCards[index]);
        }
    }

    nextBtn.addEventListener("click", function () {

        offset = (offset + 1) % allCards.length;

        render();
    });

    prevBtn.addEventListener("click", function () {

        offset = (offset - 1 + allCards.length) % allCards.length;

        render();
    });

    render();


    // =====================
    // 3. МОДАЛКА "ПОДРОБНЕЕ"
    // =====================

    const modal = document.getElementById("tourModal");
    const modalBody = document.getElementById("tourModalBody");
    const closeBtn = document.querySelector(".tour-modal-close");

    if (modal && modalBody) {

        document.querySelectorAll(".tour-more").forEach(btn => {

            btn.addEventListener("click", function () {

                let id = this.dataset.id;

                fetch("handlers/tourDetails.php?id=" + id)
                    .then(res => res.text())
                    .then(html => {

                        modalBody.innerHTML = html;
                        modal.style.display = "flex";

                    });

            });

        });

        if (closeBtn) {
            closeBtn.addEventListener("click", function () {
                modal.style.display = "none";
            });
        }

        modal.addEventListener("click", function (e) {
            if (e.target === modal) {
                modal.style.display = "none";
            }
        });
    }

});