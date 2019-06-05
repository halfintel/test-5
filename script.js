$(function() {
$(window).load(function() {
  // вешает обработчик событий на документ
  document.addEventListener('click', EvtListener);
});
});

// обработчик событий на документе
function EvtListener(e) {
  let $item = $(e.target);

  if ( $item.hasClass('form__button') ) {
    formSubmit($item);
  }
}

// обработчик форм
function formSubmit(item) {
  const formLogin = item.siblings('#nickname').val();
  const formPassword = item.siblings('#password').val();
  const nnickname = document.getElementById('nickname');
  const ppassword = document.getElementById('password');
  const $logout__wrap = $('.logout__wrap');
  const $logout__text = $('.logout__text');
  const $form__wrap = $('.form__wrap');
  
  let formKey;
  
  if ( 
    nnickname.validity.valid 
	&& ppassword.validity.valid 
  ) {
  } else {
    return;
  }
  
  // авторизация
  if ( document.location.pathname.indexOf("login") === 1 ) {
    formKey = 1;
    $.ajax({
      type: "POST",
      url: '/api/api.php',
      data: 'login=' + formLogin + '&password=' + formPassword + '&key=' + formKey,
      success: function(data) {
        if ( data.result === 'successful' ) {
          $logout__wrap.removeClass('hidden');
          $logout__text.text( data.act + ' ' + data.result );
          $form__wrap.addClass('hidden');
        } else {
          alert('server error');
        }
      },
      error: function (data) {
        alert('server error: ' + data.responseJSON.error);
      }
    });
	
  // регистрация
  } else if ( document.location.pathname.indexOf("registration") === 1 ) {
    formKey = 2;
    $.ajax({
      type: "POST",
      url: '/api/api.php',
      data: 'login=' + formLogin + '&password=' + formPassword + '&key=' + formKey,
      success: function(data) {
        if ( data.result === 'successful' ) {
          $logout__wrap.removeClass('hidden');
          $logout__text.text( data.act + ' ' + data.result );
          $form__wrap.addClass('hidden');
        } else {
          alert('server error: ' + data.error);
        }
        console.log(data);
      },
      error: function (data) {
        alert('server error: ' + data.responseJSON.error);
      }
    });
  }
}

// выход из аккаунта
function unlogin() {
  const $logout__wrap = $('.logout__wrap');
  const $logout__text = $('.logout__text');
  const $form__wrap = $('.form__wrap');
  const formLogin = '';
  const formPassword = '';
  const formKey = 3;
    $.ajax({
      type: "POST",
      url: '/api/api.php',
      data: 'login=' + formLogin + '&password=' + formPassword + '&key=' + formKey,
      success: function(data) {
        if ( data.result === 'successful' ) {
          $logout__wrap.addClass('hidden');
          $logout__text.text( data.act + ' ' + data.result );
          $form__wrap.removeClass('hidden');
        } else {
          alert('server error');
        }
      },
      error: function (data) {
        alert('server error: ' + data.responseJSON.error);
      }
    });
}
