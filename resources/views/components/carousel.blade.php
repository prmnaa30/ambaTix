<div {{ $attributes->merge(['class' => 'carousel relative overflow-hidden']) }}>
    <div class="carousel-inner flex">
        {{ $slot }}
    </div>

    <button class="prev absolute left-2 top-1/2 transform -translate-y-1/2">
        <img src="{{ asset('icons/prev.svg') }}" alt="">
    </button>
    <button class="next absolute right-2 top-1/2 transform -translate-y-1/2">
        <img src="{{ asset('icons/next.svg') }}" alt="">
    </button>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const carousel = document.querySelector(".carousel");
        const carouselInner = carousel.querySelector(".carousel-inner");
        const items = carousel.querySelectorAll(".carousel-item");
        const prevButton = carousel.querySelector(".prev");
        const nextButton = carousel.querySelector(".next");

        let currentIndex = 1;
        const totalItems = items.length;

        const firstClone = items[0].cloneNode(true);
        const lastClone = items[totalItems - 1].cloneNode(true);

        carouselInner.appendChild(firstClone);
        carouselInner.prepend(lastClone);

        const newItems = carousel.querySelectorAll(".carousel-item");
        const totalNewItems = newItems.length;

        let isAnimating = false;

        const updateCarousel = () => {
            isAnimating = true;
            const offset = -currentIndex * 100;
            carouselInner.style.transition = "transform 0.7s ease-in-out";
            carouselInner.style.transform = `translateX(${offset}%)`;
        };

        const resetPosition = () => {
            if (currentIndex === 0) {
                currentIndex = totalItems;
                carouselInner.style.transition = "none";
                carouselInner.style.transform = `translateX(-${currentIndex * 100}%)`;
            }
            if (currentIndex === totalNewItems - 1) {
                currentIndex = 1;
                carouselInner.style.transition = "none";
                carouselInner.style.transform = `translateX(-${currentIndex * 100}%)`;
            }
            isAnimating = false;
        };

        prevButton.addEventListener("click", () => {
            if (isAnimating) return;
            currentIndex--;
            updateCarousel();
            setTimeout(resetPosition, 700);
        });

        nextButton.addEventListener("click", () => {
            if (isAnimating) return;
            currentIndex++;
            updateCarousel();
            setTimeout(resetPosition, 700);
        });

        let autoSlide = setInterval(() => {
            if (!isAnimating) {
                currentIndex++;
                updateCarousel();
                setTimeout(resetPosition, 700);
            }
        }, 5000);

        carousel.addEventListener("mouseover", () => clearInterval(autoSlide));
        carousel.addEventListener("mouseout", () => {
            autoSlide = setInterval(() => {
                if (!isAnimating) {
                    currentIndex++;
                    updateCarousel();
                    setTimeout(resetPosition, 700);
                }
            }, 5000);
        });
    });
</script>