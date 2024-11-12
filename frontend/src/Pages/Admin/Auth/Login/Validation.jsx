import * as yup from 'yup';

const Validation = yup.object().shape({
    name: yup.string().
        max(70, 'Excedeu o número de caracteres').
        required('Nome completo é obrigatório'),

    email: yup.string().
        email('Email inválido').
        max(50, 'Excedeu o número de caracteres').
        required('Email é obrigatório'),

    password: yup.string().
        max(50, 'Excedeu o número de caracteres').
        required('Senha é obrigatória'),

    course: yup.string().
        max(50, 'Excedeu o número de caracteres').
        required('Curso é obrigatório'),

    semester: yup.string().
        max(50, 'Excedeu o número de caracteres').
        required('Semestre é obrigatório'),
});


export default Validation;