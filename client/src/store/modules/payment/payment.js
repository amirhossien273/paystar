import Api from "../../../api/Login";


export default {
    state: {
        payment: [],

    },

    mutations: {
        SET_TO_LIST_PAYMENT(state, list) {
            
            state.payment = list;
        },

    },

    actions: {

        async connentToPaystar({ commit }, id){
            return new Promise((resolve, reject) => {
                Api.connentToPaystar(id)
                .then( success => {
                    commit('SET_TO_LIST_PAYMENT', success)
                    resolve(success)
                })
                .catch(error => {reject(error)})
            });
        },

        async callBack({ commit }, id){
            return new Promise((resolve, reject) => {
                Api.callBack(id)
                .then( success => {
                    resolve(success)
                })
                .catch(error => {reject(error)})
            });
        },

    }
}