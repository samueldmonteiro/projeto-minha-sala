import * as yup from 'yup';


const validation = yup.object().shape({
    nome: yup.string().required("Nome completo é obrigatório"),
    email: yup.string().email("E-mail inválido").required("E-mail é obrigatório"),
    senha: yup.string().min(4, "Senha deve ter pelo menos 4 caracteres").required("Senha é obrigatória"),
    curso: yup.string().required("Curso é obrigatório"),
    semestre: yup.string().required("Semestre é obrigatório"),
    turno: yup.string().required("Turno é obrigatório"),
});

export default validation;