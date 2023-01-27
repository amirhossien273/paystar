import axios from "axios";

const url_local = "http://127.0.0.1:8000/api/v1/";

const Api = {

    loginUser: function(payload) {
        return (
            axios.post( url_local + 'login', payload)
            .then(function(response) {
                return response.data;
            })
        );
    },

    getProducts: function() {
       let token = "bearer " + localStorage.getItem('token');
        return (
            axios.get(
            url_local + "producrs/all",
            {headers: { 'Authorization': token }})
            .then(function(response) {
                return response.data.data;
            })
        );
    },

    getCart: function() {
        let token = "bearer " + localStorage.getItem('token');
         return (
             axios.get(
             url_local + "cart/show",
             {headers: { 'Authorization': token }})
             .then(function(response) {
                 return response.data.data;
             })
         );
    },

    connentToPaystar: function(id) {
        let token = "bearer " + localStorage.getItem('token');
        return (
            axios.get(
            url_local + `pay/connect/${id}`,
            {headers: { 'Authorization': token }})
            .then(function(response) {
                console.log(response.data.data)
                return response.data.data;
            })
        );
    },

    callBack: function(payload) {
        let token = "bearer " + localStorage.getItem('token');
        return (
            axios.post( url_local + 'pay/back', payload, {headers: { 'Authorization': token }})
            .then(function(response) {
                return response.data.data;
            })
        );
    },
}

export default Api;