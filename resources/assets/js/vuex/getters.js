/**
 * Este módulo contiene una serie de funciones son utilizados como getters del
 * state de vuex.
 */

/**
 * Devuelve el array de cuentas disponibles.
 * 
 * @param  {Object} state
 * @return {Array}
 */
export function accounts(state)
{
    return state.accounts;
}

/**
 * Devuelve el nombre del componente que es mostrado en el modal.
 * 
 * @param  {Object} state
 * @return {String}
 */
export function currentModal(state)
{
	return state.currentModal;
}