import * as yup from 'yup';


const validation = yup.object().shape({
    name: yup.string().required("Nome completo é obrigatório"),
    email: yup.string().email("E-mail inválido").required("E-mail é obrigatório"),
    password: yup.string().min(4, "Senha deve ter pelo menos 4 caracteres").required("Senha é obrigatória"),
    course: yup.string().required("Curso é obrigatório"),
    semester: yup.string().required("Semestre é obrigatório"),
    shift: yup.string().required("Turno é obrigatório"),
});

export default validation;