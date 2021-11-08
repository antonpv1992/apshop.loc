import { createApp } from "vue";

import store from "./store";
import CartButton from "./components/CartButton";
import CartProduct from "./components/CartProduct";
import NewProducts from "./components/NewProducts";
import HotProducts from "./components/HotProducts";
import ProductList from "./components/ProductList";
import SingleProduct from "./components/SingleProduct";

const app = createApp({});
app.use(store);
app.component('cart-button', CartButton);
app.component('cart-product', CartProduct);
app.component('new-products', NewProducts);
app.component('hot-products', HotProducts);
app.component('product-list', ProductList);
app.component('single-product', SingleProduct);
app.mount("#app");