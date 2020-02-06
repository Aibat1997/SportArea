export default {
    state: {
        status: false
    },
    getters: {
        status(state) {
            return state.status;
        }
    },
    mutations: {
        changeStatus(state, flag){
            state.status = flag;
        }
    },
    actions: {}
};