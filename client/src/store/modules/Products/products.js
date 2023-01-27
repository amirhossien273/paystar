import Api from "../../../api/Login";


export default {
    state: {
        list: [],

    },

    mutations: {
        SET_TO_LIST_PRODUCTS(state, list) {
            
            state.list = list;
        }
    },

    actions: {

        async getProducts({ commit }){
            return new Promise((resolve, reject) => {
                Api.getProducts()
                .then( success => {
                    resolve(success)
                    commit('SET_TO_LIST_PRODUCTS', success)
                })
                .catch(error => {reject(error)})
            });
        },

    }
}