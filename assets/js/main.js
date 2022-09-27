/**
* Template Name: Sailor - v4.7.0
* Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Hero carousel indicators
   */
  let heroCarouselIndicators = select("#hero-carousel-indicators")
  let heroCarouselItems = select('#heroCarousel .carousel-item', true)

  heroCarouselItems.forEach((item, index) => {
    (index === 0) ?
    heroCarouselIndicators.innerHTML += "<li data-bs-target='#heroCarousel' data-bs-slide-to='" + index + "' class='active'></li>":
      heroCarouselIndicators.innerHTML += "<li data-bs-target='#heroCarousel' data-bs-slide-to='" + index + "'></li>"
  });

  /**
   * Porfolio isotope and filter
   */
  window.addEventListener('load', () => {
    let portfolioContainer = select('.portfolio-container');
    if (portfolioContainer) {
      let portfolioIsotope = new Isotope(portfolioContainer, {
        itemSelector: '.portfolio-item'
      });

      let portfolioFilters = select('#portfolio-flters li', true);

      on('click', '#portfolio-flters li', function(e) {
        e.preventDefault();
        portfolioFilters.forEach(function(el) {
          el.classList.remove('filter-active');
        });
        this.classList.add('filter-active');

        portfolioIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
      }, true);
    }

  });

  /**
   * Initiate portfolio lightbox 
   */
  const portfolioLightbox = GLightbox({
    selector: '.portfolio-lightbox'
  });

  /**
   * Portfolio details slider
   */
  new Swiper('.portfolio-details-slider', {
    speed: 400,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  /**
   * Initiate portfolio details lightbox 
   */
  const portfolioDetailsLightbox = GLightbox({
    selector: '.portfolio-details-lightbox',
    width: '90%',
    height: '90vh'
  });

  /**
   * Skills animation
   */
  let skilsContent = select('.skills-content');
  if (skilsContent) {
    new Waypoint({
      element: skilsContent,
      offset: '80%',
      handler: function(direction) {
        let progress = select('.progress .progress-bar', true);
        progress.forEach((el) => {
          el.style.width = el.getAttribute('aria-valuenow') + '%'
        });
      }
    })
  }

})()

document.addEventListener("DOMContentLoaded", () => {

  const forms = document.querySelectorAll("form");
  const inputFile = document.querySelectorAll(".upload-file__input");

  /////////// Кнопка «Прикрепить файл» ///////////
  inputFile.forEach(function(el) {
    let textSelector = document.querySelector(".upload-file__text");
    let fileList;

    // Событие выбора файла(ов)
    el.addEventListener("change", function (e) {

      // создаём массив файлов
      fileList = [];
      for (let i = 0; i < el.files.length; i++) {
        fileList.push(el.files[i]);
      }

      // вызов функции для каждого файла
      fileList.forEach(file => {
        uploadFile(file);
      });
    });

    // Проверяем размер файлов и выводим название
    const uploadFile = (file) => {

      // файла <5 Мб
      if (file.size > 5 * 1024 * 1024) {
        alert("Файл должен быть не более 5 МБ.");
        return;
      }

      // Показ загружаемых файлов
      if (file && file.length > 1) {
        if ( file.length <= 4 ) {
          textSelector.textContent = `Выбрано ${file.length} файла`;
        }
        if ( file.length > 4 ) {
          textSelector.textContent = `Выбрано ${file.length} файлов`;
        }
      } else {
        textSelector.textContent = file.name;
      }
    }

  });

  // Отправка формы на сервер
  const postData = async (url, fData) => { // имеет асинхронные операции

    // начало отправки
    // здесь можно оповестить пользователя о начале отправки

    // ждём ответ, только тогда наш код пойдёт дальше
    let fetchResponse = await fetch(url, {
      method: "POST",
      body: fData
    });

    // ждём окончания операции
    return await fetchResponse.text();
  };

  if (forms) {
    forms.forEach(el => {
      el.addEventListener("submit", function (e) {
        e.preventDefault();

        // создание объекта FormData
        let fData = new FormData(this);

        // Добавление файлов input type file
        let file = el.querySelector(".upload-file__input");
        for (let i = 0; i < (file.files.length); i++) {
          fData.append("files[]", file.files[i]); // добавляем файлы в объект FormData()
        }

        // Отправка на сервер
        postData("./mail.php", fData)
            .then(fetchResponse => {
              console.log("Данные успешно отправлены!");
              console.log(fetchResponse);
            })
            .catch(function (error) {
              console.log("Ошибка!");
              console.log(error);
            });
      });
    });
  };

});