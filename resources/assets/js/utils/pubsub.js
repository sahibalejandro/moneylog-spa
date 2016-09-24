/**
 * Este módulo provee la funcionalidad pub-sub.
 */
export default {
	/**
	 * Lista de eventos con sus callbacks.
	 * 
	 * @type {Array}
	 */
	events: [],

	/**
	 * Suscribirse a un evento.
	 *
	 * @param {String} event
	 * @param {Function} callback
	 */
	sub(event, callback)
	{
		if (! this.exists(event)) {
			this.events[event] = [];
		}

		this.events[event].push(callback);

		return this;
	},

	/**
	 * Publicar un evento.
	 *
	 * @param {String} event
	 */
	pub(event, ...payload)
	{
		if (! this.exists(event)) {
			return this;
		}
		
		this.events[event].map(callback => {
			callback.apply(this, payload);
		});

		return this;
	},

	exists(event)
	{
		return this.events[event] != undefined;
	}
};