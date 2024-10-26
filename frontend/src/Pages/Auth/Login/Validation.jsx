import * as yup from 'yup';

const Validation = yup.object().shape({
    email: yup.string().email('Email inválido').
        max(50, 'Excedeu o número de caracteres').
        required('Email é obrigatório'),

    password: yup.string().
        max(50, 'Excedeu o número de caracteres').
        required('Senha é obrigatória'),
});


export default Validation;