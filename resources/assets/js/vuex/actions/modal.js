/**
 * Estable el nombre del componente que se mostrara en el modal.
 *
 * @param  {Vuex.Store}
 * @param  {String}
 */
export const setModal = ({dispatch}, modal)  => {
    dispatch('SET_MODAL', modal);
};

/**
 * Establece ningún modal.
 *
 * @param  {Vuex.Store}
 */
export const closeModal = ({dispatch}) => {
    dispatch('SET_MODAL', null);
};
