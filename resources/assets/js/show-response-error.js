import m from './messages';

export default response => {
    let message;

    try {
        message = response.json().message;
    } catch (e) {
        message = 'Ocurrió un error inesperado';
    }

    m.message(message, '', response.status == 500 ? 'error' : 'warning');
};
