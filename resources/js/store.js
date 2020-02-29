export default {
    state: {
        status: false,
        complex_id: null,
    },
    getters: {
        status(state) {
            return state.status;
        },
        complexId(state) {
            return state.complex_id;
        }
    },
    mutations: {
        changeStatus(state, flag){
            state.status = flag;
        },
        changecomplexId(state, id){
            state.complex_id = id;
        }
    },
    actions: {}
};
