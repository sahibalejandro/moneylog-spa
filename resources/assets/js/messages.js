import 'es6-promise'; // Para dar soporte a IE
import swal from 'sweetalert2';

swal.setDefaults({
    confirmButtonText: 'Aceptar',
    cancelButtonText: 'Cancelar',
});

export default {
    /**
     * Muestra un mensaje.
     *
     * @param {string} text
     * @param {string} title
     * @param {string} type
     */
    message(text, title = '', type = 'info')
    {
        return swal({type, title, text}).done();
    },

    /**
     * Muestra un mensaje de éxito.
     *
     * @param {string} text
     * @param {string} title
     */
    success(text, title = '')
    {
        return this.message(text, title, 'success');
    },

    /**
     * Muestra un mensaje de error.
     *
     * @param {string} text
     * @param {string} title
     */
    error(text, title = '')
    {
        return this.message(text, title, 'error');
    },

    /**
     * Muestra un mensaje de confirmación.
     *
     * @param {string} text
     * @param {string} title
     * @param {string} type
     */
    ask(text, title = '', type = 'question')
    {
        return swal({type, title, text,
            showCancelButton: true,
        });
    }
};
