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
 * Devuelve el monto total en las cuentas.
 * 
 * @param  {Object} state
 * @return {Number}
 */
export function accountsTotal(state)
{
    return state.accountsTotal;
}

/**
 * Devuelve el monto total a pagar.
 * 
 * @param  {Object} state
 * @return {Number}
 */
export function paymentsTotal(state)
{
    return state.paymentsTotal;
}

/**
 * Devuelve el monto total disponible.
 * 
 * @param  {Object} state
 * @return {Number}
 */
export function availableTotal(state)
{
    return state.accountsTotal - state.paymentsTotal;
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