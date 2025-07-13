document.addEventListener('DOMContentLoaded', () => {

    const revealElements = document.querySelectorAll(".scroll-reveal");

    const observer = new IntersectionObserver(
        (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
            entry.target.classList.add("visible");
            } else {
            entry.target.classList.remove("visible");
            }
        });
        },
        {
        threshold: 0.1,
        }
    );

    revealElements.forEach((el) => observer.observe(el));

    const languageSwitcher = document.querySelector('.language-switcher');
    const langBtn = languageSwitcher.querySelector('.lang-btn');
    const langMenu = languageSwitcher.querySelector('.lang-menu');

    // Языки и их данные
    const languages = {
        ro: {
            code: 'ro',
            name: 'RO',
            flag: '/wp-content/themes/NomadsNews/assets/images/ro.svg'
        },
        en: {
            code: 'en',
            name: 'EN',
            flag: '/wp-content/themes/NomadsNews/assets/images/en.svg'
        }
    };

    let currentLang = 'ro';

    function loadTranslations(langCode) {
    return fetch(`/wp-content/themes/NomadsNews/lang/${langCode}.json`)
        .then(response => {

            if (!response.ok) throw new Error('Не удалось загрузить перевод');
            return response.json();
        });
    }

    function applyTranslations(translations) {
        // Находим все элементы с data-i18n
        document.querySelectorAll('[data-i18n]').forEach(elem => {
            const key = elem.getAttribute('data-i18n');
            if (translations[key]) {
                elem.innerHTML = translations[key];
            }
        });
    }
    // Обработчик клика на кнопку
    langBtn.addEventListener('click', () => {
        languageSwitcher.classList.toggle('active');
    });

    langMenu.addEventListener('click', (event) => {
        const selectedLang = event.target.closest('li');
        if (selectedLang) {
            const langCode = selectedLang.dataset.lang;
            if (langCode && langCode !== currentLang) {

                loadTranslations(langCode)
                    .then(translations => {
                        currentLang = langCode;
                        updateLangUI(languages[langCode]);
                        applyTranslations(translations);
                        languageSwitcher.classList.remove('active');
                        console.log(`Выбран язык: ${languages[langCode].name}`);
                    })
                    .catch(err => {
                        console.error('Ошибка при загрузке перевода:', err);
                    });
            }
        }
    });

    // Функция для обновления UI
    function updateLangUI(lang) {
        langBtn.querySelector('.lang-icon').src = lang.flag;
        langBtn.querySelector('.lang-text').textContent = lang.name;

        // Обновляем список языков (убираем текущий)
        langMenu.innerHTML = '';
        Object.values(languages).forEach((language) => {
            if (language.code !== currentLang) {
                langMenu.innerHTML += `
                    <li data-lang="${language.code}">
                        <img src="${language.flag}" alt="${language.name}"> ${language.name}
                    </li>
                `;
            }
        });
    }

    // Инициализация
    updateLangUI(languages[currentLang]);
    loadTranslations(currentLang)
        .then(translations => {
            applyTranslations(translations);
            const header = document.getElementById('header-mobile');
            if (header && translations.headerMobile) {
                header.innerHTML = translations.headerMobile;
            }
        })
        .catch(err => {
            console.error('Ошибка загрузки перевода при старте:', err);
        });



    const menuToggle = document.querySelector('.menu-toggle');
    const menuItems = document.querySelector('.menu-items');

    // Открытие/закрытие меню по клику на кнопку
    menuToggle.addEventListener('click', () => {
        if (!menuItems.classList.contains('active')) {
            menuItems.classList.add('active');  // Открыть меню
            menuItems.classList.remove('hide'); // Удалить класс скрытия
        } else {
            menuItems.classList.add('hide'); // Запускаем анимацию скрытия
            setTimeout(() => {
                menuItems.classList.remove('active'); // Убираем активный класс после анимации
            }, 500); // Время должно совпадать с `transition` в CSS
        }
    });

    // Закрытие меню при клике на ссылку
    menuItems.addEventListener('click', (event) => {
        if (event.target.tagName === 'A') {
            menuItems.classList.add('hide');
            setTimeout(() => {
                menuItems.classList.remove('active');
            }, 500);
        }
    });

    // Закрытие при клике вне меню
    document.addEventListener('click', (event) => {
        if (!menuItems.contains(event.target) && !menuToggle.contains(event.target)) {
            if (menuItems.classList.contains('active')) {
                menuItems.classList.add('hide');
                setTimeout(() => {
                    menuItems.classList.remove('active');
                }, 500);
            }
        }
    });





    // Подключаем intl-tel-input к полю телефона
    var input = document.querySelector(".form__input[name='phone']");
    var iti = window.intlTelInput(input, {
        initialCountry: "auto",
        nationalMode: false,
        separateDialCode: true,
        geoIpLookup: callback => {
            fetch("https://ipapi.co/json")
                .then(res => res.json())
                .then(data => callback(data.country_code))
                .catch(() => callback("us"));
        },
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.6/build/js/utils.js",
    });
    input.style.paddingLeft = "50px";
    document.querySelector('#contact-form').addEventListener('submit', function (e) {
        e.preventDefault();

        var form = this;
        var errorContainer = document.getElementById('form-error');
        errorContainer.style.display = 'none';
        errorContainer.innerHTML = '';

        // Получаем значения полей
        var name = form.querySelector(".form__input[name='name']").value.trim();
        var email = form.querySelector(".form__input[name='email']").value.trim();
        var phone = input.value.trim();
        var message = form.querySelector(".form__textarea[name='message']").value.trim();

        // Валидация имени
        if (name.length < 2) {
            showError('Имя должно содержать минимум 2 символа.');
            return;
        }

        // Валидация email
        if (!validateEmail(email)) {
            showError('Введите корректный Email.');
            return;
        }

        // Валидация номера телефона
        if (phone.length > 0 && !iti.isValidNumber()) {
            showError('Введите корректный номер телефона.');
            return;
        }

        // Валидация сообщения
        if (message.length < 10) {
            showError('Сообщение должно содержать минимум 10 символов.');
            return;
        }

        // Формируем AJAX-запрос
        var formData = new FormData(form);
        if (phone.length > 0) {
            formData.set("phone", iti.getNumber()); // Записываем телефон в международном формате
        }

        fetch(form.getAttribute('action'), {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(result => {
            if (result.includes("успешно")) {
                showPopup();
                form.reset();
                iti.setNumber(""); // Сброс номера телефона
            } else {
                showError('Ошибка отправки сообщения. Попробуйте позже.');
            }
        })
        .catch(() => {
            showError('Ошибка соединения. Проверьте интернет.');
        });
    });

    function validateEmail(email) {
        var re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return re.test(email);
    }

    function showError(message) {
        var errorContainer = document.getElementById('form-error');
        errorContainer.innerHTML = message;
        errorContainer.style.display = 'block';
    }

    function showPopup() {
        document.getElementById('popup-overlay').style.display = 'block';
        document.getElementById('popup').style.display = 'block';
    }

    function closePopup() {
        document.getElementById('popup-overlay').style.display = 'none';
        document.getElementById('popup').style.display = 'none';
    }

    // Делаем функции глобальными, чтобы onclick мог их видеть
    window.showPopup = showPopup;
    window.closePopup = closePopup;

    // Добавляем обработчики событий на кнопки
    document.getElementById("popup-close").addEventListener("click", closePopup);
    document.getElementById("popup-button").addEventListener("click", closePopup);

    
});

document.querySelectorAll('.menu-items a').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault(); // Отключаем стандартное поведение ссылки

        const targetId = this.getAttribute('href'); // Получаем ID секции
        const targetSection = document.querySelector(targetId);

        // Если секция найдена, прокручиваем к ней
        if (targetSection) {
            targetSection.scrollIntoView({
                behavior: 'smooth',  // Плавная прокрутка
                block: 'start'       // Прокрутка к началу секции
            });
        }

        // Закрываем меню (если нужно)
        document.querySelector('.menu-items').classList.remove('active');
    });
});

const backToTopBtn = document.querySelector('.back-to-top-button');
// Прокрутка вверх при нажатии на кнопку
backToTopBtn.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'  // Плавная прокрутка
    });
});

