export default {
    state: {
        status: false,
        complex_id: null 
    },
    getters: {
        status(state) {
            return state.status;
        },
        complexId() {
            return state.complex_id;
        }
    },
    mutations: {
        changeStatus(state, flag){
            state.status = flag;
        },
        setComplexId(state, value){
            state.status = value;
        }
    },
    actions: {}
};