import { createStore } from 'vuex'

import auth from './modules/Users/auth';
import products from './modules/Products/products';
import cart from './modules/Cart/cart';
import payment from './modules/payment/payment';


const store = createStore({

    modules: {
        auth,
        products,
        cart,
        payment
    }
});

export default store


