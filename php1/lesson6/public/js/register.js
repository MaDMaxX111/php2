// JavaScript Document

function register(){
	var login = encodeURI(document.getElementById('login').value);
	var password = encodeURI(document.getElementById('password').value);
	var rememberme = encodeURI(document.getElementById('rememberme').checked);
          $.ajax({ type: 'POST', url: '/index.php', data: { metod: 'ajax', var2: rememberme, var3: password, login: login, password: 'password', rememberme: 'rememberme'}, success: function(response){
                    $('#ph1').html(response);
                 }
          });
};



$(document).ready(function(){
	var login = encodeURI(document.getElementById('login').value);
	var password = encodeURI(document.getElementById('password').value);
	var rememberme = encodeURI(document.getElementById('rememberme').checked);
          $.ajax({ type: 'POST', url: '/index.php', data: { metod: 'ajax', var2: rememberme, var3: password, login: login, password: 'password', rememberme: 'rememberme'}, success: function(response){
                    $('#ph1').html(response);
                 }
          });
});
