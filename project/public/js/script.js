const BASE_PATH_BASKET = '/basket';

async function makePostRequest(url, data) {
  try {
    const response = await fetch(url, {
      method: 'POST',
      mode: 'cors',
      headers: {
      'Content-Type': 'application/json; charset=utf-8'
      },
      body: JSON.stringify(data)
    })

    if(!response.ok) {
      throw new Error(`HTTP ERROR! Status: ${response.status}`);
    }
  
      return await response.json()
  } catch(err) {
    console.error(err)
  }
}

function getElement(selector) {
  return document.querySelector(selector)
}

function addClick(selectop, func) {
  const elements = document.querySelector(selectop)

  elements.addEventListener('click', func)
}

function addClicks(selectop, func) {
  const elements = [...document.querySelectorAll(selectop)]

  elements.forEach((item) => item.addEventListener('click', func))
}

window.addEventListener('load', async () => {
  if(getElement('[data-id]')) {
    addClicks("[data-id]", async (e) => {
      e.preventDefault()
      const id = e.target.dataset.id;
      const price = e.target.dataset.price;

      const data = await makePostRequest(`${BASE_PATH_BASKET}/add`, {'id': id, 'price': price})

      getElement('#count').innerText = data.count;
    })
  }

  if(getElement("[data-basket]")) {
    addClicks("[data-basket]", async (e) => {
      const id = e.currentTarget.dataset.basket;
  
      const data = await makePostRequest(`${BASE_PATH_BASKET}/delete`, {'id': id})
  
      getElement(`[data-item='${id}']`).remove();
      getElement('#count').innerText = data.count;
      getElement('#sum').innerText = data.sumBasket;
    })
  }
})