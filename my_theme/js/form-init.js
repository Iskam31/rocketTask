document.addEventListener('DOMContentLoaded', function () {
    const showFormBtn = document.getElementById('show-form-btn');
    const contactForm = document.querySelector('.contact-form');
    const formElement = contactForm.querySelector('form');

    // Показ формы при нажатии на кнопку
    showFormBtn.addEventListener('click', function () {
        contactForm.classList.remove('hidden');
        showFormBtn.style.display = 'none'; // Скрыть кнопку
    });

    // Скрытие формы при нажатии на кнопку отправки
    if (formElement) {
        formElement.addEventListener('submit', function () {
            contactForm.classList.add('hidden');
            showFormBtn.style.display = 'inline-block'; // Показать кнопку снова
        });
    }
});
