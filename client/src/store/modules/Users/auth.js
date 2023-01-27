import Api from "../../../api/Login";


export default {
    state: {
        user: { email: '' , password: ''},
        isLogin: false
    },

    mutations: {
        updateUserData (state, newData) {
            let key =Object.keys(newData)[0];
            state.user[key] = newData[key];        
        },

        updateISLogin (state, newData) {
            state.isLogin = newData;        
        }
    },

    actions: {

        async Login({ commit } , payload){
            console.log(payload);
            return new Promise((resolve, reject) => {
                Api.loginUser(payload)
                .then( success => {resolve(success)})
                .catch(error => {reject(error)})
            });
        },

    }
}