import * as yup from 'yup';


const validation = yup.object().shape({
    RA: yup.string().required("Insira seu RA de aluno!"),
    
});

export default validation;