import {createStore} from "vuex";

const store = createStore({
    state: () => ({
        cartProducts: JSON.parse(localStorage.getItem('cart')) ?? [],
        cartProduct: {},
        isAdded: false,
        newProducts: [],
        hotProducts: [],
        products: [],
        product: {},
        loading: false
    }),
    getters: {
        getCartProducts: (state) => state.cartProducts,
        getCartProduct: (state) => state.cartProduct,
        getIsAdded: (state) => state.isAdded,
        getNewProducts: (state) => state.newProducts,
        getHotProducts: (state) => state.hotProducts,
        getProducts: (state) => state.products,
        getProduct: (state) => state.product,
        getLoading: (state) => state.loading
    },
    actions: {
        removeCartProduct: (context, id) => {
            const newCart = context.getters.getCartProducts.filter(product => product.id !== id);
            context.commit('setCartProducts', newCart);
        },
        setCartProduct: (context, product) => {
            const newCart = JSON.parse(localStorage.getItem('cart')) ?? [];
            if(!newCart.find(prod => prod.id === product.id)){
                newCart.push(product);
            }
            context.commit('setCartProducts', newCart);
        },
        checkProduct: (context, id) => {
            const isAdded = context.getters.getCartProducts.find(product => product.id === id) ? true : false;
            context.commit('setIsAdded', isAdded);
        },
        setQuantity: (context, {id, quantity}) => {
            const newCart = context.getters.getCartProducts.map(product =>
                product.id == id ? { ...product, quantity: quantity } : product
            );
            context.commit('setCartProducts', newCart)
        },
        fetchProducts: async (context) => {
            context.commit('setLoading', true);
            const response = await fetch('http://apshop.loc/api/shop', {
                method: 'GET',
                headers: {
                    'Content-type': 'application/json; charset=UTF-8',
                },
            });
            const products = await response.json();
            context.commit('setProducts', products);
            context.commit('setLoading', false);
        },
        fetchProductsByCategory: async (context, category) => {
            context.commit('setLoading', true);
            const response = await fetch(`http://apshop.loc/api/shop/${category}`, {
                method: 'GET',
                headers: {
                    'Content-type': 'application/json; charset=UTF-8',
                },
            });
            const products = await response.json();
            context.commit('setProducts', products);
            context.commit('setLoading', false);
        },
        fetchNewProducts: async (context) => {
            const response = await fetch('http://apshop.loc/api/new', {
                method: 'GET',
                headers: {
                    'Content-type': 'application/json; charset=UTF-8',
                },
            });
            const products = await response.json();
            context.commit('setNewProducts', products);
        },
        fetchHotProducts: async (context) => {
            const response = await fetch('http://apshop.loc/api/hot', {
                method: 'GET',
                headers: {
                    'Content-type': 'application/json; charset=UTF-8',
                },
            });
            const products = await response.json();
            context.commit('setHotProducts', products);
        },
        fetchProductByAlias: async (context, alias) => {
            const response = await fetch(`http://apshop.loc/api/product/${alias}`, {
                method: 'GET',
                headers: {
                    'Content-type': 'application/json; charset=UTF-8',
                },
            });
            const product = await response.json();
            context.commit('setProduct', product);
        },
        sendOrder: async (context, order) => {
            const response = await fetch('http://apshop.loc/api/order/send', {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json; charset=UTF-8',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(order)
            });
            context.commit('cleanCart');
        }
    },
    mutations: {
        setCartProducts: (state, cart) => {
            state.cartProducts = cart;
            localStorage.setItem('cart', JSON.stringify(cart));
        },
        setIsAdded: (state, result) => {
            state.isAdded = result;
        },
        cleanCart: (state) => {
            localStorage.removeItem('cart');
            state.cartProducts = [];
        },
        setProducts: (state, products) => {
            state.products = products;
        },
        setHotProducts: (state, products) => {
            state.hotProducts = products;
        },
        setNewProducts: (state, products) => {
            state.newProducts = products;
        },
        setProduct: (state, product) => {
            state.product = product;
        },
        setLoading: (state, flag) => {
            state.loading = flag;
        }
    },
});

export default store;