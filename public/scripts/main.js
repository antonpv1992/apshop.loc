if(window.location.href === 'http://apshop.loc/shop'){
    let container = document.querySelector('.goods-list');
    container.innerHTML = renderSpin();
    getAllProducts();
}

function getAllProducts() {
    setTimeout(async () => {
        let data = await fetch('http://apshop.loc/api/shop', {
            method: 'GET',
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            },
        })
        let result = await data.json();
        let element = document.querySelector('.goods-list');
        let template = ""
        result.forEach(product => {
            template += singleGoodRender(product);
        });
        element.innerHTML = template;
    }, 2000);
}

function singleGoodRender(product) {
    return `
    <div class="single-good">
        <a href="/shop/${product.category}/${product.alias}">
            <img src="assets/images/${product.image}">
            <h4>${product.title}</h4>
        </a>
        <p>
            <span>${product.oldPrice}</span>
            <i>${product.price}</i>
        </p>
        <div class="characteristics">
            <div class="single-char">
                <span>Brand: </span>
                ${product.brand}
            </div>
            <div class="single-char">
                <span>Type: </span>
                ${product.category}
            </div>
        </div>
        <a class="check-product">
            <i class="fa fa-shopping-cart"></i>
            Add to cart
        </a>
    </div>`;
}

function renderSpin() {
    let spin = `
    <div class="spinner">
        <div class="spinner-row">
            <div class="spinner-block"></div>
            <div class="spinner-block"></div>
            <div class="spinner-block"></div>
            <div class="spinner-block"></div>
        </div>
        <div class="spinner-row">
            <div class="spinner-block"></div>
            <div class="spinner-block"></div>
            <div class="spinner-block"></div>
            <div class="spinner-block"></div>
        </div>
        <div class="spinner-row">
            <div class="spinner-block"></div>
            <div class="spinner-block"></div>
            <div class="spinner-block"></div>
            <div class="spinner-block"></div>
        </div>
        <div class="spinner-row">
            <div class="spinner-block"></div>
            <div class="spinner-block"></div>
            <div class="spinner-block"></div>
            <div class="spinner-block"></div>
        </div>
    </div>`;
    return spin;
}