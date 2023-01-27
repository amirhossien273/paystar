import Api from "../../../api/Login";


export default {
    state: {
        cart: [],

    },

    mutations: {
        SET_TO_LIST_CART(state, list) {
            
            state.cart = list;
        },

        ADD_COUNT_ORDER_TO_CART(state, count) {
            
            state.cart.countOrder = count;
        }
    },

    actions: {

        async getCart({ commit }){
            return new Promise((resolve, reject) => {
                Api.getCart()
                .then( success => {
                    resolve(success)
                    commit('SET_TO_LIST_CART', success)
                })
                .catch(error => {reject(error)})
            });
        },

    }
}