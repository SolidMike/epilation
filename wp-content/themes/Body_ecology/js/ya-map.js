if ($('#map').length) {
ymaps.ready(initContact);
}

function initContact() {

var myMapContact = new ymaps.Map('map', {
    center: [55.753215, 37.622504],
    zoom: 10,
    controls: []
  }),
  // Создание макета балуна на основе Twitter Bootstrap.
  MyBalloonLayout = ymaps.templateLayoutFactory.createClass(
    '<div class="custom-balloon">' +
    '<div class="custom-balloon__arrow"></div>' +
    '<div class="custom-balloon__close"><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L10 10M10 1L1 10" stroke="#BDBDBD"/></svg></div>' +
    '$[[options.contentLayout observeSize minWidth=235 maxWidth=235 maxHeight=350]]' +
    '</div>', {
      /**
       * Строит экземпляр макета на основе шаблона и добавляет его в родительский HTML-элемент.
       * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/layout.templateBased.Base.xml#build
       * @function
       * @name build
       */
      build: function () {
        this.constructor.superclass.build.call(this);

        this._$element = $('.custom-balloon', this.getParentElement());

        this.applyElementOffset();

        this._$element.find('.custom-balloon__close')
          .on('click', $.proxy(this.onCloseClick, this));
      },

      /**
       * Удаляет содержимое макета из DOM.
       * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/layout.templateBased.Base.xml#clear
       * @function
       * @name clear
       */
      clear: function () {
        this._$element.find('.custom-balloon__close')
          .off('click');

        this.constructor.superclass.clear.call(this);
      },

      /**
       * Метод будет вызван системой шаблонов АПИ при изменении размеров вложенного макета.
       * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/IBalloonLayout.xml#event-userclose
       * @function
       * @name onSublayoutSizeChange
       */
      onSublayoutSizeChange: function () {
        MyBalloonLayout.superclass.onSublayoutSizeChange.apply(this, arguments);

        if (!this._isElement(this._$element)) {
          return;
        }

        this.applyElementOffset();

        this.events.fire('shapechange');
      },

      /**
       * Сдвигаем балун, чтобы "хвостик" указывал на точку привязки.
       * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/IBalloonLayout.xml#event-userclose
       * @function
       * @name applyElementOffset
       */
      applyElementOffset: function () {
        this._$element.css({
          left: -(this._$element[0].offsetWidth / 2),
          // top: -(this._$element[0].offsetHeight + this._$element.find('.custom-balloon__arrow')[0].offsetHeight)
          top: 16
        });
      },

      /**
       * Закрывает балун при клике на крестик, кидая событие "userclose" на макете.
       * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/IBalloonLayout.xml#event-userclose
       * @function
       * @name onCloseClick
       */
      onCloseClick: function (e) {
        e.preventDefault();

        this.events.fire('userclose');
      },

      /**
       * Используется для автопозиционирования (balloonAutoPan).
       * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/ILayout.xml#getClientBounds
       * @function
       * @name getClientBounds
       * @returns {Number[][]} Координаты левого верхнего и правого нижнего углов шаблона относительно точки привязки.
       */
      getShape: function () {
        if (!this._isElement(this._$element)) {
          return MyBalloonLayout.superclass.getShape.call(this);
        }

        var position = this._$element.position();

        return new ymaps.shape.Rectangle(new ymaps.geometry.pixel.Rectangle([
          [position.left, position.top], [
            position.left + this._$element[0].offsetWidth,
            position.top + this._$element[0].offsetHeight + this._$element.find('.custom-balloon__arrow')[0].offsetHeight
          ]
        ]));
      },

      /**
       * Проверяем наличие элемента (в ИЕ и Опере его еще может не быть).
       * @function
       * @private
       * @name _isElement
       * @param {jQuery} [element] Элемент.
       * @returns {Boolean} Флаг наличия.
       */
      _isElement: function (element) {
        return element && element[0] && element.find('.custom-balloon__arrow')[0];
      }
    }),

  // Создание вложенного макета содержимого балуна.
  MyBalloonContentLayout = ymaps.templateLayoutFactory.createClass(
    '<div class="custom-balloon__logo" style="margin-bottom: 8px;"><img src="/wp-content/themes/Body_ecology/img/logo.png" alt="">' +
    '<div class="custom-balloon__title">$[properties.balloonTitle]</div>' +
    '<div class="custom-balloon__header">$[properties.balloonHeader]</div>' +
    '<div class="custom-balloon__body">$[properties.balloonBody]</div>' +
    '<div class="custom-balloon__body">$[properties.balloonEmail]</div>' +
    '<div class="custom-balloon__footer">$[properties.balloonFooter]</div>'
  );

  if( $('.contact .contact__item').length ){
    $('.contact .contact__item').each(function(){
      var coordinates = $(this).find('.contact-list__item_address').data('coordinates').split(', ');
      // console.log(coordinates)
      // Коллекция для геообъектов группы.
      var collection = new ymaps.GeoObjectCollection(null);
  
      // Добавляем коллекцию на карту.
      myMapContact.geoObjects.add(collection);
  
      // function createPoint(item, collection) {
          // Создаем метку.
          var placemark = new ymaps.Placemark(coordinates, {
            balloonTitle: $(this).find('.contact__item-title').html().slice(3),
            balloonHeader: $(this).find('.contact-list__item_address').html(),
            balloonBody: $(this).find('.contact-list__item_phone').html(),
            balloonFooter: $(this).find('.contact-list__item_schedule').html()
          }, {
            balloonShadow: false,
            balloonLayout: MyBalloonLayout,
            balloonContentLayout: MyBalloonContentLayout,
            balloonPanelMaxMapArea: 0,
            // Не скрываем иконку при открытом балуне.
            hideIconOnBalloonOpen: false,
            // И дополнительно смещаем балун, для открытия над иконкой.
            // balloonOffset: [3, -40]
            iconLayout: 'default#image',
            iconImageHref: '/wp-content/themes/Body_ecology/img/map-point.png', // иконка иконки
            iconImageSize: [30, 49], // размер иконки
            iconImageOffset: [-15, -49], // позиция иконки
          });
  
          // Добавляем метку в коллекцию.
          collection.add(placemark);

          checkZoomFn(true);
    });
  }
  else{
      var coordinates = $('.contact').find('.contact__franchise-item_address').data('coordinates').split(', ');
      // console.log(coordinates)
      // Коллекция для геообъектов группы.
      var collection = new ymaps.GeoObjectCollection(null);
  
      // Добавляем коллекцию на карту.
      myMapContact.geoObjects.add(collection);
  
      // function createPoint(item, collection) {
          // Создаем метку.
          var placemark = new ymaps.Placemark(coordinates, {
            balloonTitle: $('.contact').find('.contact__title').html(),
            balloonHeader: $('.contact').find('.contact__franchise-item_address').html(),
            balloonBody: $('.contact').find('.contact__franchise-item_phone').html(),
            balloonEmail: $('.contact').find('.contact__franchise-item_email').html(),
            balloonFooter: $('.contact').find('.contact__franchise-item_schedule').html()
          }, {
            balloonShadow: false,
            balloonLayout: MyBalloonLayout,
            balloonContentLayout: MyBalloonContentLayout,
            balloonPanelMaxMapArea: 0,
            // Не скрываем иконку при открытом балуне.
            hideIconOnBalloonOpen: false,
            // И дополнительно смещаем балун, для открытия над иконкой.
            // balloonOffset: [3, -40]
            iconLayout: 'default#image',
            iconImageHref: '/wp-content/themes/Body_ecology/img/map-point.png', // иконка иконки
            iconImageSize: [30, 49], // размер иконки
            iconImageOffset: [-15, -49], // позиция иконки
          });
  
          // Добавляем метку в коллекцию.
          collection.add(placemark);

          checkZoomFn(false);
  }
  

  

  function checkZoomFn(checkZoom){
    function widthDetect() {
      if ($(window).width() >= 768) {
        myMapContact.margin.addArea({
          left: 0,
          top: 0,
          width: '50%',
          height: '100%'
        });
  
        // console.log(myMapContact.margin.getMargin());
      }
      else {
        myMapContact.margin.addArea({
          left: 0,
          top: 0,
          width: 0,
          height: 0
        });
  
        // console.log(myMapContact.margin.getMargin());
      }
      
    };
    widthDetect();
    if(checkZoom){
      myMapContact.setBounds(myMapContact.geoObjects.getBounds(), {
        checkZoomRange: true,
        useMapMargin: true,
        zoomMargin: 30
      });
    }
    else{
      myMapContact.setBounds(myMapContact.geoObjects.getBounds(), {
        checkZoomRange: true,
        useMapMargin: true,
        zoomMargin: 30
      }).then(function(){ 
        if(myMapContact.getZoom() > 16) 
        {
          myMapContact.setZoom(16, {
            useMapMargin: true,
            zoomMargin: 30
          });
        }
      });
    }
  }

  $(window).resize(function () {
    widthDetect();
  });



  myMapContact.behaviors.disable("scrollZoom");


  var geolocationControl = new ymaps.control.GeolocationControl({
    options: {
      layout: 'round#buttonLayout',
      position: {
        top: '50px',
        right: '15px'
      }
    }
  });
  myMapContact.controls.add(geolocationControl);

  var zoomControl = new ymaps.control.ZoomControl({
    options: {
      layout: 'round#zoomLayout',
      position: {
        bottom: '50px',
        right: '15px'
      }
    }
  });
  myMapContact.controls.add(zoomControl);
}