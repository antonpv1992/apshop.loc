import {createStore} from "vuex";

const store = createStore({
    state: () => ({
        cartProducts: JSON.parse(localStorage.getItem('cart')) ?? [],
        cartProduct: {},
        newProducts: [],
        hotProducts: [],
        products: [],
        product: {},
        loading: false,
        features: {},
        checkedFeatures: {},
        orders: [],
        pagination: {},
        hsearch: "",
        hfilter: [],
        hsort: "",
        auth: false
    }),
    getters: {
        getCartProducts: (state) => state.cartProducts,
        getCartProduct: (state) => state.cartProduct,
        isAdded: (state) => (id) => state.cartProducts.find(product => product.id === id) ? true : false,
        getNewProducts: (state) => state.newProducts,
        getHotProducts: (state) => state.hotProducts,
        getProducts: (state) => state.products,
        getProduct: (state) => state.product,
        getLoading: (state) => state.loading,
        getFeatures: (state) => state.features,
        getCheckedFeatures: (state) => state.checkedFeatures,
        getOrders: (state) => state.orders,
        getPagination: (state) => state.pagination,
        getHsearch: (state) => state.hsearch,
        getHfilter: (state) => state.hfilter,
        getHsort: (state) => state.hsort,
        isAuth: (state) => state.auth
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
        },
        searchProducts: async (context, search) => {
            if (window.location.href !== 'http://apshop.loc/shop/') {
                window.location.href = `http://apshop.loc/shop/?search=${search}`;
            }
            const response = await fetch('http://apshop.loc/api/shop/search', {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json; charset=UTF-8',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(search)
            });
            const products = await response.json();
            context.commit('setProducts', products);
        },
        searchFilteredProducts: async (context, search) => {
            if (window.location.href !== 'http://apshop.loc/shop/') {
                window.location.href = `http://apshop.loc/shop/?search=${search}`;
            }
            const response = await fetch('http://apshop.loc/api/shop/filtered', {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json; charset=UTF-8',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({search: search, filters: context.getters.getCheckedFeatures})
            });
            const products = await response.json();
            context.commit('setProducts', products);
        },
        fetchFeatures: async (context) => {
            const response = await fetch(`http://apshop.loc/api/shop/features`, {
                method: 'GET',
                headers: {
                    'Content-type': 'application/json; charset=UTF-8',
                },
            });
            const features = await response.json();
            context.commit('setFeatures', features.pop());
        },
        removeCheckedFeature: (context, {feature, value}) => {
            const features = context.getters.getCheckedFeatures.map(feat => {
                if(feat[feature]) {
                    let newFeat = feat[feature].filter(val => val !== value);
                    feat[feature] = newFeat;
                }
                return feat;
            }).filter(feat => {
                if(feat[feature] && feat[feature].length === 0) {
                } else {
                    return feat;
                }
            });
            context.commit('setCheckedFeatures', features);
        },
        setCheckedFeature: (context, {feature, value}) => {
            let features = [];
            if(context.getters.getCheckedFeatures.some(element => element[feature])) {
                features = context.getters.getCheckedFeatures.map(feat => {
                    if(feat[feature]) {
                        feat[feature].push(value);
                    }
                    return feat;
                })
            } else {
                features = context.getters.getCheckedFeatures.map(feat => feat);
                let obj = {};
                obj[feature] = [value]; 
                features.push(obj);
            }
            context.commit('setCheckedFeatures', features);
        },
        fetchOrders: async (context) => {
            const response = await fetch(`http://apshop.loc/api/order`, {
                method: 'GET',
                headers: {
                    'Content-type': 'application/json; charset=UTF-8',
                },
            });
            const orders = await response.json();
            context.commit('setOrders', orders);
        },
        fetchPaginateOrders: async (context) => {
            let page = 1;
            const params = new URLSearchParams((window.location.href).split('?').pop());
            if (params.has('page')) {
                page = params.get('page');
            }
            const response = await fetch(`http://apshop.loc/api/orders?page=${page}`, {
                method: 'GET',
                headers: {
                    'Content-type': 'application/json; charset=UTF-8',
                },
            });
            const data = await response.json();
            context.commit('setOrders', data.orders);
            context.commit('setPagination', data.pagination);
        },
        searchOrdersPost: async (context, url) => {
            let page = 1;
            const params = new URLSearchParams(url.split('?').pop());
            if (params.get('page')) {
                page = params.get('page');
            }
            const response = await fetch('http://apshop.loc/api/orders/search', {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json; charset=UTF-8',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    hsearch: context.getters.getHsearch, 
                    hfilter: context.getters.getHfilter,
                    hsort: context.getters.getHsort,
                    page: page
                })
            });
            const data = await response.json();
            context.commit('setOrders', data.orders);
            context.commit('setPagination', data.pagination);
        }
    },
    mutations: {
        setCartProducts: (state, cart) => {
            state.cartProducts = cart;
            localStorage.setItem('cart', JSON.stringify(cart));
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
        },
        setFeatures: (state, features) => {
            state.features = features;
        },
        setCheckedFeatures: (state, features) => {
            state.checkedFeatures = features;
        },
        cleanCheckedFeatures: (state) => {
            state.checkedFeatures = [];
        },
        setOrders: (state, orders) => {
            state.orders = orders;
        },
        setPagination: (state, pagination) => {
            state.pagination = pagination;
        },
        setHsearch: (state, search) => {
            state.hsearch = search;
        },
        setHfilter: (state, filter) => {
            state.hfilter = filter
        },
        setHsort: (state, sort) => {
            state.hsort = sort
        },
        setAuth: (state, auth) => {
            state.auth = auth;
        }
    },
});

export default store;