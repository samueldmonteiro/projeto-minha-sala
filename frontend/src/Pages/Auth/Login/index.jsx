import { useForm, Controller } from 'react-hook-form';
import { Link, useNavigate } from 'react-router-dom';
import { yupResolver } from '@hookform/resolvers/yup';
import TextField from '@mui/material/TextField';
import { Key as KeyIcon, Person as PersonIcon } from '@mui/icons-material';
import { LinkArea, RegisterForm } from './styles';
import { PageContainer, TitleOne } from '../../../globals/styles';
import validation from './validation';
import Header from '../../../Components/Auth/Header';
import useMessage from '../../../Hooks/useMessage';
import { loginRequest } from '../../../Services/Student/AuthService';
import { useContext, useState } from 'react';
import { AuthContext } from '../../../Context/AuthContext';
import LoadingButton from '@mui/lab/LoadingButton';



const Login = () => {
    const { control, handleSubmit, formState: { errors } } = useForm({
        resolver: yupResolver(validation),
        defaultValues: { RA: '' }
    });

    const { login } = useContext(AuthContext);
    const navigate = useNavigate();
    const { Message, setMessage } = useMessage();
    const [ loadingLogin, setLoadingLogin ] = useState(false);


    const onSubmit = async (data) => {

        setLoadingLogin(true);
        const resp = await loginRequest(data.RA);
        setLoadingLogin(false);
        console.log(resp)

        if (resp?.error) {
            setMessage(resp.message, resp.type);
            return;
        }

        setMessage('Registro efetuado com sucesso!', 'success');

        login(resp.data.token, resp.data.user);
        navigate('/');
    };

    return (
        <>
            <Header />
            <PageContainer>
                <RegisterForm onSubmit={handleSubmit(onSubmit)}>
                    <TitleOne><PersonIcon /> Digite seu RA</TitleOne>
                    {Message}
                    <Controller
                        name="RA"
                        required
                        control={control}
                        render={({ field }) => (
                            <TextField
                                {...field}
                                label="RA do aluno"
                                error={!!errors.RA}
                                placeholder="RA"
                                helperText={errors.RA?.message}
                                sx={{ marginBottom: '23px' }}
                                InputProps={{
                                    startAdornment: <KeyIcon sx={{ color: 'action.active', mr: 1, my: 0.5 }} />,
                                }}
                                type='password'

                            />
                        )}
                    />
                    <LoadingButton loading={loadingLogin}
                        color='primary' sx={{ width: '100%' }} type="submit" variant='contained'>Entrar</LoadingButton>

                    <LinkArea>
                        <Link to="/recuperar">
                            Esqueceu seu acesso?
                        </Link>

                        <Link to="/cadastrar">
                            Cadastrar-me
                        </Link>
                    </LinkArea>
                </RegisterForm>
            </PageContainer>
        </>
    );
};

export default Login;
// 70