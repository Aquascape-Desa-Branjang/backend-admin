console.log("Hi");

var jq = jQuery.noConflict();


document.addEventListener("DOMContentLoaded", () => {
    // Animation
        ScrollReveal().reveal('section',  {
            delay: 200,
            viewFactor: 0.1,
        });

    // Navigation
        const mobileMenu = document.getElementById("mobile-navigation-item-menu");

        if (mobileMenu) {
            const mobileMenuToggle = document.getElementById("mobile-navigation-toggle");
            const mobileMenuClose = document.getElementById("mobile-navigation-close");

            mobileMenuToggle.addEventListener("click", () => {
                mobileMenu.classList.remove("hidden");
                mobileMenu.classList.add("flex");
            });

            mobileMenuClose.addEventListener("click", () => {
                mobileMenu.classList.remove("flex");
                mobileMenu.classList.add("hidden");
            });
        }

    // Date Picker
        const datePickers = document.querySelectorAll('.air-datepicker');

        datePickers.forEach((field) => {
            const id = field.getAttribute('id');

            jq('#'+id).datepicker({
                dateFormat: 'dd/mm/yy',
            });
        });

    // Home
        const sectionOperations = document.getElementById('section-operations');
        const sectionOurServices = document.getElementById('section-our-services');

        // Operations
        if (sectionOperations) {
            const markerOperations = sectionOperations.querySelectorAll('.marker-operations');
            const buttonTooltipOperations = sectionOperations.querySelectorAll('.button-operations-tooltip');
            const tooltips = sectionOperations.querySelectorAll(`.operations-tooltip`);

            markerOperations.forEach((marker) => {
                marker.addEventListener('mouseover', () => {
                    tooltips.forEach((tooltip) => {
                        tooltip.classList.add('hidden');
                        tooltip.classList.remove('grid');
                    });
                });
            })

            buttonTooltipOperations.forEach((button) => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();

                    const key = button.getAttribute('data-operation-tooltip');

                    tooltips.forEach((tooltip) => {
                        const tooltipKey = tooltip.getAttribute('data-key');

                        tooltip.classList.add('hidden');
                        tooltip.classList.remove('grid');

                        if (tooltipKey === key) {
                            tooltip.classList.remove('hidden');
                            tooltip.classList.add('grid');
                        }

                        console.log(tooltipKey)
                    });
                });
            })
        }

        // Services
        if (sectionOurServices) {
            const slides = document.querySelectorAll('.services-content');
            const prevBtn = document.querySelectorAll('.services-slider-prev');
            const nextBtn = document.querySelectorAll('.services-slider-next');
            const currentNum = document.querySelectorAll('.services-slider-number .current');
            const totalNum = document.querySelectorAll('.services-slider-number .total');
            const previewImage = document.querySelectorAll('.services-slider-image img');

            let currentIndex = 0;
            const totalSlides = slides.length;

            totalNum.textContent = totalSlides;

            totalNum.forEach(num => {
                num.textContent = totalSlides;
            });

            function updateSlide() {
                slides.forEach((slide, index) => {
                    slide.classList.toggle('active', index === currentIndex);
                });

                const preview = slides[currentIndex].getAttribute('data-preview');

                previewImage.forEach(image => {
                    image.classList.remove('hidden');
                    image.src = preview;
                })

                currentNum.textContent = currentIndex + 1;

                currentNum.forEach(num => {
                    num.textContent = currentIndex + 1;
                });

                prevBtn.forEach(btn => {
                    btn.classList.toggle('disabled', currentIndex === 0);
                });
                nextBtn.forEach(btn => {
                    btn.classList.toggle('disabled', currentIndex === totalSlides - 1);
                });
            }

            prevBtn.forEach(btn => {
                btn.addEventListener('click', function () {
                    if (currentIndex > 0) {
                        currentIndex--;
                        updateSlide();
                    }
                });
            });

            nextBtn.forEach(btn => {
                btn.addEventListener('click', function () {
                    if (currentIndex < totalSlides - 1) {
                        currentIndex++;
                        updateSlide();
                    }
                });
            });


            updateSlide();
        }

    // About
        const sectionCarousel = document.getElementById('section-carousel');
        const sectionOurValues = document.getElementById('section-our-values');
        const sectionOurGallery = document.getElementById('section-our-gallery');

        // Section Carousel
        if (sectionCarousel) {
            let currentSlide = 0;
            const slides = sectionCarousel.querySelectorAll('.item-carousel');

            setInterval(() => {
                slides[currentSlide].style.opacity = 0;
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].style.opacity = 1;
            }, 3000);
        }

        // Section Our Values
        if (sectionOurValues) {
            const values = document.querySelectorAll('#container-our-values .value');
            const prevBtn = document.querySelector('.slider-button__about .prev');
            const nextBtn = document.querySelector('.slider-button__about .next');

            let currentIndex = 0;
            const totalValues = values.length;

            function updateSlider(index) {
                values.forEach((value, i) => {
                    if (i === index) {
                        value.classList.remove('hidden', 'opacity-0');
                        value.classList.add('flex', 'md:grid', 'opacity-100');
                    } else {
                        value.classList.add('hidden', 'opacity-0');
                        value.classList.remove('flex', 'md:grid', 'opacity-100');
                    }
                });

                prevBtn.classList.toggle('disabled', index === 0);
                nextBtn.classList.toggle('disabled', index === totalValues - 1);
            }
            prevBtn.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateSlider(currentIndex);
                }
            });

            nextBtn.addEventListener('click', () => {
                if (currentIndex < totalValues - 1) {
                    currentIndex++;
                    updateSlider(currentIndex);
                }
            });

            updateSlider(currentIndex);
        }

        // Section Our Gallery
        if (sectionOurGallery) {
            const cardGalleries = document.querySelectorAll('.gallery-card');
            const mobileCards = document.querySelectorAll('.mobile-cards .gallery-card');

            // Modal
            const modal = document.getElementById('modal-gallery');
            const modalImage = modal.querySelector('#modal-gallery-image');
            const modalClose = modal.querySelector('.close');

            // Prev next btn
            const prevBtn = modal.querySelector('.prev');
            const nextBtn = modal.querySelector('.next');
            const images = Array.from(mobileCards).map(card => card.querySelector('img').getAttribute('src'));

            let currentIndex = 0;

            function updateModalImage(index) {
                modalImage.setAttribute('src', images[index]);
            }

            prevBtn.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateModalImage(currentIndex);
                }
            });

            nextBtn.addEventListener('click', () => {
                if (currentIndex < images.length - 1) {
                    currentIndex++;
                    updateModalImage(currentIndex);
                }
            });

            cardGalleries.forEach(card => {
                ['mouseenter', 'mouseleave'].forEach(event => {
                    card.addEventListener(event, () => {
                        const gradientOverlay = card.querySelector('.overlay');
                        const img = card.querySelector('img');

                        img.classList.toggle('scale-105');
                        gradientOverlay.classList.toggle('opacity-0');
                    });
                });

                card.addEventListener('click', () => {
                    const imageUrl = card.querySelector('img').getAttribute('src');

                    modalImage.setAttribute('src', imageUrl);
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');

                    currentIndex = images.findIndex(image => image === imageUrl);
                });
            });

            modalClose.addEventListener('click', () => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
        }
});

