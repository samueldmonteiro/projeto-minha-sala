import * as yup from 'yup';


const validation = yup.object().shape({
    name: yup.string().required("Nome completo é obrigatório"),
    course: yup.string().required("Curso é obrigatório"),
    semester: yup.string().required("Semestre é obrigatório"),
    RA: yup.string().required("RA é obrigatório"),
});

export default validation;