export const setModal = ({dispatch}, modal)  => {
    dispatch('SET_MODAL', modal);
};

export const closeModal = ({dispatch}) => {
    dispatch('SET_MODAL', null);
};