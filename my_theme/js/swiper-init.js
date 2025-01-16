document.addEventListener('DOMContentLoaded', function () {
    const swiperContainer = document.querySelector('.swiper-container');
    
    if (swiperContainer) {
        const swiper = new Swiper(swiperContainer, {
            loop: true,
            spaceBetween: 20,
            slidesPerView: 1.2,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                1320: {
                    slidesPerView: 4,
                    loop: true,
                },
            }
            
        });
    } else {
        console.error('Swiper container not found.');
    }
});
