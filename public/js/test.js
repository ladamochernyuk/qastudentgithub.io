'use strict';
function createRequest(){
    let request = false;
    if (XMLHttpRequest){
        request = new XMLHttpRequest();
    }else if (ActiveXObject){
        try {
            request = new ActiveXObject("Microsoft.XMLHTTP")
        }catch {
            request = new ActiveXObject("Msxm12.XMLHTTP");
        }
    }
    return request;
}
function el(selector) {
    return document.querySelector(selector);
}
  
function myConsole(c, status='') {
    let message, alertClass, text;
    switch (c) {
      case 1:
          message = '1: Подготовка к отправке...';
          alertClass = 'alert-primary';
          break;
      case 2:
          message = '2: Отправлен...';
          alertClass = 'alert-primary';
          break;
      case 3:
          message = '3: Идет обмен...';
          alertClass = 'alert-warning';
          break;
      case 4:
          message = '4: Обмен завершен!';
          alertClass = 'alert-success';
          break;
      case 5:
          message = 'Ошибка: запрашиваемый скрипт не найден!';
          alertClass = 'alert-danger';
          break;
      case 6:
          message = 'Ошибка: сервер вернул статус: ' + status;
          alertClass = 'alert-danger';
          break;
      default:
        break;     
    }
    text = `<div class="alert ${alertClass}" role="alert">${message}</div>`;
      el("#console").innerHTML += text;
}

function sendRequest(){
    const request = createRequest();
    request.onreadystatechange = function(){
        switch (request.readyState){
            case 1:
            myConsole(1);
            break;
            case 2:
            myConsole(2);
            break;
            case 3:
            myConsole(3);
            break;
            case 4:
                if (request.status === 200){
                myConsole(4);
                el("#printResult").innerHTML = `<strong>${request.responsText}</strong>`;
                } else if(request.status === 404){
                myConsole(5);
                } else {
                myConsole(6, request.status);
                }
            break;
            default:
                el("#printResult").innerHTML = `<strong>Unknown Status</strong>`;
            break;
        }
    }

request.open("GET", url, true);
request.send();
}
const fetchRequest = (method, url, data) => {
    return fetch(url, {
    method: method, 
    body: JSON.stringify(data),
    headers: data ? {"Content-Type": "application/json"} : {}
    }
    ).then(responce => {
        if (responce.status >= 400){
            return responce.JSON().then(err => {
                const error = new Error("Something went wrong!");
                error.data = err;
                throw error;
            })
        }
        return response.JSON()
    })
}
const url = "https://reqres.in/api/users?page=1";

const getData = () => fetchRequest("GET", url).then(responce => {
    myConsole(4);
    el("#printResult").innerHTML = `<strong>${JSON.stringify(responce)}</strong>`;
});

(function(){
    el('.getBtn').addEventListener('click', getData);
})();