jq(document).ready(function () {
    // Contact Form Submission
    jq("#contact-form").submit(function (event) {
        event.preventDefault();

        const $submitButton = jq("#submit-contact-form");
        const image = $submitButton.find("img");
        const loader = $submitButton.find(".loader");

        $submitButton.prop("disabled", true);

        jq.ajax({
            url: "/contact/submit",
            type: "POST",
            data: jq(this).serialize(),
            beforeSend: function () {
                $submitButton.prop("disabled", true);
                image?.addClass("hidden");
                loader?.removeClass("hidden");
            },
            success: function (response) {
                Swal.fire({
                position: "center",
                icon: "success",
                title: "Thank you!",
                text: "Your message has been successfully sent.",
                confirmButtonColor: "#034E79",
                }).then(() => {
                jq("#contact-form")[0].reset();
                });
            },
            error: function (xhr) {
                let errorMessage = "An unexpected error occurred. Please try again.";

                if (xhr.status === 422 && xhr.responseJSON.errors) {
                errorMessage = "<ul style='text-align: left;'>";
                jq.each(xhr.responseJSON.errors, function (field, messages) {
                    jq.each(messages, function (index, message) {
                    errorMessage += `<li>${message}</li>`;
                    });
                });
                errorMessage += "</ul>";
                }

                Swal.fire({
                icon: "error",
                title: "Error!",
                html: errorMessage,
                confirmButtonColor: "#DE6540",
                });
            },
            complete: function () {
                $submitButton.prop("disabled", false);
                image?.removeClass("hidden");
                loader?.addClass("hidden");
            },
        });
    });
});
